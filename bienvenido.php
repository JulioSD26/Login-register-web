<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        echo '<script>
            alert("Debes iniciar sesión para acceder a esta página");
            window.location = "index.php";
            </script>';
        session_destroy();
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bienvenido</title>
    <link rel="stylesheet" href="assets/css/estilo-bienvenidos.css">
</head>
<body>
    <h1>
        Bienvenido
        <?php echo $_SESSION['nombre'];
        ?>
    </h1>
    
    <a href="php/cerrar_sesion.php">cerrar sesión</a>
</body>
</html>