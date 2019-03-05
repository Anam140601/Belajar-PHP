<?php 

	function salam() {
		return "Selamat datang, Admin!";
	}
	function salam1($nama = "admin") {
		return "Selamat datang, $nama!";
	}
	function salam2($waktu = "Datang", $nama = "admin") {
		return "Selamat $waktu, $nama!";
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Latihan Function</title>
 </head>
 <body>
 	<h1><?= salam(); ?></h1>
 	<h1><?= salam1("Anigato"); ?></h1>
 	<h1><?= salam2("Malam","Anigato"); ?></h1>
 	<h1><?= salam2(); ?></h1>
 </body>
 </html>