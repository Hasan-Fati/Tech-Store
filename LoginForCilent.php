<?php 

include "ConWithDb.php";
require_once('functions.php');

Check_LoginUser();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="AdminLogin.css">
    <title>loginForCilent</title>
</head>
<body>
    <div class="login-box">
        <form action="" method="post">
            <h2>Login For Cilent</h2>
             <?php 
             if($atmp == 3){?>
                <div class=" alert alert-danger" role="alert">Account Blocked</div>
        <?php } ?>
            <input type="hidden" name="hidden" value="<?php echo $atmp ?>">
            <div class="input-box">
                <span class="icon"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="userName" <?php if($atmp == 3){?> disabled="disabled
                    <?php }?>">
                <label>User Name</label>
            </div>
            <div class="input-box">
                <span class="icon"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="password" <?php if($atmp == 3){ ?> disabled="disabled"
                    <?php } ?>>
                <label>Password</label>
            </div>
            <div class="button">
            <button class="btn btn-danger btn-lg" role="button" name="submit">Login</button>
            </div>
        </form>
    </div>
 </div>
</body>
</html>