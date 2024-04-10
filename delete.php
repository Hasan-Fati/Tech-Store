<?php 

include 'ConWithDb.php';

if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM products WHERE Id=$id";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location:display.php?message=Deleted Successfully");
        exit();
    }else { 
        die("Unable to delete data");
    }
}

?> 