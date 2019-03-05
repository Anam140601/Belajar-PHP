<?php 
session_start();
require 'functions.php';








if (isset($_POST["register"])) {

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




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-6.min.css">
	<title>Halaman Registrasi</title>
	<style>
		body {
			background-image: url("file gambar/bg/connectwork.png");
		}
		.a {
			display: block;
		}
		.tengah {
			margin: auto;
			text-align: center;
			margin-top: 5%;
		}
	</style>
</head>
<body>
<div class="tengah">
	

	
		
			<h1>Registration Page</h1>
			<form action="" method="post">
			<ul>	
				
					<label class="a" for="username">Username : </label><br>
					<input type="text" name="username" id="username" autofocus><br>
				
					<label class="a" for="password">Password : </label><br>
					<input type="password" name="password" id="password"><br>
				
					<label class="a" for="password2">Confirm Password : </label><br>
					<input type="password" name="password2" id="password2"><br>
			
					<label class="a" for="email">Email : </label><br>
					<input type="email" name="email" id="email"><br>

					<label class="a" for="alasan">Alasan ingin registrasi : </label><br>
					<textarea type="text" name="alasan" id="alasan"></textarea><br><br>
				
					<button type="submit" name="register">Register!</button>
				
			</ul>




			</form>
		


</div>

	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>