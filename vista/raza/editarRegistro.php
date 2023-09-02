<?php
require_once('../../assets/db/config.php');
session_start();

if (isset($_POST['update'])) {
    $database = new Database();
    $db = $database->open();
    try {
        $id = $_GET['id'];

        $nomraza = $_POST['nomraza'];
        $id_tiM = $_POST['id_tiM'];

        $sql = "UPDATE raza SET nomraza = '$nomraza',id_tiM = '$id_tiM' WHERE  id_raza  = '$id'";
        //if-else statement in executing our query
        $_SESSION['message'] = ($db->exec($sql)) ? 'Raza actualizado correctamente' : 'No se puso actualizar la raza';

    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }

    //Cerrar la conexión
    $database->close();
} else {
    $_SESSION['message'] = 'Complete el formulario de edición';
}

header('location: ../../folder/raza');

?>