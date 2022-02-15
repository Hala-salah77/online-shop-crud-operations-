<?php
 session_start();
require_once '../classes/Product.php';
require_once '../classes/Image.php';
require_once '../Classes/validation/Validator.php';

use validation\Validator;

if(!isset($_SESSION['id'])){
    header('Location:../login.php');
    die();
}

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $desc=$_POST['desc'];
    $price=$_POST['price'];
    $img=$_FILES['img']; 

    //validation
    $v = new validator;
    $v->rules('name' , $name ,['string','required','max:100']);
    $v->rules('desc' , $desc ,['string','required']);
    $v->rules('price' , $price ,['required','numeric']);
    //$v->rules('img' , $img ,['required']);
    $errors = $v->errors;
    $err=Null;

        foreach($errors as $error){
            if($error === NULL){
                continue;
            }
            else
            $err= $error;
        }
    
    echo $err;

    if($err ==Null ){   
        $image = new Image($img);
        $data=[
            'name'=>$name,
            'desc'=>$desc,
            'price'=>$price,
            'img'=>$image->new_name
        ];
        $prod = new Product; 
        $result = $prod->store($data);
        
        if($result == true){ 
            $image->apload();
            header('Location:../index.php');
        }
        else{ 
            echo "false";
        }
    } 
    else{
        $_SESSION['errors']=$errors;
        header('Location:../add-product.php');
    }
        
    } 
    else{ 
        header(`Location:../add-product.php`);
    } 