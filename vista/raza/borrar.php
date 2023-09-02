<?php
require_once('../../assets/db/config.php');
session_start();

if (isset($_GET['id'])) {
	$database = new Database();
	$db = $database->open();
	try {
		$sql = "DELETE FROM raza WHERE id_raza = '" . $_GET['id'] . "'";
		//if-else statement in executing our query
		$_SESSION['message'] = ($db->exec($sql)) ? 'Raza borrada' : 'Hubo un error al borrar la raza';
	} catch (PDOException $e) {
		$_SESSION['message'] = $e->getMessage();
	}

	//Cerrar conexión
	$database->close();

} else {
	$_SESSION['message'] = 'Seleccionar miembro para eliminar primero';
}

header('location: ../../folder/raza');

?>