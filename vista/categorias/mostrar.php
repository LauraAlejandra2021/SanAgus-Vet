<?php
include __DIR__ . '../../../assets/db/config.php';
session_start();

if (!isset($_SESSION['cargo']) == 1) {
    header('location: ../vista/pages-login');
}

if (isset($_POST["update"])) {
    // Creamos la conexión
    $db = new Database();
    $conn = $db->getMysqli();

    // Revisamos la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $id = $_GET['id'];

    $nomcate = $_POST['nomcate'];


    // Realizamos la consulta para saber si coincide con uno de esos criterios
    $sql2 = "select id_cate from category where nomcate='$nomcate'";
    $result = mysqli_query($conn, $sql2);

  
    // Si no hay resultados, ingresamos el registro a la base de datos
    $sql2 = "update category set nomcate='$nomcate'where id_cate='$id'";


    if (mysqli_query($conn, $sql2)) {
        if ($sql2) {
        ?>
            <script type="text/javascript">
                swal("¡Update!", "Actualizado correctamente", "success").then(function() {
                    window.location = "categorias";
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
    // Cerramos la conexión
    $conn->close();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Vetdog V.1 | Vetdog - Vetdog Admin Template</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="../assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="../assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../assets/css/themes/all-themes.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/lll.png" />

</head>

<body class="theme-red">
    <!-- Loading -->
    <?php include_once __DIR__ . '../../commons/loading.php'; ?>

    <!-- Header -->
    <?php include_once __DIR__ . '../../commons/header.php'; ?>

    <!-- Menu -->
    <?php include_once __DIR__ . '../../menu.php'; ?>
    <!--=============================================================CONTENIDO DE LA PÁGINA =============================================================-->
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Listado de categorías :
                            </h2><br>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>NOMBRE</th>
                                            <th>FECHA</th>
                                            <th>ESTADO</th>
                                            <th>ACCIONES</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        foreach ($dato as $key => $value) {
                                            foreach ($value as $va) { ?>
                                                <tr>
                                                    <td><?php echo $va['id_cate']; ?></td>
                                                    <td><?php echo $va['nomcate']; ?></td>
                                                    <td><?php echo $va['fere']; ?></td>

                                                    <td class="text-center"><?php

                                                        if ($va['estado'] == 1) { ?>
                                                            <form method="get" action="javascript:activo('<?php echo $va['id_cate']; ?>')">

                                                                <span class="label label-success">Activo</span>
                                                            </form>
                                                        <?php  } else { ?>

                                                            <form method="get" action="javascript:inactivo('<?php echo $va['id_cate']; ?>')">
                                                                <button type="submit" class="btn btn-danger btn-xs">Inactivo</button>
                                                            </form>
                                                        <?php  } ?>
                                                    </td>

                                                    <td class="text-center"><a type="button" href="../vista/categorias/edit?id=<?php echo $va["id_cate"]; ?>" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                                            <i class="material-icons">edit</i>
                                                        </a>
                                                        <a type="button" href="../vista/categorias/borrar?id=<?php echo $va["id_cate"]; ?>" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                            <i class="material-icons">delete forever</i>
                                                        </a>


                                                </tr>

                                        <?php
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Select Plugin Js -->
    <script src="../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="../assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../assets/js/admin.js"></script>
    <script src="../assets/js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../assets/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</body>

</html>