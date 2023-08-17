<?php

class Modelo{

  private $usuario;
  private $db;

  public function __construct(){
      $this->usuario=array();
      $this->db=new PDO('mysql:host=localhost;dbname=vetdog',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT u.id, u.dni, u.nombre, u.correo, u.direcc, c.descripcion, u.fijo, u.movil, u.estado 
      FROM usuarios u
      INNER JOIN cargo c ON u.cargo = c.id";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->usuario[]=$tabla;
      }
      return $this->usuario;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO usuarios (dni,  nom)VALUES(?,?)";

      $this->db->prepare($query)->execute(array($data->dni, $data->nombre));

    }catch (Exception $e) {

      die($e->getMessage());
    }
    }
	
  public function actualizar($tabla,$data,$condicion){
      $consulta="UPDATE $tabla SET $data WHERE $condicion";
      $resultado=$this->db->query($consulta);
      if($resultado){
          return true;
      }else{
          return false;
      }
  }
  public function eliminar($tabla,$condicion){
      $consulta="DELETE FROM $tabla WHERE $condicion";
      $resultado=$this->db->query($consulta);
      if($resultado){
          return true;
      }else{
          return false;
      }
  }
}

 ?>
