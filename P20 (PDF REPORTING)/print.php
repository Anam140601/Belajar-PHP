<?php 

require_once __DIR__ . '/vendor/autoload.php';

require "functions.php";
$anime = query("SELECT*FROM anime");


$mpdf =  new \Mpdf\Mpdf();

$html = '
<!DOCTYPE html>
 <html>
 <head>
 	<title>Daftar Anime</title>
 	<link rel="stylesheet" href="css/print.css">
 </head>
 <body>
 	<h1>Daftar Anime</h1>

 	<table border="1" cellpadding="10" cellspacing="0">
			
			<tr>
				
				<th>No.</th>
				<th>Gambar</th>
				<th>Nama</th>
				<th>Genre</th>
				<th>Tahun Rilis</th>
				<th>Sinopsis</th>
				<th>Season</th>

			</tr>';

		$i = 1;
		foreach ($anime as $row ) {
			$html .= '
			<tr>
				<td>'. $i++ .'</td>
				<td><img src="img/'. $row["Gambar"] .' " width="50"></td>
				<td>'. $row["Nama"] .'</td>
				<td>'. $row["Genre"] .'</td>
				<td>'. $row["Tahun_Rilis"] .'</td>
				<td>'. $row["Sinopsis"] .'</td>
				<td>'. $row["Season"] .'</td>
			</tr>';
		}


$html .=' 
	</table>
 </body>
 </html>
';
$mpdf->WriteHTML($html);
$mpdf->Output('Daftar_Anime.pdf', 'D');





 ?>
