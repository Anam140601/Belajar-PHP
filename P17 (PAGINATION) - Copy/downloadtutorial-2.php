<?php 


require 'functions.php';

// ambil data di url
$id = $_GET["id"];

$tutor = query("SELECT*FROM tutorial WHERE id = $id")[0];

 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-6.min.css">
    <link rel="stylesheet" href="css.css">
	<title><?= $tutor["Judul"] ?> </title>
</head>
<body>

	<div>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 0px;">
      <a class="navbar-brand" href="#" >Update Terbaru Anigato</a>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        
            
              <marquee onmouseover="this.stop()" onmouseout="this.start()" ><a href="downloadgame-2.php?id=1" target="blank">Watch Dogs 2.....</a></marquee>
      </div>
      <a type="button" class="btn btn-success btn-sm " href="login.php">Login!</a>

      <a type="button" class="btn btn-info btn-sm " href="registrasi.php">Registrasi!</a>
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
            <a class="nav-link" href="index.php" >HOME <span class="sr-only">(current)</span></a>
          </li>
          

          <li class="nav-item">
            <a class="nav-link" href="daftartutore-2.php" target="blank">Daftar tutore<span class="sr-only"></span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="daftargame-2.php" target="blank">Daftar Game<span class="sr-only"></span></a>
          </li>

          <li class="nav-item  active">
            <a class="nav-link" href="daftartutorial-2.php" target="blank">Tutorial<span class="sr-only"></span></a>
          </li>





        </ul>
        
      </div>
    </nav> 
  </div>

<div class="jumbotron jumbotron-fluid">
  <div class="container-fluid">
    
    <h1 style="top: 50%;"><?= $tutor["Judul"] ?></h1>

      <p>
        <p ><?= $tutor["Judul"] ?></p>
        <img src="img/<?= $tutor["Gambar"]; ?>" width="20%" alt="Responsive image"><br><br>

        
        <p><?= nl2br(htmlspecialchars_decode($tutor['Sinopsis'])) ?></p><br><br>

        
        
      </p>
      
  </div>
</div>

      
        










	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>