<?php

require 'functions.php';

$nama=$_POST["nama"];
$email=$_POST["email"];
$username= strtolower(stripcslashes($_POST["username"]));
  $alamat=$_POST["alamat"];
  $password=($_POST["password"]); 
  $level=($_POST["level"]); 

        // cek username sudah ada yg punya atau belum
  $cek = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

  if (mysqli_fetch_assoc($cek)) {
    echo "<script>
    alert('maaf username yang anda inputkan sudah dimiliki orang lain!')
    </script>";
    return false;
  }

      // Enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

      //query input data kedalam tabel users
  $sql="insert into users
  (nama, email, username, alamat, password, level) values('$nama', '$email', '$username', '$alamat', '$password', '$level')";

      //eksekusi &menjalankan query 
  $hasil=mysqli_query($conn,$sql);

  $final = mysqli_affected_rows($conn);

      //kondisi apakah berhasil atau tidak
  if ($final > 0) {
    echo "<script>
    alert('berhasil menyimpan data sebagai customer');
    </script>"; 
    header("Location: customer.php");
  }
  else{
    echo "<script>
    alert('gagal menyimpan data sebagai customer');
    </script>";
    header("Location: login.php");
  }
  ?>