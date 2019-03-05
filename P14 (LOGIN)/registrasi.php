<?php 
require 'functions.php';


if (isset($_POST["register"])) {

	if (registrasi($_POST) > 0) {
		echo "<script>
				alert('Selamat!! User baru berhasil ditambahkan!!');
			</script>";
	} else {
		echo mysqli_error($conn);
	}
}

 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<style>
		label {
			display: block;
		}

	</style>
</head>
<body>

	<h1>Registration Page</h1>

	<form action="" method="post">
		<ul>
			
				<label for="username">Username : </label>
				<input type="text" name="username" id="username">
			
				<label for="password">Password : </label>
				<input type="password" name="password" id="password">
			
				<label for="password2">Confirm Password : </label>
				<input type="password" name="password2" id="password2">
			
				<label for="email">Email : </label>
				<input type="email" name="email" id="email">

				<label for="alasan">Alasan ingin registrasi : </label>
				<input type="text" name="alasan" id="alasan">
			
				<button type="submit" name="register">Register!</button>
			
		</ul>




	</form>

</body>
</html>