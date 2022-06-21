
<?php include 'Connect.php'; 

$id = '';

define('UPLPATH', '');


if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM vijesti WHERE id = '$id'";
    $result = $dbc->query($sql);

    while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $datum = $row['datum'];
        $naslov = $row['naslov'];
        $sazetak = $row['sazetak'];
        $slika = UPLPATH . $row['slika'];
        $kategorija = $row['kategorija'];
        $tekst = $row['tekst'];
    }
} 


  
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="style.css">

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
        
            <section role="main">
                <div class="row">
                <h2 class="category">
                    <?php echo $kategorija; ?>
                </h2>
                <h1 class="title">
                    <?php echo $naslov; ?>
                </h1>
                    <p>AUTOR: admin</p>
                    <p>OBJAVLJENO: <?php
                    echo $datum;
                        ?></p>
                    </div>
                    <section class="slika">
                        <img src="<?php echo $slika; ?>" alt="#">
                    </section>
                    
                    <section class="about">
                    <p>
                        <?php
                       echo $sazetak;
                        ?>
                    </p>
                    </section>
                    <section class="sadrzaj">
                        <p>
                            <?php
                            echo $tekst;
                            ?>
                        </p>
                    </section>

                
                </section>

               
            
        
            </main>

<footer>
    <h5>Napravio Karlo Krivohlavek</h5>
</footer>
</body>
</html>