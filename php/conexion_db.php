<?php
    // Intenta conectarte a la base de datos
    try {
        $conexion = mysqli_connect("localhost", "root", "", "login_register_db");
        
        // Verifica si la conexión fue exitosa
        if (!$conexion) {
            throw new Exception("No se pudo conectar a la base de datos");
        }
        
        // Si la conexión es exitosa, muestra un mensaje
        echo "Conexión exitosa";
    } catch (Exception $e) {
        // Si se produce un error, muestra un mensaje de alerta
        echo '<script>alert("' . $e->getMessage() . '");</script>';
    }
?>