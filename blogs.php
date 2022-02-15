<?php 

session_start(); 
require_once 'classes/Blog.php';
require_once 'classes/Str.php';
    $blog=new Blog;
    $blogs=$blog->getAll();
?>

<?php include 'inc/header.php'; ?>
<div class="container my-5">
        <div class="row">
            <?php if($blogs !== []){ ?>
            <?php foreach($blogs as $blog){?>
            <div class="col-lg-4">
            <div class="card mb-5" style="width: 18rem;">
            <img src="imgs/<?php echo $blog['img'] ?>" class="card-img-top product-img" alt="product photo">
            <div class="card-body">
                <h5 class="card-title position-relative"> <?php echo $blog['name']?>
                    <span class="price position-absolute"><?php echo $blog['author']?></span>
                </h5>
                <p class="card-text"><?php echo $blog['blog_desc']?></p>
                <div class="d-flex text-center justify-content-around">
                <a href="show-blog.php?id=<?php echo  $blog['blog_id'] ?>" class="btn btn-primary">Show</a>
                <?php if(isset($_SESSION['id'])){ ?>
                    <a href="edit-blog.php?id=<?php echo  $blog['blog_id'] ?>" class="btn btn-warning ">Edit</a>
                    <a href="handlers/handleDeleteBlog.php?id=<?php echo $blog['blog_id'] ?>" class="btn btn-danger">Delete</a>
                <?php }?>
                
                </div>    
            </div> 
            </div>
        </div>
        <?php } ?>
        <?php }else{?>
            <p class="h5 alert alert-warning text-center" role="alert">No Blogs Found</p>
        <?php } ?>
    </div>
</div>


<?php include 'inc/footer.php'; ?>

