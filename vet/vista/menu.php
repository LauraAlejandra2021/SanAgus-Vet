<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="../../assets/img/mujerico.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst($_SESSION['nombre']); ?></div>
                <div class="email"><?php echo ucfirst($_SESSION['correo']); ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="../config/configuracion.php"><i class="material-icons">brightness_low</i>Mi Cuenta</a></li>
                        <li role="separator" class="divider"></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../pages-logout.php"><i class="material-icons">input</i>Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="menu">
            <ul class="list">
                <li class="header">MENÚ DE NAVEGACIÓN</li>
                <li class="active">
                    <a href="administrador">
                        <i class="material-icons">home</i>
                        <span>INICIO</span>
                    </a>
                </li>
                <!--======================================================================================================-->
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">inbox</i>
                        <span>PRODUCTOS</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../productos/nuevo.php">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/productos.php">Listar / Modificar</a>
                        </li>
                    </ul>
                </li>
                <!--======================================================================================================-->
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">low_priority</i>
                        <span>CATEGORÍAS</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../categorias/nuevo.php">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/categorias.php">Listar / Modificar</a>
                        </li>
                    </ul>
                </li>
                <!--======================================================================================================-->
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">supervisor_account</i>
                        <span>CLIENTES</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../clientes/nuevo.php">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/clientes.php">Listar / Modificar</a>
                        </li>
                    </ul>
                </li>
                <!--======================================================================================================-->
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">business</i>
                        <span>PROVEEDORES</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../proveedores/nuevo.php">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/proveedores.php">Listar / Modificar</a>
                        </li>
                    </ul>
                </li>
                <!--======================================================================================================-->
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">person_pin</i>
                        <span>VETERINARIOS</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../veterinarios/nuevo.php">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/veterinarios.php">Listar / Modificar</a>
                        </li>
                    </ul>
                </li>
                <!--======================================================================================================-->
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">flutter_dash</i>
                        <span>MASCOTAS</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../mascotas/nuevo.php">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/mascotas.php">Listar / Modificar</a>
                        </li>
                        <li>
                            <a href="../../folder/tipo.php">Tipos</a>
                        </li>
                        <li>
                            <a href="../../folder/raza.php">Razas</a>
                        </li>
                    </ul>
                </li>
                <!--======================================================================================================-->
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">calendar_today</i>
                        <span>CITAS</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../citas/nuevo.php">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/citas.php">Listar / Modificar</a>
                        </li>

                        <li>
                            <a href="../../folder/servicio.php">Servicio</a>
                        </li>
                    </ul>
                </li>
                <!--======================================================================================================-->
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">shopping_basket</i>
                        <span>COMPRA</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../compra/nuevo.php">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/compra.php">Listar / Modificar</a>
                        </li>

                        <li>
                            <a href="../compra/compras_fecha.php">Consultar por fecha</a>
                        </li>
                    </ul>
                </li>
                <!--======================================================================================================-->
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">monetization_on</i>
                        <span>VENTA</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../venta/nuevo.php">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/venta.php">Listar / Modificar</a>
                        </li>

                        <li>
                            <a href="../venta/venta_fecha.php">Consultar por fecha</a>
                        </li>
                    </ul>
                </li>
                <!--======================================================================================================-->

                <!--======================================================================================================-->
                <aside id="rightsidebar" class="right-sidebar">
                </aside>
            </ul>
        </div>
</section>