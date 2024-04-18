<?php

    include 'conexion_db.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // consulta para insertar datos en la base de datos de la tabla usuarios
    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena)
    VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '<script>
            alert("Usuario almacenado exitosamente");
            window.location = "../index.php";
            </script>';
    } else {
        echo '<script>
            alert("ERROR: Inténtalo de nuevo, usuario no almacenado");
            window.location = "../index.php";
            </script>';
    }

    mysqli_close($conexion);
?>