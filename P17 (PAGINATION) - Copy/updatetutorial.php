<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}


require 'functions.php';

// ambil data di url
$id = $_GET["id"];

// query data tutore berdasarkan idnya
$tutor = query("SELECT*FROM tutorial WHERE id = $id")[0];




// cek apakah tombol submit pernah ditekan atau belum
if (isset($_POST["submit"])) {

	// cek keberhasilan wdit data
	if (updatetutorial($_POST)>0) {
		echo "
			<script>
				alert('Selamat anda berhasil mengupdate data!');
				document.location.href = 'daftartutorial.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Maaf anda tidak dapat mengupdate data!');
				document.location.href = 'daftartutorial.php';
			</script>
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
	<title>Update Tutorial</title>
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
	<h1>Update Tutorial</h1>
<div class="a">
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $tutor["id"] ;?>">
		<input type="hidden" name="Gambarlama" value="<?= $tutor["Gambar"] ;?>">
	
		
			
				<label for="Judul">Judul : </label><br>
				<input type="text" name="Judul" id="Judul" required value="<?= $tutor["Judul"] ;?>"><br>
			
			
			
				<label for="Sinopsis">Sinopsis : </label><br>
				<textarea name="Sinopsis" id="Sinopsis" required cols="70" rows="10"><?= $tutor["Sinopsis"] ;?></textarea><br>
			

			
				<label for="Gambar">Gambar : </label><br> 
				<img src="img/<?= $tutor['Gambar']; ?>" width="100"><br> 
				<input type="file" name="Gambar" id="Gambar"><br><br>
			
			
				<button type="submit" name="submit">Update data</button>
			
			

	</form>


</div>

	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</body>
</html>