<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="discription" content=" this is a form made by Amany Samir">
    <title>Online Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head> 
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <div class="container d-flex justify-content-between">
    <div class="d-flex">
    <a class="navbar-brand" href="index.php">online shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <?php if(isset($_SESSION['id'])){ ?>
          <a class="nav-link" href="add-product.php">Add New</a>
        <?php }?>
        <a class="nav-link" aria-current="page" href="blogs.php">Blogs</a>
        <?php if(isset($_SESSION['id'])){ ?>
          <a class="nav-link" href="add-blog.php">Add Blog</a>
        <?php }?>
      </div>
    </div>
    </div>
    <?php if(isset($_SESSION['id'])){ ?>
    <div class="user">
      <span class="user-name"><?php echo $_SESSION['username']?></span>
        <a href="handlers/handlelogout.php" class="btn btn-success log-out" >Log Out</a></div>
    </div> 
  <?php }?>
</nav>