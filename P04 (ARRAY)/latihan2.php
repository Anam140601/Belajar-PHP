<?php 
// Pengulangan pada array

$angka = [43,54,12,56,89,90,34,65,100];


 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Latihan 2</title>
 	<style>
 		.kotak {
 			width: 50px;
 			height: 50px;
 			background-color: lightblue;
 			text-align: center;
 			line-height: 50px;
 			margin: 3px;
 			float: left;
 		}
 		.clear { clear: both; }
 	</style>
 </head>
 <body>

 	<hr>
 	<p>Perulangan menggunakan for</p>

 	<?php for ($i=0; $i < count($angka); $i++) {?>
 		<div class="kotak"><?= $angka[$i]; ?></div>
 	<?php } ?>

 	



 	<div class="clear"></div>



 	<hr>
 	<p>Perulangan menggunakan foreach menggunakan kurung kuralwal ({) diakhiri (}) </p>

 	<?php foreach ($angka as $key => $a) { ?>
 		<div class="kotak"><?= $a; ?></div>
 	<?php } ?>



 	<div class="clear"></div>



 	<hr>
 	<p>Perulangan menggunakan foreach menggunakan titik dua (:) diakhiri (endforeach;) </p>

 	<?php foreach ($angka as $key => $a) : ?>
 		<div class="kotak"><?= $a; ?></div>
 	<?php endforeach; ?>




 </body>
 </html>