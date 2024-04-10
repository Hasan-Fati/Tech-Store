<?php 

include "ConWithDb.php";
//Request Data from form data
if(isset($_POST['NameOfProduct']) && isset($_POST['priceOfProduct'])&& isset($_POST['Discount'])
&& isset($_POST['Section']) && isset($_POST['ProductionDate'])
&& isset($_POST['ExpiryDate']) && isset($_POST['PlaceMade'])){
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
    $tm = md5(time());
    $Image = $_FILES["Image"]["name"];
    $dst = "img/".$Image.$tm;
    move_uploaded_file($_FILES["Image"]["tmp_name"], $dst);
    if (empty($NameOfProduct) && empty($PriceOfProduct)&& empty($Discount)&&
    empty($Section)&& empty($ExpiryDate)&& empty($PlaceMade) && empty($ProductionDate)) {
        header("Location:AddProducts.php?error=Sorry empty Data");
        exit();
         }else {
            //Insert products in table in database 
            $sql = "INSERT INTO products(nameProduct, price, discount, productionDate, expiry, section, placeMade,image)
            VALUES('{$NameOfProduct}', '{$PriceOfProduct}', '{$Discount}',
            '{$ProductionDate}', '{$ExpiryDate}', '{$Section}', '{$PlaceMade}','{$dst}')";
            if(($conn->query($sql))) {
                header("Location:AddProducts.php?message=Add Successfully"); //Go for page add products 
                exit();
            }
         }

    }
    




?>