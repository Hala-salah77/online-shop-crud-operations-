<?php 
session_start();

if(!isset($_SESSION['id'])){
  header('Location:login.php');
}

require_once 'classes/Blog.php';
$id= $_GET['id'];
  $blog=new Blog;
  $blogInfo=$blog->getOne($id);
?>

<?php include 'inc/header.php'; ?>

  <div class="container my-5 add-product">
      <div class="row">

      <?php  if(isset($_SESSION['errors'])){ ?>
          
          <div class="alert alert-danger "> 
              <?php foreach($_SESSION['errors'] as $error){?>
                  <p class="text-center">  <?php echo $error; ?>  </p>
            <?php } ?>
          </div>
      
    <?php } ?>
    <?php unset($_SESSION['errors']);?>

      <form action="handlers/handleEditBlog.php?id=<?php echo $blogInfo['blog_id'] ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo  $blogInfo['name'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="<?php echo  $blogInfo['author'] ?>">
            </div>
            <div class="mb-3">
                <label for="blog_desc" class="form-label">Description</label>
                <textarea id="blog_desc" class="w-100 form-control" rows="10" name="blog_desc" ><?php echo  $blogInfo['blog_desc'] ?></textarea>
            </div>
            <input type="submit" class="btn btn-primary" name="update" value="Edit">
    </form>

      </div>
  </div>


<?php include 'inc/footer.php'; ?>