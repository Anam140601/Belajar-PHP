<?php 
// koneksi ke database
// "hostname","username mysql","password","nama database"
$conn = mysqli_connect("localhost","root","","phpdasar");

//ambil data dari tabel anime / query data anime
$result = mysqli_query($conn, "SELECT * FROM anime");

// ambil data (fetch) animme dari objek result



	



 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

	<h1>Daftar Anime</h1>

	<table border="1" cellpadding="10" cellspacing="0">
		
		<tr>
			
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambarr</th>
			<th>Nama</th>
			<th>Genre</th>
			<th>Tahun Rilis</th>
			<th>Sinopsis</th>
			<th>Season</th>

		</tr>

		<?php $i = 1; ?>
		<?php while ($row = mysqli_fetch_assoc($result)) : ?>
		<tr>
			<td><?= $i ?></td>
			<td>
				<a href="">Edit</a> |
				<a href="">Delete</a>
			</td>

			<td><img src="img/<?= $row["Gambar"]; ?>" width="50"></td>
			<td><?= $row["Nama"] ?>/td>
			<td><?= $row["Genre"] ?></td>
			<td><?= $row["Tahun_Rilis"] ?></td>
			<td><?= $row["Sinopsis"] ?></td>
			<td><?= $row["Season"] ?></td>
		</tr>
		<?php $i++; ?>
		<?php endwhile ; ?>

	</table>

</body>
</html>