<?php 
    include_once 'model/conexion.php';


    $sentencia = $bd->query("SELECT * FROM ecoapp.aporte WHERE id_usuario = 2;");
    $aportes = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($aportes);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/645e607b7e.js" crossorigin="anonymous"></script>
    <title>Un Click Por Mi Planeta</title>
</head>
<body>
    <h3>Registros</h3>
    <p>Esta iniciativa es para proteger el medio ambiente</p>
    <table border="1" width="80%" cellspacing="0"> 
        <tr>
            <td>ID Cliente</td>
            <td>Emails o Archivos eliminados</td>
            <td>Espacio liberado En Mbs.</td>
            <td>Fecha de registro</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>

        <?php

            foreach ($aportes as $dato) {
        
        ?>
            <tr>
                <td><?php echo $dato->cliente?> </td> , 
                <td><?php echo $dato->correos_eliminados?></td>
                <td><?php echo $dato->espacio_liberado?></td>
                <td><?php echo $dato->fecha?></td>
                <td><i class="fa-regular fa-pen-to-square"></i></td>
                <td><i class="fa-solid fa-trash"></i></td>
            </tr>
                
                <?php
            }
                ?>
 

    </table>

    <h1>Usuario: <?php echo $dato->id_usuario?></h1>
    <h3>Has contribuido con el medio ambiente en: </h3>

</body>
</html>
</br>
