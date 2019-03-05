<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}


require 'functions.php';

// ambil data di url
$id = $_GET["id"];

// query data geme berdasarkan idnya
$gem = query("SELECT*FROM game WHERE id = $id")[0];




// cek apakah tombol submit pernah ditekan atau belum
if (isset($_POST["submit"])) {

	// cek keberhasilan wdit data
	if (updategame($_POST)>0) {
		echo "
			<script>
				alert('Selamat anda berhasil mengupdate data!');
				document.location.href = 'daftargame.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Maaf anda tidak dapat mengupdate data!');
				document.location.href = 'daftargame.php';
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
	<title>Update data game</title>
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
	<h1>Update data game</h1>
<div class="a">
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $gem["id"] ;?>">
		<input type="hidden" name="Gambarlama" value="<?= $gem["Gambar"] ;?>">
		<input type="hidden" name="Screenshot1lama" value="<?= $gem["Screenshot1"] ;?>">
		<input type="hidden" name="Screenshot2lama" value="<?= $gem["Screenshot2"] ;?>">
		<input type="hidden" name="Screenshot3lama" value="<?= $gem["Screenshot3"] ;?>">
	
		
			
				<label for="Nama">Nama : </label><br>
				<input type="text" name="Nama" id="Nama" required value="<?= $gem["Nama"] ;?>"><br>
			
			
				<label for="Genre">Genre : </label><br>
				<input type="text" name="Genre" id="Genre" required value="<?= $gem["Genre"] ;?>"><br>
			
			
				<label for="Tahun_Rilis">Tahun Rilis : </label><br>
				<input type="text" name="Tahun_Rilis" id="Tahun_Rilis" required value="<?= $gem["Tahun_Rilis"] ;?>"><br>
			
			
				<label for="Sinopsis">Sinopsis : </label><br>
				<textarea name="Sinopsis" id="Sinopsis" required cols="70" rows="10"><?= $gem["Sinopsis"] ;?></textarea><br>

				<label>Minimum Spek : </label><br>
				<input placeholder="OS" type="text" name="OS" id="OS" required value="<?= $gem["OS"] ;?>"><br>
				<input placeholder="Processor" type="text" name="Prosesor" id="Prosesor" required value="<?= $gem["Prosesor"] ;?>"><br>
				<input placeholder="Memory" type="text" name="Ram" id="Ram" required value="<?= $gem["Ram"] ;?>"><br>
				<input placeholder="Graphics Card" type="text" name="Vga" id="Vga" required value="<?= $gem["Vga"] ;?>"><br>
				<input placeholder="DirectX" type="text" name="DirectX" id="DirectX" required value="<?= $gem["DirectX"] ;?>"><br>

				<label for="Link">Link Download : </label><br>
				<input name="Link" id="Link" required value="<?= $gem["Link"] ;?>"></input><br>

				<label for="Cara_instal">Cara Instal : </label><br>
				<textarea name="Cara_instal" id="Cara_instal" required cols="70" rows="10"><?= $gem["Cara_instal"] ;?></textarea><br>


			

			
				<label for="Gambar">Gambar : </label><br> 
				<img src="img/<?= $gem['Gambar']; ?>" width="100"><br> 
				<input type="file" name="Gambar" id="Gambar" ><br><br>

				<label for="Screenshot1">Screenshot1 : </label><br> 
				<img src="screenshot/<?= $gem['Screenshot1']; ?>" width="100"><br> 
				<input type="file" name="Screenshot1" id="Screenshot1" ><br><br>

				<label for="Screenshot2">Screenshot2 : </label><br> 
				<img src="screenshot/<?= $gem['Screenshot2']; ?>" width="100"><br> 
				<input type="file" name="Screenshot2" id="Screenshot2" ><br><br>

				<label for="Screenshot3">Screenshot3 : </label><br> 
				<img src="screenshot/<?= $gem['Screenshot3']; ?>" width="100"><br> 
				<input type="file" name="Screenshot3" id="Screenshot3" ><br><br>
			
			
				<button type="submit" name="submit">Update data</button>
			
			

	</form>


</div>

	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</body>
</html>