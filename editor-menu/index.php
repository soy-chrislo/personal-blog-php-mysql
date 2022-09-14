
<?php
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

    } else {
        header("location: ../login-menu/index.php");
    }

    $con = new mysqli("localhost", "root", "", "web-seguridad-informatica", "3306");

    $query = "SELECT * FROM publicaciones";
    $result = mysqli_query($con, $query);

    $titulo = "#000000";
    $contenido = "";
    $file = "";

    $id = "";

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM publicaciones WHERE id = $id";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);


        $titulo = $row['titulo'];
        $contenido = $row['contenido'];
        $color = $row['color'];
        //$file = addslashes(file_get_contents($_FILES["file"]["tmp_name"]));

        $query = "DELETE FROM publicaciones WHERE id = $id";
        $result = mysqli_query($con, $query);
    }
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
            <!-- <div class="header__nav--logo"></div>
            <nav class="header__nav--bar">
                <p>Sobre Mi</p>
                <p>Contacto</p>
            </nav> -->
        </div>
    </header>
    <main class="main">
        <form enctype="multipart/form-data" class= "form" action="../php/saveContent.php" method="post">
            <div class="horizontal__column">
                <div class="vertical__column">
                    <label for="file">Imagen</label>
                    <input type="file" name="file" id="file">
                </div>
                <div class="vertical__column">
                    <label for="color">Color</label>
                    <input value="<?php echo $color; ?>" type="color" name="color" id="color">
                </div>
            </div>
            
            <label for="title">Titulo</label>
            <input value="<?php echo $titulo; ?>" type="text" name="title" id="title">
            <label for="content"> Contenido</label>
            <textarea name="content" id="content" cols="30" rows="10">
                <?php echo $contenido; ?>
            </textarea>
            <div class="horizontal__column--btn">
                <div class="btn vertical__column--btn">
                    <a href="../admin-menu/index.php">Regresar</a>
                </div>
                <div class="btn vertical__column--btn">
                    <input name="btnpublish" type="submit" value="Publicar">
                </div>
            </div>
        </form>

    </main>
</body>
</html>