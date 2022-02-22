<?php 
require 'functions.php';

	// PAGINATION
$dataperPage = 10;

$data = mysqli_query($conn, "SELECT booking.id_booking, booking.no_pemesanan, list_mobil.nama_mobil, list_mobil.jenis, booking.transisi_matic, booking.tgl_pinjam, booking.tgl_kembali, booking.no_WA, booking.pengambilan, booking.biaya
	FROM booking
	INNER JOIN list_mobil
	ON booking.id_mobil = list_mobil.id_mobil
	ORDER BY booking.id_booking DESC
	");

$totalData = mysqli_num_rows($data);

$totalPages = ceil($totalData/$dataperPage);

$activePage = (isset($_GET['halaman'])) ? $_GET["halaman"] : 1;

$dataStart = ($activePage*$dataperPage)-$dataperPage;

$query = query("SELECT booking.id_booking, booking.no_pemesanan, list_mobil.nama_mobil, list_mobil.jenis, booking.transisi_matic, booking.tgl_pinjam, booking.tgl_kembali, booking.no_WA, booking.pengambilan, booking.biaya, booking.validasi_pemesanan
	FROM booking
	INNER JOIN list_mobil
	ON booking.id_mobil = list_mobil.id_mobil
	LIMIT $dataStart, $dataperPage") or die (mysqli_error);


if (isset($_POST["cari"])) {
	$query = cariBooking($_POST["keyword"]);

}

if (isset($_POST['submit'])) {
	$id = $_POST["id"];
	$validasi = $_POST["validasi"];

	if (validasiPemesanan($id, $validasi)>0) {
		echo "
		<script>
		alert('Data booking berhasil dikonfirmasi!');
		document.location.href = 'data_booking.php';
		</script>
		";
	}else {
		echo "
		<script>
		alert('Data booking tidak berhasil dikonfirmasi!');
		document.location.href = 'data_booking.php';
		</script>
		";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Booking</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #990000;">
		<div class="container-fluid">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="halaman_admin.php">Data Mobil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#data_booking">Data Booking</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="post_article.php" >Post Article</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php" >Log Out</a>
				</li>
			</ul>
			<form class="d-flex" action="" method="POST">
				<input class="form-control me-2" type="text" name="keyword" value="<?= isset($_POST["keyword"]) ? $_POST["keyword"] : ''; ?>" autofocus placeholder="cari nomor pemesanan" aria-label="Search" autocomplete="off">
				<button class="btn btn-outline-light" type="submit" name="cari">Search</button>
			</form>
		</div>
	</div>
</nav>

<div class="" id="data_booking" name="data_booking">
	<h1>Data Booking</h1>
	<div class="table-responsive">
		<table class="table table-sm table-bordered border-dark mx-5">
			<thead class="table-dark">
				<tr>
					<th scope="col">No</th>
					<th scope="col">No. Pemesanan</th>
					<th scope="col">Nama Mobil</th>
					<th scope="col">Jenis Mobil</th>
					<th scope="col">Tanggal Pinjam</th>
					<th scope="col">Tanggal Kembali</th>
					<th scope="col">Transisi_matic</th>
					<th scope="col">Pengambilan</th>
					<th scope="col">WA</th>
					<th scope="col">Biaya</th>
					<th scope="col">Validasi Booking</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php 

				$i = 1;

				foreach ($query as $baris) : ?>
					<form method="POST">
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $baris["no_pemesanan"]; ?></td>
							<td><?php echo $baris["nama_mobil"]; ?></td>
							<td><?php echo $baris["jenis"]; ?></td>
							<td><?php echo $baris["tgl_pinjam"]; ?></td>
							<td><?php echo $baris["tgl_kembali"]; ?></td>
							<td><?php echo $baris["transisi_matic"]; ?></td>
							<td><?php echo $baris["pengambilan"]; ?></td>
							<td><?php echo $baris["no_WA"]; ?></td>
							<td><?php echo $baris["biaya"]; ?></td>
							<td>
								<?php if (is_null($baris["validasi_pemesanan"])): ?>
									<select name="validasi">
										<option value="Dikonfirmasi">Dikonfirmasi</option>
										<option value="Batal">Batal</option>
									</select> 
								<?php else :
									echo $baris["validasi_pemesanan"];
									?>
								<?php endif ?>
							</td>
							<td>
								<?php if ((is_null($baris["validasi_pemesanan"]))): ?>
									<input type="hidden" name="id" value="<?php echo $baris["id_booking"]; ?>">
									<input type="submit" name="submit" value="konfirmasi" onclick="return confirm('Coba di cek lagi min, nomor pemesanannya udah bener belum?');">

								<?php else:
									echo "Sudah konfirmasi"; 
									?>
									
								<?php endif ?>
							</td>
						</tr>
					</form>

				<?php endforeach; ?>
			</tbody>	
		</table>
	</div>

	<div class="">
		<?php for ($i=1; $i<=$totalPages ; $i++) : ?>
			<?php if ( $activePage == $i): ?>
				<a href="?halaman=<?=$i; ?> "> <b><?php echo $i; ?></b> </a>
				<?php else: ?>
					<a href="?halaman=<?=$i; ?> "> <?php echo $i; ?> </a>
				<?php endif ?>
			<?php  endfor; ?>
		</div>
	</div>

</body>
</html>
