<?php
    require_once '../../assets/db/config.php';
    
    if(isset($_POST['update'])){
        $database = new Database();
        $db = $database->open();
        try{
            $id = $_GET['id'];
            $dni  = $_POST['dni'];
            $nombre =htmlspecialchars($_POST['nombre']);
            $direcc=$_POST['direcc'];
            $sexo=$_POST['sexo'];
            $correo=$_POST['correo'];
            $fijo=$_POST['fijo'];
            $movil=$_POST['movil'];
            $cargo = $_POST['cargo'];           
            
        $sql = "UPDATE usuairos SET dni = '$dni', nombre = '$nombre', direcc = '$direcc', sexo = '$sexo', 
                correo = '$correo', fijo = '$fijo', movil = '$movil',cargo = '$cargo' 
                WHERE  id  = '$id'";
            //if-else statement in executing our query
            $_SESSION['message'] = ( $db->exec($sql) ) ? 'Usuario actualizado correctamente' : 'No se puso actualizar el usuario';
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

    header('location: ../../folder/usuarios');
?>