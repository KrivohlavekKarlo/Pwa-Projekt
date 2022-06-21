
<?php
include 'Connect.php';
define('UPLPATH', '');

$sport = [];
$kultura = [];

$sql = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = 'sport' ORDER BY id DESC LIMIT 3";
$result = $dbc->query($sql);
while($row = $result->fetch_assoc()) {
    $sport[] = $row;
}

$sql = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = 'kultura'  ORDER BY id DESC LIMIT 3";
$result = $dbc->query($sql);
while($row = $result->fetch_assoc()) {
    $kultura[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet"> 
</head>
<body>
    
    
    <main>
        <header>
            <img src="sternLogo.png" class="logo">
            <h1>stern</h1>
            <nav class="navbar main_nav " role="navigation">
                    <ul class="main nav navbar-nav">
                        <li>
                            <a href="index.php" class="">Početna</a>
                        </li>
                        <li>
                            <a href="kategorija.php?id=sport" class="">Sport</a>
                        </li>
                        <li>
                        <li>
                            <a href="kategorija.php?id=kultura" class="">Kultura</a>
                        </li>
                        <li>
                            <a href="administracija.php" class="">Administracija</a>
                        </li>
                       
                        
                        <li>
                            <a href="unos.php " class="">Unos</a>
                        </li>
                    </ul>
            </nav>
        </header>

        <div class="clear"></div>
        
        <h1 class="naslov">SPORT ></h1>
        <div class="container">
            <div class="row">

            <?php foreach($sport as $sport_clanak){ ?>
                <div class="col-sm-4">
                    <img src="<?php echo $sport_clanak["slika"];?> ">
                    <p><?php echo $sport_clanak["naslov"];?></p>
                    <h3><?php echo $sport_clanak["sazetak"];?></h3>
                </div>
            <?php } ?>
            </div>
        </div>

          <h1 class="naslov">KULTURA ></h1>
        <div class="container">
            <div class="row">
              <?php foreach($kultura as $kultura_clanak){ ?>
                <div class="col-sm-4">
                    <img src="<?php echo $kultura_clanak["slika"];?> ">
                    <p><?php echo $kultura_clanak["naslov"];?></p>
                    <h3><?php echo $kultura_clanak["sazetak"];?></h3>
                </div>
            <?php } ?>
              
            </div>
        </div>


    </main>

<footer>
    <h5>Napravio Karlo Krivohlavek</h5>
</footer>
</body>
</html>