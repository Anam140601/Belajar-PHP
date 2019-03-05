<?php
// Array Assiciative
// Key nya adalah string yang dibuat sendiri
$mahasiswa = [
	[
	"Nama"=>"Khoerul Anam",
	"NRP"=>"473950939",
	"Jurusan"=>"IT",
	"Email"=>"Khoerulanam140601@gmail.com",
	"Gambar"=>"island.jpg"
	],
	[
	"NRP"=>"465567554",
	"Jurusan"=>"TI",
	"Nama"=>"Anigato",
	"Email"=>"Anigato.net",
	"Gambar"=>"snk 3.jpg"
	],
];

// echo $mahasiswa[1]["Nilai"][1]; echo "<br>";

?>


<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasisswa</title>
</head>
<body>


<hr>
<h1>Daftar Mahasiswa</h1>
<?php foreach ($mahasiswa as $key => $mhs) : ?>
<ul>
	<li>
		<img src="img/<?= $mhs["Gambar"]; ?>">
	</li>
	<li>Nama	:	<?= $mhs["Nama"] ?></li>
	<li>NRP 	:	<?= $mhs["NRP"] ?></li>
	<li>Jurusan	:	<?= $mhs["Jurusan"] ?></li>
	<li>Email	:	<?= $mhs["Email"] ?></li>
</ul>
<?php endforeach; ?>
<hr>




</body>
</html>