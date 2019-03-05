
<?php 

$anime = [
	[
	"nama"=>"Asobi Asobase",
	"genre"=>"Romance",
	"tahun_terbit"=>"2018",
	"season"=>"Season 1",
	"gambar"=>"asobi asobase.jpg"
	],
	[
	"genre"=>"Comady, Action",
	"tahun_terbit"=>"2010",
	"nama"=>"Gintama",
	"season"=>"Season 3",
	"gambar"=>"gintama.jpg"
	],
	[
	"nama"=>"Hanebado",
	"genre"=>"Horror",
	"tahun_terbit"=>"2015",
	"season"=>"Season 2",
	"gambar"=>"hanebado.jpg"
	],
];

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Get</title>
 </head>
 <body>
 	<h1>Daftar Anime</h1>

 	<ul>

 	<?php foreach ($anime as $key => $anim) : ?>
 		<li>
 			<a href="get2.php?nama=<?= $anim["nama"]; ?>&genre=<?= $anim["genre"] ?>&tahun_terbit=<?= $anim["tahun_terbit"] ?>&season=<?= $anim["season"] ?>&gambar=<?= $anim["gambar"] ?>"><?= $anim["nama"]; ?></a>
 		</li>
 	<?php endforeach ; ?>

 	</ul>
 </body>
 </html>