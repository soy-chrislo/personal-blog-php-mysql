<?php
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

    } else {
        header("location: ../login-menu/index.php");
    }
    require("../php/conection.php");

    $con = new mysqli("localhost", "root", "", "web-seguridad-informatica", "3306");

    $query = "SELECT * FROM publicaciones";
    $result = mysqli_query($con, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/ce8b1591f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header class="header">
        <div class="content__header">
            <h1 class="header__name"><a style="color:black" href="../index.php">/home/chris/</a></h1>
            <!-- <div class="header__nav--logo"></div> -->
            <nav class="header__nav--bar">
                <a href="../editor-menu/index.php">Crear publicación</a>
            </nav>
        </div>
    </header>
    <main class="main">
         <?php
        foreach($result as $row){
            $file = $row['file'];
             echo "<article class='post'>";
            // echo "<div class=\"post__img\" style=\"background-image: url($file);\"></div>";
            echo "<div class='post__img'>";
            echo "<img src='data:image/png;base64,".base64_encode($row['file'])."' alt=''>";
            echo "</div>";
            echo "<h1>".$row['titulo']."</h1>";
            echo "<div class='menu__icons'>";
            echo "<a href='../editor-menu/index.php?id=". $row['id']. "'>";
            echo "<i class='fa-solid fa-pen-to-square'></i>";
            echo "</a>";
            echo "<a href='../php/deletePost.php?id=". $row['id']. "'>";
            echo "<i class='fa-solid fa-trash'></i>";
            echo "</a>";
            echo "</div>";
            echo "</article>";
        }
    ?>
    </main>
</body>
</html>