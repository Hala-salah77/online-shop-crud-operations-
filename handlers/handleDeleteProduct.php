<?php 

if(isset($_SESSION['id'])){
    header('Location:../login.php');
    die();
}
session_start();
$id=$_GET['id'];
require_once '../classes/Product.php';
$prod = new Product;
$product = $prod->getOne($id);
$img = $product['img'];
unlink('../imgs/'.$img);
$result = $prod->delete($id);
echo $result;
if($result ==true){ 
    header('Location:../index.php');
}
else{
    
}
