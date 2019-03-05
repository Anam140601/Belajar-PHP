<?php 
/*
PENULISAN SINTAKS PHP
1. penulisan php didalam html
2. penulisan html didalam php
*/
$nama1 = "Kuy";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Belajar PHP</title>
</head>
<body>
<hr>
	<?php //1. Belajar PHP didalam HTML ?>
	<h1>Halo,<?php echo "Kuy"; ?> Selamat Datang. Ini penulisan php didalam html</h1>
	<p><?php echo "Ini Paragraf php didalam html"; ?></p>

	<?php //2. Belajar HTML di dlam PHP
		echo "<h1>Halo, kuy selamat datang. Ini penulisan html didalam php</h1>";
		echo "<p>Ini paragraf html didalam php</p>";
	?>
	<hr>
</body>
</html>





<?php 
//VARIABEL DAN TYPE DATA
// Variabel (tidak boleh diawali dengan angka, tapi boleh mengandung angka)

$nama1 = "Kuy";
$nama2 = "ANIGATO";
$perintah1 = "Variabel";

echo "<hr>";
echo "ini variabel dan tipe data <br>";
echo "Hallo $nama1, selamat datang diwebsite $nama2 Ini penulisan menggunakan $perintah1";

echo "<hr>";
 ?>





 <?php 
//OPERATOR
//Aritmatika (+ - * / %)
echo "<hr>";
$x = 10;
$y = 20;
echo "ini operator <br>";
echo $x * $y;
echo "<hr>";
  ?>





<?php 
//PENGGABUNGAN STRING / CONCATENATION / CONCAT
// .
echo "<hr>";
$nama_depan = "Khoerul";
$nama_belakang = "Anam";

echo "ini Penggabungan string <br>";
echo $nama_depan ." ". $nama_belakang;
echo "<hr>";
 ?>





 <?php 
//ASSIGMENT
// = += -= /= %= .=

$x = 1;
$x += 5;

$nama = "Khoerul";
$nama .= " ";
$nama .= "Anam";

echo "<hr>";
echo "Ini ASSIGMENT <br>";;
echo $x;
echo "<br>";
echo $nama;

echo "<hr>";

  ?>





<?php 
//PERBANDINGAN
//< > <= >= == !=
echo "<hr>";
echo "ini perbandiingan <br>";
var_dump(1 < 5);
var_dump(1 > 5);
var_dump(1 == "1");

echo "<hr>";

 ?>





<?php 
//Identitas
//=== !==

echo "<hr>";
echo "ini identitas <br>";

var_dump(1 === "1");
var_dump(1 !== "1");

echo "<hr>";

 ?>





 <?php 
//LOGIKA
// && || !
$x = 10;
echo "<hr>";
echo "ini logika <br>";

var_dump($x < 20 && $x % 2 == 0);
var_dump($x < 20 && $x % 2 != 0);
var_dump($x < 20 || $x % 2 != 0);

echo "<hr>";

  ?>