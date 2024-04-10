<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="AddProducts.css">
    <title>AddProducts</title>
</head>
<body>
<?php
//messege if add data is success
    if(isset($_GET['message'])){?>
        <div class="alert alert-success m-4" role="alert"> <?php echo $_GET['message'] ?></div>
<?php } ?>
<div class="container mt-5">
        <form action="AddPro.php" class="form" method="post" enctype="multipart/form-data">
            <div class="row p-5">
            <div class="col-lg-4">
                <input type="text" name="NameOfProduct" placeholder="Name Of Product">
                <?php
                    if(isset($_GET['error'])){?>
                        <p class="text-danger" role="alert"> <?php echo $_GET['error'] ?></p>
                <?php } ?>
            </div>
            <div class="col-lg-4">
                <input type="text" name="priceOfProduct" placeholder="price Of Product">
                <?php
                    if(isset($_GET['error'])){?>
                        <p class="text-danger" role="alert"> <?php echo $_GET['error'] ?></p>
                <?php } ?>
            </div>
            <div class="col-lg-4">
                <input type="text" name="Discount" placeholder="Discount">
                <?php
                    if(isset($_GET['error'])){?>
                        <p class="text-danger" role="alert"> <?php echo $_GET['error'] ?></p>
                <?php } ?>
            </div>
            <div class="col-lg-4">
                <input type="text" name="Section" placeholder="Section">
                <?php
                    if(isset($_GET['error'])){?>
                        <p class="text-danger" role="alert"> <?php echo $_GET['error'] ?></p>
                <?php } ?>
            </div>
            <div class="col-lg-4">
                <input type="text" name="ProductionDate" placeholder="Production Date">
                <?php
                    if(isset($_GET['error'])){?>
                        <p class="text-danger" role="alert"> <?php echo $_GET['error'] ?></p>
                <?php } ?>
            </div>
            <div class="col-lg-4">
                <input type="text" name="ExpiryDate" placeholder="Expiry Date">
                <?php
                    if(isset($_GET['error'])){?>
                        <p class="text-danger" role="alert"> <?php echo $_GET['error'] ?></p>
                <?php } ?>
            </div>
            <div class="col-lg-4">
                <input type="text" name="PlaceMade" placeholder="Place Made">
                <?php
                    if(isset($_GET['error'])){?>
                        <p class="text-danger" role="alert"> <?php echo $_GET['error'] ?></p>
                <?php } ?>
            </div>
            <div class="col-lg-4">
                <input type="file" name="Image">
                <?php
                    if(isset($_GET['error'])){?>
                        <p class="text-danger" role="alert"> <?php echo $_GET['error'] ?></p>
                <?php } ?>
            </div>
            <div class="button">
            <button type="submit" class="btn btn-danger btn-lg">Add Product</button>
            </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
        <a class="btn btn-outline-primary btn-lg m-2" href="PageOfAdmin.php">Main Page</a>
        </div>
        </div>
    </div>
</body>
</html>