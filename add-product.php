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
        
      <form action="handlers/handleAddProduct.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label" for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label class="form-label" for="img">Image</label>
                <input type="file" class="form-control" id="img" name="img" >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" class="w-100 form-control" rows="10" name="desc" ></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

      </div>
  </div>


<?php include 'inc/footer.php'; ?>

    