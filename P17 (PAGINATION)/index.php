<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}





require "functions.php";


// paginations
// konfigurasi
$jumlahdataperhalaman = 4;
$jumlahdata = count(query("SELECT * FROM anime"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;



$anime = query("SELECT*FROM anime LIMIT $awaldata, $jumlahdataperhalaman");


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
	<a href="logout.php">Logout!</a>

	<h1>Daftar Anime</h1>

	<a href="tambah.php">Tambah data anime</a>
	<br><br>

	<form action="" method="post">
		
		<input type="text" name="keyword" size="50" autofocus="" placeholder="Masukan keyword search..." autocomplete="off">
		<button type="submit" name="search">Search!</button>

	</form>
	<br>
	<br>

	<!-- navigasi -->

	<?php if (isset($_POST["search"])): ?>
			<?php $halamanaktif=0 ?>

	<?php else: ?>	
			<?php if ($halamanaktif > 1) : ?>
			<a href="?halaman=<?= $halamanaktif - 1; ?>">&laquo;</a>
			<?php endif; ?>


			<?php for ($i=1; $i <= $jumlahhalaman ; $i++) : ?>
				<?php if ($i == $halamanaktif ) : ?>
					<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: green; font-size: 150%;"><?= $i; ?></a>
				<?php else : ?>
					<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
				<?php endif ; ?>
			<?php endfor ; ?>



			<?php if ($halamanaktif < $jumlahhalaman) : ?>
				<a href="?halaman=<?= $halamanaktif + 1; ?>">&raquo;</a>
			<?php endif; ?>

	<?php endif ?>
		




	<br>
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