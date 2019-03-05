<?php 
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
	// cek username dan password
	if ($_POST["username"] == "Anigato" && $_POST["password"] == "Anigatostore12") {
		// jika benar redirect ke halamat admin
		header("Location: admin.php");
		exit;
	} else {
		// jika salah tampilkan pesan kesalahan	
		$error = false;
	}
}		
?>



<!DOCTYPE html>
<html>
<head>
	<title>POST</title>
</head>
<body>



	<?php if (isset($_POST["submit"])) : ?>
		<p style="color: red; font-style: italic;">Username / Password salah bro, silahkan cek lagi!!</p>	
	<?php endif ; ?>
	
<ul>
	<form action="" method="post">
		<li>
			<label for="username">Username : </label>
			<input type="text" name="username" id="username">
		</li>
		<br>
		<li>
			<label for="password">Password : </label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<button type="submit" name="submit">Login</button>	
		</li>

	</form>
</ul>
	

</body>
</html>