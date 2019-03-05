<?php  
//PERULANGAN FOR
echo "<hr>";
for ($i=0; $i < 5 ; $i++) { 
	echo "Hello cuk <br>";
}
echo "<hr>";
?>





<?php  
//PERULANGAN WHILE
$i = 0;

echo "<hr>";
while ($i < 4 ) {
	echo "Anjay kuy <br>";
$i++;
}
echo "<hr>";
?>





<?php 
//PERULANGAN DO
$i = 0;
echo "<hr>";
do {
	echo "Hay KUYYYY <br>";
	$i++;
} while ( $i <= 10);
echo "<hr>";
 ?>





<!DOCTYPE html>
<html>
<head>
	<title>Latihan</title>
	<style>
		.warna1 {
			background-color: red;
		}
		.warna2 {
			background-color: lightskyblue;
		}
		.warna3 {
			background-color: green;
		}
		.warna4 {
			background-color: yellow;
		}

	</style>
</head>
<body>
<hr>
	<table border="1" cellpadding="10" cellspacing="0">
		<?php for ($i=1; $i <= 5; $i++) : ?>
			<?php if ($i % 2 == 1) :?>
				<tr class="warna1">
			<?php else :?>
				<tr class="warna2">
			<?php endif; ?>
				<?php for ($j=1; $j <= 5; $j++) :?>
					<td><?= "$i,$j"; ?></td>
				<?php endfor; ?>
		<?php endfor; ?>

	</table>
<hr>
</body>
</html>




