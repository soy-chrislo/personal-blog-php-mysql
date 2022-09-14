<?php
    include("../web/php/conection.php");
    include "../web/php/saveContent.php";

    $con = new mysqli("localhost", "root", "", "web-seguridad-informatica", "3306");

    $query = "SELECT * FROM publicaciones";
    $result = mysqli_query($con, $query);


    $queryLast = "SELECT * FROM publicaciones ORDER BY id DESC LIMIT 1;";
    $lastPost = mysqli_query($con, $queryLast);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/ce8b1591f0.js" crossorigin="anonymous"></script>
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
                <p><a sytle="color: black;" href="#">Blog</a></p>
                <p><a href="contacto/index.html">Contacto</a></p>
            </nav>
        </div>
    </header>
    <main class="main">
        <!-- <section class="featured__post">
            <p>Publicación Destacada</p>
            <div class="post"> -->
                <?php
                    while ($row = mysqli_fetch_array($lastPost)) {
                        $id = $row['id'];
                        echo "<section class='featured__post' style='background-color:". $row['color'] . "'>";
                        echo "<p>Publicación Destacada</p>";
                        echo "<div class='post'>";
                        echo "<div class='featured__post--logo'>";
                        echo "<img src='data:image/png;base64,".base64_encode($row['file'])."' alt=''>";
                        echo "</div>";
                        echo "<div class='post__content'>";
                        // echo "<h1>".$row['titulo']."</h1>";
                        echo "<h1><a href='../web/post-page/index.php?id=" . "$id". "'>" . $row['titulo'] . "</a></h1>";
                        echo "<p>".$row['contenido']."</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</section>";
                    }
                ?>
                <!-- <div class="featured__post--logo"></div>
                <div class="post__content"> -->
                    <!-- <h1>Las 5 vulnerabilidades más comunes de WhatsApp</h1> -->
                    <!-- <p>El producto de Meta no se salva y es un blanco de críticas tras descubrirse en la edición 2022 de la Hackaton más de 5 vulnerabilidades en su sistema.</p> -->
                <!-- </div> -->
            <!-- </div>
        </section> -->
        
        <section class="post__cards">
            <?php
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];
                    echo "<article class='post__card'>";
                    echo "<div class='content__logo' style='background-color:" . $row['color'] . "'>";
                    // echo "<div class='post__card--logo' style='background-image:url($imageUrl)'></div>";
                    echo "<img src='data:image/jpeg;base64,".base64_encode($row['file'])."' alt=''>";
                    echo "</div>";
                    echo "<div class='post__card--content'>";
                    echo "<a href='../web/post-page/index.php?id=" . "$id". "'>" . $row['titulo'] . "</a>";
                    echo "<p>" . $row['contenido'] . "</p>";
                    echo "</div>";
                    echo "</article>";
                }
            ?>
            <!-- <article class="post__card">
                <div class="content__logo">
                    <div class="logo"></div> 
                    <div class="post__card--logo"></div>
                </div>
                <div class="post__card--content">
                    <h1>Discord: ¿Qué es y cómo funciona?</h1>
                    <p>Discord es una plataforma de mensajería instantánea y voz para videojuegos, que permite a los usuarios...</p>
                </div>
                
            </article> -->
            
        </section>
    </main>
    
</body>
</html>