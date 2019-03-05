<?php 
// Variabel Scope
// Lingkup variabel

echo "<hr>";

$x = 10;

function tampilx() {
	global $x;
	echo $x;
}


tampilx(); echo "<br>";

echo "<hr>";

 ?>






 <?php 
// SUPERGLOBAL
// Variabel global milik PHP
// Merupakan array associative

echo "<hr>";

$_GET["nama_toko"] = "Anigato";
$_GET["etalase_toko"] = "Banyak";



var_dump($_GET);

echo "<hr>";


  ?>




