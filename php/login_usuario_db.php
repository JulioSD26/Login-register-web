<?php

    include 'conexion_db.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios 
    WHERE correo = '$correo' AND contrasena = '$contrasena'");

    if(mysqli_num_rows($validar_login) > 0){
        header("location: bienvenido.php");
        exit();
    } else {
        echo '<script>
            alert("Usuario no encontrado, por favor verifique los datos introducidos");
            window.location = "../index.php";
            </script>';
        exit();
    }

?>