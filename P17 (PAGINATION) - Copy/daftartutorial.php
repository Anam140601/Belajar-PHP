<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}





require "functions.php";


// paginations
// konfigurasi
$jumlahdataperhalaman = 5;
$jumlahdata = count(query("SELECT * FROM tutorial"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;



$tutorial = query("SELECT*FROM tutorial ORDER BY id DESC LIMIT $awaldata, $jumlahdataperhalaman");

$tut = query("SELECT*FROM tutorial ORDER BY id DESC LIMIT 1");

// jika tombol search di klik
if (isset($_POST["search2"])) {
	$tutorial = search2($_POST["keyword"]);
}



	



 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-6.min.css">
    <link rel="stylesheet" href="css.css">

	<title>Halaman Admin</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 0px;">
      <a class="navbar-brand" href="#" >Update Terbaru Anigato</a>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        
            <?php foreach ($tut as $row1) : ?>
              <marquee onmouseover="this.stop()" onmouseout="this.start()" ><a href="downloadtutorial.php?id=<?= $row1["id"]; ?>" target="blank"><?= $row1["Judul"] ?></a></marquee>
            <?php endforeach;?>
      </div>
      <a class="btn btn-danger btn-sm" href="logout.php">Logout!</a>
    </nav>

	

    <img src="file gambar/ANIGATO.png" class="img-fluid mt-2 mb-2" alt="Responsive image" style="border: 2px ; border-color: red">

    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <a class="navbar-brand" href="#">Anigato</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index2.php" >HOME <span class="sr-only">(current)</span></a>
          </li>
          

          <li class="nav-item">
            <a class="nav-link" href="daftaranime.php" target="blank">Daftar Anime<span class="sr-only"></span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="daftargame.php" target="blank">Daftar Game<span class="sr-only"></span></a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="daftartutorial.php" target="blank">Tutorial<span class="sr-only"></span></a>
          </li>



  
        </ul>
        <form class="form-inline my-2 my-lg-0" action="" method="post">
          <input class="form-control mr-sm-2" type="search" name="keyword" autofocus="" placeholder="Search" aria-label="Search" autocomplete="off">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search2">Search</button>
        </form>
      </div>
    </nav>





    <table class="table mt-2" style="color: green; background-color: black" border="5" width="10%">
      <thead>
        <tr>
          <th scope="col">Bagi kalian yang ingin nonton anime online sub indo Gdrive dan nggak mau download langsung saja ke situs streaming resmi milik kami di Anigato.net atau like Fans Page Facebooknya di <a href="https://www.facebook.com/khoerul.anam.7758235">SINI</a></th>
        </tr>
      </thead>
    </table>


	

	<h1 style="text-align: center;  color: lightskyblue;">Tutorial</h1>

	
	
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover" border="1" cellpadding="10" cellspacing="0">
	
		
			<tr>
				
				<th>No.</th>
				<th class="col-1">Aksi</th>
				<th class="col-1">Gambar</th>
				<th class="col-10">Judul</th>

			</tr>

			<?php $i = 1; ?>
			<?php foreach ($tutorial as $row) : ?>
			<tr>
				<td><?= $i ?></td>
				<td>
					<span class="badge badge-info"><a href="updatetutorial.php?id=<?= $row["id"]; ?>">Update</a></span>
					<span class="badge badge-danger"><a href="deletetutorial.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda yakin akan menghapus datanya??');">Delete</a></span>
					
				</td>

				<td style="text-align: center;"><img src="img/<?= $row["Gambar"]; ?>" width="50" height="50"></td>
				<td><a href="downloadtutorial.php?id=<?= $row["id"]; ?>"> <?= $row["Judul"] ?></a></td>
			</tr>
			<?php $i++; ?>
			<?php endforeach ; ?>

		</table>
	</div>
<br><br>
	<!-- navigasi -->
	<a class="btn btn-success btn-sm , tambah" href="tambahtutorial.php">Tambah Tutorial</a>
	<div class="pagination " >
				<?php if (isset($_POST["search2"])): ?>
						<?php $halamanaktif=0 ?>

				<?php else: ?>	
						<?php if ($halamanaktif > 1) : ?>
						<a href="?halaman=<?= $halamanaktif - 1; ?>" class="page-link , navigasi-utama">&laquo;</a>
						<?php endif; ?>


						<?php for ($i=1; $i <= $jumlahhalaman ; $i++) : ?>
							<?php if ($i == $halamanaktif ) : ?>
								<a href="?halaman=<?= $i; ?>" class="page-link , navigasi-on" ><?= $i; ?></a>
							<?php else : ?>
								<a href="?halaman=<?= $i; ?>" class="page-link , navigasi-utama"><?= $i; ?></a>
							<?php endif ; ?>
						<?php endfor ; ?>



						<?php if ($halamanaktif < $jumlahhalaman) : ?>
							<a href="?halaman=<?= $halamanaktif + 1; ?>" class="page-link , navigasi-utama" >&raquo;</a>
						<?php endif; ?>

				<?php endif ?>
	</div>
<br><br><br>

  <nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <a style="color: black; text-align: center;" >&copy; 2018 Anigato </a>
  </nav>	




	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>