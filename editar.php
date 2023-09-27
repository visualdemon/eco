<?php
    include_once 'model/conexion.php';

    if (!isset($_GET['id'])) {
        header('location: index.php'); 
    }

    $id_aporte=$_GET['id'];

    $sentencia = $bd->prepare("SELECT * FROM ecoapp.aporte WHERE id_aporte = ?;");
    $sentencia->execute([$id_aporte]);
    $aporte = $sentencia->fetch(PDO::FETCH_OBJ);
    print_r($aporte);

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
                    <td><input type="text" name="txtCliente"></td>
                </tr>
                <tr>
                    <td>Emails o Archivos eliminados</td>
                    <td><input type="text" name="txtCoreosEliminados"></td>
                </tr>
                <tr>
                    <td>Espacio liberado En Mbs.</td>
                    <td><input type="text" name="txtEspacioLiberado">
                </tr>
                
                <!-- <input type="hidden" name="txtIdUsuario" value="<?php echo($id_usuario);?>"> -->
                <input type="hidden" name="oculto" value="1">

                <tr>
                    <td></td>
                    <td><input type="submit" value="INGRESAR REGISTRO"></td>
                    
                </tr>

            </table>
        </form>
    
</body>
</html>