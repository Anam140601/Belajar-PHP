<?php 


require 'functions.php';

// ambil data di url
$id = $_GET["id"];

$gem = query("SELECT*FROM game WHERE id = $id")[0];

 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-6.min.css">
    <link rel="stylesheet" href="css.css">
	<title>Download <?= $gem["Nama"] ?> </title>
</head>
<body>

	<div>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 0px;">
      <a class="navbar-brand" href="#" >Update Terbaru Anigato</a>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        
            
              <marquee onmouseover="this.stop()" onmouseout="this.start()" ><a href="downloadgame-2.php?id=1" target="blank">Watch Dogs 2.....</a></marquee>
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

          <li class="nav-item active">
            <a class="nav-link" href="daftargame.php" target="blank">Daftar Game<span class="sr-only"></span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="daftartutorial.php" target="blank">Tutorial<span class="sr-only"></span></a>
          </li>





        </ul>
        
      </div>
    </nav> 
  </div>

<div class="jumbotron jumbotron-fluid">
  <div class="container-fluid">
    
    <h1 style="top: 50%;">Download Game <?= $gem["Nama"] ?></h1>

      <p>
        <p ><?= $gem["Nama"] ?></p>
        <img src="img/<?= $gem["Gambar"]; ?>" width="20%" alt="Responsive image"><br><br>

        <p><?= nl2br(htmlspecialchars_decode($gem['Sinopsis'])) ?></p><br><br>
        
          <strong>Screenshot : </strong><br>
          <img class="img-responsive" src="screenshot/<?= $gem["Screenshot1"]; ?>" width="50%" ><br><br>
        
          <img class="img-responsive" src="screenshot/<?= $gem["Screenshot2"]; ?>" width="50%" ><br><br>
        
          <img class="img-responsive" src="screenshot/<?= $gem["Screenshot3"]; ?>" width="50%" ><br><br>

        <strong>Link Download : </strong><br>
        <a class="btn btn-info btn-sm" href="<?= $gem['Link'] ?>">GoogleDrive</a><br><br>
        

        <strong>Minimum Requirements : </strong><br><br>

        <table border="0">
          
          <tr>
            <p>OS : <?= $gem['OS'] ?></p>
            <p>Processor : <?= $gem['Prosesor'] ?></p>
            <p>Memory : <?= $gem['Ram'] ?></p>
            <p>Graphics Card : <?= $gem['Vga'] ?></p>
            <p>DirectX : <?= $gem['DirectX'] ?></p>
          </tr>
        </table><br><br>

        <strong>Cara Instal : </strong>
        <p><?= nl2br(htmlspecialchars_decode($gem['Cara_instal'])) ?></p><br><br>
        
        
      </p>
      
  </div>
</div>

      
        










	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>