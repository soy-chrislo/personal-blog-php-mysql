<?php 
    require("../php/conection.php");
    $con = new mysqli("localhost", "root", "", "web-seguridad-informatica", "3306");
    $id = $_GET['id'];
    $query = "SELECT * FROM publicaciones WHERE id = $id";
    $result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="content__header">
            <a href="../index.php" class="header__name">/home/chris/</a>
            <div class="header__nav--logo"></div>
            <nav class="header__nav--bar">
                <p>Blog</p>
                <p>Contacto</p>
            </nav>
        </div>
    </header>
    <main class="main">
        <article class="text__section">
    <?php
        foreach($result as $row){
            // echo "<p>" . $row['color'] . "</p>";
            echo "<section class='section__title'>";
            echo "<h1>" . $row['titulo'] . "</h1>";
            echo "</section>";
            echo "<section class='section__paragraph'>";
            echo "<p>" . $row['contenido'] . "</p>";
            echo "</section>";
        }
    ?>
        </article>
    </main>
</body>
</html>