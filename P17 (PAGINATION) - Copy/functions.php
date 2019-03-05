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

function query1($query1) {
	global $conn;
	$result1 = mysqli_query($conn, $query1);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result1)) {
		$rows[] = $row;
	}
	return $rows;
}

function query2($query2) {
	global $conn;
	$result2 = mysqli_query($conn, $query2);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result2)) {
		$rows[] = $row;
	}
	return $rows;
}




function tambah($data) {
	global $conn;

	// ANIME

	$Nama = htmlspecialchars($data["Nama"]);
	$Genre = htmlspecialchars($data["Genre"]);
	$Tahun_Rilis = htmlspecialchars($data["Tahun_Rilis"]);
	$Sinopsis = htmlspecialchars($data["Sinopsis"]);
	$Season = htmlspecialchars($data["Season"]);
	$Studio = htmlspecialchars($data["Studio"]);
	$Penerjemah = htmlspecialchars($data["Penerjemah"]);
	$Lirik = htmlspecialchars($data["Lirik"]);
	$Encoder = htmlspecialchars($data["Encoder"]);
	$Uploader = htmlspecialchars($data["Uploader"]);
	$GD_360 = htmlspecialchars($data["GD_360"]);
	$GD_480 = htmlspecialchars($data["GD_480"]);
	$GD_720 = htmlspecialchars($data["GD_720"]);
	$GD_1080 = htmlspecialchars($data["GD_1080"]);
	$ZS_360 = htmlspecialchars($data["ZS_360"]);
	$ZS_480 = htmlspecialchars($data["ZS_480"]);
	$ZS_720 = htmlspecialchars($data["ZS_720"]);
	$ZS_1080 = htmlspecialchars($data["ZS_1080"]);


	// upload gambar
	$Gambar = upload();
	if (!$Gambar) {
		return false;
	}



	$query = "INSERT INTO anime 
				VALUES
			 ('','$Nama','$Genre','$Tahun_Rilis','$Sinopsis','$Season','$Gambar','$Studio','$Penerjemah','$Lirik','$Encoder','$Uploader','$GD_360','$GD_480','$GD_720','$GD_1080','$ZS_360','$ZS_480','$ZS_720','$ZS_1080')
			 ";
	
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function tambahgame($data){
	global $conn;

	// GAME

	$Nama = htmlspecialchars($data["Nama"]);
	$Genre = htmlspecialchars($data["Genre"]);
	$Tahun_Rilis = htmlspecialchars($data["Tahun_Rilis"]);
	$Sinopsis = htmlspecialchars($data["Sinopsis"]);
	$Link = htmlspecialchars($data["Link"]);
	$Cara_instal = htmlspecialchars($data["Cara_instal"]);
	$OS = htmlspecialchars($data["OS"]);
	$Prosesor = htmlspecialchars($data["Prosesor"]);
	$Ram = htmlspecialchars($data["Ram"]);
	$Vga = htmlspecialchars($data["Vga"]);
	$DirectX = htmlspecialchars($data["DirectX"]);
	

	// upload gambar
	$Gambar = upload();
	if (!$Gambar) {
		return false;
	}
	$Screenshot1 = upload1();
	if (!$Screenshot1) {
		return false;
	}
	$Screenshot2 = upload2();
	if (!$Screenshot2) {
		return false;
	}
	$Screenshot3 = upload3();
	if (!$Screenshot3) {
		return false;
	}



	$query = "INSERT INTO game 
				VALUES
			 ('','$Nama','$Genre','$Tahun_Rilis','$Sinopsis','$Gambar','$Screenshot1','$Screenshot2','$Screenshot3','$Link','$Cara_instal','$OS','$Prosesor','$Ram','$Vga','$DirectX')
			 ";
	
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambahtutorial($data){
	global $conn;

	// GAME

	$Judul = htmlspecialchars($data["Judul"]);
	$Sinopsis = htmlspecialchars($data["Sinopsis"]);
	

	// upload gambar
	$Gambar = upload();
	if (!$Gambar) {
		return false;
	}



	$query = "INSERT INTO tutorial 
				VALUES
			 ('','$Judul','$Sinopsis','$Gambar')
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
function upload1() {

	$namafile = $_FILES['Screenshot1']['name'];
	$ukuranfile = $_FILES['Screenshot1']['size'];
	$error = $_FILES['Screenshot1']['error'];
	$tmpname = $_FILES['Screenshot1']['tmp_name'];


	// cek apakah ada Screenshot1 yng diupload
	if ( $error === 4) {
		echo "<script>
				alert('Loe belum pilih Screenshot1 vroh, silahkan pilih dulu!!!');
			</script>";

		return false;
	}

	// cek apakah file adalah Screenshot1
	$ekstensiScreenshot1valid = ['jpg','jpeg','png'];
	$ekstensiScreenshot1 = explode('.', $namafile); 
	$ekstensiScreenshot1 = strtolower(end($ekstensiScreenshot1));

	if (!in_array($ekstensiScreenshot1, $ekstensiScreenshot1valid)) {
		echo "<script>
				alert('Yang loe upload bukan Screenshot1!!!!! yang harus diupload itu Screenshot1');
			</script>";

		return false;
	}

	// cek jika ukurannya terlalu besar
	if ($ukuranfile > 2000000) {
		echo "<script>
				alert('Ukuran Screenshot1nya terlalu besar, pilih Screenshot1 yang kecil');
			</script>";

		return false;
	}

	// lolos pengecekan, Screenshot1 siap diupload
	// generate nama Screenshot1 baru
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensiScreenshot1;





	move_uploaded_file($tmpname, 'screenshot/'. $namafilebaru);

	return $namafilebaru;




}
function upload2() {

	$namafile = $_FILES['Screenshot2']['name'];
	$ukuranfile = $_FILES['Screenshot2']['size'];
	$error = $_FILES['Screenshot2']['error'];
	$tmpname = $_FILES['Screenshot2']['tmp_name'];


	// cek apakah ada Screenshot2 yng diupload
	if ( $error === 4) {
		echo "<script>
				alert('Loe belum pilih Screenshot2 vroh, silahkan pilih dulu!!!');
			</script>";

		return false;
	}

	// cek apakah file adalah Screenshot2
	$ekstensiScreenshot2valid = ['jpg','jpeg','png'];
	$ekstensiScreenshot2 = explode('.', $namafile); 
	$ekstensiScreenshot2 = strtolower(end($ekstensiScreenshot2));

	if (!in_array($ekstensiScreenshot2, $ekstensiScreenshot2valid)) {
		echo "<script>
				alert('Yang loe upload bukan Screenshot2!!!!! yang harus diupload itu Screenshot2');
			</script>";

		return false;
	}

	// cek jika ukurannya terlalu besar
	if ($ukuranfile > 2000000) {
		echo "<script>
				alert('Ukuran Screenshot2nya terlalu besar, pilih Screenshot2 yang kecil');
			</script>";

		return false;
	}

	// lolos pengecekan, Screenshot2 siap diupload
	// generate nama Screenshot2 baru
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensiScreenshot2;





	move_uploaded_file($tmpname, 'screenshot/'. $namafilebaru);

	return $namafilebaru;




}
function upload3() {

	$namafile = $_FILES['Screenshot3']['name'];
	$ukuranfile = $_FILES['Screenshot3']['size'];
	$error = $_FILES['Screenshot3']['error'];
	$tmpname = $_FILES['Screenshot3']['tmp_name'];


	// cek apakah ada Screenshot3 yng diupload
	if ( $error === 4) {
		echo "<script>
				alert('Loe belum pilih Screenshot3 vroh, silahkan pilih dulu!!!');
			</script>";

		return false;
	}

	// cek apakah file adalah Screenshot3
	$ekstensiScreenshot3valid = ['jpg','jpeg','png'];
	$ekstensiScreenshot3 = explode('.', $namafile); 
	$ekstensiScreenshot3 = strtolower(end($ekstensiScreenshot3));

	if (!in_array($ekstensiScreenshot3, $ekstensiScreenshot3valid)) {
		echo "<script>
				alert('Yang loe upload bukan Screenshot3!!!!! yang harus diupload itu Screenshot3');
			</script>";

		return false;
	}

	// cek jika ukurannya terlalu besar
	if ($ukuranfile > 2000000) {
		echo "<script>
				alert('Ukuran Screenshot3nya terlalu besar, pilih Screenshot3 yang kecil');
			</script>";

		return false;
	}

	// lolos pengecekan, Screenshot3 siap diupload
	// generate nama Screenshot3 baru
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensiScreenshot3;





	move_uploaded_file($tmpname, 'screenshot/'. $namafilebaru);

	return $namafilebaru;




}








function delete($id){
	global $conn;


	// ANIME
	mysqli_query($conn,"DELETE FROM anime WHERE id = $id");

	return mysqli_affected_rows($conn);


	
}
function deletegame($id){
	global $conn;
	// GAME
	mysqli_query($conn,"DELETE FROM game WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function deletetutorial($id){
	global $conn;
	// GAME
	mysqli_query($conn,"DELETE FROM tutorial WHERE id = $id");

	return mysqli_affected_rows($conn);
}





function update($data){

	global $conn;


	// ANIME

	$id = $data["id"];

	$Nama = htmlspecialchars($data["Nama"]);
	$Genre = htmlspecialchars($data["Genre"]);
	$Tahun_Rilis = htmlspecialchars($data["Tahun_Rilis"]);
	$Sinopsis = htmlspecialchars($data["Sinopsis"]);
	$Season = htmlspecialchars($data["Season"]);
	$Gambarlama = htmlspecialchars($data["Gambarlama"]);
	$Studio = htmlspecialchars($data["Studio"]);
	$Penerjemah = htmlspecialchars($data["Penerjemah"]);
	$Lirik = htmlspecialchars($data["Lirik"]);
	$Encoder = htmlspecialchars($data["Encoder"]);
	$Uploader = htmlspecialchars($data["Uploader"]);
	$GD_360 = htmlspecialchars($data["GD_360"]);
	$GD_480 = htmlspecialchars($data["GD_480"]);
	$GD_720 = htmlspecialchars($data["GD_720"]);
	$GD_1080 = htmlspecialchars($data["GD_1080"]);
	$ZS_360 = htmlspecialchars($data["ZS_360"]);
	$ZS_480 = htmlspecialchars($data["ZS_480"]);
	$ZS_720 = htmlspecialchars($data["ZS_720"]);
	$ZS_1080 = htmlspecialchars($data["ZS_1080"]);

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
				Gambar = '$Gambar',
				Studio = '$Studio',
				Penerjemah = '$Penerjemah',
				Lirik = '$Lirik',
				Encoder = '$Encoder',
				Uploader = '$Uploader',
				GD_360 = '$GD_360',
				GD_480 = '$GD_480',
				GD_720 = '$GD_720',
				GD_1080 = '$GD_1080',
				ZS_360 = '$ZS_360',
				ZS_480 = '$ZS_480',
				ZS_720 = '$ZS_720',
				ZS_1080 = '$ZS_1080'

			WHERE id = $id
			";
	
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);


	



}

function updategame($data){

	global $conn;
	// GAME

	$id = $data["id"];

	$Nama = htmlspecialchars($data["Nama"]);
	$Genre = htmlspecialchars($data["Genre"]);
	$Tahun_Rilis = htmlspecialchars($data["Tahun_Rilis"]);
	$Sinopsis = htmlspecialchars($data["Sinopsis"]);
	$Link = htmlspecialchars($data["Link"]);
	$Cara_instal = htmlspecialchars($data["Cara_instal"]);
	$OS = htmlspecialchars($data["OS"]);
	$Prosesor = htmlspecialchars($data["Prosesor"]);
	$Ram = htmlspecialchars($data["Ram"]);
	$Vga = htmlspecialchars($data["Vga"]);
	$DirectX = htmlspecialchars($data["DirectX"]);
	$Gambarlama = htmlspecialchars($data["Gambarlama"]);
	$Screenshot1lama = htmlspecialchars($data["Screenshot1lama"]);
	$Screenshot2lama = htmlspecialchars($data["Screenshot2lama"]);
	$Screenshot3lama = htmlspecialchars($data["Screenshot3lama"]);
	

	// cek apakah user pilih gambar baru / tidak

	if ($_FILES['Gambar']['error'] === 4) {
		$Gambar = $Gambarlama;
	} else {
		$Gambar = upload();
	}

	if ($_FILES['Screenshot1']['error'] === 4) {
		$Screenshot1 = $Screenshot1lama;
	} else {
		$Screenshot1 = upload1();
	}

	if ($_FILES['Screenshot2']['error'] === 4) {
		$Screenshot2 = $Screenshot2lama;
	} else {
		$Screenshot2 = upload2();
	}

	if ($_FILES['Screenshot3']['error'] === 4) {
		$Screenshot3 = $Screenshot3lama;
	} else {
		$Screenshot3 = upload3();
	}

	


	$query = "UPDATE game SET
				Nama = '$Nama',
				Genre = '$Genre',
				Tahun_Rilis = '$Tahun_Rilis',
				Sinopsis = '$Sinopsis',
				Gambar = '$Gambar',
				Screenshot1 = '$Screenshot1',
				Screenshot2 = '$Screenshot2',
				Screenshot3 = '$Screenshot3',
				Link = '$Link',
				Cara_instal = '$Cara_instal',
				OS = '$OS',
				Prosesor = '$Prosesor',
				Ram = '$Ram',
				Vga = '$Vga',
				DirectX = '$DirectX'

			WHERE id = $id
			";
	
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function updatetutorial($data){

	global $conn;
	// GAME

	$id = $data["id"];

	$Judul = htmlspecialchars($data["Judul"]);
	$Sinopsis = htmlspecialchars($data["Sinopsis"]);
	$Gambarlama = htmlspecialchars($data["Gambarlama"]);

	// cek apakah user pilih gambar baru / tidak

	if ($_FILES['Gambar']['error'] === 4) {
		$Gambar = $Gambarlama;
	} else {
		$Gambar = upload();
	}

	


	$query = "UPDATE tutorial SET
				Judul = '$Judul',
				Sinopsis = '$Sinopsis',
				Gambar = '$Gambar'

			WHERE id = $id
			";
	
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}







function search($keyword) {
	
	$query = "
			SELECT * FROM anime
				WHERE
			Nama LIKE '%$keyword%' OR 
			Genre LIKE '%$keyword%' OR
			Tahun_Rilis LIKE '%$keyword%' OR
			Sinopsis LIKE '%$keyword%' OR
			Season LIKE '%$keyword%'

			";
	return query($query);

}

function search1($keyword){
	$query1 = "
			SELECT * FROM game
				WHERE
			Nama LIKE '%$keyword%' OR 
			Genre LIKE '%$keyword%' OR
			Tahun_Rilis LIKE '%$keyword%' OR
			Sinopsis LIKE '%$keyword%'
	";

	return query1($query1);
}

function search2($keyword){
	$query2 = "
			SELECT * FROM tutorial
				WHERE
			Judul LIKE '%$keyword%' OR
			Sinopsis LIKE '%$keyword%'
	";

	return query2($query2);
}





function registrasi($data){
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$email = stripcslashes($data["email"]);
	$alasan = stripcslashes($data["alasan"]);

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

	if (registrasi($_POST) > 0) {
		echo "<script>
				alert('Selamat!! anda berhasil ditambahkan sebagai admin!!');
				document.location.href = 'login.php';
			</script>";
		header("Location: login.php");
		exit;

	} else {
		echo mysqli_error($conn);
	}


}

















 ?>