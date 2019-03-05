<?php 

require "functions.php";

$anime = query("SELECT*FROM anime ORDER BY id DESC");


// jika tombol search di klik
if (isset($_POST["search"])) {
	$anime = search($_POST["keyword"]);
}



	



 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

	<h1>Daftar Anime</h1>

	<a href="tambah.php">Tambah data anime</a>
	<br><br>

	<form action="" method="post">
		
		<input type="text" name="keyword" size="50" autofocus="" placeholder="Masukan keyword search..." autocomplete="off">
		<button type="submit" name="search">Search!</button>

	</form>
	<br>
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
		<?php foreach ($anime as $row) : ?>
		<tr>
			<td><?= $i ?></td>
			<td>
				<a href="update.php?id=<?= $row["id"]; ?>">Update</a> |
				<a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda yakin akan menghapus datanya??');">Delete</a>
			</td>

			<td><img src="img/<?= $row["Gambar"]; ?>" width="50"></td>
			<td><?= $row["Nama"] ?></td>
			<td><?= $row["Genre"] ?></td>
			<td><?= $row["Tahun_Rilis"] ?></td>
			<td><?= $row["Sinopsis"] ?></td>
			<td><?= $row["Season"] ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach ; ?>

	</table>

</body>
</html>