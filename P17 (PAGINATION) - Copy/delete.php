<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}


require 'functions.php';

$id = $_GET["id"];


if (delete($id)>0) {
	echo "
			<script>
				alert('Selamat anda berhasil menghapus data!');
				document.location.href = 'daftaranime.php';
			</script>
		";
}else {
	echo "
			<script>
				alert('Maaf anda tidak dapat menghapus data!');
				document.location.href = 'daftaranime.php';
			</script>
		";
}


 ?>