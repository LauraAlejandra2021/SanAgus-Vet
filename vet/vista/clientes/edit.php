﻿<?php
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
    <link href="../../assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <!-- Bootstrap DatePicker Css -->
    <link href="../../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Cargando...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- LUPA -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons"></i>
        </div>
        <input type="text" placeholder="Buscar...">
        <div class="close-search">
            <i class="material-icons">X</i>
        </div>
    </div>
    <!-- //LUPA -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../panel-admin/administrador"> VETDOG - DASHBOARD </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->

    <!-- Menu -->
    <?php include('../menu.php'); ?>

    <!--============================CONTENIDO DE LA PÁGINA ==========================================================-->

    <section class="content">
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                MODIFICAR CLIENTES
                                <small>Modificar cualquier cliente...</small>
                            </h2>
                        </div>

                        <div class="body">
                            <?php
                            function connect()
                            {
                                return new mysqli("localhost", "root", "", "vetdog");
                            }
                            $con = connect();
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM owner  WHERE id_due= '$id'";
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
                                    <form method="POST" autocomplete="off" action="editarRegistro?id=<?php echo $d->id_due; ?>">

                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <label class="control-label">DNI del cliente</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" value="<?php echo $d->dni_due; ?>" name="dni_due" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="8" required class="form-control" placeholder="DNI del cliente..." />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="control-label">Nombre del cliente</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" value="<?php echo $d->nom_due; ?>" name="nom_due" required class="form-control" placeholder="Nombre del cliente..." />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="control-label">Apellido del cliente</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" value="<?php echo $d->ape_due; ?>" name="ape_due" required class="form-control" placeholder="Apellido del cliente..." />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="control-label">Nacimiento del cliente</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" value="<?php echo $d->fecnaci; ?>" name="fecnaci" class="datepicker form-control" placeholder="Seleccione la Fecha de nacimiento...">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="control-label">Telefono movil del cliente</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" value="<?php echo $d->movil; ?>" name="movil" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="9" class="form-control" placeholder="Telefono movil..." />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="control-label">Telefono fijo del cliente</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" value="<?php echo $d->fijo; ?>" name="fijo" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="6" class="form-control" placeholder="Telefono fijo..." />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="control-label">Correo del cliente</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="email" value="<?php echo $d->correo; ?>" name="correo" required class="form-control" placeholder="Correo..." />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="control-label">Direccion del cliente</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" value="<?php echo $d->direc; ?>" name="direc" required class="form-control" placeholder="Direccion..." />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="control-label">Usuario del cliente</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" value="<?php echo $d->usuario; ?>" name="usuario" required class="form-control" placeholder="Usuario..." />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="container-fluid" align="center">
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                            </div>

                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                                <a type="button" href="../../folder/clientes" class="btn bg-red"><i class="material-icons">cancel</i> CANCELAR </a>
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
    <script src="../../assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <!-- Custom Js -->
    <script src="../../assets/js/admin.js"></script>
    <script src="../../assets/js/pages/forms/basic-form-elements.js"></script>
    <!-- Demo Js -->

    <script src="../../assets/js/demo.js"></script>


    <!--------------------------------script nuevo----------------------------->


</body>

</html>