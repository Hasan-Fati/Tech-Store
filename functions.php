<?php 

require_once('ConWithDb.php');

/*
function for select products from data base 
and display in browser
*/
function display_data() {
    global $conn ;
    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);
    return $result;
}

/*
----------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------
*/
 
// function for fetching data where select from database

function fetch_Data() {
    global $conn , $nameProduct, $price, $discount, $productionDate,
    $expiry, $section, $placeMade, $data;
    if(isset($_GET['updateid'])) {
        $id = $_GET['updateid'];
        $query = "SELECT * FROM products WHERE Id=$id";
        $result = mysqli_query($conn,$query);
    
        while ($data = mysqli_fetch_assoc($result)){
            $id = $data['Id'];
            $nameProduct = $data['nameProduct'];
            $price = $data['price'] ;
            $discount = $data['discount'] ;
            $productionDate = $data['productionDate'] ;
            $expiry = $data['expiry'] ;
            $section = $data['section'] ;
            $placeMade = $data['placeMade'] ;
            return $result;
        }
    }
 }

 /*
----------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------
*/

//function for Update data of products in database 
function UpdateData() {
    // fetch_Data();
global $conn , $id, $result;

if(isset($_POST['submit']) && isset($_GET['updateid'])) {
    global $id;
    $id = $_GET['updateid'];
    //function for valdiation Data has Request !!
    function Test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //declare variable after valdiation !!
    $NameOfProduct = Test_input($_POST['NameOfProduct']);
    $PriceOfProduct = Test_input($_POST['priceOfProduct']);
    $Discount = Test_input($_POST['Discount']);
    $Section = Test_input($_POST['Section']);
    $ProductionDate = Test_input($_POST['ProductionDate']);
    $ExpiryDate = Test_input($_POST['ExpiryDate']);
    $PlaceMade = Test_input($_POST['PlaceMade']);

    $sql = "UPDATE products SET nameProduct='$NameOfProduct',price='$PriceOfProduct',
    discount='$Discount',productionDate='$ProductionDate',
    expiry='$ExpiryDate', section='$Section', placeMade='$PlaceMade' WHERE Id=$id";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location:display.php?message=Update Successfully");
        exit();
        }else {
            echo "Sorry";
        }
    }
}

/*
----------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------
*/
//function for check if admin input true data or false and if data is empty or not
function Check_LoginAdmin() {
    global $conn , $userName, $password, $atmp, $result ;
    $atmp = 0;
    if(isset($_POST['submit'])){
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    $userName = test_input($_POST['userName']);
    $password = test_input($_POST['password']);
    $atmp = test_input($_POST['hidden']);
    if($atmp < 3) {
        $query = "SELECT * FROM manger WHERE userName='$userName' AND password='$password'";
        $result = mysqli_query($conn, $query);
        if($result) {
            if(mysqli_num_rows($result)) {
                while(mysqli_fetch_array($result, MYSQLI_BOTH)) {
                   header("Location:PageOfAdmin.php"); //if data is true go to home page
                   exit();
                }
            }else {
                $atmp++;
                 echo '<script type"text/javascript">alert("error and trys agin and your trys is '.$atmp.' ")</script>';
           }
        }
     }
     if($atmp == 3) {
        // header("Location:LoginForAdmin.php?error=Account Blocked");
        // exit();
     }
  }
}
/*
----------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------
*/
//function for check if user input true data or false and empty data or not
function Check_LoginUser() {
    global $conn , $userName, $password, $atmp, $result ;
    $atmp = 0;
    if(isset($_POST['submit'])){
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    $userName = test_input($_POST['userName']);
    $password = test_input($_POST['password']);
    $atmp = test_input($_POST['hidden']);
    if($atmp < 3) {
        $query = "SELECT * FROM users WHERE userName='$userName' AND password='$password'";
        $result = mysqli_query($conn, $query);
        if($result) {
            if(mysqli_num_rows($result)) {
                while(mysqli_fetch_array($result, MYSQLI_BOTH)) {
                   header("Location:Home.php"); // if user input true data
                   exit();
                }
            }else {
                $atmp++;
                 echo '<script type"text/javascript">alert("error and trys agin and your trys is '.$atmp.' ")</script>';
           }
        }
     }
     if($atmp == 3) {
        // header("Location:LoginForAdmin.php?error=Account Blocked");
        // exit();
     }
  }
}

?>