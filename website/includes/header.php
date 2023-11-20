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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pc Picker</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark">
    <a href="#" onclick="openNav()">
      <span class="menunav">
        <svg width='50' height='30' style="padding-top: 4px;">
          <path d="M0,5 30,5" stroke="#ccc" stroke-width="5px" />
          <path d="M0,14 30,14" stroke="#ccc" stroke-width="5px" />
          <path d="M0,23 30,23" stroke="#ccc" stroke-width="5px" />
        </svg>
      </span>
    </a>
    <div class="collapse navbar-collapse" id="main">
      <a class="navbar-brand" id="title" href="#">PC Picker</a>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="about us.php" class="nav-link">About US</a>
        </li>
        <?php if ($name !== 'Guest') {
          if ($_SESSION['access'] === 'admin') { ?>
            <li class="nav-item">
              <a href="<?php echo $link ?>" class="nav-link">Admin</a>
            </li>
          <?php }
        } else { ?>
          <li class="nav-item">
            <a href="register.php" class="nav-link">Sign Up</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $link ?>" class="nav-link">Sign in</a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a href="landing_page.php" class="nav-link">Products</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-md-0" method="request" action="search.php">
        <input class="form-control" type="search" name="search" placeholder="Search">
      </form>
      <?php if ($name !== 'Guest') {
        if ($_SESSION['access'] !== 'admin') { ?>
          <ul class="nav-item dropdown" style="margin-bottom: 0px; padding-top: 0px;">
            <a class="nav-link text-white" href="#" id="profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
              <?php echo $_SESSION['user']; ?><i class=" fa fa-fw fa-caret-down"></i></a>
            <div class="dropdown-menu" aria-labelledby="profile-dropdown">
              <a href="logout.php" class=" dropdown-item  text-danger"><i class="fa fa-sign-out" aria-hidden="true"></i>
                Sign out</a>
            </div>
          </ul>
      <?php }
      } ?>
    </div>
  </nav>
  <div id="mySidebar" class="sidebar bg-dark">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <br>
    <span class="user">
      <img src="images/<?php echo $profilePic; ?>" id="userImage" alt="profile">
      <label class="userName"><?php echo substr($name, 0, 10) ?></label>
    </span>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="index.php" class="nav-link" aria-current="page">
          <svg class="bi me-2" width="16" height="16">
            <use xlink:href="#home" />
          </svg>
          Home
        </a>
      </li>
      <li>
        <a href="about us.php" class="nav-link link-light">
          <svg class="bi me-2" width="16" height="16">
            <use xlink:href="#speedometer2" />
          </svg>
          About Us
        </a>
      </li>
      <li>
        <?php
        if ($name === "Guest") {
        ?>
          <!-- <a href="login.php">Contact</a> -->
          <a href="login.php" class="nav-link link-light">
            <svg class="bi me-2" width="16" height="16">
              <use xlink:href="#table" />
            </svg>
            Contact
          </a>
        <?php } else {
        ?>
          <!-- <a href="contact.php">Contact</a> -->
          <a href="contact.php" class="nav-link link-light">
            <svg class="bi me-2" width="16" height="16">
              <use xlink:href="#table" />
            </svg>
            Contact
          </a>
        <?php } ?>

      </li>
      <li>
        <a href="faq.php" class="nav-link link-light">
          <svg class="bi me-2" width="16" height="16">
            <use xlink:href="#grid" />
          </svg>
          FAQ
        </a>
      </li>
      <?php
      if ($name !== 'Guest') {
      ?>
        <li>
          <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>
            Sign out</a>
        </li>
      <?php  } ?>
    </ul>
  </div>