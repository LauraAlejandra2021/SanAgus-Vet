<?php

session_start();
require_once '../../assets/db/config.php';

if (!isset($_SESSION['cargo']) == 1) {
    header('location: ../pages-login.php');
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
    <!-- Bootstrap Select Css -->
    <link href="../../assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
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
    <?php include_once __DIR__ . '../../commons/loading.php'; ?>

    <!-- Header -->
    <?php include_once __DIR__ . '../../commons/header.php'; ?>   

    <!-- Menu -->
    <?php include_once __DIR__ . '../../menu.php'; ?>

    <!--============================CONTENIDO DE LA PÁGINA ==========================================================-->

    <section class="content">
        <div class="container-fluid">

            <!-- <div class="alert alert-info">
                <strong>Estimado usuario!</strong> Los campos remarcados con <span class="text-danger">*</span> son necesarios.
            </div> -->
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                REGISTRO DE USUARIOS
                                <small>Registra cualquier usuario...</small>
                            </h2>
                        </div>

                        <div class="body">
                            <form method="POST" autocomplete="off" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <label class="control-label">DNI del usuario<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="dni" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="8" required class="form-control" placeholder="DNI del usuario..." />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="control-label">Nombre<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nombre" required class="form-control" placeholder="Nombre..." />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <label class="control-label">Direccion</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="direcc" class="form-control" placeholder="Direccion..." />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="control-label">Sexo</label>
                                        <select name="sexo" class="form-control show-tick">
                                            <option value="">-- Seleccione un sexo --</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <label class="control-label">Correo<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" name="correo" required class="form-control" placeholder="Correo..." />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="control-label"> Telefono movil<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="movil" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="9" required class="form-control" placeholder="Telefono movil..." />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="control-label"> Telefono fijo<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="fijo" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="6" required class="form-control" placeholder="Telefono fijo..." />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="control-label"> Perfil<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="cargo" class="form-control show-tick">
                                                    <option value="">-- Seleccione un sexo --</option>
                                                    <?php
                                                        $db = new Database();
                                                        $dbcon = $db->open();
                                                        $stmt = $dbcon->prepare('SELECT * FROM cargo');
                                                        $stmt->execute();

                                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                            extract($row);
                                                        ?>
                                                            <option value="<?php echo $id; ?>"><?php echo $descripcion; ?></option>
                                                        <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <label class="control-label"> Contraseña<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="contra" required class="form-control" placeholder="Contraseña..." />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-sm-4">
                                        <label class="control-label"> Imagen</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" id="imagen" name="foto" onchange="readURL(this);" data-toggle="tooltip">
                                                <img id="blah" src="http://placehold.it/180" alt="your image" style="max-width:90px;" />
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- <div class="col-sm-5" style="display:none;">
                                        <select name="estado" class="form-control show-tick">

                                            <option value="1">1</option>

                                        </select>
                                    </div> -->

                                    <!-- <div class="col-sm-5" style="display:none;">
                                        <select name="cargo" class="form-control show-tick">

                                            <option value="3">3</option>

                                        </select>
                                    </div> -->
                                </div>

                                <div class="container-fluid" align="center">
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <a type="button" href="../../folder/veterinarios" class="btn bg-red"><i class="material-icons">cancel</i> CANCELAR </a>
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


    <!--------------------------------script nuevo----------------------------->

    <?php
    if (isset($_POST["agregar"])) {
        // Creamos la conexión
        $db = new Database();
        $conn = $db->getMysqli();

        // Revisamos la conexión
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $direcc = $_POST['direcc'];
        $sexo = $_POST['sexo'];
        $correo = $_POST['correo'];
        $fijo = $_POST['fijo'];
        $movil = $_POST['movil'];
        $contra = hash('sha256', $_POST['contra']);
        $cargo = $_POST['cargo'];


        // Realizamos la consulta para saber si coincide con uno de esos criterios
        $sql = "select * from usuarios where dni='$dni' or correo='$correo' or fijo='$fijo' or movil='$movil'";
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
            $sql2 = "insert into usuarios (dni, nombre, direcc, sexo, correo, fijo, movil, contra, cargo) 
                        values ('$dni','$nombre','$direcc','$sexo','$correo', '$fijo','$movil','$contra','$cargo')";
            // $foto = $_FILES['foto'];

            // move_uploaded_file($foto['tmp_name'], "../../assets/img/subidas/" . $foto['name']);
            if (mysqli_query($conn, $sql2)) {

                if ($sql2) {
                ?>
                    <script type="text/javascript">
                        swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
                            window.location = "../../folder/usuarios.php";
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>

</html>