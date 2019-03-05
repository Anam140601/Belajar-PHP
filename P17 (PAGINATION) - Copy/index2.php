<?php 
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}



require "functions.php";


// paginations
// konfigurasi
$anime = query("SELECT*FROM anime ORDER BY id DESC LIMIT 5");
$game = query("SELECT*FROM game ORDER BY id DESC LIMIT 5");
$tutorial = query("SELECT*FROM tutorial ORDER BY id DESC LIMIT 5");

$ani = query("SELECT*FROM anime ORDER BY id DESC LIMIT 1");


 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-6.min.css">
    <link rel="stylesheet" href="css.css">

    <title>Home</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 0px;">
      <a class="navbar-brand" href="#" >Update Terbaru Anigato</a>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        
            
            <?php foreach ($ani as $row1) : ?>
              <marquee onmouseover="this.stop()" onmouseout="this.start()" ><a href="download.php?id=<?= $row1["id"]; ?>" target="blank"><?= $row1["Nama"] ?></a></marquee>
            <?php endforeach;?>

      </div>
      <a type="button" class="btn btn-danger btn-sm " href="logout.php">Logout!</a>
    </nav>



    <img src="file gambar/ANIGATO.png" class="img-fluid mt-2 mb-2" alt="Responsive image" style="border: 2px ; border-color: red">

    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <a class="navbar-brand" href="#">Anigato</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index2.php">HOME <span class="sr-only">(current)</span></a>
          </li>
          

          <li class="nav-item">
            <a class="nav-link" href="daftaranime.php" target="blank">Daftar Anime<span class="sr-only"></span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="daftargame.php" target="blank">Daftar Game<span class="sr-only"></span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="daftartutorial.php" target="blank">Tutorial<span class="sr-only"></span></a>
          </li>



        </ul>
        
      </div>
    </nav>





    <table class="table mt-2" style="color: green; background-color: black" border="5" width="10%">
      <thead>
        <tr>
          <th scope="col">Bagi kalian yang ingin nonton anime online sub indo Gdrive dan nggak mau download langsung saja ke situs streaming resmi milik kami di Anigato.net atau like Fans Page Facebooknya di <a href="https://www.facebook.com/khoerul.anam.7758235">SINI</a></th>
        </tr>
      </thead>
    </table>




<br>
<br>
<h1 style="color: red;">Daftar anime</h1>

  
  
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" border="0" cellpadding="10" cellspacing="0">
  
    
      

      <?php $i = 1; ?>
      <?php foreach ($anime as $row) : ?>

      
        <tr>
          <td><p><?= $i ?></p></td>
          <td class="col-1" style="text-align: center;"><p><img src="img/<?= $row["Gambar"]; ?>"  width="50" height="50"></p></td>
          <td class="col-11"><p><a style="color: green;" href="download.php?id=<?= $row["id"]; ?>"><?= $row["Nama"] ?></p></td>

        </tr>
      
      <?php $i++; ?>
      <?php endforeach ; ?>

    </table>
  </div>


<br>
<br>

  <h1 style="color: green;">Daftar game</h1>

  
  
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" border="1" cellpadding="10" cellspacing="0">
  
    
      

      <?php $i = 1; ?>
      <?php foreach ($game as $row) : ?>
      <tr>
        <td><?= $i ?></td>
        

        <td class="col-1"  style="text-align: center;"><img src="img/<?= $row["Gambar"]; ?>"  width="50" height="50"></td>
        <td class="col-11"><p><a style="color: lightskyblue;" href="downloadgame.php?id=<?= $row["id"]; ?>"><?= $row["Nama"] ?></p></td>
      </tr>
      <?php $i++; ?>
      <?php endforeach ; ?>

    </table>
  </div>




<br>
<br>
  <h1 style="color: lightskyblue;">Tutorial</h1>

  
  
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" border="1" cellpadding="10" cellspacing="0">
  
    
     
      <?php $i = 1; ?>
      <?php foreach ($tutorial as $row) : ?>
      <tr>
        <td><?= $i ?></td>
        

        <td class="col-1"  style="text-align: center;"><img src="img/<?= $row["Gambar"]; ?>"  width="50" height="50" ></td>
        <td class="col-11"><p><a style="color: red;" href="downloadtutorial.php?id=<?= $row["id"]; ?>"><?= $row["Judul"] ?></p></td>
      </tr>
      <?php $i++; ?>
      <?php endforeach ; ?>

    </table>
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
