<?php

namespace validation;

require_once 'validationinterface.php';

class Strvalidate implements validationinterface{
    private $name;
    private $value;
    public function __construct($name , $value){
        $this->name =$name;
        $this->value =$value;
    }
    public function validate(){
        if(!is_string($this->value)){
            return "$this->name is must be string";
        }
    }
}