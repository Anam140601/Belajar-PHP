<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}


 
require 'functions.php';
// cek apakah tombol submit pernah sitekan atau belum
if (isset($_POST["submit"])) {

	



	// cek keberhasilan tambah data
	if (tambahtutorial($_POST)>0) {
		echo "			<script>
				alert('Selamat anda berhasil menambahkan data!');
				document.location.href = 'daftartutorial.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Maaf anda tidak dapat menambahkan data!');
				document.location.href = 'daftartutorial.php';			</script>
		";
		
	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-6.min.css">
	<title>Tambah Tutorial</title>
	<style>
		.a {
			display: block;
		}
		body {
			text-align: center;
			margin-top: 5%;
		}
	</style>
</head>
<body>
	<h1>Tambah Tutorial</h1>
<div class="a">
	<form action="" method="post" enctype="multipart/form-data">
	
		
			<label for="Judul">Judul : </label><br>
			<input type="text" name="Judul" id="Judul" required><br>			
		
			<label for="Sinopsis">Sinopsis : </label><br>
			<textarea name="Sinopsis" id="Sinopsis" required cols="70" rows="10"></textarea><br>
		
			<label for="Gambar">Gambar : </label><br>
			<input type="file" name="Gambar" id="Gambar"><br>
		
		
			<button type="submit" name="submit">Tambah data</button>
			
			

	</form>

</div>
	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script></html>

</body>
</html>