<?php 

require_once('ConWithDb.php');
require_once('functions.php');

$result = display_data();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- <link rel="stylesheet" href="pageOfAdmin.css">  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <title>display</title>
</head>
<body class="">
<?php
    if(isset($_GET['message'])){?>
        <div class="alert alert-success m-4" role="alert"> <?php echo $_GET['message'] ?></div>
<?php } ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5 ">
                    <div class="card-header">
                        <h2 style="text-align: center;">Products in database</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-primary text-white">
                                <td>Products ID</td>
                                <td>Name Product</td>
                                <td>Price</td>
                                <td>Discount</td>
                                <td>Production Date</td>
                                <td>Expiry</td>
                                <td>Section</td>
                                <td>PlaceMade</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            <tr>
                                <?php while ($data = mysqli_fetch_assoc($result)) { 
                                    $id = $data['Id'];
                                    ?>
                                  <td> <?php  echo $data['Id'] ?> </td> 
                                  <td> <?php  echo $data['nameProduct'] ?> </td> 
                                  <td> <?php  echo $data['price'] ?> </td>
                                  <td> <?php  echo $data['discount'] ?> </td> 
                                  <td> <?php  echo $data['productionDate'] ?> </td> 
                                  <td> <?php  echo $data['expiry'] ?> </td> 
                                  <td> <?php  echo $data['section'] ?> </td>
                                  <td> <?php  echo $data['placeMade'] ?> </td>
                                  <td><a href="update.php?updateid='<?php echo $data['Id']  ?>'" class="btn btn-primary">Edit</a></td>
                                  <td><a href="delete.php?deleteid='<?php echo $data['Id']  ?>'" class="btn btn-danger">Delete</a></td>
                            </tr>
                              <?php  }  ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
        <a class="btn btn-outline-primary btn-lg m-2" href="PageOfAdmin.php">Main Page</a>
        </div>
        </div>
        </div>
    </div>
</body>
</html>