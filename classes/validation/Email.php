<?php

namespace validation;

require_once 'validationinterface.php';

 class Email implements validationinterface{
     private $name;
     private $value;
    public function __construct($name , $value){
        $this->name =$name;
        $this->value =$value;
    }
    public function validate(){
        if(!filter_var($this->value, FILTER_VALIDATE_EMAIL)){
            return "$this->name Is Not a valid Email";
        }
    }
 }