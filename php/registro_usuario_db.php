<?php

    include 'conexion_db.php';

    if(!$conexion){
        header("location: ../index.php");
    }

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    // encriptar la contraseña
    $contrasena = hash('sha512', $contrasena);

    // consulta para insertar datos en la base de datos de la tabla usuarios
    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena)
    VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";

// verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
    if(mysqli_num_rows($verificar_correo) > 0){
        echo '<script>
            alert("Este correo ya está registrado, intenta con otro");
            window.location = "../index.php";
            </script>';
        mysqli_close($conexion);
        exit();
    }

    // verificar que el usuario no se repita en la base de datos
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '<script>
            alert("Este usuario ya está registrado, intenta con otro");
            window.location = "../bienvenido.php";
            </script>';
        mysqli_close($conexion);
        exit();
    }

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