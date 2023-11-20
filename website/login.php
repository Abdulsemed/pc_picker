<!-- <?php
        // require_once('includes/header.php');
        ?> -->

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


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/signin.css"> -->
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css">

</head>

<body class="login-layout">
    <form class="form-signin" action="database/datalogin.php" method="post">
        <div class="text-center mb-4">
            <img class="mb-4" src="../favicon.ico" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
            <p class="registerP">No account? <a href="register.php">Signup</a> | <a href="landing_page.php">Home</a></p>
        </div>
        <div class="form-label-group">
            <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
            <label for="inputEmail">Username</label>
        </div>
        <div class="form-label-group">
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <label for="inputPassword">Password</label>
        </div>

        <!-- <select name="access" class="login-access">
            <option value="User">User</option>
            <option value="Admin">Admin</option>
        </select> -->
        <!-- <br><br> -->
        <?php
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            // if ($error == 'incorrect Username Or Password') {
        ?>
            <span class="text-danger"><?php echo "* " . $error; ?></span>
        <?php    } ?>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>

        <p class="mt-5 mb-3 text-muted">&copy; 2021-2022 PC Picker</p>
    </form>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- <script src="js/app.js"></script> -->

</body>

</html>








<!-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Floating labels example for Bootstrap</title>

     Bootstrap core CSS 
    <link href="css/bootstrap.min.css" rel="stylesheet">

     Custom styles for this template
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>
    <form class="form-signin">
        <div class="text-center mb-4">
            <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Floating labels</h1>
            <p>Build form controls with floating labels via the <code>:placeholder-shown</code> pseudo-element. <a href="https://caniuse.com/#feat=css-placeholder-shown">Works in latest Chrome, Safari, and Firefox.</a></p>
        </div>

        <div class="form-label-group">
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputEmail">Email address</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <label for="inputPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
    </form>
 </body>
</html> -->