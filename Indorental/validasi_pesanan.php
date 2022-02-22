<?php 
require 'functions.php';

$id = $_GET["id"];
$validasi =$_GET["validasi"];

if (isset($_POST["submit"])) {

	if (validasiPemesanan($_POST) > 0) {
		echo "
		<script>
		alert('Status pemesanan berhasil di update!');
		document.location.href = 'data_booking.php';
		</script>
		";
	}else {
		echo "
		<script>
		alert('Status pemesanan tidak berhasil di update!');
		document.location.href = 'data_booking.php';
		</script>
		";
		/*error_reporting(E_ERROR | E_WARNING | E_PARSE);*/

	}
}

?>

