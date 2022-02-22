<?php

require 'functions.php';

$data = query("SELECT booking.id_booking, booking.no_pemesanan, list_mobil.nama_mobil, list_mobil.jenis, booking.transisi_matic, booking.tgl_pinjam, booking.tgl_kembali, booking.no_WA, booking.pengambilan, booking.biaya
	FROM booking
	INNER JOIN list_mobil
	ON booking.id_mobil = list_mobil.id_mobil
	ORDER BY booking.id_booking DESC LIMIT 1
	");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Invoice Print</title>

	<style type="text/css" media="print">
		@page { size: landscape; }

		@media print { 
			.noprint { 
				visibility: hidden; 
			} 
			} 
	</style>
</head>
<body>
	<h3>INVOICE Pemesanan Mobil Indorental</h3>

	<?php foreach ($data as $baris) ?>
		<!-- No. Pemesanan -->
		<p> No. pemesanan <?= $baris["no_pemesanan"]?> </p>	

		<!-- Nama mobil - Jenis mobil -->
		<p>Anda memesan mobil <b><?= $baris["jenis"]?></b> dengan tipe mobil <b><?= $baris["nama_mobil"]?></b>. Berikut data pemesanan lengkap Anda : </p>
		<!-- Transisi mobil -->
		<p> Transisi matic : <?= $baris["transisi_matic"]; ?></p>
		
		<!-- Waktu pinjam  dan waktu kembali -->
		<p> Waktu pinjam : <?= $baris["tgl_pinjam"]; ?></p>
		<p> Waktu kembali : <?= $baris["tgl_kembali"]; ?></p>

		<!-- Nomor yang bisa dihubungi -->
		<p> Nomor Whatsapp yang bisa dihubungi : <?= $baris["no_WA"] ?></p>

		<!-- Metode pengambilan -->
		<p> Pengambilan : <?= $baris["pengambilan"] ?></p>

		<!-- Biaya yang ditangguhkan -->
		<p> Kalkulasi biaya yang ditangguhkan : <?= $baris["biaya"] ?></p>

	<? endforeach; ?>

	<p>
		Transfer ke salah satu rekening dibawah ini ya kak:
	</p>
	<p>
		No.Rekening
	</p>
	<ul>
		<li>
			<b>BANK BRI</b> : 002901119941507 a.n AHMAD RAHIM
		</li>
		<li>
			<b>BANK BCA</b> : 4560913171 a.n AHMAD RAHIM
		</li>
		<li>
			<b>BANK MANDIRI</b> : 1370018105326 a.n AHMAD RAHIM
		</li>
	</ul>
	<P>
		Format transfer adalah mengganti 3 digit terakhir pada jumlah biaya yang ditangguhkan dengan 3 digit nomor pesanan. 
	</P>
	<p>
		Jika jumlah biaya yang ditangguhkan = 300.000 dan nomor pesanan adalah 1234. Maka kakak harus transfer sejumlah 300.234.
	</p>
	<p>Silahkan simpan invoice ini, ya! Invoice ini adalah bukti bahwa Anda telah memesan mobil. Dan tunjukkan invoice ini pada saat pengambilan mobil bersamaan dengan bukti transfer. Terimakasih!</p>

	<a href="armada.php" class = "noprint">kembali</a>
	<a href="#" id="print" onClick="window.print()" class = "noprint"> print </a>

</body>
</html>

<script type="text/javascript">
	window.print();

	$('a.printPage').click(function(){
           window.print();
});
</script>