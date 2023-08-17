<?php
require_once '../modelo/modelouser.php';
class usercontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $user=new Modelo();

        $dato=$user->mostrar("usuarios", "1");
        require_once '../vista/usuarios/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/usuarios/nuevo';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->dni=$_POST['txtdni'];
                $alm->nombre=$_POST['txtnom'];
                
                
     $this->model->insertar($alm);
     //-------------
header("Location: usuarios.php");

          }


    }
