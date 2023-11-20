<?php require 'dataconnect.php';
session_start();
?>
<?php
if (isset($_POST['verify']) && isset($_SESSION['NewUser'])) {
    $user_token = $_POST['Token'];
    $newuser = $_SESSION['NewUser'];
    $query = "SELECT * FROM user WHERE userName = '{$newuser}'";
    $check_otp = mysqli_query($myconnect, $query);
    $row = mysqli_fetch_assoc($check_otp);
    $dbToken = $row['OTP_Pin'];
    if ($user_token == $dbToken) {
        $Query = "UPDATE user SET Verified = 'Yes' WHERE userName = '{$newuser}' ";
        $verify_query = mysqli_query($myconnect, $Query);
        header("location: ../login.php?success=AccountVerfied");
    }
} else if (isset($_POST['verify']) && isset($_GET['userN'])) {
    $user_token = $_POST['Token'];
    $exuser = $_GET['userN'];
    $query2 = "SELECT * FROM user WHERE userName = '{$exuser}'";
    $check_otp = mysqli_query($myconnect, $query2);
    $row = mysqli_fetch_assoc($check_otp);
    $dbToken = $row['OTP_Pin'];
    if ($user_token == $dbToken) {
        $Query = "UPDATE user SET Verified = 'Yes' WHERE userName = '{$exuser}' ";
        $verify_query = mysqli_query($myconnect, $Query);
        header("location: ../login.php?success=AccountVerfied");
    }
}

?>