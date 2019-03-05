<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}


require 'functions.php';

// ambil data di url
$id = $_GET["id"];

// query data anime berdasarkan idnya
$anim = query("SELECT*FROM anime WHERE id = $id")[0];




// cek apakah tombol submit pernah ditekan atau belum
if (isset($_POST["submit"])) {

	// cek keberhasilan wdit data
	if (update($_POST)>0) {
		echo "
			<script>
				alert('Selamat anda berhasil mengupdate data!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Maaf anda tidak dapat mengupdate data!');
				document.location.href = 'index.php';
			</script>
		";
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update data</title>
</head>
<body>
	<h1>Update data</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $anim["id"] ;?>">
		<input type="hidden" name="Gambarlama" value="<?= $anim["Gambar"] ;?>">
	
		
			<li>
				<label for="Nama">Nama : </label>
				<input type="text" name="Nama" id="Nama" required value="<?= $anim["Nama"] ;?>">
			</li><br>
			<li>
				<label for="Genre">Genre : </label>
				<input type="text" name="Genre" id="Genre" required value="<?= $anim["Genre"] ;?>">
			</li><br>
			<li>
				<label for="Tahun_Rilis">Tahun Rilis : </label>
				<input type="text" name="Tahun_Rilis" id="Tahun_Rilis" required value="<?= $anim["Tahun_Rilis"] ;?>">
			</li><br>
			<li>
				<label for="Sinopsis">Sinopsis : </label>
				<input type="text" name="Sinopsis" id="Sinopsis" required value="<?= $anim["Sinopsis"] ;?>">
			</li><br>
			<li>
				<label for="Season">Season : </label>
				<input type="text" name="Season" id="Season" required value="<?= $anim["Season"] ;?>">
			</li><br>
			<li>
				<label for="Gambar">Gambar : </label> <br>
				<img src="img/<?= $anim['Gambar']; ?>" width="100"> <br>
				<input type="file" name="Gambar" id="Gambar">
			</li><br>
			<li>
				<button type="submit" name="submit">Update data</button>
			</li>
			

	</form>

</body>
</html>