<?php 
// date
// Untuk menampilkan tanggal dengan format tertentu

	echo "<hr>";
	echo date("l, d M Y");echo "<br>";
	echo date("D, j, L, N, S, w, z, W, F, m, ");echo "<br>";
	echo "<hr>";

?>





<?php 
// time dan date
// UNIX Timestamp / EPOCH time
// detik yang sudahh berlalu sejak 1 januari 1970

	echo "<hr>";

	echo "1000 hari yang akan datang adalah hari "; echo date(" l, d F Y", time() + 60*60*24*1000); echo "<br>";

	echo "<hr>";

 ?>





 <?php 
// mktime
// membuat detik sendiri
// mktime(jam,menit,detik,bulan,tanggal,tahun)

 	echo "<hr>";

 	echo "Detik yang sudah berlalu dari 1970 sampai ultah saya adalah "; echo mktime(0,0,0,6,14,2001); echo "<br>";
 	echo "Ulang tahun saya pada "; echo date("l, d F Y", mktime(0,0,0,6,14,2001)); echo " (menggunnakan mktime) <br>";

 	echo "<hr>";

  ?>





<?php 
// strtotime

	echo "<hr>";

	echo "Detik yang sudah berlalu dari 1970 sampai ultah saya adalah "; echo strtotime("14 june 2001"); echo "<br>";
	echo "Ulang tahun saya pada "; echo date("l, d F Y", strtotime("14 june 2001")); echo " (menggunakan strtotime) <br>";

	echo "<hr>";

 ?>