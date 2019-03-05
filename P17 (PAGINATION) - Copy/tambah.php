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
				document.location.href = 'daftaranime.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Maaf anda tidak dapat menambahkan data!');
				document.location.href = 'daftaranime.php';			</script>
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
	<title>Tambah Data Anime</title>
	<style>
		
		.tengah {
			text-align: center;
			margin-top: 5%;
		}
	</style>
</head>
<body>
	

<table border="0" class="tengah">
	<h1>Tambah Data Anime</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<td class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<label for="Nama">Nama : </label><br>
				<input type="text" name="Nama" id="Nama" required><br>
			
			
				<label for="Genre">Genre : </label><br>
				<input type="text" name="Genre" id="Genre" required><br>
			
			
				<label for="Tahun_Rilis">Tahun Rilis : </label><br>
				<input type="text" name="Tahun_Rilis" id="Tahun_Rilis" required><br>

				<label for="Season">Season : </label><br>
				<input type="text" name="Season" id="Season" required><br>

				<label for="Studio">Studio : </label><br>
				<input type="text" name="Studio" id="Studio" required><br>

				<label for="Penerjemah">Penerjemah : </label><br>
				<input type="text" name="Penerjemah" id="Penerjemah" required><br>

				<label for="Lirik">Lirik : </label><br>
				<input type="text" name="Lirik" id="Lirik" required><br>
			</td>
			<td class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<label for="Sinopsis">Sinopsis : </label><br>
				<textarea name="Sinopsis" id="Sinopsis" required cols="50" rows="10"></textarea><br><br><br><br>

				<button type="submit" name="submit">Tambah data</button>
			</td>
			<td class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<label for="Encoder">Encoder : </label><br>
				<input type="text" name="Encoder" id="Encoder" required><br>

				<label for="Uploader">Uploader : </label><br>
				<input type="text" name="Uploader" id="Uploader" required><br>
			
				<label for="Gambar">Gambar : </label><br>
				<input type="file" name="Gambar" id="Gambar"><br>

				<label>Link Download : </label><br>
				<input placeholder="GD_360" type="text" name="GD_360" id="GD_360" required><br>
				<input placeholder="GD_480" type="text" name="GD_480" id="GD_480" required><br>
				<input placeholder="GD_720" type="text" name="GD_720" id="GD_720" required><br>
				<input placeholder="GD_1080" type="text" name="GD_1080" id="GD_1080" required><br>
				<input placeholder="ZS_360" type="text" name="ZS_360" id="ZS_360" required><br>
				<input placeholder="ZS_480" type="text" name="ZS_480" id="ZS_480" required><br>
				<input placeholder="ZS_720" type="text" name="ZS_720" id="ZS_720" required><br>
				<input placeholder="ZS_1080" type="text" name="ZS_1080" id="ZS_1080" required><br>
			</td>


</table>
	
							
			
				

			
			
				

				

			
			
				
			
			

	</form>
</div>

	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script></html>

</body>
</html>