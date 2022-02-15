<?php 
session_start();

if(!isset($_SESSION['id'])){
  header('Location:login.php');
}

require_once 'classes/Product.php';
$id= $_GET['id'];
  $prod=new Product;
  $product=$prod->getOne($id);
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

      <form action="handlers/handleEditProduct.php?id=<?php echo $product['id'] ?>" method="post" >
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo  $product['name'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo  $product['price'] ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" class="w-100 form-control" rows="10" name="desc" ><?php echo  $product['desc'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
    </form>

      </div>
  </div>


<?php include 'inc/footer.php'; ?>