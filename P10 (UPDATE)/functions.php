<?php

$conn = mysqli_connect("localhost","root","","phpdasar");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;

	$Nama = htmlspecialchars($data["Nama"]);
	$Genre = htmlspecialchars($data["Genre"]);
	$Tahun_Rilis = htmlspecialchars($data["Tahun_Rilis"]);
	$Sinopsis = htmlspecialchars($data["Sinopsis"]);
	$Season = htmlspecialchars($data["Season"]);
	$Gambar = htmlspecialchars($data["Gambar"]);



	$query = "INSERT INTO anime 
				VALUES
			 ('','$Nama','$Genre','$Tahun_Rilis','$Sinopsis','$Season','$Gambar')
			 ";
	
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


function delete($id){
	global $conn;

	mysqli_query($conn,"DELETE FROM anime WHERE id = $id");

	return mysqli_affected_rows($conn);
}


function update($data){

	global $conn;

	$id = $data["id"];

	$Nama = htmlspecialchars($data["Nama"]);
	$Genre = htmlspecialchars($data["Genre"]);
	$Tahun_Rilis = htmlspecialchars($data["Tahun_Rilis"]);
	$Sinopsis = htmlspecialchars($data["Sinopsis"]);
	$Season = htmlspecialchars($data["Season"]);
	$Gambar = htmlspecialchars($data["Gambar"]);



	$query = "UPDATE anime SET
				Nama = '$Nama',
				Genre = '$Genre',
				Tahun_Rilis = '$Tahun_Rilis',
				Sinopsis = '$Sinopsis',
				Season = '$Season',
				Gambar = '$Gambar'

			WHERE id = $id
			";
	
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);


}

















 ?>