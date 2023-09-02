<?php
require_once('../../assets/db/config.php');
session_start();

if (isset($_POST['update'])) {
    $database = new Database();
    $db = $database->open();
    try {
        $id = $_GET['id'];
        $noTiM = $_POST['noTiM'];

        $sql = "UPDATE pet_type SET noTiM = '$noTiM' WHERE  id_tiM  = '$id'";
        //if-else statement in executing our query
        $_SESSION['message'] = ($db->exec($sql)) ? 'Tipo actualizado correctamente' : 'No se puso actualizar el tipo';

    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }

    //Cerrar la conexión
    $database->close();
} else {
    $_SESSION['message'] = 'Complete el formulario de edición';
}

header('location: ../../folder/tipo');

?>