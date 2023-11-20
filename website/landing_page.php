<?php
require 'database/dataconnect.php';
require_once('includes/header.php');
require_once('admin/categories.php');
?>
 <?php
    if (isset($_SESSION['user'])) {

        echo "<div class='text-center'><h1>Welcome " . $_SESSION['user'] . "</h1></div>";
    } else {
        echo " <div class='text-center'><h1> Home</h1></div>";
    }
    ?>

<?php

require_once('posts.php');
require_once('includes/footer.php');
?>