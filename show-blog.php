<?php 

session_start(); 
require_once 'classes/Blog.php';
require_once 'classes/Str.php';
$id= $_GET['id'];
    $blog=new Blog;
    $blogInfo=$blog->getOne($id);
?>

<?php include 'inc/header.php'; ?>

  <div class="container my-5 d-flex " style="height:73vh;align-items: center;">
      <div class="row  d-flex justify-content-center align-items-center">
        <?php if($blogInfo !== null){?>
        <div class="col-lg-6">
        <img src="imgs/<?php echo $blogInfo ['cover_img'] ?>" class="card-img-top" alt="product photo">
        </div>
        <div class="col-lg-6 p-3">
            <h5 class="card-title position-relative"> <?php echo $blogInfo['name']?>
                    <span class="price position-absolute"><?php echo $blogInfo['author']?></span>
            </h5>
            <p class="card-text pr-3 "><?php echo $blogInfo['blog_desc']?></p>
            <div class="d-flex text-center justify-content-around mt-5 px-5">
                <a href="blogs.php" class="btn btn-primary">back</a>
                <?php if(isset($_SESSION['id'])){ ?>
                  <a href="edit-blog.php?id=<?php echo  $blogInfo['blog_id'] ?>" class="btn btn-warning ">Edit</a>
                  <a href="handlers/handleDeleteBlog.php?id=<?php echo  $blogInfo['blog_id'] ?>" class="btn btn-danger">Delete</a>
                <?php }?>
              
            </div>
        </div>
        <?php }else {?>
            <p>Not found</p>
        <?php }  ?>
      </div>
  </div>
<?php include 'inc/footer.php'; ?>

    