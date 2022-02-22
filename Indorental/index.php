<?php 

require 'functions.php';

$list_article = query("SELECT * FROM artikel");
$gallery = query("SELECT * FROM gallery");

if (isset($_POST["Reload"])) {
  gambar();
}

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
  <link href="assets/css/style.css" rel="stylesheet">

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
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="#about">Profil Usaha</a></li>
          <li><a href="#features">Armada Kami</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#blog">Blog</a></li>
          <li><a href="#contact">Kontak Usaha</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1>Penyewaan Mobil Terlengkap di Yogyakarta <span>Indorental</span></h1>
            <h2>Indorental melayani segala kebutuhan transportasi anda dengan pelayanan terbaik kami</h2>
            <div class="text-center text-lg-left">
              <a href="#about" class="btn-get-started scrollto">Get Started</a>
            </div>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
            <h3>Indorental Sewa Mobil Terlengkap di Yogyakarta</h3>
            <p>Indorental merupakan jasa yang bergerak dalam bidang transportasi. Dengan berbagai pilihan armada yang lengkap dan terawat dengan baik.
              yang akan memberikan pengalaman transportasi menjadi lebih menyenangkan bersama kami. </p>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Proses Mudah</a></h4>
              <p class="description">Proses penyewaan mudah dan cepat, anda dapat dengan mudah menyewa armada kami tanpa perlu ribet</p>
            </div>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Aman & Nyaman</a></h4>
              <p class="description">Kelengkapan armada untuk customers lengkap yang akan memberikan rasa aman pada anda, serta kondisi armada yang baik dan selalu terawat
                yang pastinya anda akan merasa nyaman berjelajah bersama kami
              </p>
            </div>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title"><a href="">Lengkap</a></h4>
              <p class="description">ketersediaan armada di Indorental sangatlah lengkap, terdiri dari city car, family car, VIP car. Bahkam, untuk 
                rombongan kami menyediakan elf dan jet bus untuk kebutuhan transportasi anda.
              </p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Features</h2>
          <p>Check Our Armada's</p>
        </div>

        <div class="row" data-aos="fade-left">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
              <i class="ri-store-line" style="color: #ffbb2c;"></i>
              <h3><a href="armada.php">City Car</a></h3>
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-left">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
              <i class="ri-store-line" style="color: #ffbb2c;"></i>
              <h3><a href="armada.php">Family Car</a></h3>
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-left">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
              <i class="ri-store-line" style="color: #ffbb2c;"></i>
              <h3><a href="armada.php">VIP Car</a></h3>
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-left">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
              <i class="ri-store-line" style="color: #ffbb2c;"></i>
              <h3><a href="armada.php">Rombongan</a></h3>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Details Section ======= -->
    <section id="details" class="details">
      <div class="container">

        <div class="row content">
          <div class="col-md-4" data-aos="fade-right">
            <img src="assets/img/details-1.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-4" data-aos="fade-up">
            <h3>Alur penyewaan Armada Indorental</h3>
            <p class="font-italic">
              alur yang anda jalani untuk proses penyewaan armada kami, sebagai berikut.
            </p>
            <ul>
              <li><i class="icofont-check"></i> Customer memilih armada yang ingin di sewa, dapat melalui web ataupun akun instagram kami.</li>
              <li><i class="icofont-check"></i> Customer menanyakan ketersediaan unit kami.</li>
              <li><i class="icofont-check"></i> Customer memilih unit, menyetujui, dan membayar DP (uang muka).</li>
              <li><i class="icofont-check"></i> Customer datang ke kentor untuk mengambil mobil.</li>
            </ul>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
            <img src="assets/img/details-2.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
            <h3>Persyarat Persewaan Umum</h3>
            <p class="font-italic">
              Bagi customer yang akan menyewa armada kami, dibawah ini merupakan salah satu syarat yang harus diberikan kepada kami.
            </p>
            <ul>
              <li><i class="icofont-check"></i> Kartu tanda penduduk (KTP).</li>
              <li><i class="icofont-check"></i> Surat Izin Mengemudi kendaraan bermotor (SIM C).</li>
              <li><i class="icofont-check"></i> ID karyawan.</li>
              <li><i class="icofont-check"></i> Nomor pokok wajib pajak (NPWP).</li>
              <li><i class="icofont-check"></i> Badan Penyelenggara Jaminan Sosial (BPJS).</li>
            </ul>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4" data-aos="fade-right">
            <img src="assets/img/details-3.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5" data-aos="fade-up">
            <h3>Persyaratan Persewaan Mahasiswa</h3>
            <p class="font-italic">Bagi customer yang akan menyewa armada kami, dibawah ini merupakan salah satu syarat yang harus diberikan kepada kami.</p>
            <ul>
              <li><i class="icofont-check"></i> Kartu tanda penduduk (KTP).</li>
              <li><i class="icofont-check"></i> Surat Izin Mengemudi kendaraan bermotor (SIM C).</li>
              <li><i class="icofont-check"></i> Kartu Tanda Mahasiswa (KTM).</li>
              <li><i class="icofont-check"></i> Badan Penyelenggara Jaminan Sosial (BPJS).</li>
            </ul>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
            <img src="assets/img/details-4.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
            <h3>Jenis Jasa di Indorental</h3>
            <p class="font-italic">
              Terdapat beberapa pilihan jasa yang dapat anda pilih sesuai kebutuhan transportasi anda.
            </p>
            <ul>
              <li><i class="icofont-check"></i> Hanya sewa armada.</li>
              <li><i class="icofont-check"></i> Sewa armada + driver.</li>
              <li><i class="icofont-check"></i> Sewa armada + driver + BBM.</li>
              <li><i class="icofont-check"></i> Paket Wisata</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End Details Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Gallery</h2>
          <p>Check our Gallery</p>
        </div>

        <div class="row no-gutters" data-aos="fade-left">

          <?php foreach ($gallery as $baris) : ?>
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
              <a href="" class="venobox" data-gall="gallery-item">
                <img src="img/<?=$baris["nama_file"]; ?>" alt="" class="img-fluid">
              </a>
            </div>
          </div>
          <?php endforeach; ?>

<!--           <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="150">
              <a href="assets/img/gallery/gallery-2.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
              <a href="assets/img/gallery/gallery-3.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="250">
              <a href="assets/img/gallery/gallery-4.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
              <a href="assets/img/gallery/gallery-5.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="350">
              <a href="assets/img/gallery/gallery-6.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">
              <a href="assets/img/gallery/gallery-7.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="450">
              <a href="assets/img/gallery/gallery-8.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div> -->

        </div>
      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Blog</h2>
          <p>Temukan Keseruan Di Sini</p>
        </div>

        <div class="row" data-aos="fade-left">
          <?php foreach ($list_article as $baris): ?>
            <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="img/<?= $baris["gambar"]; ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4><?php echo $baris["judul"]; ?></h4>
                <span><?php 
                $isi_artikel = $baris["isi_artikel"];
                $isi_artikel= (strlen($isi_artikel)>60) ? substr($isi_artikel,0,60).'...' :$isi_artikel;

                echo $isi_artikel;
                 ?></span>
                <div class="social">
                  <a href="article.php?id=<?php echo $baris["id_artikel"]; ?>">Disini</a>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach ?>
      </div>
    </section><!-- End Blog Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Jl. Sukarya No. 62A, Nanggulan, Rt.15/Rw.19, Maguwoharjo, Depok, Sleman</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>indorental93@gmail.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>082197457283</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

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

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Indorental</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
        Build by <a href="https://www.instagram.com/hafifahprmt/">Hafifah Permatasari</a> || <a href="https://www.instagram.com/purnamanama/">Dewi Purnamasari</a>
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