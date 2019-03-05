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
	if (tambah($_POST)>0) {
		echo "			<script>
				alert('Selamat anda berhasil menambahkan data!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Maaf anda tidak dapat menambahkan data!');
				document.location.href = 'index.php';			</script>
		";
		
	}

}
?>

<!DOCTYPE html>
<html><head>
	<title>Tambah data</title>
</head>
<body>
	<h1>Tambah data</h1>

	<form action="" method="post" enctype="multipart/form-data">
	
		
			<li><label for="Nama">Nama : </label>
				<input type="text" name="Nama" id="Nama" required>
			</li><br>
			<li>
				<label for="Genre">Genre : </label>
				<input type="text" name="Genre" id="Genre" required>
			</li><br>
			<li>
				<label for="Tahun_Rilis">Tahun Rilis : </label>
				<input type="text" name="Tahun_Rilis" id="Tahun_Rilis" required>			</li><br>
			<li>
				<label for="Sinopsis">Sinopsis : </label>
				<input type="text" name="Sinopsis" id="Sinopsis" required>
			</li><br>
			<li>
				<label for="Season">Season : </label>
				<input type="text" name="Season" id="Season" required>
			</li><br>
			<li><label for="Gambar">Gambar : </label>
				<input type="file" name="Gambar" id="Gambar">
			</li><br>
			<li>
				<button type="submit" name="submit">Tambah data</button>
			</li>
			

	</form>

</body>
</html>