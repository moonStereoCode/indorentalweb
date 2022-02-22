<?php 

require 'functions.php';

$id_mobil = $_POST["id_mobil"];
$data = query("SELECT * FROM list_mobil WHERE id_mobil = '$id_mobil'");

if (!isset($_POST["transisi"])) {
  error_reporting(0);
}

if (isset($_POST["btn_pesan"])) {

  $waktu_pinjam = strtotime($_POST["waktu_pinjam"]);
  $waktu_kembali = strtotime($_POST["waktu_kembali"]);

  if ($waktu_kembali < $waktu_pinjam) {
    echo "
    <script>
    alert('Input waktu kembali dan waktu pinjam salah! Mohon ulangi pemesanan Anda!');
    document.location.href = 'armada.php';
    </script>
    ";
  } elseif(booking($_POST) > 0) {
    header("Location: print_invoice.php");
  } else {
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
  }
}

/*if (isset($_POST["btn_kembali"])) {
  header("Location: booking.php");
}
*/
?>

<!DOCTYPE html>
<html>
<head>
  <title> Validate your Rent</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>

  <h3> Konfirmasi pemesanan </h3>

  <form method="POST" action="">
    <?php foreach ($data as $baris) ?>

    <p name="nama_mobil"> Mobil pesanan : <?= $baris["nama_mobil"]; ?></p>
    <p> Jenis mobil : <?= $baris["jenis"]; ?></p>

  <? endforeach; ?>

  <div>
    <label for="transisi"> Jenis transisi : </label>
    <input type="text" name="transisi" id="transisi" value="<?= transisi($_POST["transisi"]) ?>" readonly>
    </div>

    <div>
      <label for="waktu_pinjam"> Waktu pinjam : </label>
      <input type="datetime-local" name="waktu_pinjam" id="waktu_pinjam" value="<?= $_POST["waktu_pinjam"] ?>" readonly>
    </div>

    <div>
      <label for="waktu_kembali"> Waktu kembali : </label>
      <input type="datetime-local" name="waktu_kembali" id="waktu_kembali" value="<?= $_POST["waktu_kembali"] ?>" readonly>
    </div>

    <div>
      <label for="no_WA"> Nomor Whatsapp : </label>
      <input type="text" name="no_WA" id="no_WA" value="<?= $_POST["no_WA"] ?>" readonly>
      <p style="font-style: italic;"> Mohon pastikan kembali, nomor yang anda inputkan benar! </p>
    </div>
    
    <div>
      <label for="pengambilan"> Metode Pengambilan :</label>
      <input type="text" name="pengambilan" id="pengambilan" value="<?= jenisPengambilan($_POST["pengambilan"], $_POST["address"]) ?>" readonly>
    </div>

    <div>
      <label for="biaya">Jumlah biaya yang ditangguhkan : </label>
      <input name="biaya" id="biaya" value="<?php echo "IDR."." ".hitungBiaya($_POST["id_mobil"], $_POST["waktu_pinjam"], $_POST["waktu_kembali"], $_POST["transisi"]) ?>" readonly>
    </div>

    <p class="fst-italic">
     Mohon pastikan data yang Anda masukkan benar. Anda dapat menekan <b>Buat Pesanan</b> untuk melanjutkan pemesanan dan <b>kembali</b> untuk mengubah informasi pemesanan.
   </p>
    <p>
<!--       <button type="submit" class="btn btn-secondary" name="btn_kembali">Kembali</button> -->
      <button type="submit" class="btn btn-primary" name="btn_pesan">Buat Pesanan</button>
      <input type="hidden" name="id_mobil" value="<?= $baris["id_mobil"]; ?>"/>
   </p>

</form>
</body>
</html>