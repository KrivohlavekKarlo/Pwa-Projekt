<?php
include 'Connect.php';
session_start();

$error_msg = '';
$welcome_msg = '';
$administrator = false;

if(isset($_POST) and !empty($_POST)){
    if(empty($_POST['username']) or empty($_POST['pass'])){
        $error_msg = "Niste ispunili sva polja!";
    } else {

        $korisnicko_ime = $_POST['username'];
        $lozinka = $_POST['pass'];

        $sql = "SELECT * FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $korisnicko_ime);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        }
        if($result->num_rows > 0){

                $korisnik_baza = $result->fetch_assoc();
                
                if(password_verify($lozinka, $korisnik_baza['lozinka'])){

                    $_SESSION['username'] = $korisnik_baza['korisnicko_ime'];
                    $_SESSION['razina'] = $korisnik_baza['razina'];

                    if($_SESSION['razina'] == 1){
                        
                        $welcome_msg = "Pozdrav, ".$korisnik_baza['ime']." ".$korisnik_baza['prezime'].". Vi ste administrator, smijete uređivati sadržaj.";
                        $administrator = true;
                    } else {
                        $welcome_msg = "Pozdrav, ".$korisnik_baza['ime']." ".$korisnik_baza['prezime'].". Vi niste administrator, ne možete uređivati sadržaj.";
                    }

                } else {
                    $error_msg = "Kriva lozinka!";
                }
        } else {
            $error_msg = "Korisnik ne postoji!";
        } 
    }
}

?>

<h2>Administracija</h2>

<div class="login-msg">
    <?php if(!empty($error_msg)){ ?>
        <h4><?php echo $error_msg; ?></h4>
        <a href="prijava.php">Vrati se na login stranicu</a>
    <?php } ?>
    <?php if(!empty($welcome_msg)){ ?>
        <h4><?php echo $welcome_msg; ?></h4>
    <?php } ?>
</div>


<?php

if($administrator == true){

    if(isset($_POST['delete'])){
        $id=$_POST['id'];
        $query = "DELETE FROM vijesti WHERE id=$id ";
        $result = mysqli_query($dbc, $query);
        }
        
        define('UPLPATH', '');
        if(isset($_POST['update'])){
        $picture = $_FILES['pphoto']['name'];
        $title=$_POST['title'];
        $about=$_POST['about'];
        $content=$_POST['content'];
        $category=$_POST['category'];
        if(isset($_POST['archive'])){
        $archive=1;
        }else{
        $archive=0;
        }
        $target_dir = ''.$picture;
        move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
        $id=$_POST['id'];
        $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content',
        slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
        $result = mysqli_query($dbc, $query);
        }
    $query = "SELECT * FROM vijesti";
    $result = mysqli_query($dbc, $query);
    while($row = mysqli_fetch_array($result)) {
    echo '<form enctype="multipart/form-data" action="" method="POST">
    <div class="form-item">
    <label for="title">Naslov vjesti:</label>
    <div class="form-field">
    <input type="text" name="title" class="form-field-textual"
    value="'.$row['naslov'].'">
    </div>
    </div>
    <div class="form-item">
    <label for="about">Kratki sadržaj vijesti (do 50
    znakova):</label>
    <div class="form-field">
    <textarea name="about" id="" cols="30" rows="10" class="form-
    field-textual">'.$row['sazetak'].'</textarea>
    </div>
    </div>
    <div class="form-item">
    <label for="content">Sadržaj vijesti:</label>
    <div class="form-field">
    <textarea name="content" id="" cols="30" rows="10" class="form-
    field-textual">'.$row['tekst'].'</textarea>
    </div>
    </div>
    <div class="form-item">
    <label for="pphoto">Slika:</label>
    <div class="form-field">
    <input type="file" class="input-text" id="pphoto"
    value="'.$row['slika'].'" name="pphoto"/> <br><img src="' . UPLPATH .
    $row['slika'] . '" width=100px>
    // pokraj gumba za odabir slike pojavljuje se umanjeni prikaz postojeće slike
    </div>
    </div>
    <div class="form-item">
    <label for="category">Kategorija vijesti:</label>
    <div class="form-field">
    <select name="category" id="" class="form-field-textual"
    value="'.$row['kategorija'].'">
    <option value="sport">Sport</option>
    <option value="kultura">Kultura</option>
    </select>
    </div>
    </div>
    <div class="form-item">
    <label>Spremiti u arhivu:
    <div class="form-field">';
    if($row['arhiva'] == 0) {
    echo '<input type="checkbox" name="archive" id="archive"/>
    Arhiviraj?';
    } else {
    echo '<input type="checkbox" name="archive" id="archive"
    checked/> Arhiviraj?';
    }
    echo '</div>
    </label>
    </div>
    </div>
    <div class="form-item">
    <input type="hidden" name="id" class="form-field-textual"
    value="'.$row['id'].'">
    <button type="reset" value="Poništi">Poništi</button>
    <button type="submit" name="update" value="Prihvati">
    Izmjeni</button>
    <button type="submit" name="delete" value="Izbriši">
    Izbriši</button>
    </div>
    </form>';
    }

}

?>

