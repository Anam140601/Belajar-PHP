<?php

$conn = mysqli_connect("localhost","root","","anigato_rentals");


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

	$nama = htmlspecialchars($data["nama"]);
	$spesifikasi = htmlspecialchars($data["spesifikasi"]);
	$harga = htmlspecialchars($data["harga"]);

	// upload gambar
	$gambar = upload();
	if (!$gambar) {
		return false;
	}



	$query = "INSERT INTO mobil 
				VALUES
			 ('','$nama','$spesifikasi','$harga','$gambar')
			 ";
	
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}




function upload() {

	$namafile = $_FILES['gambar']['name'];
	$ukuranfile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpname = $_FILES['gambar']['tmp_name'];


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
				alert('Yang loe upload bukan gambar!!!!! yang harus diupload itu gambar');
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

	mysqli_query($conn,"DELETE FROM mobil WHERE id = $id");

	return mysqli_affected_rows($conn);
}


function update($data){

	global $conn;

	$id = $data["id"];

	$nama = htmlspecialchars($data["nama"]);
	$spesifikasi = htmlspecialchars($data["spesifikasi"]);
	$harga = htmlspecialchars($data["harga"]);
	$Gambarlama = htmlspecialchars($data["Gambarlama"]);

	// cek apakah user pilih gambar baru / tidak

	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $Gambarlama;
	} else {
		$gambar = upload();
	}

	


	$query = "UPDATE mobil SET
				nama = '$nama',
				spesifikasi = '$spesifikasi',
				harga = '$harga',
				gambar = '$gambar'

			WHERE id = $id
			";
	
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);


}







function search($keyword) {
	$query = "SELECT * FROM mobil
				WHERE
			nama LIKE '%$keyword%' OR 
			spesifikasi LIKE '%$keyword%' OR
			harga LIKE '%$keyword%' 
		
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
	mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$email')");

	return mysqli_affected_rows($conn);


}

















 ?>