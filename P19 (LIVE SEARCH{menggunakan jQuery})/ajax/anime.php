<?php 
usleep(1000000);
require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM anime
				WHERE
			Nama LIKE '%$keyword%' OR 
			Genre LIKE '%$keyword%' OR
			Tahun_Rilis LIKE '%$keyword%' OR
			Season LIKE '%$keyword%'
		
			";
$anime = query($query);


 ?>

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