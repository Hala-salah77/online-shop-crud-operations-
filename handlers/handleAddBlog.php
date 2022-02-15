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

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $blog_desc=$_POST['blog_desc'];
    $author=$_POST['author'];
    $cover_img=$_FILES['cover_img']; 
    $img=$_FILES['img']; 

    //validation
    $v = new validator;
    $v->rules('name' , $name ,['required','string','max:100']);
    $v->rules('blog_desc' , $blog_desc ,['required','string']);
    $v->rules('author' , $author ,['required','string']);
    $errors = $v->errors;
    
    
    if(true){   
        $image = new Image($img);
        $image2 = new Image($cover_img);
        $data=[
            'name'=>$name,
            'blog_desc'=>$blog_desc,
            'author'=>$author,
            'img'=>$image->new_name,
            'cover_img'=>$image2->new_name
        ];
        $blog = new Blog; 
        $result = $blog->store($data);
        
        if($result == true){ 
            $image->apload();
            $image2->apload();
            header('Location:../blogs.php');
        }
        else{ 
            echo "false";
        }
    } 
    else{
        $_SESSION['errors']=$errors; 
        header('Location:../add-blog.php');
    }
        
    } 
    else{ 
        header(`Location:../add-blog.php`);
    } 