

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
                            <a href="kategorija.php?id=kultura" class="">Kultura</a>
                        </li>
                        <li>
                            <a href="administracija.php" class="">Administracija</a>
                        </li>
                       
                        <li>
                            <a href="clanak.php " class="">Clanak</a>
                        </li>
                        <li>
                            <a href="unos.php " class="">Unos</a>
                        </li>
                    </ul>
            </nav>
        </header>

        <div class="clear"></div>
        
        <h1 class="naslov">POLITIK ></h1>
        <div class="container">
            <div class="row">
              <div class="col-sm-4">
                <img src="trump.jpg">
                <p>Lorem ipsum dolor..</p>
                <h3>Column 2</h3>
              </div>
              <div class="col-sm-4">
                <img src="trump.jpg">
                <p>Lorem ipsum dolor..</p>
                <h3>Column 2</h3>
              </div>
              <div class="col-sm-4">
                <img src="trump.jpg">
                <p>Lorem ipsum dolor..</p>
                <h3>Column 2</h3>
              </div>
            </div>
          </div>

          <h1 class="naslov">GESUNDHEIT ></h1>
            <div class="container">
            <div class="row">
              <div class="col-sm-4">
                <img src="trump.jpg">
                <p>Lorem ipsum dolor..</p>
                <h3>Column 2</h3>
              </div>
              <div class="col-sm-4">
                <img src="trump.jpg">
                <p>Lorem ipsum dolor..</p>
                <h3>Column 2</h3>
              </div>
              <div class="col-sm-4">
                <img src="trump.jpg">
                <p>Lorem ipsum dolor..</p>
                <h3>Column 2</h3>
              </div>
            </div>
          </div>


          <?php
include 'Connect.php';
define('UPLPATH', '');
?>
<section class="sport">
<?php
$query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='sport' LIMIT 4";
$result = mysqli_query($dbc, $query);
$i=0;
while($row = mysqli_fetch_array($result)) {
echo '<article>';
echo'<div class="article">';
echo '<div class="sport_img">';
echo '<img src="' . UPLPATH . $row['slika'] . '"';
echo '</div>';
echo '<div class="media_body">';
echo '<h4 class="title">';
echo '<a href="clanak.php?id='.$row['id'].'">';
echo $row['naslov'];
echo '</a></h4>';
echo '</div></div>';
echo '</article>';
}?>
</section>


    </main>

<footer>
    <h5>Napravio Karlo Krivohlavek</h5>
</footer>
</body>
</html>