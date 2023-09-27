<?php
include_once 'model/conexion.php';

// Se hace consulta a base de datos con inner join para sacar el nombre del usuario 
$sentencia = $bd->query("SELECT * FROM ecoapp.aporte INNER JOIN ecoapp.usuario WHERE aporte.id_usuario = usuario.id_usuario AND aporte.id_usuario = 1;");
$aportes = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Enlace al archivo CSS separado -->

    <script src="https://kit.fontawesome.com/645e607b7e.js" crossorigin="anonymous"></script>
    <title>Un Click Por Mi Planeta</title>
</head>
<body>
    <h1>Registros</h1>
    <p>Esta iniciativa es para proteger el medio ambiente</p>

    <?php
    if (!empty($aportes)) { // Verificar si $aportes no está vacío
        // Imprime el nombre del usuario fuera del bucle principal
        echo '<h3>Usuario: ' . $aportes[0]->nombre . '</h3>';
    } else {
        echo '<h3>No hay datos de usuario disponibles</h3>';
    }
    ?>

    <table border="1" width="80%" cellspacing="0">
        <tr>
            <td>Cliente de almacenamiento</td>
            <td>Emails o Archivos eliminados</td>
            <td>Espacio liberado en Mbs.</td>
            <td>Fecha de registro</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>

        <?php
        if (!empty($aportes)) { // Verificar si $aportes no está vacío
            $total_aporte = 0;
            // foreach para ciclo de pedir datos de la base de datos
            foreach ($aportes as $dato) {
                ?>
                <tr>
                    <td><?php echo $dato->cliente ?></td>
                    <td><?php echo $dato->correos_eliminados ?></td>
                    <td><?php echo $dato->espacio_liberado ?></td>
                    <td><?php echo $dato->fecha ?></td>
                    <td><a href="editar.php?id=<?php echo $dato->id_aporte ?>" rel="noopener noreferrer"><i
                                class="fa-regular fa-pen-to-square"></i></a></td>
                    <td><a href="#" rel="noopener noreferrer"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                <?php
                $id_usuario = $dato->id_usuario; // se inicia variable para hacer el registro en insertar
                $espacio_liberado = $dato->espacio_liberado; // se declara espacio liberado para operaciones 
                $total_aporte = $total_aporte + $espacio_liberado; //el espacio liberado se suma para sacar el total
            }
        } else {
            echo '<tr><td colspan="6">No hay datos disponibles</td></tr>';
        }
        ?>
    </table>

    <h3>Hasta el momento has eliminado un total de: <?php echo $total_aporte ?> Mb</h3>
    <p>Energía Ahorrada: <?php echo number_format(($total_aporte / 1024) * 6.536, 2) ?> KWh</p>
    <p>Emisiones CO2: <?php echo number_format((($total_aporte / 1024) * 831) / 1000000, 4) ?> ppm</p>
    <p>Ahorro en dólares: $ <?php echo number_format(($total_aporte / 1024) * 0.1245398, 2) ?></p>
    <p>Equivale a tener encendidos: <?php echo number_format(($total_aporte / 1024) * 0.145, 2) ?> Bombillas led</p>

    <h1>Nuevo registro</h1>
    <form method="POST" action="insertar.php">
        <table>
            <tr>
                <td>Cliente</td>
                <td><input type="text" name="txtCliente"></td>
            </tr>
            <tr>
                <td>Emails o Archivos eliminados</td>
                <td><input type="text" name="txtCoreosEliminados"></td>
            </tr>
            <tr>
                <td>Espacio liberado En Mbs.</td>
                <td><input type="text" name="txtEspacioLiberado"></td>
            </tr>
            <input type="hidden" name="txtIdUsuario"
                   value="<?php echo(isset($id_usuario) ? $id_usuario : ''); // Datos ocultos para generar la consulta ?>">
            <input type="hidden" name="oculto" value="1">
            <tr>
                <td></td>
                <td><input type="submit" value="INGRESAR REGISTRO"></td>
            </tr>
        </table>
    </form>
</body>
</html>
