<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "e-commerce");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "Id");
		if(!in_array($_GET["Id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			//array for storing data of products that add to cart
			$item_array = array(
				'item_id'			=>	$_GET["Id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_discount'		=>	$_POST["hidden_discount"],
				'item_productionDate'=>	$_POST["hidden_productionDate"],
				'item_expiry'		=>	$_POST["hidden_expiry"],
				'item_section'		=>	$_POST["hidden_section"],
				'item_placeMade'	=>	$_POST["hidden_placeMade"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		//array for storing data of products that add to cart
		$item_array = array(
			'item_id'			=>	$_GET["Id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_discount'		=>	$_POST["hidden_discount"],
			'item_productionDate'=>	$_POST["hidden_productionDate"],
			'item_expiry'		=>	$_POST["hidden_expiry"],
			'item_section'		=>	$_POST["hidden_section"],
			'item_placeMade'	=>	$_POST["hidden_placeMade"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
// -------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------

if(isset($_GET["action"])) // request deleteid
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values) // select data of products and delete it
		{
			if($values["item_id"] == $_GET["Id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="Carts.php"</script>';
			}
		}
	}
}
//--------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------

?>
<!DOCTYPE html>
<html>
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
<link rel="stylesheet" href="cart.css">
<title>Carts</title>
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
                  <li><a class="dropdown-item" href="SectionOfMobile.php">Mobiles</a></li>
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
		<br />
		<div class="container">
			<div class="title">
			<h2 class="text-danger text-base" align="center">Carts Shopping
			<i class="fa-solid fa-cart-shopping"></i>
			</h2>
			</div>
			<!-- --------------------------------------------------------------------------------------- -->
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead class="table-secondary">
					<tr>
					    <th width="5%">Index</th>
						<th width="20%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="10%">Price</th>
						<th width="15%">discount</th>
						<th width="20%">production Date</th>
						<th width="5%">expiry</th>
						<th width="5%">section</th>
						<th width="10%">place Made</th>
						
						<th width="5%">total</th>
						<th width="5%">pro</th>
					</tr>
					</thead>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
					    <td><?php echo $values["item_id"]; ?></td>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td> <?php echo $values["item_price"]; ?></td>
						<td> <?php echo $values["item_discount"]; ?></td>
						<td> <?php echo $values["item_productionDate"]; ?></td>
						<td> <?php echo $values["item_expiry"]; ?></td>
						<td> <?php echo $values["item_section"]; ?></td>
						<td> <?php echo $values["item_placeMade"]; ?></td>
						<td> <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a class="btn btn-danger" href="Carts.php?action=delete&Id=<?php echo $values["item_id"]; ?>"><span class="text-white">Remove</span></a></td>
					</tr>
					<?php
					//calculate price after discount if excit
					if(!empty($values["item_discount"])){
							$total = $total + ($values["item_quantity"] * $values["item_price"])-$values["item_discount"];}
							else{
								//calculate price without discount
								$total = $total + $values["item_quantity"]*$values["item_price"];
							}
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	</div>
	<br/>
	</body>
</html>