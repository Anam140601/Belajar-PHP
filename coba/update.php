<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}


require 'functions.php';

// ambil data di url
$id = $_GET["id"];

// query data mobil berdasarkan idnya
$car = query("SELECT*FROM mobil WHERE id = $id")[0];




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
		<input type="hidden" name="id" value="<?= $car["id"] ;?>">
		<input type="hidden" name="Gambarlama" value="<?= $car["gambar"] ;?>">
	
		
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required value="<?= $car["nama"] ;?>">
			</li><br>
			<li>
				<label for="spesifikasi">Spesifikasi : </label>
				<input type="text" name="spesifikasi" id="spesifikasi" required value="<?= $car["spesifikasi"] ;?>">
			</li><br>
			<li>
				<label for="harga">Harga : </label>
				<input type="text" name="harga" id="harga" required value="<?= $car["harga"] ;?>">
			</li><br>
			<li>
				<label for="gambar">Gambar : </label> <br>
				<img src="img/<?= $car['gambar']; ?>" width="100"> <br>
				<input type="file" name="gambar" id="gambar">
			</li><br>
			<li>
				<button type="submit" name="submit">Update data</button>
			</li>
			

	</form>

</body>
</html>