<?php
// Array numerik
// index nya sebuah angka
$mahasiswa = [
	["Khoerul Anam","473950939","IT","Khoerulanam140601@gmail.com"],
	["Anigato","4635447","IT","Anigato.net"],
	["Sckater","5674745","IT","Sckater.com"]
];

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
	<li>Nama	:	<?= $mhs[0] ?></li>
	<li>NRP 	:	<?= $mhs[1] ?></li>
	<li>Jurusan	:	<?= $mhs[2] ?></li>
	<li>Email	:	<?= $mhs[3] ?></li>
</ul>
<?php endforeach; ?>
<hr>




</body>
</html>