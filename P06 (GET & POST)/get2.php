<?php 
// cek apakah tidak ada data dari $_GET

if ( !isset($_GET["nama"]) || 
	!isset($_GET["genre"]) ||
	!isset($_GET["tahun_terbit"]) ||
	!isset($_GET["season"]) ||
	!isset($_GET["gambar"])) {
	// redirect
	header("Location: latihan2.php");
	exit;
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Detail Anime</title>
</head>
<body>

	<ul>
		<img src="img/<?= $_GET["gambar"]; ?>">
		<li>Nama 			: 	<?= $_GET["nama"]; ?></li>
		<li>Genre 			: 	<?= $_GET["genre"]; ?></li>
		<li>Tahun terbit 	: 	<?= $_GET["tahun_terbit"]; ?></li>
		<li>Season 			: 	<?= $_GET["season"]; ?></li>
	</ul>

	<a href="get1.php">Kembali ke menu utama</a>

</body>
</html>