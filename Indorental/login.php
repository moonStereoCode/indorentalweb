<?php 
ob_start();

require 'functions.php';

if (isset($_POST["signup"])) {
  
  if(signup($_POST) > 0) {
    echo "<script>
      alert('user berhasil ditambahkan!');
      </script>
      ";
  } else {
    echo mysqli_error($conn);
  }
}

/*LOGIN*/ 
function input($data) {
  //Fungsi untuk mencegah inputan karakter yang tidak sesuai
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
              //Cek apakah ada kiriman form dari method post

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $username = input($_POST["username"]);
  $p = input($_POST["password"]);

  $sql = "select * from users where username='".$username."' and password='".$p."' limit 1";
  $hasil = mysqli_query ($conn,$sql);
  $jumlah = mysqli_num_rows($hasil);

  if ($jumlah>0) {
    session_start();

    $row = mysqli_fetch_assoc($hasil);
    $_SESSION["id_user"]=$row["id_user"];
    $_SESSION["username"]=$row["username"];
    $_SESSION["level"]=$row["level"];

    if ($_SESSION["level"]=$row["level"]==1)
    {
      header("location: halaman_admin.php");
    } else if ($_SESSION["level"]=$row["level"]==2)
    {
      header("Location:owner.php");
    }else if ($_SESSION["level"]=$row["level"]==3){
      header("Location:customer.php");
    }

  }else {
    echo "<div class='alert alert-danger'>
    <strong>Error!</strong> Username dan password salah. 
    </div>";
  }
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

  <!-- Pop Up -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
          <li><a href="artikel.php">Blog</a></li>
          <li><a href="#contact">Kontak Usaha</a></li>
          <li><a href="login.php">Login/SignUp</a></li>

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
            <h2>Masuk atau bergabung bersama kami untuk mendapatkan informasi yang lebih lengkap.</h2>
            <div class="text-center text-lg-left">
              <a href="#login" class="btn-get-started scrollto">Login</a><br><br>
              <a href="#signup" class="btn-get-started scrollto">Sign Up</a>
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

  <!-- ======= Log in Section ======= -->
  <body2>
  <section id="login" class="login">
      <div class="container">
            <?php
            if(isset($error)) : ?>
                <p style="color:red; font-style:italic; "> Username/password Anda salah!</p>
            <?php endif; ?>
            <h2>Login</h2>
            <h6><p class="tulisan_login">Silahkan login</p><h6>

                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="Masukan Username"><br><br>
            
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password"><br><br>
            
                        <input type="submit" class="tombol_login" value="LOGIN" name="login">
            
                        <br/>
                        <br/>
                        <center>
                            <a class="link" href="index.php">kembali</a>
                        </center>
                    </form>
		
    </div>
    <body2>


<!-- ======= Sign Up Section ======= -->
<section id="signup" class="signup">
    <div class="container">
        <h2>Sign Up</h2>
        <form action="" method="post">
        <h6><p class="tulisan_login">DAFTARKAN DIRI ANDA</p><h6>
            <form>
                <label>Nama Lengkap</label><br>
                <input class="form-control" type="text" name="nama" placeholder="Tuliskan Nama Lengkapmu"><br>
                <label>Email</label><br>
                <input class="form-control" type="email" name="email" placeholder="Alamat Email"><br>
                <label>Username</label><br>
                <input class="form-control" type="username" name="username" placeholder="Buat Usernamemu"><br>
                <label>Alamat</label><br>
                <input class="form-control" type="alamat" name="alamat" placeholder="Tempat Tinggal"><br>
                <label>Password</label><br>
                <input class="form-control" type="password" name="password" placeholder="Buat Password"><br>
                <input type="hidden" name="level" value="3">
                <input type="submit" class="tombol_login" name="signup" value="SIGN UP">
            </form>
    </div>
</section><!-- End Sign Up Section -->

  <main id="main">

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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>