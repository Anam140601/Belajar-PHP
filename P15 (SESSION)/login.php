<?php
 session_start();

if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}




require 'functions.php';

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



			header("Location: index.php");
			exit;
		}
	}

	$error = true;
}


 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>

<h1>Halaman login</h1>
<?php if (isset($error)) : ?>
	<p style="color: red; font-style: italic;">Username / password salah! silahkan cek lagi atau register</p>
<?php endif ; ?>

<form action="" method="post">

	<ul>
		<label for="username">Username : </label>
		<input type="text" name="username" id="username">

		<label for="password">Password : </label>
		<input type="password" name="password" id="password">

		<label for="email">Email : </label>
		<input type="email" name="email" id="email">

		<button type="submit" name="login">Login</button>



	</ul>



	
</form>

</body>
</html>