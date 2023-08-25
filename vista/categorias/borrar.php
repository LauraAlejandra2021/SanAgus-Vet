<?php
	include('../../assets/db/config.php');

	if(isset($_GET['id'])){
		$database = new Database();
		$db = $database->open();
		try{
			$sql = "DELETE FROM category WHERE id_cate = '".$_GET['id']."'";
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Categoria borrada' : 'Hubo un error al borrar la categoria';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar conexión
		$database->close();
	}

	header('location: ../../folder/categorias');
?>