<?php
    include('../../assets/db/config.php');

	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM products WHERE id_prod = '".$_GET['id']."'";
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Producto borrado' : 'Hubo un error al borrar el producto';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		$database->close();

	}
	else{
		$_SESSION['message'] = 'Seleccionar miembro para eliminar primero';
	}

	header('location: ../../folder/productos');

?>