<?php

    if (!isset($_POST['oculto'])) {
        exit();
    }

    include ('model/conexion.php');
    $cliente = $_POST['txtCliente'];
    $correos_eliminados = $_POST['txtCoreosEliminados'];
    $espacio_liberado = $_POST['txtEspacioLiberado'];
    $id_usuario = $_POST['txtIdUsuario'];
       
    $sentencia = $bd->prepare("INSERT INTO ecoapp.aporte(cliente, correos_eliminados, espacio_liberado, id_usuario ) VALUES (?, ?, ?, ?)");
    $resultado = $sentencia->execute([$cliente, $correos_eliminados, $espacio_liberado, $id_usuario]);

    if ($resultado === true) {
        header('location: index.php'); 
    }else{
        echo "error";
    }

    
?>