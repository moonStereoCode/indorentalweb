<?php 

$conn = mysqli_connect("localhost","root","","indorental");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($baris = mysqli_fetch_assoc($result)) {
		$rows[] = $baris;
	}

	return $rows;
}


function hitungBiaya($id_mobil, $waktu_pinjam, $waktu_kembali, $transisi){
	global $conn;

	$query1 = mysqli_query($conn,"SELECT per12, per24 FROM list_mobil WHERE $id_mobil = '$id_mobil'");
	$query1 = mysqli_fetch_assoc($query1);

    //converts date and time to seconds  
	$time1 = strtotime($waktu_pinjam);  
	$time2 = strtotime($waktu_kembali);  

	$jumlahwaktu = abs($time2 - $time1)/(60*60);

	if ($jumlahwaktu <= 12) {
		$totalbiaya = $query1['per12'];
	} elseif (12 > $jumlahwaktu && $jumlahwaktu <= 24) {
		$totalbiaya = $query1['per24'];
	} else {
		$jumlahwaktu = $jumlahwaktu/24;
		$totalbiaya = ceil($jumlahwaktu) * $query1['per24'];
	}

	$totalbiaya = $totalbiaya;

	if (isset($_POST["transisi"])) {
		$totalbiayafix = $totalbiaya+25000;
	} else {
		$totalbiayafix = $totalbiaya;
	}

	error_reporting(0);

	return $totalbiayafix;
}

function transisi($transisi){
	$transisi = $_POST["transisi"];

	if (isset($_POST["transisi"])) {
		$transisi = "matic";
	} else {
		$transisi = "manual";
	} 

	return $transisi;
}

function jenisPengambilan($pengambilan, $address)
{
	$pengambilan = $_POST["pengambilan"];

	if (preg_match("/peminjam/", $pengambilan)) {
		$pengambilan = $pengambilan. 
		". Catatan : ". 
		$address;
	} else {
		$pengambilan = $pengambilan;
	}

	return $pengambilan;
}

function booking($data){
	global $conn;

	// Ambil data dari tiap elemen dalam form
	$id_mobil = $data["id_mobil"];
	$waktu_pinjam = date("Y-m-d H:i:s", strtotime($data["waktu_pinjam"])); 
	$waktu_kembali = date("Y-m-d H:i:s", strtotime($data["waktu_kembali"]));
	$pengambilan = $data["pengambilan"];
	$transisi = $data["transisi"];
	$biaya = $data["biaya"];
	$no_WA = $data["no_WA"];
	$no_pemesanan = $data["no_pemesanan"];

	$no_pemesanan = rand(111,999);

	// cek ketersediaan nomor pemesanan
	$result = mysqli_query($conn, "SELECT no_pemesanan FROM booking WHERE no_pemesanan = '$no_pemesanan'");

	if ($no_pemesanan == $result ) {
		$no_pemesanan = $no_pemesanan;
	} else {
		$no_pemesanan = rand(111,999);
	}

	// Query insert data
	$query = "INSERT INTO booking (id_mobil, no_pemesanan, tgl_pinjam, tgl_kembali, pengambilan, transisi_matic, biaya, no_WA)
	VALUES
	('$id_mobil', '$no_pemesanan', '$waktu_pinjam', '$waktu_kembali', '$pengambilan', '$transisi', '$biaya', '$no_WA')
	";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function postArticle($data){
	global $conn;
	// Ambil data dari tiap elemen dalam form
	$judul = ($data["judul"]);
	$tipe_artikel = ($data["tipe_artikel"]);
	$isi_artikel = ($data["isi_artikel"]);

	// UPLOAD GAMBAR
	$gambar = upload();
	if (!$gambar) {
		return false;
	}


	// Query insert data
	$query = "INSERT INTO artikel (id_artikel, judul, jenis_artikel, isi_artikel, gambar)
	VALUES
	('', '$judul', '$tipe_artikel', '$isi_artikel', '$gambar')
	";
	mysqli_query($conn, $query);

	$query1 = "INSERT INTO gallery (nama_file)
	VALUES
	('$gambar')";
	mysqli_query($conn, $query1);

	return mysqli_affected_rows($conn);
}

function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];	


	// cek apakah tidak ada gambar yang di upload
	if ($error === 4) {
		echo "<script>
		alert('Ups, upload gambar dulu lur!');
		</script>";

		return false;
	}


	// CEK APAKAH YANG DI UPLOAD ADALAH GAMBAR
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
		echo "<script>
		alert('Yang anda upload bukan gambar');
		</script>";

		return false;
	}

	// cek jika ukurannya terlalu besar
	if ($ukuranFile > 1000000){
		echo "<script>
		alert('Ups, ukuran nya kebesaran gan. Tumvah nanti :D');
		</script>";

		return false;
	}

	// lolos pengecekan gambar siap di upload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, "img/". $namaFileBaru);

	return $namaFileBaru;

}

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM list_mobil WHERE id_mobil = $id");

	return mysqli_affected_rows($conn);
}

function konfirmasiPinjam($validasi){
	$validasi = $_POST["validasi"];
}

function validasiPemesanan($id, $validasi){
	global $conn;
	
	mysqli_query($conn, "UPDATE booking
		SET validasi_pemesanan = '$validasi'
		WHERE id_booking = $id
		");

	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;

	// Ambil data dari tiap elemen dalam form
	$id = $data["id"];
	$nama_mobil = ($data["nama_mobil"]);
	$jenis = ($data["jenis"]);
	$deskripsi = ($data["deskripsi"]);
	$per12 = ($data["per12"]);
	$per24 = ($data["per24"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);


	// CEK APAKAH USER PILIH GAMBAR BARU ATAU NGGAK
	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarLama;
	}else{
		$gambar = upload();
	}

	// $gambar = htmlspecialchars($data["gambar"]);


	// Query insert data
	$query = "UPDATE list_mobil SET 
	nama_mobil = '$nama_mobil',
	jenis = '$jenis',
	deskripsi = '$deskripsi',
	per12 = '$per12',
	per24 = '$per24',
	gambar = '$gambar'

	WHERE id_mobil = $id
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambah($data){
	global $conn;
	// Ambil data dari tiap elemen dalam form
	$nama_mobil = ($data["nama_mobil"]);
	$jenis = ($data["jenis"]);
	$deskripsi = ($data["deskripsi"]);
	$per12 = ($data["per12"]);
	$per24 = ($data["per24"]);

	// UPLOAD GAMBAR
	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	// Query insert data
	$query = "INSERT INTO list_mobil (nama_mobil, jenis, deskripsi, per12, per24, gambar)
	VALUES
	('$nama_mobil', '$jenis', '$deskripsi', '$per12', '$per24', '$gambar')
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari($keyword){
	$query = "SELECT * FROM list_mobil
	WHERE
	nama_mobil LIKE '%$keyword%' OR jenis LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%' OR per12 LIKE '%$keyword%' OR per24 LIKE '%$keyword%'
	";

	return query($query);
}

function cariBooking($keyword){
	$query = "SELECT booking.id_booking, booking.no_pemesanan, list_mobil.nama_mobil, list_mobil.jenis, booking.transisi_matic, booking.tgl_pinjam, booking.tgl_kembali, booking.no_WA, booking.pengambilan, booking.biaya, booking.validasi_pemesanan
	FROM booking
	INNER JOIN list_mobil 
	ON booking.id_mobil = list_mobil.id_mobil 
	WHERE booking.no_pemesanan LIKE '%$keyword%';
	";

	return query($query);
}

function signup($data){
	global $conn;

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
}

/*function gambar(){
	global $conn;

	$query = mysqli_query($conn, "SELECT * FROM artikel");
	$catch = count(mysqli_fetch_assoc($query));
	$pict = mysqli_query($conn, "SELECT gambar FROM artikel");

	$query1 = mysqli_query($conn, "SELECT * FROM gallery");
	$catch1 = count(mysqli_fetch_assoc($query1));
	$pict1 = mysqli_query($conn, "SELECT gambar FROM gallery");

	if ($catch1 < $catch) {
		if ($pict!=$pict1) {
			$try = "INSERT INTO gallery(nama_file) SELECT artikel.gambar FROM artikel";
		}
	}
}*/

?>
