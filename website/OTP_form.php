<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- custom -->
    <link rel="stylesheet" href="css/custom.css">
</head>

<body class="login-layout">
    <?php
    if (isset($_GET['userN'])) {
    ?>
        <form autocomplete="FALSE" class="form-signin" action="database/Verify_otp.php?userN=<?php echo $_GET['userN']; ?>" method="post" enctype="multipart/form-data">
        <?php } else {  ?>
            <form autocomplete="FALSE" class="form-signin" action="database/Verify_otp.php" method="post" enctype="multipart/form-data">
            <?php } ?>
            <div class="text-center mb-4">
                <img class="mb-4" src="../favicon.ico" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Verify Account</h1>
                <!-- <p class="registerP">Have an account? <a href="login.php">Sign In</a> | <a href="landing_page.php">Home</a></p> -->
            </div>
            <div class="form-label-group">
                <input type="text" id="OTP_pin" name="Token" class="form-control" placeholder="Enter Pin" required autofocus>
                <label for="OTP_pin">OTP Pin</label>
            </div>
            <br>
            <button class="btn btn-lg  btn-success btn-block" type="submit" name="verify">Verify Account</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021-2022 PC Picker</p>
            </form>

            <script src="bootstrap v4.0/js/bootstrap.min.js"></script>
            <script src="bootstrap v4.0/js/bootstrap.bundle.min.js"></script>


</body>

</html>