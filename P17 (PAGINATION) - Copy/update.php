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
				document.location.href = 'daftaranime.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Maaf anda tidak dapat mengupdate data!');
				document.location.href = 'daftaranime.php';
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
	<title>Update Data Anime</title>
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
	<h1>Update Data Anime</h1>
	<div class="a">
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?= $anim["id"] ;?>">
			<input type="hidden" name="Gambarlama" value="<?= $anim["Gambar"] ;?>">
		
			
				<ul>
					<label for="Nama">Nama : </label><br>
					<input type="text" name="Nama" id="Nama" required value="<?= $anim["Nama"] ;?>"><br>
				
					<label for="Genre">Genre : </label><br>
					<input type="text" name="Genre" id="Genre" required value="<?= $anim["Genre"] ;?>"><br>
				
					<label for="Tahun_Rilis">Tahun Rilis : </label><br>
					<input type="text" name="Tahun_Rilis" id="Tahun_Rilis" required value="<?= $anim["Tahun_Rilis"] ;?>"><br>
				
					<label for="Sinopsis">Sinopsis : </label><br>
					<textarea name="Sinopsis" id="Sinopsis" required cols="70" rows="10"><?= $anim["Sinopsis"] ;?></textarea><br>
				
					<label for="Season">Season : </label><br>
					<input type="text" name="Season" id="Season" required value="<?= $anim["Season"] ;?>"><br>

					<label for="Studio">Studio : </label><br>
					<input type="text" name="Studio" id="Studio" required value="<?= $anim["Studio"] ;?>"><br>

					<label for="Penerjemah">Penerjemah : </label><br>
					<input type="text" name="Penerjemah" id="Penerjemah" required value="<?= $anim["Penerjemah"] ;?>"><br>

					<label for="Lirik">Lirik : </label><br>
					<input type="text" name="Lirik" id="Lirik" required value="<?= $anim["Lirik"] ;?>"><br>

					<label for="Encoder">Encoder : </label><br>
					<input type="text" name="Encoder" id="Encoder" required value="<?= $anim["Encoder"] ;?>"><br>

					<label for="Uploader">Uploader : </label><br>
					<input type="text" name="Uploader" id="Uploader" required value="<?= $anim["Uploader"] ;?>"><br>
				
					<label for="Gambar">Gambar : </label> <br>
					<img src="img/<?= $anim['Gambar']; ?>" width="100"><br>
					<input type="file" name="Gambar" id="Gambar"><br>

					<label>Link Download : </label><br>
						<label>GD_360 : </label>
						<input type="text" name="GD_360" id="GD_360" required value="<?= $anim["GD_360"] ;?>"><br>
						<label>GD_480 : </label>
						<input type="text" name="GD_480" id="GD_480" required value="<?= $anim["GD_480"] ;?>"><br>
						<label>GD_720 : </label>
						<input type="text" name="GD_720" id="GD_720" required value="<?= $anim["GD_720"] ;?>"><br>
						<label>GD_1080 : </label>
						<input type="text" name="GD_1080" id="GD_1080" required value="<?= $anim["GD_1080"] ;?>"><br>
						<label>ZS_360 : </label>
						<input type="text" name="ZS_360" id="ZS_360" required value="<?= $anim["ZS_360"] ;?>"><br>
						<label>ZS_480 : </label>
						<input type="text" name="ZS_480" id="ZS_480" required value="<?= $anim["ZS_480"] ;?>"><br>
						<label>ZS_720 : </label>
						<input type="text" name="ZS_720" id="ZS_720" required value="<?= $anim["ZS_720"] ;?>"><br>
						<label>ZS_1080 : </label>
						<input type="text" name="ZS_1080" id="ZS_1080" required value="<?= $anim["ZS_1080"] ;?>"><br>
				
					<button type="submit" name="submit">Update</button>
				</ul>
				

		</form>
	</div>
	
	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>