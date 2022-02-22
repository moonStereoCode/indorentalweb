<?php 
require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

	// Cek apakah data berhasil ditambahkan atau tidak
	if (tambah($_POST) > 0) {
		echo "
		<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'halaman_admin.php';
		</script>
		";
	}
	else{
		echo "
		<script>
			alert('data tidak berhasil ditambahkan!');
			document.location.href = 'halaman_admin.php';
		</script>
		";
	}	
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Mobil</title>
</head>
<body>

	<h1>Tambah Data Mobil</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
			<label for="nama_mobil">Nama mobil : </label>
			<input type="text" name="nama_mobil" required>	
			</li>
			<li>
			<label for="jenis">Jenis : </label>
			<select name="jenis" required>
				<option value="vip">VIP</option>
				<option value="City Car">City Car</option>
				<option value="Rombongan">Rombongan</option>
				<option value="family Car">family Car</option>
			</select>
			</li>
			<li>
			<label for="deskripsi">Deskripsi : </label>
			<textarea name="deskripsi" required></textarea>
			</li>
			<li>
			<label for="per12">Harga per 12 jam : </label>
			<input type="text" name="per12" >
			</li>
			<li>
			<label for="per24">Harga per 24 jam : </label>
			<input type="text" name="per24" required>
			</li>
			<li>
			<label for="gambar">Gambar : </label>
			<input type="file" name="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah data</button>
			</li>
		</ul>
	</form>

</body>
</html>