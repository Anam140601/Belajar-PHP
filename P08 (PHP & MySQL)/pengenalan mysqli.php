<?php 
// koneksi ke database
// "hostname","username mysql","password","nama database"
$conn = mysqli_connect("localhost","root","","phpdasar");

//ambil data dari tabel anime / query data anime
$result = mysqli_query($conn, "SELECT * FROM anime");

// ambil data (fetch) animme dari objek result
	
	echo "<hr>";
	// mysqli_fetch_row // mengembalikan array numerik
	$anim = mysqli_fetch_row($result);
	var_dump($anim[3]); echo "<br>";
	var_dump($anim);
	echo "<hr>";


	echo "<hr>";
	// mysqli_fetch_assoc // mengembalikan array associative
	$anim = mysqli_fetch_assoc($result);
	var_dump($anim); echo "<br>";
	var_dump($anim["Sinopsis"]);
	echo "<hr>";


	echo "<hr>";
	// mysqli_fetch_array // mengembalikan array associativ dan numerik
	$anim = mysqli_fetch_array($result);
	var_dump($anim); echo "<br>";
	var_dump($anim["Sinopsis"]); echo "<br>";
	var_dump($anim[4]);
	echo "<hr>";


	echo "<hr>";
	// mysqli_fetch_object // mengembalikan array dengan object
	$anim = mysqli_fetch_assoc($result);
	var_dump($anim); echo "<br>";
	var_dump($anim->id);
	echo "<hr>";


	echo "<hr>";
	// mysqli_fetch_assoc // mengembalikan array associative semua data
	while ($anim = mysqli_fetch_assoc($result)) {
		var_dump($anim);
	}
	echo "<hr>";



 ?>