<?php 

require 'functions.php';

$list_mobil = query("SELECT * FROM list_mobil");
$vip = query("SELECT * FROM list_mobil WHERE jenis = 'vip'");
$citycar = query("SELECT * FROM list_mobil WHERE jenis = 'City Car'");
$rombongan = query("SELECT * FROM list_mobil WHERE jenis = 'Rombongan'");
$familycar = query("SELECT * FROM list_mobil WHERE jenis = 'family Car'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Indorental-Sewa Mobil Jogja</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/armada.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php"><span>Indorental</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#about">Profil Usaha</a></li>
          <li  class="active"><a href="#">Armada Kami</a></li>
          <li><a href="">Gallery</a></li>
          <li><a href="">Blog</a></li>
          <li><a href="#contact">Kontak Usaha</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Pricing Section ======= -->
  <section id="pricing" class="pricing">


    <!-- ======= Pricing City Car ======= -->
    <div class="container  mt-5">
      <div class="section-title" data-aos="fade-up">
        <h2>City Car</h2>
        <p>Check our Pricing</p>
      </div>

      

      <div class="row" data-aos="fade-left">
        <?php foreach ($citycar as $baris) : ?>
          <div class="col-lg-3 col-md-6 my-4">
            <div class="box featured" data-aos="zoom-in" data-aos-delay="200">
              <h3><?= $baris["nama_mobil"]; ?></h3>
              <h6><sup>Rp.</sup><?= $baris["per12"]; ?><span> / 12 Jam</span></h6>
              <h6><sup>Rp.</sup><?= $baris["per24"]; ?><span> / 24 Jam</span></h6>
              <a href="img/<?= $baris["gambar"]; ?>" class="venobox" data-gall="gallery-item">
                <img src="img/<?= $baris["gambar"]; ?>" alt="" class="img-fluid">
              </a>
              <ul>
                <li>Transmisi matic + Rp.25.000</li>
              </ul>
              
              <form method="post" action="booking.php" >
                  <input type="submit" name="action" value="Rent Now" class="btn-buy"/>
                  <input type="hidden" name="id_mobil" value="<?=$baris["id_mobil"]; ?>"/>
                </form>

            </div>
          </div>
        <?php endforeach; ?>
      </div>


    </div>

    <!-- ======= Pricing Family Car ======= -->
    <div class="container  mt-5">
      <div class="section-title" data-aos="fade-up">
        <h2>Family Car</h2>
        <p>Check our Pricing</p>
      </div>

      <div class="row" data-aos="fade-left">
        <?php foreach ($familycar as $baris) : ?>
          <div class="col-lg-3 col-md-6 my-4">
            <div class="box featured" data-aos="zoom-in" data-aos-delay="200">
              <h3><?= $baris["nama_mobil"]; ?></h3>
              <h6><sup>Rp.</sup><?= $baris["per12"]; ?><span> / 12 Jam</span></h6>
              <h6><sup>Rp.</sup><?= $baris["per24"]; ?><span> / 24 Jam</span></h6>
              <a href="img/<?= $baris["gambar"]; ?>" class="venobox" data-gall="gallery-item">
                <img src="img/<?= $baris["gambar"]; ?>" alt="" class="img-fluid">
              </a>
              <ul>
                <li>Transmisi matic + Rp.25.000</li>
              </ul>
              
                <form method="post" action="booking.php" >
                  <input type="submit" name="action" value="Rent Now" class="btn-buy"/>
                  <input type="hidden" name="id_mobil" value="<?=$baris["id_mobil"]; ?>"/>
                </form>
              
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- ======= Pricing VIP Car ======= -->
    <div class="container  mt-5">
      <div class="section-title" data-aos="fade-up">
        <h2>VIP Car</h2>
        <p>Check our Pricing</p>
      </div>

      <div class="row" data-aos="fade-left">
        <?php
          foreach ($vip as $baris) :?>
          <div class="col-lg-3 col-md-6 my-4">
            <div class="box featured" data-aos="zoom-in" data-aos-delay="200">
              <h3><?= $baris["nama_mobil"]; ?></h3>
              <h6><sup>Rp.</sup><?= $baris["per12"]; ?><span> / 12 Jam</span></h6>
              <h6><sup>Rp.</sup><?= $baris["per24"]; ?><span> / 24 Jam</span></h6>
              <a href="img/<?= $baris["gambar"]; ?>" class="venobox" data-gall="gallery-item">
                <img src="img/<?= $baris["gambar"]; ?>" alt="" class="img-fluid">
              </a>
              <ul>
                <li>Transmisi matic + Rp.25.000</li>
              </ul>
              
              <form method="post" action="booking.php" >
                  <input type="submit" name="action" value="Rent Now" class="btn-buy"/>
                  <input type="hidden" name="id_mobil" value="<?=$baris["id_mobil"]; ?>"/>
              </form>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>


    <!-- ======= Pricing Rombongan ======= -->
    <div class="container  mt-5">
      <div class="section-title" data-aos="fade-up">
        <h2>Rombongan</h2>
        <p>Check our Pricing</p>
      </div>

      <div class="row" data-aos="fade-left">
        <?php foreach ($rombongan as $baris) : ?>
          <div class="col-lg-3 col-md-6 my-4">
            <div class="box featured" data-aos="zoom-in" data-aos-delay="200">
              <h3><?= $baris["nama_mobil"]; ?></h3>
              <h6><sup>Rp.</sup><?= $baris["per12"]; ?><span> / 12 Jam</span></h6>
              <h6><sup>Rp.</sup><?= $baris["per24"]; ?><span> / 24 Jam</span></h6>
              <a href="img/<?= $baris["gambar"]; ?>" class="venobox" data-gall="gallery-item">
                <img src="img/<?= $baris["gambar"]; ?>" alt="" class="img-fluid">
              </a>
              <ul>
                <li>Transmisi matic + Rp.25.000</li>
              </ul>
              
              <form method="post" action="booking.php" >
                  <input type="submit" name="action" value="Rent Now" class="btn-buy"/>
                  <input type="hidden" name="id_mobil" value="<?=$baris["id_mobil"]; ?>"/>
              </form>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </section><!-- End Pricing Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Indorental</h3>
              <p class="pb-3"><em>Explore Jogja dengan Indorental. Memenuhi segala kebutuhan transportasi anda.</em></p>
              <p>
                Indorental <br>
                Jl. Sukarya No. 62A, Nanggulan, Rt.15/Rw.19, Maguwoharjo, Depok, Sleman<br><br>
                <strong>Phone:</strong> 082197457283<br>
                <strong>Email:</strong> indorental93@gmail.com <br>
              </p>
              <div class="social-links mt-3">
                <a href="https://www.facebook.com/indorental93/" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/indorental/" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Bootslander</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

</html>