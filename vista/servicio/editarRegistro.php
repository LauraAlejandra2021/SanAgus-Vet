<?php
require_once('../../assets/db/config.php');
session_start();

if (isset($_POST['update'])) {
    $database = new Database();
    $db = $database->open();
    try {
        $id = $_GET['id'];
        $nomser = $_POST['nomser'];

        $sql = "UPDATE service SET nomser = '$nomser' WHERE  id_servi  = '$id'";
        //if-else statement in executing our query
        $_SESSION['message'] = ($db->exec($sql)) ? 'Actualizado correctamente' : 'No se puso actualizar';

    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }
    //Cerrar la conexión
    $database->close();
} else {
    $_SESSION['message'] = 'Complete el formulario de edición';
}
header('location: ../../folder/servicio');
?>