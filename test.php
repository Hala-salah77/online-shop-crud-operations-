<?php
include 'classes/Admin.php';
$admin=new Admin();

   /* echo $prod->store([
    'name'=> 'product5',
    'desc'=> 'new product',
    'img'=>'p5.jpg',
    'price'=>1000,
]);  */

 /* echo $prod->update(15 , [
    'name'=> 'product15',
    'desc'=> 'new productmmmm',
    'price'=>1000,
     'img'=>'p5.jpg' ,
]);   */ 


  echo $admin->attempt('admin@gmail.com','01230123'); 