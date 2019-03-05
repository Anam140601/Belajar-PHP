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
	header("Location: index.php");
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



			header("Location: index.php");
			exit;
		}
	}

	$error = true;
	var_dump($error);
}


 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<style>
		.a {
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
		<label class="a" for="username">Username : </label>
		<input type="text" name="username" id="username">

		<label class="a" for="password">Password : </label>
		<input type="password" name="password" id="password">

		<label class="a" for="email">Email : </label>
		<input type="email" name="email" id="email"> <br>

		<input type="checkbox" name="remember" id="remember">
		<label for="remember">Please inget ane </label>

		<br><button class="a" type="submit" name="login">Login</button>



	</ul>



	
</form>

<p>Kalo loe belum register.. siilahkan <a href="register.php">Register!!</a> doeloe bosque</p>

</body>
</html>