<?php require 'dataconnect.php'; ?>
<?php

if (isset($_POST["submit"])) {
    // require 'dataconnect.php';
    function check($input)
    {
        $input = trim($input);
        $input = htmlspecialchars($input);
        $input = stripslashes($input);
        return $input;
    }

    $fname = check($_POST['firstname']);
    $lname = check($_POST['lastname']);
    $email = check($_POST['email']);
    $username = check($_POST['Nusername']);
    session_start();
    $_SESSION['NewUser'] = $username;
    $password = check($_POST['Npassword']);
    $confirmpass = check($_POST['confirmpassword']);
    $profilePic = check($_FILES['profilepic']['name']);
    $extension = strtolower(pathinfo($profilePic, PATHINFO_EXTENSION));

    if (empty($fname) || empty($lname) || empty($email) || empty($username) || empty($password) || empty($confirmpass)) {
        header("Location: ../register.php?error=empty%20fields");
        exit();
    } elseif (!preg_match("/^[a-z A-Z 0-9]*$/", $username)) {
        header("Location: ../register.php?error=invalid%20Username");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalid%20Email");
        exit();
    } else if ($confirmpass !== $password) {
        header("location: ../register.php?error=Password%20Mismatch");
        exit();
    } else {
        $sql = "SELECT username,email FROM user WHERE username=? OR email=?";
        $stmt = mysqli_stmt_init($myconnect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../register.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $dbrows = mysqli_stmt_num_rows($stmt);
            if ($dbrows > 0) {
                header("location: ../register.php?error=username%20Or%20Email%20Taken");
                exit();
            } else {
                if ($_FILES['profilepic']['size'] > 6000000) {
                    header("location: ../register.php?error=imageTooLarge");
                    exit();
                } else {
                    if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif") {
                        move_uploaded_file($_FILES['profilepic']['tmp_name'], "../images/$profilePic");
                    } else if ($profilePic == "") {
                        $profilePic = "butterfly.jpeg";
                    } else {
                        header("location: ../register.php?error=unsupported%20File $extension");
                        exit();
                    }
                    function generateNumericOTP($n)
                    {

                        $generator = "135792468";
                        $result = "";

                        for ($i = 1; $i <= $n; $i++) {
                            $result .= substr($generator, (rand() % (strlen($generator))), 1);
                        }

                        // Returning the result 
                        return $result;
                    }
                    $token = generateNumericOTP(4);
                    $sql = "INSERT INTO user(First_name, Last_name, username,password,email,profilepicture, Role, OTP_Pin, Verified) VALUES(?,?,?,?,?,?,?,?,?)";
                    $stmt = mysqli_stmt_init($myconnect);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: ../register.php?error=sqlerror");
                        exit();
                    } else {
                        $Ver = "No";
                        $role = "user";
                        $hashedpass = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sssssssss", $fname, $lname, $username, $hashedpass, $email, $profilePic, $role, $token, $Ver);
                        mysqli_stmt_execute($stmt);
                        header("location: ../OTP_form.php?success=registerd");
                        exit();
                    }
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($myconnect);
}
