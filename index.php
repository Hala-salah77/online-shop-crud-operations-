<?php 

session_start(); 
require_once 'classes/Product.php';
require_once 'classes/Str.php';
  $prod=new Product;
  $products=$prod->getAll();
?>

<?php include 'inc/header.php'; ?>
  <div class="container my-5">
      <div class="row">
          <?php if($products !== []){ ?>
          <?php foreach($products as $product){?>
          <div class="col-lg-4">
          <div class="card mb-5" style="width: 18rem;">
            <img src="imgs/<?php echo $product['img'] ?>" class="card-img-top product-img" alt="product photo">
            <div class="card-body">
                <h5 class="card-title position-relative"> <?php echo $product['name']?>
                    <span class="price position-absolute"><?php echo $product['price']?></span>
                </h5>
                <p class="card-text"><?php echo Str::limit($product['desc'])?></p>
                <div class="d-flex text-center justify-content-around">
                <a href="show-product.php?id=<?php echo  $product['id'] ?>" class="btn btn-primary">Show</a>
                <?php if(isset($_SESSION['id'])){ ?>
                  <a href="edit-product.php?id=<?php echo  $product['id'] ?>" class="btn btn-warning ">Edit</a>
                  <a href="handlers/handleDeleteProduct.php?id=<?php echo $product['id'] ?>" class="btn btn-danger">Delete</a>
                <?php }?>
                
                </div>    
            </div> 
            </div>
          </div>
          <?php } ?>
          <?php }else{?>
              <p class="h5 alert alert-warning text-center" role="alert">No Products Found</p>
          <?php } ?>
      </div>
  </div>


<?php include 'inc/footer.php'; ?>