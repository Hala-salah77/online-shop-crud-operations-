<?php
session_start();
require_once '../Classes/validation/Validator.php';
require_once '../Classes/Admin.php';

use validation\Validator;

if(isset($_POST['submit'])){

    $email=$_POST['email'];
    $password=$_POST['password'];


    //validation
    $v = new validator;
    $v->rules('email' , $email ,['required','email','max:100']);
    $v->rules('password' , $password ,['required','string']);
    $errors = $v->errors; 

    if(true){   
        
        $admin = new Admin; 
        $result = $admin->attempt($email , $password);
        
        if($result !== null){ 
            $_SESSION['id']=$result['id'];
            $_SESSION['username']=$result['username'];
            header('Location:../index.php');
        }
        else{ 
            $_SESSION['errors']=['Your Credentials are not correct'];
            header('Location:../login.php');
        }
    } 
    else{
        $_SESSION['errors']=$errors;
        header('Location:../login.php');
    }
        
    } 
    else{ 
        header(`Location:../login.php`);
    }  