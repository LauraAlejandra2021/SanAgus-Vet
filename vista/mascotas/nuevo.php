<?php
require_once('../../assets/db/config.php');
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
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
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
            <div class="alert alert-info">
                <strong>Estimado usuario!</strong> Los campos remarcados con <span class="text-danger">*</span> son
                necesarios.
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                REGISTRO DE NUEVAS MASCOTAS
                                <small>Registra cualquier mascota...</small>
                            </h2>
                        </div>

                        <div class="body">
                            <form method="POST" autocomplete="off" enctype="multipart/form-data">
                                <div class="row clearfix">

                                    <div class="col-sm-4">
                                        <label class="control-label">Nombre de la mascota<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nomas" required class="form-control"
                                                    placeholder="Nombre de la mascota..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="control-label">Sexo de la mascota<span
                                                class="text-danger">*</span></label>
                                        <select name="sexo" class="form-control show-tick">
                                            <option value="">-- Seleccione un sexo --</option>
                                            <option value="Macho">Macho</option>
                                            <option value="Hembra">Hembra</option>

                                        </select>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="control-label">Edad de la mascota<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="edad" required class="form-control"
                                                    placeholder="Edad de la mascota..." />
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-sm-4">
                                        <label class="control-label">Tipo de la mascota<span
                                                class="text-danger">*</span></label>
                                        <select name="id_tiM" class="form-control show-tick"
                                            onchange="showselect(this.value)">

                                            <option value="">-- Seleccione un tipo --</option>
                                            <?php include "../funciones/tipo.php" ?>
                                        </select>
                                    </div>


                                    <div class="col-sm-4" id="id_raza">
                                        <label class="control-label">Raza de la mascota<span
                                                class="text-danger">*</span></label>
                                        <select class="form-control show-tick" name="id_raza">
                                            <option value="">-- Seleccione una raza --</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="control-label">Dueño de la mascota<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" required name="id_due">
                                                    <option value="">-- Seleccione un dueño --</option>
                                                    <?php
                                                    $dbhost = 'localhost';
                                                    $dbname = 'vetdog';
                                                    $dbuser = 'root';
                                                    $dbpass = '';

                                                    try {

                                                        $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
                                                        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    } catch (PDOException $ex) {

                                                        die($ex->getMessage());
                                                    }
                                                    $stmt = $dbcon->prepare('SELECT * FROM owner');
                                                    $stmt->execute();

                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        extract($row);
                                                        ?>
                                                        <option value="<?php echo $id_due; ?>"><?php echo $nom_due; ?>&nbsp;<?php echo $ape_due; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="control-label">Tamaño de la mascota<span
                                                class="text-danger">*</span></label>
                                        <select name="tamano" required class="form-control show-tick">
                                            <option value="">-- Seleccione un tamaño --</option>
                                            <option value="Pequeña">Pequeña</option>
                                            <option value="Grande">Grande</option>

                                        </select>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="control-label">Peso de la mascota<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="peso" maxlength="6" required
                                                    class="form-control" placeholder="Peso de la mascota..." />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="control-label">Observacion de la mascota</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" name="obser" class="form-control no-resize"
                                                    placeholder="Observaciones..."></textarea>
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
                                        <a type="button" href="../../folder/mascotas" class="btn bg-red"><i
                                                class="material-icons">cancel</i> CANCELAR </a>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <button class="btn bg-green" name="agregar">GUARDAR<i
                                                class="material-icons">save</i></button>
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
    <script src="../../assets/js/funciones/tipo.js"></script>
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
    <script type="text/javascript">
        function showselect(str) {
            var xmlhttp;
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("id_raza").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "../funciones/raza.php?c=" + str, true);
            xmlhttp.send();
        }
    </script>

    <?php

    if (isset($_POST["agregar"])) {
        // Creamos la conexión
        $db = new Database();
        $conn = $db->getMysqli();

        // Revisamos la conexión
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $nomas = $_POST['nomas'];
        $id_tiM = $_POST['id_tiM'];
        $id_raza = $_POST['id_raza'];
        $sexo = $_POST['sexo'];
        $edad = $_POST['edad'];
        $tamano = $_POST['tamano'];
        $peso = $_POST['peso'];
        $id_due = $_POST['id_due'];
        $obser = $_POST['obser'];
        $estado = $_POST['estado'];

        // Realizamos la consulta para saber si coincide con uno de esos criterios
        $sql = "SELECT * FROM pet WHERE nomas = '$nomas' and id_tiM ='$id_tiM' and id_raza ='$id_raza'  and sexo ='$sexo'  and edad ='$edad'  and tamano ='$tamano'  and peso ='$peso'  and id_due ='$id_due'  and obser ='$obser'  and estado ='$estado'";
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
            $sql2 = "insert into pet(nomas,id_tiM,id_raza,sexo,edad,tamano,peso,id_due,obser,estado) 
values ('$nomas','$id_tiM','$id_raza','$sexo','$edad','$tamano','$peso','$id_due','$obser','$estado')";

            if (mysqli_query($conn, $sql2)) {

                if ($sql2) {
                    ?>

                    <script type="text/javascript">
                        swal("¡Registrado!", "Agregado correctamente", "success").then(function () {
                            window.location = "../../folder/mascotas";
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