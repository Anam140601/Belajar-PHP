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

	// upload gambar
	$Gambar = upload();
	if (!$Gambar) {
		return false;
	}



	$query = "INSERT INTO anime 
				VALUES
			 ('','$Nama','$Genre','$Tahun_Rilis','$Sinopsis','$Season','$Gambar')
			 ";
	
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}




function upload() {

	$namafile = $_FILES['Gambar']['name'];
	$ukuranfile = $_FILES['Gambar']['size'];
	$error = $_FILES['Gambar']['error'];
	$tmpname = $_FILES['Gambar']['tmp_name'];


	// cek apakah ada gambar yng diupload
	if ( $error === 4) {
		echo "<script>
				alert('Loe belum pilih gambar vroh, silahkan pilih dulu!!!');
			</script>";

		return false;
	}

	// cek apakah file adalah gambar
	$ekstensigambarvalid = ['jpg','jpeg','png'];
	$ekstensigambar = explode('.', $namafile); 
	$ekstensigambar = strtolower(end($ekstensigambar));

	if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
		echo "<script>
				alert('Yang loe upload bukan gambar!!!!! yang harus diupload itu GAMBAR');
			</script>";

		return false;
	}

	// cek jika ukurannya terlalu besar
	if ($ukuranfile > 2000000) {
		echo "<script>
				alert('Ukuran gambarnya terlalu besar, pilih gambar yang kecil');
			</script>";

		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensigambar;





	move_uploaded_file($tmpname, 'img/'. $namafilebaru);

	return $namafilebaru;




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
	$Gambarlama = htmlspecialchars($data["Gambarlama"]);

	// cek apakah user pilih gambar baru / tidak

	if ($_FILES['Gambar']['error'] === 4) {
		$Gambar = $Gambarlama;
	} else {
		$Gambar = upload();
	}

	


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







function search($keyword) {
	$query = "SELECT * FROM anime
				WHERE
			Nama LIKE '%$keyword%' OR 
			Genre LIKE '%$keyword%' OR
			Tahun_Rilis LIKE '%$keyword%' OR
			Season LIKE '%$keyword%'
		
			";
	return query($query);
}


function registrasi($data){
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$email = stripcslashes($data["email"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('Username sudah ada! silahkan pilih username lain atau login!!');
			</script>";
		return false;
	}


	// cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('Password tidak sesuai vroh!! silahkan cek lagi!!!');
			</script>";
		return false;
	}


	// enkripsi / mengamankan password
	$password = password_hash($password, PASSWORD_DEFAULT);



	// tambahkan user baru ke db
	mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$email','$alasan')");

	return mysqli_affected_rows($conn);


}

















 ?>