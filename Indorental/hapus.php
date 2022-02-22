<?php 
require 'functions.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
	echo "
	<script>
			alert('data berhasil dihapus!');
			document.location.href = 'halaman_admin.php';
		</script>
		";
}else {
	/*echo "
		<script>
			alert('data tidak berhasil dihapus!');
			document.location.href = 'halaman_admin.php';
		</script>
		";
		*/
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
}


?>