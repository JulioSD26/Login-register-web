<?php

    session_start();

    include 'conexion_db.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios 
    WHERE correo = '$correo' AND contrasena = '$contrasena'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;

        // obtener nombre_completo del usuario de la base de datos
        $nombre = mysqli_fetch_array($validar_login);
        $_SESSION['nombre'] = $nombre['nombre_completo'];
        header("location: ../bienvenido.php");
        exit();
    } else {
        echo '<script>
            alert("Usuario no encontrado, por favor verifique los datos introducidos");
            window.location = "../index.php";
            </script>';
        exit();
    }

?>