<?php

namespace validation;
require_once 'validationinterface.php';
require_once 'Email.php';
require_once 'Strvalidate.php';
require_once 'Max.php';
require_once 'Numeric.php';
require_once 'Requird.php';
class Validator{
    public $errors =[];
    private  function makeValidation(validationinterface $v)
    {
        return $v->validate();
    }
    public function rules($name , $value , array $rules){ 
        foreach($rules as $rule){
            if($rule == 'required'){
                $error = $this->makeValidation(new Requird($name , $value));
            }
            else if($rule == 'string'){
                $error = $this->makeValidation(new Strvalidate($name , $value));
            }
            else if($rule == 'max:100'){
                $error = $this->makeValidation(new Max($name , $value));
            }
            else if($rule == 'email'){
                $error = $this->makeValidation(new Email($name , $value));
            }
            else if($rule == 'numeric'){
                $error = $this->makeValidation(new Numeric($name , $value));
            }
            else{
                $error = '';
            }
            if($error !== ''){
                array_push($this->errors , $error);
            }
            
        }
    }

}