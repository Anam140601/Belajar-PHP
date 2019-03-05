<?php 
// koneksi ke db
$conn = mysqli_connect("localhost","root","","phpdasar");

// cek apakah tombol submit pernah sitekan atau belum
if (isset($_POST["submit"])) {
	// ambil data dari tiap elemen dalam form
	$Nama = $_POST["Nama"];
	$Genre = $_POST["Genre"];
	$Tahun_Rilis = $_POST["Tahun_Rilis"];
	$Sinopsis = $_POST["Sinopsis"];
	$Season = $_POST["Season"];
	$Gambar = $_POST["Gambar"];

	// query insert data
	$query = "INSERT INTO anime 
				VALUES
			 ('','$Nama','$Genre','$Tahun_Rilis','$Sinopsis','$Season','$Gambar')
			 ";
	
	mysqli_query($conn, $query);

	// cek keberhasilan tambah data
	if (mysqli_affected_rows($conn)>0) {
		echo "Selamat, anda telah berhasil menambahkan daftar";
	} else {
		echo "maaf anda tidak dapat menambah daftar";
		echo "<br>";
		echo mysqli_error($conn);
	}



}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah data</title>
</head>
<body>
	<h1>Tambah data</h1>

	<form action="" method="post">
	
		
			<li>
				<label for="Nama">Nama : </label>
				<input type="text" name="Nama" id="Nama">
			</li><br>
			<li>
				<label for="Genre">Genre : </label>
				<input type="text" name="Genre" id="Genre">
			</li><br>
			<li>
				<label for="Tahun_Rilis">Tahun Rilis : </label>
				<input type="text" name="Tahun_Rilis" id="Tahun_Rilis">
			</li><br>
			<li>
				<label for="Sinopsis">Sinopsis : </label>
				<input type="text" name="Sinopsis" id="Sinopsis">
			</li><br>
			<li>
				<label for="Season">Season : </label>
				<input type="text" name="Season" id="Season">
			</li><br>
			<li>
				<label for="Gambar">Gambar : </label>
				<input type="text" name="Gambar" id="Gambar">
			</li><br>
			<li>
				<button type="submit" name="submit">Tambah data</button>
			</li>
			

	</form>

</body>
</html>