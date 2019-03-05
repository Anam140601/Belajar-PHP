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
	
		
			<li><label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required>
			</li><br>
			<li>
				<label for="spesifikasi">pesifikasi : </label>
				<input type="text" name="spesifikasi" id="spesifikasi" required>
			</li><br>
			<li>
				<label for="harga">Harga : </label>
				<input type="text" name="harga" id="harga" required>			</li><br>
			<li><label for="gambar">Gambar : </label>
				<input type="file" name="gambar" id="gambar">
			</li><br>
			<li>
				<button type="submit" name="submit">Tambah data</button>
			</li>
			

	</form>

</body>
</html>