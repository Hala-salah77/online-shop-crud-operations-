<?php
 session_start();
require_once '../classes/Product.php';
require_once '../Classes/validation/Validator.php';

use validation\Validator;

if(!isset($_SESSION['id'])){
    header('Location:../login.php');
    die();
}
if(isset($_POST['edit'])){

    $id=$_GET['id'];

    $name=$_POST['name'];
    $desc=$_POST['desc'];
    $price=$_POST['price'];

     //validation

    $v = new validator;
    $v->rules('name' , $name ,['required','string','max:100']);
    $v->rules('desc' , $desc ,['required','string']);
    $v->rules('price' , $price ,['required','numeric']);
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
        $data=[
            'name'=>$name,
            'desc'=>$desc,
            'price'=>$price
        ];
        $prod = new Product;
        $result = $prod->update($_GET['id'] , $data);
        if($result == true){ 

            header('Location:../show-product.php?id='.$id);
        }
        else{ 
            echo "false";
        }
    } 
    else{
        $_SESSION['errors']=$errors; 
        header('Location:../edit-product.php?id='.$id);
    }
        
    } 
    else{ 
        header('Location:../index.php' ); 
    } 