<?php 

include('ConWithDb.php');
require_once('functions.php');

UpdateData();

?>

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
<div class="container mt-5">
        <form class="form" method="post">
        <?php fetch_Data(); ?>
            <div class="row p-5">
            <div class="col-lg-4">
                <input type="text" name="NameOfProduct" value="<?php echo $nameProduct  ?>">
            </div>
            <div class="col-lg-4">
                <input type="text" name="priceOfProduct" value="<?php echo $price ?>">
            </div>
            <div class="col-lg-4">
                <input type="text" name="Discount" value="<?php echo $discount ?>">
            </div>
            <div class="col-lg-4">
                <input type="text" name="Section" value="<?php echo $section ?>">
            </div>
            <div class="col-lg-4">
                <input type="text" name="ProductionDate" value="<?php echo $productionDate ?>">
            </div>
            <div class="col-lg-4">
                <input type="text" name="ExpiryDate" value="<?php echo $expiry ?>">
            </div>
            <div class="col-lg-4">
                <input type="text" name="PlaceMade" value="<?php echo $placeMade ?>">
            </div>
            <div class="button">
            <button type="submit" class="btn btn-danger btn-lg" name="submit">Edit Product</button>
            </div>
            </div>
        </form>
    </div>
 </div>
</body>
</html>