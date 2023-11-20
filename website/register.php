<?php
session_start();
require_once 'database/dataconnect.php';
require_once 'database/datareg.php';
?>

<?php

if (isset($_SESSION['user'])) {
    $name = $_SESSION['user'];
    $link = "admin/adminlogin.php";
    $profilePic = $_SESSION['pic'];
} else {
    $name = "Guest";
    $profilePic = "ball.jpeg";
    $link = "login.php";
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pc Picker</title>

    <!-- <link rel="stylesheet" href="css/signin.css"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- custom -->
    <link rel="stylesheet" href="css/custom.css">

</head>

<body class="login-layout">
    <form autocomplete="FALSE" class="form-signin" action="database/datareg.php" method="post" enctype="multipart/form-data">
        <div class="text-center mb-4">
            <img class="mb-4" src="../favicon.ico" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
            <p class="registerP">Have an account? <a href="login.php">Sign In</a> | <a href="landing_page.php">Home</a></p>
        </div>
        <div class="form-label-group">
            <input type="text" id="firstN" name="firstname" class="form-control" placeholder="Firstname" required autofocus>
            <label for="firstN">First Name</label>
        </div>
        <div class="form-label-group">
            <input type="text" id="lastN" name="lastname" class="form-control" placeholder="Lastname" required autofocus>
            <label for="lastN">Last Name</label>
        </div>
        <div class="form-label-group">
            <input autocomplete="off" type="text" id="userN" name="Nusername" class="form-control" placeholder="Username" required autofocus>
            <label for="userN">Username</label>
        </div>
        <div class="form-label-group">
            <input type="text" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
            <label for="email">Email</label>
        </div>
        <div class="form-label-group">
            <input autocomplete="new-password" type="password" name="Npassword" id="inputPassword" class="form-control" placeholder="Password" required>
            <label for="inputPassword">Password</label>
        </div>
        <div class="form-label-group">
            <input type="password" name="confirmpassword" id="inputCPassword" class="form-control" placeholder="Confirm Password" required>
            <label for="inputCPassword">Cofirm Password</label>
        </div>
        <input style="color:green;" type="file" name="profilepic"><br><br>
        <?php
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
        ?>
            <span class="text-danger"><?php echo "* " . $error; ?></span>
        <?php    } ?>
        <br><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign Up</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021-2022 PC Picker</p>
    </form>

    <script src="bootstrap v4.0/js/bootstrap.min.js"></script>
    <script src="bootstrap v4.0/js/bootstrap.bundle.min.js"></script>


</body>

</html>