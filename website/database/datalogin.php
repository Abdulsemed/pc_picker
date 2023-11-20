<?php
if (isset($_POST['submit'])) {
    require 'dataconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $access = $_POST['access'];
    if (empty($username) || empty($password)) {
        header("location: ../login.php?error=Empty%20Fields");
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*/", $username)) {
        header("location: ../login.php?error=invalid%20Username");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE userName=?";
        $stmt = mysqli_stmt_init($myconnect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($myrows = mysqli_fetch_assoc($result)) {

                $passcheck = password_verify($password, $myrows['password']);

                if ($passcheck == true) {
                    session_start();
                    $_SESSION['id'] = $myrows['id'];
                    $_SESSION['user'] = $myrows['userName'];
                    $user = $myrows['userName'];
                    $_SESSION['pic'] = $myrows['profilePicture'];
                    $access = $myrows['Role'];
                    $status = $myrows['Verified'];
                    $_SESSION['access'] = $access;
                    if ($access === "admin") {
                        header("location: ../admin/adminlogin.php?success=loggedIn");
                    } else {
                        if ($status == "Yes") {
                            header("location: ../landing_page.php?success=loggedIn");
                        } else {
                            header("Location: ../OTP_form.php?userN=$user");
                        }
                        // echo ("<script LANGUAGE='JavaScript'>
                        // window.alert('Signed In Successfully!!!');
                        // window.location.href='../landing_page.php?success=loggedIn'
                        // </script>");
                    }
                    exit();
                } else if ($passcheck == false) {
                    header("location: ../login.php?error=incorrect%20Username%20Or%20Password");
                    exit();
                } else {
                    header("location: ../login.php?error=invalid%20Entry");
                    exit();
                }
            } else {
                header("location: ../login.php?error=username%20Not%20Found");
                exit();
            }
        }
    }
} else {
    header("location: ../login.php?error=sqlerror");
    exit();
}
