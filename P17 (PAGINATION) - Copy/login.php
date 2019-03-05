<?php
 session_start();
 require 'functions.php';

// check cookie
 if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
 	$id = $_COOKIE['id'];
 	$key = $_COOKIE['key'];

 	// ambil username berdasarkan id
 	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
 	$row = mysqli_fetch_assoc($result);

 	//cek cookie dan username
 	if ($key === hash('sha256', $row['username'])) {
 		$_SESSION['login'] = true;
 	}
 }



if (isset($_SESSION["login"])) {
	header("Location: index2.php");
	exit;
}






if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");


	// cek username
	if (mysqli_num_rows($result) == 1) {
		

		// cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {

			// set session
			$_SESSION["login"] = true;

			// check remember me
			if (isset($_POST['remember'])) {
				
				// buat cookie

				setcookie('id', $row['id'], time() + 60);
				setcookie('key', hash('sha256', $row['username']), time() + 60);
			}



			header("Location: index2.php");
			exit;
		}
	}

	$error = true;
}


 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-6.min.css">
	<title>Login Page</title>
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



	<h1>Login Bos Que</h1>
	<?php if (isset($error)) : ?>
		<p style="color: red; font-style: italic;">Username / password salah! silahkan cek lagi atau register</p>
	<?php endif ; ?>

	<form action="" method="post">

		<ul>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<label class="a" for="username">Username : </label>
				<input type="text" name="username" id="username"  autofocus>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<label class="a" for="password">Password : </label>
				<input type="password" name="password" id="password">
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<label class="a" for="email">Email : </label>
				<input type="email" name="email" id="email"> <br>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<input type="checkbox" name="remember" id="remember">
				<label for="remember">Please inget ane </label>
			</div>
				
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<br><button class="btn btn-secondary btn-sm" type="submit" name="login">Login</button>
			</div>
			



		</ul>



		
	</form>

	<p>Kalo loe belum register... silahkan <a href="registrasi.php">Resgister</a> doeloe bosque</p>
</div>









	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>