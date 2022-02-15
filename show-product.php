<?php 
session_start();
require_once 'classes/Product.php';
$id= $_GET['id'];
  $prod=new Product;
  $product=$prod->getOne($id);
?>

<?php include 'inc/header.php'; ?>

  <div class="container my-5 d-flex " style="height:73vh;align-items: center;">
      <div class="row  d-flex justify-content-center align-items-center">
        <?php if($product !== null){?>
        <div class="col-lg-6">
        <img src="imgs/<?php echo $product ['img'] ?>" class="card-img-top" alt="product photo">
        </div>
        <div class="col-lg-6 p-3">
            <h5 class="card-title position-relative"> <?php echo $product['name']?>
                    <span class="price position-absolute"><?php echo $product['price']?></span>
            </h5>
            <p class="card-text pr-3 "><?php echo $product['desc']?></p>
            <div class="d-flex text-center justify-content-around mt-5 px-5">
                <a href="index.php" class="btn btn-primary">back</a>
                <?php if(isset($_SESSION['id'])){ ?>
                  <a href="edit-product.php?id=<?php echo  $product['id'] ?>" class="btn btn-warning ">Edit</a>
                  <a href="handlers/handleDeleteProduct.php?id=<?php echo  $product['id'] ?>" class="btn btn-danger">Delete</a>
                <?php }?>
              
            </div>
        </div>
        <?php }else {?>
            <p>Not found</p>
        <?php }  ?>
      </div>
  </div>


<?php include 'inc/footer.php'; ?>

    