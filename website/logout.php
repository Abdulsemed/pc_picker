<?php session_start(); ?>
<?php
$_SESSION['user'] = null;
$_SESSION['access'] = null;

header("Location: landing_page.php");

?>

