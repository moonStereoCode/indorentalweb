<?php 
require 'functions.php';

if (isset($_POST["submit"])) {
	if (postArticle($_POST) > 0) {
		echo "
		<script>
		alert('data berhasil ditambahkan!');
		document.location.href = 'halaman_admin.php';
		</script>
		";
	}
	else{
		/*echo "
		<script>
		alert('data tidak berhasil ditambahkan!');
		document.location.href = 'halaman_admin.php';
		</script>
		";*/
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Post Article</title>


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
		</div>
	</div>
</nav>
<h1 class="mt-2">Tambah Artikel</h1>
<form class="container" action="" method="post" enctype="multipart/form-data">

	<div class="mb-3">
		<label for="formGroupExampleInput" class="form-label">Judul </label>
		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="judul" required>
	</div>
	<div class="mb-3">
		<label for="formGroupExampleInput2" class="form-label">Pilih Jenis artikel </label>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="tipe_artikel" id="informasi" value="Artikel informasi" name="tipe_artikel">
			<label class="form-check-label" for="informasi">
				Artikel informasi
			</label>
		</div>

		<div class="form-check">
			<input class="form-check-input" type="radio" name="tipe_artikel" id="testimoni" value="Artikel testimoni" name="tipe_artikel">
			<label class="form-check-label" for="testimoni">
				Artikel testimoni
			</label>
		</div> 
		<div class="form-floating">
			<textarea class="form-control"  id="floatingTextarea2" style="height: 100px" name="isi_artikel" required></textarea>
			<label for="floatingTextarea2">Masukkan isi artikel</label>
		</div>
		<div class="mb-3">
			<label for="formFile" class="form-label">Input gambar</label>
			<input class="form-control" type="file" id="formFile" name="gambar" required>
		</div>
		<div>
			<button type="submit" class="btn btn-dark" name="submit">Submit</button>
		</div>
	</div>

	<!-- <ul>
		<li>
			<label for="judul">Judul : </label>
			<input type="text" name="judul" required>	
		</li>
		<li>
			<p>Pilih Jenis artikel : </p>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="tipe_artikel" id="informasi" value="Artikel informasi">
				<label class="form-check-label" for="informasi">
					Artikel informasi
				</label>
			</div>

			<div class="form-check">
				<input class="form-check-input" type="radio" name="tipe_artikel" id="testimoni" value="Artikel testimoni">
				<label class="form-check-label" for="testimoni">
					Artikel testimoni
				</label>
			</div> 
		</li>
		<li>
			<label for="isi_artikel">Masukkan isi artikel</label>
			<textarea id="isi_artikel" name="isi_artikel" rows="5" cols="100"></textarea> 
		</li>
		<li>
			<label for="gambar">Gambar : </label>
			<input type="file" name="gambar" required>
		</li>
		<li>
			<button type="submit" name="submit">Post Artikel</button>
		</li>
	</ul> -->
</form>
</body>
</html>