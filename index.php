<?php 
    
    include_once 'model/conexion.php';


    $sentencia = $bd->query("select * FROM ecoapp.aporte INNER join ecoapp.usuario WHERE aporte.id_usuario=usuario.id_usuario and aporte.id_usuario = 1;");
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

            $total_aporte = 0;
            

            foreach ($aportes as $dato) {
        
        ?>
            <tr>
                <td><?php echo $dato->cliente?> </td> 
                <td><?php echo $dato->correos_eliminados?></td>
                <td><?php echo $dato->espacio_liberado?></td>
                <td><?php echo $dato->fecha?></td>
                <td><a href="#" rel="noopener noreferrer"><i class="fa-regular fa-pen-to-square"></i></a></td>
                <td><a href="#" rel="noopener noreferrer"><i class="fa-solid fa-trash"></i></a></td>
            </tr>

                
                
                <?php
                $espacio_liberado = $dato->espacio_liberado;
                $total_aporte = $total_aporte + $espacio_liberado;
            }
                ?>
 

    </table>

    <h1>Usuario: <?php echo $dato->nombre?></h1>
    <h3>Hasta el momento has eliminado un total de: <?php echo $total_aporte?> Mb</h3>
    <h4>Energía Ahorrada:  <?php echo ($total_aporte/1024)* 6.536 ?> KWh</h4>
    <h4>Emisiones CO2: <?php echo (($total_aporte/1024)* 831)/1000000 ?> ppm</h4>
    <h4>Ahorro en dólares: $ <?php echo ($total_aporte/1024)* 0.1245398 ?></h4>
    <h4>Equivale a tener encendidos: <?php echo ($total_aporte/1024)* 0.145 ?> Bombillas led</h4>

</body>
</html>
</br>
