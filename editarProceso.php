<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluye el archivo de conexión a la base de datos
    include_once 'model/conexion.php';

    // Recibe los datos del formulario
    $id_aporte = $_POST['id_aporte']; // Asegúrate de que este campo esté presente en el formulario
    $cliente = $_POST['txtCliente']; // Nombre del campo debe coincidir con el formulario
    $correos_eliminados = $_POST['txtCorreosEliminados']; // Corrige el nombre del campo
    $espacio_liberado = $_POST['txtEspacioLiberado']; // Corrige el nombre del campo

    // Actualiza los datos en la base de datos
    $sentencia = $bd->prepare("UPDATE ecoapp.aporte SET cliente = ?, correos_eliminados = ?, espacio_liberado = ? WHERE id_aporte = ?");

    // Ejecuta la actualización
    $resultado = $sentencia->execute([$cliente, $correos_eliminados, $espacio_liberado, $id_aporte]);

    // Verifica si la actualización se realizó con éxito
    if ($resultado) {
        // Redirecciona a una página de éxito o a la página principal
        header('Location: exito_actualizacion.php');
        exit();
    } else {
        // Manejar un error en caso de que la actualización falle
        $errorInfo = $sentencia->errorInfo();
        echo "Error al actualizar el registro: " . $errorInfo[2];
    }
} else {
    // Si no se ha enviado el formulario, redirige a la página principal o a donde sea necesario
    header('Location: index.php');
    exit();
}
?>
