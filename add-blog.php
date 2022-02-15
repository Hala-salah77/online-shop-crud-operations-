<?php 
session_start();

if(!isset($_SESSION['id'])){
    header('Location:login.php');
}
?>

<?php include 'inc/header.php'; ?>

<div class="container my-5 add-product">
        <div class="row">
        <?php  if(isset($_SESSION['errors'])){ ?>
            <div class="alert alert-danger "> 
                <?php foreach($_SESSION['errors'] as $error){?>
                    <p class="text-center"><?php echo $error; ?></p>
                <?php } ?>
            </div>
        <?php } ?>
        <?php unset($_SESSION['errors']);?>
        
    <form action="handlers/handleAddBlog.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Blog Name</label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>
            <div class="mb-3">
                <label class="form-label" for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author">
            </div>
            <div class="mb-3">
                <label class="form-label" for="cover_img">Cover Image</label>
                <input type="file" class="form-control" id="cover_img" name="cover_img">
            </div>
            <div class="mb-3">
                <label class="form-label" for="img">Body Image</label>
                <input type="file" class="form-control" id="img" name="img">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" class="w-100 form-control" rows="10" name="blog_desc" ></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    </div>
</div>


<?php include 'inc/footer.php'; ?>

    