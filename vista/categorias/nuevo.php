<?php
require_once ('../../assets/db/config.php');
session_start();

if (!isset($_SESSION['cargo']) == 1) {
    header('location: ../pages-login');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Vetdog V.1 | Vetdog - Vetdog Admin Template</title>
    <!-- Google Font - Iconos -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />



</head>

<body class="theme-red">
    
    <!-- Loading -->
    <?php include('../commons/loading.php');?>
    
    <!-- Header -->
    <?php include('../commons/header.php');?>
    
    <!-- Menu -->
    <?php include('../menu.php');?>

    <!--============================CONTENIDO DE LA PÁGINA ==========================================================-->

    <section class="content">
        <div class="container-fluid">
            <!-- Input -->

            <div class="alert alert-info">
                <strong>Estimado usuario!</strong> Los campos remarcados con <span class="text-danger">*</span> son necesarios.
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                REGISTRO DE CATEGORÍAS
                                <small>Registra cualquier categoría de un producto...</small>
                            </h2>
                        </div>

                        <div class="body">
                            <form method="POST" autocomplete="off" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <label class="control-label">Nombre de la Categoría<span class="text-danger">*</span>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="nomcate" required class="form-control" placeholder="Nombre de la Categoría..." />
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col-sm-5" style="display:none;">
                                        <select name="estado" class="form-control show-tick">

                                            <option value="1">1</option>

                                        </select>
                                    </div>



                                </div>

                                <div class="container-fluid" align="center">
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <a type="button" href="../../folder/categorias" class="btn bg-red"><i class="material-icons">cancel</i> CANCELAR </a>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">


                                        <button class="btn bg-green" name="agregar">GUARDAR<i class="material-icons">save</i></button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Input -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Select Plugin Js -->
    <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="../../assets/plugins/node-waves/waves.js"></script>
    <!-- Autosize Plugin Js -->
    <script src="../../assets/plugins/autosize/autosize.js"></script>
    <!-- Moment Plugin Js -->
    <script src="../../assets/plugins/momentjs/moment.js"></script>
    <!-- Bootstrap Material Datetime Picker Plugin Js -->

    <!-- Bootstrap Datepicker Plugin Js -->

    <!-- Custom Js -->
    <script src="../../assets/js/admin.js"></script>
    <script src="../../assets/js/pages/forms/basic-form-elements.js"></script>
    <!-- Demo Js -->

    <script src="../../assets/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <?php
    if (isset($_POST["agregar"])) {

        // Creamos la conexión
        $db = new Database();
        $conn = $db -> getMysqli();
    
        // Revisamos la conexión
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $nomcate = $_POST['nomcate'];
        $estado = $_POST['estado'];
    
        // Realizamos la consulta para saber si coincide con uno de esos criterios
        $sql = "select * from category where nomcate='$nomcate'";
        $result = mysqli_query($conn, $sql);
    ?>
    
    
        <?php
        // Validamos si hay resultados
        if (mysqli_num_rows($result) > 0) {
            // Si es mayor a cero imprimimos que ya existe el usuario
    
            if ($result) {
        ?>
    
                <script type="text/javascript">
                    swal("Oops...!", "Ya existe el registro a agregar!", "error")
                </script>
    
                <?php
            }
        } else {
            // Si no hay resultados, ingresamos el registro a la base de datos
            $sql2 = "insert into category(nomcate,estado) 
    values ('$nomcate','$estado')";
    
            if (mysqli_query($conn, $sql2)) {
    
                if ($sql2) {
                ?>
    
                    <script type="text/javascript">
                        swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
                            window.location = "../../folder/categorias";
                        });
                    </script>
    
    
                <?php
                } else {
                ?>
                    <script type="text/javascript">
                        swal("Oops...!", "No se pudo guardar!", "error")
                    </script>
    <?php
    
                }
            } else {
    
                echo "Error: " . $sql2 . "" . mysqli_error($conn);
            }
        }
        // Cerramos la conexión
        $conn->close();
    }
    ?>
</body>

</html>