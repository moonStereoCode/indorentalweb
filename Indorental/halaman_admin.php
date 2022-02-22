<?php 
session_start();

require 'functions.php';

if (!isset($_SESSION["username"])) {
	echo "Anda harus login dulu <br><a href='login.php'>Klik disini</a>".$_SESSION["username"];
	exit;
}

$level=$_SESSION["level"];

if ($level!=1) {
    echo "Anda tidak punya akses pada halaman admin";
    exit;
}

$id_user=$_SESSION["id_user"];
$username=$_SESSION["username"];

// PAGINATION
$dataperPage = 5;

$data = mysqli_query($conn, "SELECT * FROM list_mobil");

$totalData = mysqli_num_rows($data);

$totalPages = ceil($totalData/$dataperPage);

$activePage = (isset($_GET['halaman'])) ? $_GET["halaman"] : 1;

$dataStart = ($activePage*$dataperPage)-$dataperPage;


$query = "SELECT * FROM list_mobil";
$result = mysqli_query($conn,$query);

$list_mobil = query("SELECT * FROM list_mobil LIMIT $dataStart, $dataperPage");

if (isset($_POST["cari"])) {
	$list_mobil = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #990000;">
		<div class="container-fluid">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="#data_mobil">Data Mobil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="data_booking.php">Data Booking</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="post_article.php" >Post Article</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php" >Log Out</a>
					</li>
				</ul>
				<form class="d-flex" action="" method="POST">
					<input class="form-control me-2" type="text" name="keyword" value="<?= isset($_POST["keyword"]) ? $_POST["keyword"] : ''; ?>" autofocus placeholder="masukan keyword pencarian" aria-label="Search" autocomplete="off">
					<button class="btn btn-outline-light" type="submit" name="cari">Search</button>
				</form>
			</div>
		</div>
	</nav>

	<div class="container" id="data_mobil" name="data_mobil">
		<h1>Data mobil</h1>

		<div class="container">
			<div class="row align-items-center">
				<div class="col">
					<a href="tambah.php">tambah data mobil</a> 
				</div>

			<table class="table table-sm table-bordered border-dark">
				<thead class="table-dark">
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama mobil</th>
						<th scope="col">Jenis</th>
						<th scope="col">Gambar</th>
						<th scope="col">Deskripsi</th>
						<th scope="col">Harga per 12 jam</th>
						<th scope="col">Harga per 24 jam</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>

				<tbody>

					<?php

					$i = 1;

					foreach ($list_mobil as $baris) : ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $baris["nama_mobil"]; ?></td>
							<td><?php echo $baris["jenis"]; ?></td>
							<td>
								<img src="img/<?= $baris["gambar"]; ?>" width="150">
							</td>
							<td><?php echo $baris["deskripsi"]; ?></td>
							<td><?php echo $baris["per12"]; ?></td>
							<td><?php echo $baris["per24"]; ?></td>
							<td>
								<a href="ubah.php?id=<?= $baris["id_mobil"]; ?>">update data</a> ||
								<a href="hapus.php?id=<?= $baris["id_mobil"]; ?>" onclick="return confirm('Yakin mau dihapus gan?');">hapus data</a>
							</td>
						</tr>

					<?php endforeach; ?>
				</tbody>	
			</table>
		</div>
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