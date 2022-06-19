

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
                            <a href="kategorija.php?id=sport " class="">Sport</a>
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
        
        <form action="skripta.php" method="POST">
            <div class="form-item">
            <label for="title">Naslov vijesti</label>
            <div class="form-field">
            <input type="text" name="title" class="form-field-textual">
            </div>
            </div>
            <div class="form-item">
            <label for="about">Kratki sadržaj vijesti (do 50
            znakova)</label>
            <div class="form-field">
            <textarea name="about" id="" cols="30" rows="10" class="form-field-textual"></textarea>
            </div>
            </div>
            <div class="form-item">
            <label for="content">Sadržaj vijesti</label>
            <div class="form-field">
            <textarea name="content" id="" cols="30" rows="10"
            class="form-field-textual"></textarea>
            </div>
            </div>
            <div class="form-item">
            <label for="pphoto">Slika: </label>
            <div class="form-field">
            <input type="file" accept="image/jpeg,image/gif,image/png"
            class="input-text" name="pphoto"/>
            </div>
            </div>
            <div class="form-item">
            <label for="category">Kategorija vijesti</label>
            <div class="form-field">
                <select name="category" id="" class="form-field-textual">
                <option value="sport">Sport</option>
                <option value="kultura">Kultura</option>
                </select>
                </div>
                </div>
                <div class="form-item">
                <label>Spremiti u arhivu:
                <div class="form-field">
                <input type="checkbox" name="archive">
                </div>
                </label>
                </div>
                <div class="form-item">
                <button type="reset" value="Poništi">Poništi</button>
                <button type="submit" value="Prihvati">Prihvati</button>
                </div>
                </form>

            <?php
                include 'Connect.php';

                if(isset($_FILES['pphoto']) and isset($_POST['title']) and isset($_POST['about']) and isset($_POST['content']) and isset($_POST['category']) ) {
                $picture = $_FILES['pphoto']['name'];
                $title=$_POST['title'];
                $about=$_POST['about'];
                $content=$_POST['content'];
                $category=$_POST['category'];
                $date=date('d.m.Y.');


                if(isset($_POST['archive'])){
                $archive=1;
                }else{
                $archive=0;
                }

                $target_dir = ''.$picture;
                move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

                $query = "INSERT INTO Vijesti (datum, naslov, sazetak, tekst, slika, kategorija,
                arhiva ) VALUES ('$date', '$title', '$about', '$content', '$picture',
                '$category', '$archive')";
                $result = mysqli_query($dbc, $query) or die('Error querying databese.');
            }
                mysqli_close($dbc);
                ?>
                                
            }
    </main>

<footer>
    <h5>Napravio Karlo Krivohlavek</h5>
</footer>
</body>
</html>


