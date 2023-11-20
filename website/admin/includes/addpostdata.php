
<?php
require_once("../../database/dataconnect.php");
// require_once("")


if (isset($_POST['submitadd'])) {
    $laptopName = $_POST['laptopName'];
    $laptopBrand = $_POST['laptopBrand'];
    $laptopCategory = $_POST['laptopCategory'];
    $laptopProcessor = $_POST['laptopProcessor'];
    $laptopPrice = $_POST['laptopPrice'];
    $laptopRam = $_POST['laptopRam'];
    $laptopScreen = $_POST['laptopScreen'];
    $laptopHarddisk = $_POST['laptopHarddisk'];
    $laptopOS = $_POST['laptopOS'];
    $laptopLaunchdate = $_POST['laptopLaunchdate'];
    $laptopTag = $_POST['laptopTag'];
    $laptopGraphicscard = $_POST['laptopGraphicscard'];
    $laptopImage = $_FILES['laptopImage']['name'];

    $extension = strtolower(strstr($laptopImage, "."));
    if (
        empty($laptopName) || empty($laptopCategory) || empty($laptopTag) || empty($laptopPrice) || empty($laptopImage) || empty($laptopBrand)
        || empty($laptopProcessor) || empty($laptopRam) || empty($laptopScreen) || empty($laptopHarddisk) || empty($laptopOS) || empty($laptopLaunchdate) || empty($laptopGraphicscard)
    ) {
        header("location: ../adminlogin.php?error=emptyField(s)");

        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*/", $laptopName)) {
        header("location: ../adminlogin.php?error=invalidLaptopName");
        exit();
    } else {
        $postsql = "SELECT post_name FROM posts WHERE post_name =? ";
        $stmt = mysqli_stmt_init($myconnect);
        if (!mysqli_stmt_prepare($stmt, $postsql)) {
            header("location: ../adminlogin.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $laptopName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $postrows = mysqli_stmt_num_rows($stmt);
            if ($postrows > 0) {
                header("location: ../adminlogin.php?error=laptopExists");
                exit();
            } else {
                $brand = strtoupper($laptopBrand);
                $category = strtoupper($laptopCategory);
                if ($extension == ".jpg" || $extension == ".jpeg" || $extension == ".png" || $extension == ".gif") {
                    if (!file_exists("../../laptops/$brand") && !file_exists("../../laptops/$brand/$category")) {
                        mkdir("../../laptops/$brand");
                        mkdir("../../laptops/$brand/$category");
                    } else if (!file_exists("../../laptops/$brand/$category")) {
                        mkdir("../../laptops/$brand/$category");
                    }

                    move_uploaded_file($_FILES['laptopImage']['tmp_name'], "../../laptops/$brand/$category/$laptopImage");
                } else {
                    header("location: ../adminlogin.php?error=unsupportedFile $extension");
                    exit();
                }
                $postSql = "INSERT INTO posts(post_name,post_brand,post_processor,post_ram,post_graphicscard,post_screen,post_harddisk,post_OS,post_date,post_price,post_image,post_category,post_tags) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($myconnect);
                mysqli_stmt_prepare($stmt, $postSql);
                mysqli_stmt_bind_param($stmt, "sssssssssssss", $laptopName, $laptopBrand, $laptopProcessor, $laptopRam, $laptopGraphicscard, $laptopScreen, $laptopHarddisk, $laptopOS, $laptopLaunchdate, $laptopPrice, $laptopImage, $laptopCategory, $laptopTag);
                mysqli_stmt_execute($stmt);
                header("location: ../adminlogin.php?success=postAdded");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($myconnect);
} else {
    header("location: adminlogin.php?error=connection");
    exit();
}
