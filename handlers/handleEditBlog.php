<?php
session_start();
require_once '../classes/Blog.php';
require_once '../classes/Image.php';
require_once '../Classes/validation/Validator.php';

use validation\Validator;

if(!isset($_SESSION['id'])){ 
    header('Location:../login.php');
    die();
}

if(isset($_POST['update'])){
    $id=$_GET['id'];
    $name=$_POST['name'];
    $blog_desc=$_POST['blog_desc'];
    $author=$_POST['author'];

    //validation
    $v = new validator;
    $v->rules('name' , $name ,['required','string','max:100']);
    $v->rules('blog_desc' , $blog_desc ,['required','string']);
    $v->rules('author' , $author ,['required','string']);
    $errors = $v->errors;
    
    
    if(true){   
        $data=[
            'name'=>$name,
            'blog_desc'=>$blog_desc,
            'author'=>$author,
        ];
        $blog = new Blog; 
        $result = $blog->update($id,$data);
        if($result == true){ 

            header('Location:../show-blog.php?id='.$id);
        }
        else{ 
            echo "false";
        }
    } 
    else{
        $_SESSION['errors']=$errors; 
        header('Location:../edit-blog.php?id='.$id);
    }
        
    } 
    else{ 
        header('Location:../blogs.php' ); 
    } 