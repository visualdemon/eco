<?php
include_once 'model/conexion.php';

if (!isset($_GET['id'])) {
    header('location: index.php');
    exit();
}

$id_aporte = $_GET['id'];

$sentencia = $bd->prepare("SELECT * FROM ecoapp.aporte WHERE id_aporte = ?;");
$sentencia->execute([$id_aporte]);
$aporte = $sentencia->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
<h1>Editar registro</h1>
    <form method="POST" action="editarProceso.php">
            <table>
                <tr>    
                    <td>Cliente</td>
                    <td><input type="text" name="txtCliente" value="<?php echo $aporte->cliente; ?>"></td>
                </tr>
                <tr>
                    <td>Emails o Archivos eliminados</td>
                    <td><input type="text" name="txtCorreosEliminados" value="<?php echo $aporte->correos_eliminados; ?>"></td>
                </tr>
                <tr>
                    <td>Espacio liberado En Mbs.</td>
                    <td><input type="text" name="txtEspacioLiberado" value="<?php echo $aporte->espacio_liberado; ?>">
                </tr>

                <input type="hidden" name="id_aporte" value="<?php echo $aporte->id_aporte; ?>">
                <input type="hidden" name="oculto" value="1">

                <tr>
                    <td></td>
                    <td><input type="submit" value="ACTUALIZAR REGISTRO"></td>
                </tr>
            </table>
        </form>
</body>
</html>
