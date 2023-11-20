<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "customersdatabase";
$GLOBALS['create_db'] = "";
// CREATING NEW CONNECTION
$connect = new mysqli($dbhost, $dbuser, $dbpass);
if (!$connect) {
    die("error creating connection");
}
// DATABASE CREATION
$query = "CREATE DATABASE $dbname";
$Query2 = "SHOW DATABASES LIKE '$dbname' ";
$checker = mysqli_query($connect, $Query2);
$row = mysqli_num_rows($checker);
if ($row == 0) {
    $GLOBALS['create_db'] = mysqli_query($connect, $query);
    if (!$create_db) {
        die("Failed to create database " . $dbname . " " . mysqli_error($myconnect));
    }
}
// CONNECTING TO DATABASE
$myconnect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$myconnect) {
    die("Failed to connect to database" . mysqli_connect_error());
}
//  CREATING TABLE "POSTS"
$query3 = "CREATE TABLE `posts` (
    `post_id` int(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `post_name` varchar(30) NOT NULL,
    `post_brand` varchar(30) NOT NULL,
    `post_processor` varchar(255) NOT NULL,
    `post_ram` int(11) NOT NULL,
    `post_graphicscard` varchar(255) NOT NULL,
    `post_screen` varchar(255) NOT NULL,
    `post_harddisk` int(11) NOT NULL,
    `post_OS` varchar(255) NOT NULL,
    `post_date` date DEFAULT NULL,
    `post_price` int(11) NOT NULL,
    `post_image` text DEFAULT '\'butterfly.jpg\'',
    `post_category` varchar(20) NOT NULL,
    `post_tags` text NOT NULL )";

if ($create_db) {
    $table_post = mysqli_query($myconnect, $query3);
    if (!$table_post) {
        die("Failed to create table" . mysqli_error($myconnect));
    }
}

// CREATING TABLE "COMMENT"
$query4 = "CREATE TABLE `comment` (
    `comment_id` int(3) NOT NULL AUTO_INCREMENT,
    `comment_post_id` int(3) NOT NULL,
    `comment_author` varchar(255) NOT NULL,
    `comment_email` varchar(255) NOT NULL,
    `comment_content` text NOT NULL,
    `comment_status` varchar(50) NOT NULL,
    `comment_date` date NOT NULL,
    PRIMARY KEY (`comment_id`))";

if ($create_db) {
    $table_comment = mysqli_query($myconnect, $query4);
    if (!$table_comment) {
        die("Failed to create table" . mysqli_error($myconnect));
    }
}
// CREATING TABLE "USER"
$query5 = "CREATE TABLE `user` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `First_name` varchar(255) NOT NULL,
    `Last_name` varchar(255) NOT NULL,
    `userName` varchar(50) NOT NULL,
    `password` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `profilePicture` text NOT NULL DEFAULT '\'butterfly.jpg\'',
    PRIMARY KEY (`id`))";

if ($create_db) {
    $table_user = mysqli_query($myconnect, $query5);
    if (!$table_user) {
        die("Failed to create table" . mysqli_error($myconnect));
    }
}
// CREATING TABLE "CONTACT" 
$query6 = "CREATE TABLE `contact` (
    `cuser_id` int(3) NOT NULL AUTO_INCREMENT,
    `user_name` varchar(255) NOT NULL,
    `user_email` varchar(255) NOT NULL,
    `content` text NOT NULL,
    PRIMARY KEY (`cuser_id`))";

if ($create_db) {
    $table_contact = mysqli_query($myconnect, $query6);
    if (!$table_contact) {
        die("Failed to create table" . mysqli_error($myconnect));
    }
}
// CREATING TABLE "ADMIN"
$query7 = "CREATE TABLE `admin` (
    `userName` varchar(20) NOT NULL,
    `password` varchar(255) NOT NULL,
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `profilePicture` text NOT NULL,
    PRIMARY KEY (`id`))";

if ($create_db) {
    $table_admin = mysqli_query($myconnect, $query7);
    if (!$table_admin) {
        die("Failed to create table" . mysqli_error($myconnect));
    }
}
$query8 = "SELECT * FROM `admin`";
$select_admin = mysqli_query($myconnect, $query8);
$num_admin = mysqli_num_rows($select_admin);
if ($num_admin == 0) {
    $pass=password_hash("admin1234",PASSWORD_DEFAULT);
    $query9 = "INSERT INTO admin (`userName`, `password`, `profilePicture`) VALUES ('admin','{$pass}','admin.jpg')";
    $insert_admin = mysqli_query($myconnect, $query9);
}
function close(){
    ?>
    <script>
      document.getElementById('notification').style.display="block";
      setTimeout(function(){ document.getElementById('notification').style.display = "none"; }, 1200);
    </script>
    <?php
  }
?>
