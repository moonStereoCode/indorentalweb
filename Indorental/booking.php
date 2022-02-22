<?php 

require 'functions.php';

$id_mobil = $_POST["id_mobil"] /*? $_POST['id_mobil'] : ''*/;
$data = query("SELECT * FROM list_mobil WHERE id_mobil = '$id_mobil'");


if (isset($_POST["submit"])) {

    $id_mobil = $_POST["id_mobil"];
    $data = mysqli_query($conn, "SELECT * FROM list_mobil WHERE id_mobil = '$id_mobil'");

    if (mysqli_num_rows($data) === 1) {
      header("Location: validasi_booking.php");
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>FORM Pemesanan</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('input[name="pengambilan"]').click(function() 
      {
        var value = $(this).val();
        if( value == "Ambil mobil ke kantor")
        {
          $('#address').hide();
        }
        else{
          $('#address').show();
        }
      });
    });
  </script>
</head>
<body>

	<form class="bd-example" method="POST" action="validasi_booking.php">
    <fieldset>
      <legend>Form Booking</legend>
      <?php foreach ($data as $baris)  ?>
      <p>
        <label for="input">Nama Mobil</label>
        <input type="text" id="input" name="nama_mobil" value="<?= $baris["nama_mobil"]; ?>" disabled>
      </p>
      <p>
        <label for="input">Jenis Mobil</label>
        <input type="text" id="input" name="jenis_mobil" value="<?= $baris["jenis"]; ?>" disabled>
      </p>
      <input type="hidden" name="id_mobil" value="<?=$baris["id_mobil"]; ?>"/>
    <? endforeach; ?>
    
    <p>
      <label>
        <input type="checkbox" value="" name="transisi">
        Transisi Matic
      </label>
    </p>

    <p>
      <label for="datetime-local">Tanggal dan Waktu Peminjaman</label>
      <input type="datetime-local" id="datetime-local" name="waktu_pinjam" min="<?php echo  date("Y-m-d", strtotime("now")+86400)."T"."00:00"; ?>" max="<?php echo  date("Y-m-d", strtotime("now")+(86400*60))."T"."00:00"; ?>" required>
    </p>

    <p>
      <label for="datetime-local">Tanggal dan Waktu Pengembalian</label>
      <input type="datetime-local" id="datetime-local" name="waktu_kembali" min="<?php echo  date("Y-m-d", strtotime("now")+86400)."T"."00:00"; ?>" max="<?php echo  date("Y-m-d", strtotime("now")+(86400*60))."T"."00:00"; ?>" required>
    </p>

    <p>
      <label for="input">Masukkan nomor Whattsapp</label>
      <input type="text" id="input" name="no_WA" value="" required>
    </p>

    <p>Pilih metode peminjaman : </p>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="pengambilan" id="choiceambil" value="Ambil mobil ke kantor">
      <label class="form-check-label" for="choiceambil">
        Ambil mobil ke kantor
      </label>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="radio" name="pengambilan" id="choiceantar" value="Antar mobil ke tempat peminjam" checked>
      <label class="form-check-label" for="choiceantar">
        Antar mobil ke tempat peminjam
      </label>
    </div>   

    <div name="address" id="address">
      <textarea name="address" id="address" rows="5" cols="40"></textarea>
    </div>

    <p>
      <button type="submit" name="submit">Buat Pesanan</button>
    </p>
    
  </fieldset>
</form>
</body>
</html>