<?php

require_once 'MySql.php';
class Admin extends MySql{

    public function attempt($email , $password){
        $query = "SELECT *  from admins 
        WHERE email = '$email' and `password` = '$password' ";

        $result = $this->connect()->query($query);
        $user = null;
        if($result-> num_rows == 1){
            $user = $result->fetch_assoc();
        }
        return $user;
    }
    
}