<?php
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
    <!-- Bootstrap Material Datetime Picker Css -->
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
    <!-- JQuery DataTable Css -->
    <link href="../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />

    <link href="../../assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <style type="text/css">
        #ticket,
        #boleta,
        #factura {

            display: none;

        }
    </style>

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

    <!-- Header -->
    <?php include_once __DIR__ . '../../commons/header.php'; ?>

    <!-- Menu -->
    <?php include_once __DIR__ . '../../menu.php'; ?>

    <!--============================CONTENIDO DE LA PÁGINA ==========================================================-->
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Carrito de compras :
                            </h2><br>

                        </div>
                        <div class="body">
                            <?php

                            $con  = new mysqli("localhost", "root", "", "vetdog");
                            $products = $con->query("SELECT products.id_prod, products.codigo,products.foto,products.nompro, products.stock, category.id_cate, category.nomcate, products.fere, supplier.id_prove, supplier.nomprove, supplier.ruc,supplier.ruc, supplier.pais, supplier.corre FROM products INNER JOIN category ON products.id_cate = category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove");
                            if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) :
                            ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th>FOTO</th>
                                                <th>CÓDIGO</th>
                                                <th>PRODUCTO</th>
                                                <th>CANTIDAD</th>

                                                <th>PRECIO</th>

                                                <th>REMOVER</th>
                                                <th>STOCK</th>
                                                <th>SUBTOTAL</th>



                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $total = 0; ?>
                                            <?php
                                            /*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
                                            foreach ($_SESSION["cart"] as $c) :
                                                $products = $con->query("SELECT products.id_prod, products.codigo,products.foto,products.nompro, products.stock, products.precV, products.preciC,category.id_cate, category.nomcate, products.fere FROM products INNER JOIN category ON products.id_cate = category.id_cate  where id_prod=$c[id_prod]");
                                                $r = $products->fetch_object();
                                            ?>
                                                <tr>
                                                    <td><?php echo "<img src='../../assets/img/subidas/" . $r->foto . "'width='50'"; ?></td>
                                                    <td><?php echo $r->codigo; ?></td>
                                                    <td><?php echo $r->nompro; ?></td>

                                                    <th><?php echo $c["canti"]; ?></th>


                                                    <td>S/. <?php echo $r->preciC; ?></td>




                                                    <td style="width:260px;">
                                                        <?php
                                                        $found = false;
                                                        foreach ($_SESSION["cart"] as $c) {
                                                            if ($c["id_prod"] == $r->id_prod) {
                                                                $found = true;
                                                                break;
                                                            }

                                                            if ($c["id_prod"] == $r->stock) {
                                                                $found = true;
                                                                break;
                                                            }
                                                        }
                                                        ?>
                                                        <a href="delfromcart?id=<?php echo $c["id_prod"]; ?>" class="btn btn-danger"><i class="material-icons">delete</i></a>
                                                    </td>
                                                    <th><?php echo $r->stock; ?></th>

                                                    <td>S/. <?php echo $c["canti"] * $r->preciC; ?></td>

                                                    <?php $total = $total + ($c["canti"] * $r->preciC); ?>

                                                <?php endforeach; ?>
                                                </tr>

                                                <tr>
                                                    <td colspan="3" align="right">
                                                        <h3>Total:</h3>
                                                    </td>
                                                    <td align="right">
                                                        <h3>S/. <?php echo number_format($total, 2); ?></h3>
                                                    </td>
                                                </tr>


                                        </tbody>
                                    </table>



                                    <hr>

                                    <form class="form-horizontal" method="post" action="process.php">
                                        <div class="form-group">

                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-success">Terminar Compra</button>
                                                <button onclick="window.location.href='nuevo'" class="btn btn-primary">Seguir comprando</button>
                                            </div>



                                        </div>
                                        <div class="form-group" style="display:none;">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Estadp</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="estado" required class="form-control" value="1">
                                            </div>
                                        </div>

                                        <div class="col-md-2" id="id_prove" style="display:none;">
                                            <div class="form-group">
                                                <label class="control-label">ID</label>
                                                <select class="form-control form-control-line" required="" id="id_prove" name="id_prove">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group" style="display:none;">
                                            <label class="control-label">Cati</label>
                                            <input type="text" class="form-control" value="<?php echo $c["canti"]; ?>" id="canti" name="canti">

                                        </div>

                                        <div class="form-group" style="display:none;">
                                            <label class="control-label">Total</label>
                                            <input type="text" class="form-control" value="<?php echo number_format($total, 2); ?>" name="total">

                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-sm-3">
                                                <label class="control-label">Tipo Comprobante</label>
                                                <select id="selector" name="tipoc" required class="form-control show-tick" onchange="verSeleccion()">

                                                    <option value="">Seleccione un tipo</option>
                                                    <option value="Ticket">TICKET</option>
                                                    <option value="Boleta">BOLETA</option>
                                                    <option value="Factura">FACTURA</option>

                                                </select>
                                            </div>


                                            <div class="col-sm-3">
                                                <label class="control-label">Forma de Pago</label>
                                                <select name="tipopa" required class="form-control show-tick">

                                                    <option value="">-- Seleccione una forma --</option>
                                                    <option value="Contado">CONTADO</option>
                                                    <option value="Credito">CREDITO</option>


                                                </select>
                                            </div>

                                        </div>


                                    </form>
                                <?php else : ?>
                                    <p class="alert alert-warning">El carrito esta vacio.</p>
                                <?php endif; ?>
                                <br>
                                <h3>Proveedor <a style="margin-top:20px;" href="#new" data-toggle="modal" title="New" class="btn btn-primary"><i class="material-icons">add_circle</i> Nuevo</a> <?php include('../compra/modal.php'); ?></h3>

                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <label class="control-label">Nombre del proveedor</label>
                                        <select name="id_prove" required class="form-control show-tick" onchange="showselect(this.value)">

                                            <option value="">-- Seleccione un proveedor --</option>
                                            <?php include "../funciones/provee.php" ?>
                                        </select>
                                    </div>



                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Fecha</label>
                                            <div class="form-line">
                                                <input type="text" value="<?php $fechaActual = date('Y-m-d');
                                                                            echo $fechaActual; ?>" class="form-control" placeholder="fecha..." />
                                            </div>
                                        </div>
                                    </div>

                                </div>








                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
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

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="../../assets/plugins/autosize/autosize.js"></script>
    <!-- Moment Plugin Js -->
    <script src="../../assets/plugins/momentjs/moment.js"></script>
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../../assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Custom Js -->
    <script src="../../assets/js/admin.js"></script>

    <script src="../../assets/js/pages/tables/jquery-datatable.js"></script>
    <!-- Demo Js -->

    <script src="../../assets/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    <!--------------------------------script nuevo----------------------------->
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
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("id_prove").innerHTML = xmlhttp.responseText;

                }

            }
            xmlhttp.open("GET", "../funciones/provee_ruc.php?c=" + str, true);



            xmlhttp.send();
        }
    </script>

    <!--------------------------------script nombre provee----------------------------->

    <script type="text/javascript">
        function verSeleccion() {

            var ticket = document.getElementById('ticket');

            var boleta = document.getElementById('boleta');

            var factura = document.getElementById('factura');





            var seleccionado = document.getElementById("selector").value;

            if (seleccionado == 'ticket') {

                ticket.style.display = 'block';

                boleta.style.display = 'none';
                factura.style.display = 'none';



            } else if (seleccionado == 'boleta') {

                ticket.style.display = 'none';

                boleta.style.display = 'block';

                factura.style.display = 'none';



            } else if (seleccionado == 'factura') {

                ticket.style.display = 'none';

                factura.style.display = 'block';

                boleta.style.display = 'none';



            } else {

                modelo.style.display = 'none';

                boleta.style.display = 'none';
                factura.style.display = 'none';



            }

        }
    </script>

    <script>
        $('#buscar').click(function() {
            dni = $('#documento').val();
            $.ajax({
                url: '../proveedores/consultaRUC',
                type: 'post',
                data: 'dni=' + dni,
                dataType: 'json',
                success: function(r) {
                    if (r.numeroDocumento == dni) {
                        $('#nombre').val(r.nombre);
                        $('#direccion').val(r.direccion);
                        $('#provincia').val(r.provincia);

                    } else {
                        alert(r.error);
                    }
                    console.log(r)
                }
            });
        });
    </script>
    <!--------------------------------script nuevo----------------------------->

    <?php
    if (isset($_POST["agregar"])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vetdog";

        // Creamos la conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Revisamos la conexión
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $ruc = $_POST['ruc'];
        $nomprove = $_POST['nomprove'];
        $direcc = $_POST['direcc'];
        $pais = $_POST['pais'];
        $estado = $_POST['estado'];


        // Realizamos la consulta para saber si coincide con uno de esos criterios

        $result = mysqli_query($conn);
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
            $sql2 = "insert into supplier(ruc,nomprove,direcc,pais,estado) 
values ('$ruc','$nomprove','$direcc','$pais','$estado')";

            if (mysqli_query($conn, $sql2)) {

                if ($sql2) {
                ?>



                    <script type="text/javascript">
                        swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
                            window.location = "../compra/cart";
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