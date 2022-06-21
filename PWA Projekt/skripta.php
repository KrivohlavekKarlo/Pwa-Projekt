
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
</body>
</html>
<?php
        include 'Connect.php'; 
        $title=$_POST['title'];
        $category=$_POST['category'];
        $about=$_POST['about'];
        $image=$_POST['pphoto'];
        $content=$_POST['content'];  

        
?>


<section role="main">
    <div class="row">
    <p class="category"><?php echo $category; ?></p>
        <h1 class="title"><?php echo $title; ?></h1>
        <p>AUTOR:</p>
        <p>OBJAVLJENO:</p>  
        </div>
        <section class="slika">
        <?php
        echo "<img src='$image'";?>
    </section>
    <section class="about">
    <p> <?php echo $about; ?></p>
    </section>
    <section class="sadrzaj">
    <p>
    <?php
    echo $content;
    ?>
    </p>
    </section>
</section>