<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}





require "functions.php";

$mobil = query("SELECT*FROM mobil");


// jika tombol search di klik
if (isset($_POST["search"])) {
	$mobil = search($_POST["keyword"]);
}




	



 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<style>
		.loader {
			width: 60px;
			position: absolute;
			top: 128px;
			left: 340px;
			z-index: -1;
			display: none;
		}
	</style>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/script.js"></script>
</head>
<body>
	<a href="logout.php">Logout!</a>

	<h1>Daftar mobil</h1>

	<a href="tambah.php">Tambah data mobil</a>
	<br><br>

	<form action="" method="post">
		

		<input type="text" name="keyword" size="50" autofocus="" placeholder="Masukan keyword search..." autocomplete="off" id="keyword">
		<button type="submit" name="search" id="tombolsearch">Search!</button>
		<img src="img/loader.gif" class="loader">



	</form>
	<br>
	<div id="container">
		<table border="1" cellpadding="10" cellspacing="0">
			
			<tr>
				
				<th>No.</th>
				<th>Aksi</th>
				<th>Gambarr</th>
				<th>Nama</th>
				<th>Spesifikasi</th>
				<th>harga</th>

			</tr>

			<?php $i = 1; ?>
			<?php foreach ($mobil as $row) : ?>
			<tr>
				<td><?= $i ?></td>
				<td>
					<a href="update.php?id=<?= $row["id"]; ?>">Update</a> |
					<a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda yakin akan menghapus datanya??');">Delete</a>
				</td>

				<td><img src="img/<?= $row['gambar']; ?>" width="50"></td>
				<td><?= $row["nama"] ?></td>
				<td><?= $row["spesifikasi"] ?></td>
				<td><?= $row["harga"] ?></td>
			</tr>
			<?php $i++; ?>
			<?php endforeach ; ?>

		</table>
	</div>


</body>
</html>