<?php 
usleep(1000000);
require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM mobil
				WHERE
			nama LIKE '%$keyword%' OR 
			spesifikasi LIKE '%$keyword%' OR
			harga LIKE '%$keyword%' 
			";
$mobil = query($query);


 ?>

 <table border="1" cellpadding="10" cellspacing="0">
			
			<tr>
				
				<th>No.</th>
				<th>Aksi</th>
				<th>Gambarr</th>
				<th>Nama</th>
				<th>Spesifikasi</th>
				<th>Harga</th>

			</tr>

			<?php $i = 1; ?>
			<?php foreach ($mobil as $row) : ?>
			<tr>
				<td><?= $i ?></td>
				<td>
					<a href="update.php?id=<?= $row["id"]; ?>">Update</a> |
					<a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda yakin akan menghapus datanya??');">Delete</a>
				</td>

				<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
				<td><?= $row["nama"] ?></td>
				<td><?= $row["spesifikasi"] ?></td>
				<td><?= $row["harga"] ?></td>
			</tr>
			<?php $i++; ?>
			<?php endforeach ; ?>

		</table>