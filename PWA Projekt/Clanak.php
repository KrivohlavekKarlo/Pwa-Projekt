
<?php include 'Connect.php'; 


$id = $_GET['id'];

$sql = "SELECT * FROM vijesti WHERE id = '$id'";
$result = $dbc->query($sql);
while($row = $result->fetch_assoc()) {
    $category = $row['kategorija'];}

  
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
                    <?php
                    $result = $dbc->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<span>".$row['kategorija']."</span>";}
                        ?></h2>
                    <h1 class="title"><?php
                    while($row = $result->fetch_assoc()) {
                        echo $row['naslov'];}
                        ?></h1>
                    <p>AUTOR:</p>
                    <p>OBJAVLJENO: <?php
                    while($row = $result->fetch_assoc()) {
                        echo "<span>".$row['datum']."</span>";}
                        ?></p>
                    </div>
                    <section class="slika">
                    <?php
                    while($row = $result->fetch_assoc()) {
                        echo '<img src="' . UPLPATH . $row['slika'] . '">';}
                    ?>
                    </section>
                    <section class="about">
                    <p>
                        <?php
                        while($row = $result->fetch_assoc()) {
                            echo "<i>".$row['sazetak']."</i>";}
                        ?>
                    </p>
                    </section>
                    <section class="sadrzaj">
                        <p>
                            <?php
                            while($row = $result->fetch_assoc()) {
                            echo $row['tekst'];}
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