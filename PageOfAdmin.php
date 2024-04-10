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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="pageOfAdmin.css">
    <title>Page Of Admin</title>
</head>
<body>
    <div class="menu">
        <ul>
            <li class="profile">
                <div class="img-box">
                    <img src="img/101.jpeg" alt="profile">
                </div>
                <h2>Hasan Fati</h2>
            </li>
            <li>
                <a href="" class="active">
                    <i class="fa-solid fa-house"></i>
                    <p>Home</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <p>Products</p>
                </a>
            </li>
            <li>
                <a href="AddProducts.php">
                    <i class="fa-solid fa-plus"></i>
                    <p>Add Product</p>
                </a>
            </li>
            <li>
                <a href="display.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <p>Edit Product</p>
                </a>
            </li>
            <li>
                <a href="display.php">
                    <i class="fa-solid fa-trash"></i>
                    <p>Delete Product</p>
                </a>
            </li>
            <li class="log-out">
                <a href="LoginForAdmin.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <p>Log Out</p>
                </a>
            </li>
        </ul>
    </div>
    <div class="content">
        <div class="title-info">
            <p>Divi ty.</p>
            <i class="fa-solid fa-chart-bar"></i>
        </div>
        <div class="data-info">
            <div class="box">
                <i class="fa-solid fa-user"></i>
                <div class="data">
                    <p>user</p>
                    <span>100</span>
                </div>
            </div>
            <div class="box">
                <i class="fa-solid fa-shopping-cart"></i>
                <div class="data">
                    <p>Products</p>
                    <span>45</span>
                </div>
            </div>
        </div>
        <div class="title-info">
            <p>Divi ty.</p>
            <i class="fa-solid fa-table"></i>
        </div>

        <table class="table">
            <thead>
                <tr>
                <th>Products ID</th>
                <th>Name Product</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Production Date</th>
                <th>Expiry</th>
                <th>Section</th>
                <th>PlaceMade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                    <td> <?php  echo $data['Id'] ?> </td> 
                    <td> <?php  echo $data['nameProduct'] ?> </td> 
                    <td> <?php  echo $data['price'] ?> </td>
                    <td> <?php  echo $data['discount'] ?> </td> 
                    <td> <?php  echo $data['productionDate'] ?> </td> 
                    <td> <?php  echo $data['expiry'] ?> </td> 
                    <td> <?php  echo $data['section'] ?> </td>
                    <td> <?php  echo $data['placeMade'] ?> </td>
                </tr>
                <?php  }  ?>
            </tbody>
        </table>
    </div>
</body>
</html>