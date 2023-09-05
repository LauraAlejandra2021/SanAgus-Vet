<?php

require_once ('../../assets/db/config.php');
session_start();

if (!isset($_SESSION['cargo']) == 1) {
    header('location: ../pages-login');
}


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
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ya existe el registro a agregar!'

                })
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
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Agregado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location = "../../folder/categorias";
                    });
                </script>

            <?php
            } else {
            ?>
                <script type="text/javascript">
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo guardar!'

                    })
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                MODIFICAR CITAS RAPIDAS
                                <small>Modificar cualquier cita rapida...</small>
                            </h2>
                        </div>

                        <div class="body">
                            <?php
                            $db = new Database();
                            $con = $db -> getMysqli();
                            $id = $_GET['id'];
                            $sql = "SELECT q.id, u.id, u.dni, u.nombre, p.id_tiM, p.noTiM, s.id_servi, 
                                    s.nomser, q.title, q.nommas, q.dueno,  q.color, q.start, q.end, q.estado, q.precio 
                                    FROM quotes q
                                    INNER JOIN usuarios u ON q.id = u.id 
                                    INNER JOIN pet_type p ON q.id_tiM = p.id_tiM 
                                    INNER JOIN service s ON q.id_servi = s.id_servi 
                                    WHERE q.id= '$id'";
                            $query  = $con->query($sql);
                            $data =  array();
                            if ($query) {
                                while ($r = $query->fetch_object()) {
                                    $data[] = $r;
                                }
                            }

                            ?>
                            <?php if (count($data) > 0) : ?>
                                <?php foreach ($data as $d) : ?>
                                    <form method="POST" autocomplete="off" action="editarRegistro?id=<?php echo $d->id; ?>">
                                        <div class="row clearfix">

                                            <div class="col-sm-4">
                                                <label class="control-label">Nombre</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="title" value="<?php echo $d->title; ?>" class="form-control" placeholder="Nombre de la cita..." />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="control-label">Veterinario</label>
                                                <select class="form-control show-tick" name="id_vet" id="vete">
                                                    <option value="<?php echo $d->id; ?>"><?php echo $d->nombre; ?></option>
                                                    <?php
                                                    try {

                                                        $dbcon = $db->open();
                                                        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    } catch (PDOException $ex) {

                                                        die($ex->getMessage());
                                                    }
                                                    $stmt = $dbcon->prepare('SELECT * FROM usuarios');
                                                    $stmt->execute();

                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        extract($row);
                                                    ?>
                                                        <option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-4">
                                                <label class="control-label">Tipo de la mascota</label>
                                                <select class="form-control show-tick" name="id_tiM">
                                                    <option value="<?php echo $d->id_tiM; ?>"><?php echo $d->noTiM; ?></option>
                                                    <?php
                                                    try {

                                                        $dbcon = $db->open();
                                                        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    } catch (PDOException $ex) {

                                                        die($ex->getMessage());
                                                    }
                                                    $stmt = $dbcon->prepare('SELECT * FROM pet_type');
                                                    $stmt->execute();

                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        extract($row);
                                                    ?>
                                                        <option value="<?php echo $id_tiM; ?>"><?php echo $noTiM; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <label class="control-label">Servicio</label>
                                                <select class="form-control show-tick" name="id_servi">
                                                    <option value="<?php echo $d->id_servi; ?>"><?php echo $d->nomser; ?></option>
                                                    <?php
                                                    try {

                                                        $dbcon = $db->open();
                                                        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    } catch (PDOException $ex) {

                                                        die($ex->getMessage());
                                                    }
                                                    $stmt = $dbcon->prepare('SELECT * FROM service');
                                                    $stmt->execute();

                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        extract($row);
                                                    ?>
                                                        <option value="<?php echo $id_servi; ?>"><?php echo $nomser; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-4">
                                                <label class="control-label">Mascota</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="nommas" value="<?php echo $d->nommas; ?>" class="form-control" placeholder="Nombre de la mascota..." />
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <label class="control-label">Dueño</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="dueno" value="<?php echo $d->dueno; ?>" class="form-control" placeholder="Nombre del dueño..." />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-sm-3">
                                                <label class="control-label">Precio</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">monetization_on</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="text" value="<?php echo $d->precio; ?>" name="precio" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control money-euro" placeholder="Precio... Ex: $99,99">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Inicio</label>
                                                    <div class='input-group date' name="start">
                                                        <input type='datetime-local' value="<?php echo $d->start; ?>" name="start" class="form-control" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Fin</label>
                                                    <div class='input-group date' name="end">
                                                        <input type='datetime-local' value="<?php echo $d->end; ?>" name="end" class="form-control" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="container-fluid" align="center">
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                            </div>

                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                                <a type="button" href="../../folder/citas" class="btn bg-red"><i class="material-icons">cancel</i> CANCELAR </a>
                                            </div>

                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">


                                                <button class="btn bg-green" name="update">ACTUALIZAR<i class="material-icons">save</i></button>
                                            </div>

                                        </div>
                                    </form>
                        </div>
                    <?php endforeach; ?>

                <?php else : ?>
                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                        No hay datos
                    </span>
                <?php endif; ?>
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

</body>

</html>