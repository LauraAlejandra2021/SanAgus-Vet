<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="/vet/assets/img/mujerico.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst($_SESSION['nombre']); ?></div>
                <div class="email"><?php echo ucfirst($_SESSION['correo']); ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="/vet/vista/config/configuracion"><i class="material-icons">brightness_low</i>Mi Cuenta</a></li>
                        <li role="separator" class="divider"></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/vet/vista/pages-logout"><i class="material-icons">input</i>Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="menu">
            <ul class="list">
                <li class="header">MENÚ DE NAVEGACIÓN</li>
                <li class="active">
                    <a href="/vet/vista/panel-admin/administrador">
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
                            <a href="/vet/vista/productos/nuevo">Registrar</a>
                        </li>
                        <li>
                        <a href="/vet/folder/productos">Listar / Modificar</a>
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
                            <a href="/vet/vista/categorias/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="/vet/folder/categorias">Listar / Modificar</a>
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
                            <a href="/vet/vista/clientes/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="/vet/folder/clientes">Listar / Modificar</a>
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
                            <a href="/vet/vista/proveedores/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="/vet/folder/proveedores">Listar / Modificar</a>
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
                            <a href="/vet/vista/mascotas/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="/vet/folder/mascotas">Listar / Modificar</a>
                        </li>
                        <li>
                            <a href="/vet/folder/tipo">Tipos</a>
                        </li>
                        <li>
                            <a href="/vet/folder/raza">Razas</a>
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
                            <a href="/vet/vista/citas/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="/vet/folder/citas">Listar / Modificar</a>
                        </li>

                        <li>
                            <a href="/vet/folder/servicio">Servicio</a>
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
                            <a href="/vet/vista/compra/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="/vet/folder/compra">Listar / Modificar</a>
                        </li>

                        <li>
                            <a href="/vet/vista/compra/compras_fecha">Consultar por fecha</a>
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
                            <a href="/vet/vista/venta/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="/vet/folder/venta">Listar / Modificar</a>
                        </li>

                        <li>
                            <a href="/vet/vista/venta/venta_fecha">Consultar por fecha</a>
                        </li>
                    </ul>
                </li>
                <!--======================================================================================================-->
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">person_pin</i>
                        <span>USUARIOS</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="/vet/vista/usuarios/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="/vet/folder/usuarios">Listar / Modificar</a>
                        </li>
                    </ul>
                </li>               
                <!--======================================================================================================-->
                <aside id="rightsidebar" class="right-sidebar">
                </aside>
            </ul>
        </div>
</section>