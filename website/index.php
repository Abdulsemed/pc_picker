<?php
require_once 'includes/header.php';
?>

<main role="main">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="first-slide" src="images/pc1.jpg" alt="First slide">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>GET YOUR DESIRED PC</h1>
            <p>BY SIGNING UP TODAY, GET THE ADVANTAGE WE OFFER FOR FREE AND ENJOY YOUR DESIRED PC WITH GOOD QUALITY AND FAIR PRICE</p>
            <?php
            if (isset($_SESSION['user'])) { ?>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            <?php } else { ?>
              <p><a class="btn btn-lg btn-primary" href="register.php" role="button">Sign up today</a></p>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="second-slide" src="images/pc2.jpg" alt="Second slide">
        <div class="container">
          <div class="carousel-caption">
            <h1>Good For Time Management</h1>
            <p>Do not waste your <span class="highlight">TIME searching for pc and leave unhappy.come to our website to get the pc you want and save your <span class="highlight">MONEY</span></span></p>
            <p><a class="btn btn-lg btn-primary" href="contact.php" role="button">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="third-slide" src="images/pc3.jpg" alt="Third slide">
        <div class="container">
          <div class="carousel-caption text-right">
            <h1>Trustworthy and so realiable</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="about us.php" role="button">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="forth-slide" src="images/pc4.jpg" alt="Second slide">
        <div class="container">
          <div class="carousel-caption">
            <h1>Good For Time Management</h1>
            <p>Do not waste your <span class="highlight">TIME searching for pc and leave unhappy.come to our website to get the pc you want and save your <span class="highlight">MONEY</span></span></p>
            <p><a class="btn btn-lg btn-primary" href="faq.php" role="button">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="fifth-slide" src="images/pc6.jpg" alt="Second slide">
        <div class="container">
          <div class="carousel-caption">
            <h1>Good For Time Management</h1>
            <p>Do not waste your <span class="highlight">TIME searching for pc and leave unhappy.come to our website to get the pc you want and save your <span class="highlight">MONEY</span></span></p>
            <p><a class="btn btn-lg btn-primary" href="landing_page.php" role="button">Learn more</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="container marketing">

    <div class="row">
      <div class="col-lg-4">
        <img class="rounded-circle" src="images/chrome.png" alt="Generic placeholder image" width="140" height="140">
        <h2>Chrome</h2>
        <p>
          Chrome OS is a Gentoo Linux-based operating system designed by
          Google. It is derived from the free software Chromium OS and uses
          the Google Chrome web browser as its principal user interface.
        </p>
        <p><a class="btn btn-secondary" href="landing_page.php?query=chrome%20OS&id=3" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img class="rounded-circle" src="images/pngwing.png" alt="Generic placeholder image" width="140" height="140">
        <h2>Mac</h2>
        <p>
          macOS is an operating system designed by Apple. The operating
          system is what allows you to use a computer. macOS comes preloaded
          on all new Apple Macintosh computers.
        </p>
        <p><a class="btn btn-secondary" href="landing_page.php?query=mac%20OS&id=3" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img class="rounded-circle" src="images/microsoft icon.png" alt="Generic placeholder image" width="140" height="140">
        <h2>Microsoft</h2>
        <p>
          Microsoft Windows is a graphical operating system developed and
          published by Microsoft. It provides a way to store files, run
          software, play games, watch videos, and connect to the Internet.
        </p>
        <p><a class="btn btn-secondary" href="landing_page.php?query=windows&id=3" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    <hr class="featurette-divider">
    <div class="cardHeader">
      <h2>NEW UPCOMING LAPTOPS</h2><br>
    </div>
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Alienware x15 max Zenum <span class="text-muted">It'll blow your mind.</span></h2>
        <p class="lead">Dell Alienware x15 R1 is a Windows 10 Home laptop with a 15.60-inch display that has a resolution of 1920x1080 pixels. It is powered by a Core i7 processor and it comes with 16GB of RAM. The Dell Alienware x15 R1 packs 256GB of SSD storage.Graphics are powered by Nvidia GeForce RTX 3060. Connectivity options include Wi-Fi 802.11 a/b/g/n/ac/Yes, Bluetooth and it comes with 3 USB ports, USB 3.2 Gen 1 (Type A), USB 3.2 Gen 2 (Type C), Thunderbolt 4 (Type C), HDMI Port, Multi Card Slot, Headphone and Mic Combo Jack ports.</p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" src="images/Alienware.png" alt="Generic placeholder image">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Lenovo pro max altra M19 <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Lenovo ThinkBook Plus Gen 3 is a Windows 11 laptop with a 17.30-inch display that has a resolution of 3072x1440 pixels. It is powered by a Core processor and it comes with 32GB of RAM. The Lenovo ThinkBook Plus Gen 3 packs 1TB of SSD storage.Graphics are powered by Intel IRIS Graphics. Connectivity options include Wi-Fi 802.11 ax, Bluetooth and it comes with 4 USB ports (1 x USB 3.0 (Type A), 1 x USB 3.0 (Type C)), Thunderbolt 4 (Type C), HDMI Port, Headphone and Mic Combo Jack, RJ45 (LAN) ports.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="featurette-image img-fluid mx-auto" src="images/Lenovo.png" alt="Generic placeholder image">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">the new Razer Blade <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">When it comes to the CPU configuration the base variant of the Razor blade has an Intel Core i7 12th-gen processor, and a higher trim with Intel core i9 12th-gen. Also, it boots Windows 11 Home out of the box.The Intel Core i7 models have 16/32GB of DDR5 RAM + 1TB SSD storage with customisation for NVIDIA’S GeForce RTX 3060 or RTX 3070 Ti or RTX 3080 Ti GPU. While the Intel Core i9 model has 32GB of DDR5 RAM + 1TB SSD storage with only NVIDIA’S GeForce RTX 3080 Ti graphics. The higher your customisation, the higher the price.</p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" src="images/Razer_Blade.png" alt="Generic placeholder image">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Lenovo legion 5 slim 7i 15s <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Lenovo Legion 5 (2022) is a Windows 11 laptop with a 15.00-inch display that has a resolution of 2560x1440 pixels. Connectivity options include Wi-Fi 802.11 a/b/g/n/ac/ax, Bluetooth and it comes with 6 USB ports, USB 3.2 Gen 1 (Type A), USB 3.2 Gen 2 (Type C), HDMI Port, Headphone and Mic Combo Jack, RJ45 (LAN) ports.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="featurette-image img-fluid mx-auto" src="images/Legion_5.png" alt="Generic placeholder image">
      </div>
    </div>

    <hr class="featurette-divider">
  </div>
</main>

<!-- <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main> -->

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script> -->
<!-- <script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script> -->
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<!-- <script src="js/holder.min.js"></script> -->
<!-- </body> -->

<!-- </html> -->

<?php require_once 'includes/footer.php'; ?>