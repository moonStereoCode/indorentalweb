<?php 
require 'functions.php';

//ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id nya
$data = query("SELECT * FROM list_mobil WHERE id_mobil = $id")[0];

if (isset($_POST["submit"])) {
	if (ubah($_POST) > 0) {
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'halaman_admin.php';
		</script>
		";
	}
	else{
		echo "
		<script>
			alert('data tidak berhasil diubah!');
			document.location.href = 'halaman_admin.php';
		</script>
		";
	}
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Update Data Mobil</title>
 </head>
 <body>
 	<h1>Update data mobil</h1>
 	<form action="" method="POST" enctype="multipart/form-data">
 		<input type="hidden" name="id" value="<?= $data["id_mobil"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $data["gambar"]; ?>">
		<ul>
			<li>
			<label for="nama_mobil">Nama mobil :  </label>
			<input type="text" name="nama_mobil" required value="<?= $data["nama_mobil"]; ?>">	
			</li>
			<li>
			<label for="jenis">Jenis Mobil :  </label>
			<input type="text" name="jenis" required value="<?= $data["jenis"]; ?>">	
			</li>
			<li>
			<label for="deskripsi">Deskripsi : </label>
			<input type="text" name="deskripsi" required value="<?= $data["deskripsi"]; ?>">
			</li>
			<li>
			<label for="per12">Harga per 12 Jam : </label>
			<input type="text" name="per12" required value="<?= $data["per12"]; ?>">
			</li>
			<li>
			<label for="per24">Harga per 24 Jam : </label>
			<input type="text" name="per24" required value="<?= $data["per24"]; ?>">
			</li>
			<li>
			<label for="gambar">Gambar : </label> <br>
			<img src="img/<?= $data['gambar']; ?>" width="150"> <br>
			<input type="file" name="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Update data</button>
			</li>
 	</form>
 </body>
 </html>