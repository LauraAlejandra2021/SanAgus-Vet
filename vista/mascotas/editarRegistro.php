<?php
require_once('../../assets/db/config.php');
session_start();

if (isset($_POST['update'])) {
    $database = new Database();
    $db = $database->open();
    try {
        $id = $_GET['id'];

        $nomas = $_POST['nomas'];
        $sexo = $_POST['sexo'];
        $edad = $_POST['edad'];
        $id_due = $_POST['id_due'];
        $tamano = $_POST['tamano'];
        $peso = $_POST['peso'];
        $obser = $_POST['obser'];

        $sql = "UPDATE pet SET nomas = '$nomas',sexo = '$sexo',edad = '$edad',id_due = '$id_due',tamano = '$tamano',peso = '$peso',obser = '$obser' WHERE  id_pet  = '$id_pet'";
        //if-else statement in executing our query
        $_SESSION['message'] = ($db->exec($sql)) ? 'Mascota actualizado correctamente' : 'No se puso actualizar ñla mascota';

    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }

    //Cerrar la conexión
    $database->close();
} else {
    $_SESSION['message'] = 'Complete el formulario de edición';
}

header('location: ../../folder/mascotas');

?>