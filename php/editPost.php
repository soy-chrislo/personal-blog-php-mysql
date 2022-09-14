<?php
    require("../php/conection.php");
    $con = new mysqli("localhost", "root", "", "web-seguridad-informatica", "3306");
    $id = $_GET['id'];
    $query = "DELETE FROM publicaciones WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result){
        echo "<p> Publicación eliminada con éxito </p>";
        mysqli_close($con);
    } else {
        echo "<p> Error al eliminar la publicación </p>";
    }
    
?>