<?php

include "ConWithDb.php";

    $query = "SELECT * FROM products WHERE section='mobile'";
    $result = mysqli_query($conn, $query);
    
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@200;300;400;500;600;700;800&family=Poppins:wght@500;600;700;800&family=Quicksand:wght@300;400;500;600;700&display=swap"
rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="sections.css">
    <title>Mobile Section</title>
</head>
<body>
<nav class="navbar navbar-expand-lg">
            <div class="container">
              <a class="navbar-brand" href="#">
                <h3 class="logo">Divi <span>ty.</span></h3>
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto px-3">
                  <li class="nav-item">
                    <a class="nav-link" href="Home.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                  </li>
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  sections
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="sectionOfElctronic.php">Elctronics</a></li>
                  <li><a class="dropdown-item" href="SectionOfWatch.php">Watches</a></li>
                  <li><a class="dropdown-item" href="#">Mobiles</a></li>
                </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="SectionDiscount.php">Discounts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Carts.php">Carts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-btn" href="LoginForCilent.php">LOG OUT</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    <div class="container d-flex justify-content-evenly">
    <?php 
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            ?>
    <div class="card m-5" style="width: 25rem;">
  <img src="<?php echo "./". $row["image"]; ?>" width="250" height="250" class="card-img-top" alt="...">
  <div class="card-body">
  <h5 class=""><?php echo $row["nameProduct"]; ?></h5></div>
  <div class="card-body">
    <h6 class=""><span class="text-danger">Pr : </span>$<?php echo $row["price"]; ?></h6>
	<h6 class=""><span class="text-danger">Dis : </span>$<?php echo $row["discount"]; ?></h6>
	<h6 class=""><span class="text-danger">PD : </span><?php echo $row["productionDate"]; ?></h6>
	<h6 class=""><span class="text-danger">ED : </span><?php echo $row["expiry"]; ?></h6>
	<h6 class=""><span class="text-danger">Sec : </span> <?php echo $row["section"]; ?></h6>
	<h6 class=""><span class="text-danger">PM : </span> <?php echo $row["placeMade"]; ?></h6>
  </div>
  <form method="post" action="Carts.php?action=add&Id=<?php echo $row["Id"]; ?>">
  <input type="text" name="quantity" value="1" class="form-control" />
  <input type="hidden" name="hidden_name" value="<?php echo $row["nameProduct"]; ?>" />
  <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
  <input type="hidden" name="hidden_discount" value="<?php echo $row["discount"]; ?>" />
  <input type="hidden" name="hidden_productionDate" value="<?php echo $row["productionDate"]; ?>" />
  <input type="hidden" name="hidden_expiry" value="<?php echo $row["expiry"]; ?>" />
  <input type="hidden" name="hidden_section" value="<?php echo $row["section"]; ?>" />
  <input type="hidden" name="hidden_placeMade" value="<?php echo $row["placeMade"]; ?>" />
  <input type="submit" class="btn btn-primary m-2 btn-lg" name="add_to_cart" value="Add to cart"></input>
</form>

</div>
<?php 
    
        }
    }
    ?>
</div>
    </div>

</body>
</html>