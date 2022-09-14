<?php
    include("conection.php");

    $con = mysqli_connect("localhost", "root", "", "web-seguridad-informatica", "3306");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_select_db($con, "web-seguridad-informatica") or die("Error al seleccionar la base de datos.");

    mysqli_set_charset($con, "utf8");

    if (isset($_POST["btnpublish"])){
        if(isset($_POST["color"]) && isset($_POST["title"]) && isset($_POST["content"])){
            $title = $_POST["title"];
            $content = $_POST["content"];
            $color = $_POST["color"];
            // $file = $_POST["file"];
            $file = addslashes(file_get_contents($_FILES["file"]["tmp_name"]));

            $query = "INSERT INTO publicaciones (file, titulo, contenido, color) VALUES ('$file', '$title', '$content', '$color')";
            // $result = mysqli_query($con, $query);
            $result = $con->query($query);

            if ($result){
                echo "<p> Publicación creada con éxito </p>";
                mysqli_close($con);
            } else {
                echo "<p> Error al crear la publicación </p>";
            }
        }
    }
?>