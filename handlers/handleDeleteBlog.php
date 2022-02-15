<?php 

if(isset($_SESSION['id'])){
    header('Location:../login.php');
    die();
}

$id=$_GET['id'];
session_start();
require_once '../classes/Blog.php';
$blog = new Blog;
$Blog = $blog->getOne($id);
$cover_img = $Blog['cover_img'];
$img = $Blog['img'];
unlink('../imgs/'.$img);
unlink('../imgs/'.$cover_img);
$result = $blog->delete($id);
echo $result;
if($result ==true){ 
    header('Location:../blogs.php');
}
else{
    
}
