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
	if (tambahgame($_POST)>0) {
		echo "			<script>
				alert('Selamat anda berhasil menambahkan data!');
				document.location.href = 'daftargame.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Maaf anda tidak dapat menambahkan data!');
				document.location.href = 'daftargame.php';			</script>
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
	<title>Tambah data game</title>
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
	<h1>Tambah data game</h1>
<div class="a">
	<form action="" method="post" enctype="multipart/form-data">
	
		
			<label for="Nama">Nama : </label><br>
			<input type="text" name="Nama" id="Nama" required><br>
		
		
			<label for="Genre">Genre : </label><br>
			<input type="text" name="Genre" id="Genre" required><br>
		
		
			<label for="Tahun_Rilis">Tahun Rilis : </label><br>
			<input type="text" name="Tahun_Rilis" id="Tahun_Rilis" required><br>			
		
			<label for="Sinopsis">Sinopsis : </label><br>
			<textarea name="Sinopsis" id="Sinopsis" required cols="70" rows="10"></textarea><br>

			<label for="Link">Link Download : </label><br>
			<input type="text" name="Link" id="Link" required></input><br>

			<label>Minimum Spek : </label><br>
			<input placeholder="OS" type="text" name="OS" id="OS" required></input><br>
			<input placeholder="Processor" type="text" name="Prosesor" id="Prosesor" required></input><br>
			<input placeholder="Memory" type="text" name="Ram" id="Ram" required></input><br>
			<input placeholder="Graphics Card" type="text" name="Vga" id="Vga" required></input><br>
			<input placeholder="DirectX" type="text" name="DirectX" id="DirectX" required></input><br>

			<label for="Cara_instal">Cara Instal : </label><br>
			<textarea name="Cara_instal" id="Cara_instal" required cols="70" rows="10"></textarea><br>
		
			<label for="Gambar">Gambar : </label><br>
			<input type="file" name="Gambar" id="Gambar" ><br>

			<label for="Screenshot">Screenshot : </label><br>
			<input type="file" name="Screenshot1" id="Screenshot" ><br>

			<label for="Screenshot">Screenshot : </label><br>
			<input type="file" name="Screenshot2" id="Screenshot" ><br>

			<label for="Screenshot">Screenshot : </label><br>
			<input type="file" name="Screenshot3" id="Screenshot" ><br>
		
		
			<button type="submit" name="submit">Tambah data</button>
			
			

	</form>

</div>
	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script></html>

</body>
</html>