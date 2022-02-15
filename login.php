<?php 
session_start();

if(isset($_SESSION['id'])){
    header('Location:index.php');
    die();
}
?>

<?php include 'inc/header.php'; ?>
<!-- Start login -->

<section class="login">
        <div class="container d-flex justify-content-center align-items-center" style="height:100%;flex-direction: column;">
            <div class="container mt-2 align-items-center">
            <?php  if(isset($_SESSION['errors'])){ ?>
                    
                    <div class="alert alert-danger p-2"> 
                        <?php foreach($_SESSION['errors'] as $error){?>
                            <p class="text-center m-0"><?php echo $error; ?></p>
                        <?php } ?>
                    </div>
                
                <?php } ?>
                <?php unset($_SESSION['errors']);?>
            </div>
            <form class="p-4" method="post" action="handlers/handleLogin.php">
            <div class="form-group-check d-flex justify-content-between">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="email" name="email" required>
            </div>
            <div class="form-group mb-4">
                <input type="password" class="form-control" placeholder="password" name="password" required>
            </div>
        <div class="text-center">
                <input type="submit" value="login" class="btn btn-success text-white px-3" name="submit">
            </div>
        </form>
        </div>
    </section>
        
    <!-- End login -->   

    <?php include 'inc/footer.php'; ?>