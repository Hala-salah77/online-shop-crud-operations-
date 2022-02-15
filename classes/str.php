<?php
class Str{
    public static function limit($str){
        if(strlen($str) > 80 ){
            $str= substr($str,0,80). '....';
        }
        return $str;
    }
}