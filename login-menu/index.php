
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
        <h1 class="text__admin">Admin <span>Menu</span></h1>
        <form class="form" action="../php/controlador.php" method="post">
            <input class="input input__name"type="text" name="username" id="username" placeholder="Ingrese usuario">
            <input class="input input__password" type="password" name="password" id="password" placeholder="Ingrese contraseña">
            <input name="btnlogin" class="btn" type="submit" value="Iniciar Sesión">
        </form>
    </main>
</body>
</html>