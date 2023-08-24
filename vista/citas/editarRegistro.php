<?php

    session_start();
    require_once ('../../assets/db/config.php');

    if(isset($_POST['update'])){
        $database = new Database();
        $db = $database->open();
        try{
            $id = $_GET['id'];
           
            
            $id_vet  = $_POST['id_vet'];
            $id_tiM  = $_POST['id_tiM'];
            $id_servi  = $_POST['id_servi'];
            $title  = $_POST['title'];
            $nommas  = $_POST['nommas'];
            $dueno  = $_POST['dueno'];
            
            $start  = $_POST['start'];
            $end  = $_POST['end'];
            $precio  = $_POST['precio'];

            
$sql = "UPDATE quotes SET id_vet = '$id_vet',id_tiM = '$id_tiM',id_servi = '$id_servi',title = '$title',nommas = '$nommas',dueno = '$dueno',start = '$start',end = '$end',precio = '$precio' WHERE  id  = '$id'";
            //if-else statement in executing our query
            $_SESSION['message'] = ( $db->exec($sql) ) ? 'Actualizado correctamente' : 'No se puso actualizar';

        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }

        //Cerrar la conexión
        $database->close();
    }
    else{
        $_SESSION['message'] = 'Complete el formulario de edición';
    }

    header('location: ../../folder/citas');

?>