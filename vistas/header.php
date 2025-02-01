<?php 
if (strlen(session_id())<1) 
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Tiger</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <!-- Bootstrap Select CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- AdminLTE --> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
        <!-- DATATABLES -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
        <link rel="stylesheet" href="css/header.css">
        
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            <header class="main-header fondo">
                <!-- Logo -->
                <a href="#" class="logo nav-link d-flex justify-content-center align-items-center" data-widget="pushmenu" role="button">
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Agencia <?php echo $_SESSION['usuario']; ?></b></span>
                </a>
            </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar fondo elevation-4">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar" data-widget="tree">
                <div class="sidebar">
                    <!-- Sidebar Menu -->
                     <nav class="mt-5 light">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Link Desplegable-->
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#submenu" aria-expanded="false">
                                    <i class="bi bi-receipt-cutoff"></i><p><b> VENDER</b></p>
                                </a>
                                <ul class="nav nav-treeview collapse ps-3" id="submenu">
                                    <li class="nav-item">
                                        <a href="vender.php" class="nav-link">
                                        <i class="bi bi-cart3"></i><p><b> UNA VENTA</b></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="bi bi-car-front"></i><p><b> VIAJE DE VENTA</b></p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Link Desplegable 1 -->
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#submenu1" aria-expanded="false">
                                <i class="bi bi-shop-window"></i><p><b> ALMACEN</b></p>
                                </a>
                                <ul class="nav nav-treeview collapse ps-3" id="submenu1">
                                    <li class="nav-item">
                                        <a href="productos.php" class="nav-link">
                                            <i class="bi bi-basket3"></i><p><b> PRODUCTOS</b></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="categorias.php" class="nav-link">
                                        <i class="bi bi-tags"></i><p><b> CATEGORIAS</b></p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Link Desplegable 2 -->
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#submenu2" aria-expanded="false">
                                    <i class="bi bi-kanban"></i><p><b> GESTION</b></p>
                                </a>
                                    <ul class="nav nav-treeview collapse ps-3" id="submenu2">
                                        <li class="nav-item">
                                            <a href="clientes.php" class="nav-link"><i class="bi bi-people"></i><p><b> CLIENTES</b></p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="rutas.php" class="nav-link"><i class="bi bi-calendar-event"></i><p><b> RUTAS</b></p>
                                            </a>
                                        </li>
                                    </ul>
                            </li>
                            <!-- Link Desplegable 3 -->
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#submenu3" aria-expanded="false">
                                    <i class="nav-icon fas fa-th"></i> <p><b> CONSULTA</b></p>
                                </a>
                                <ul class="nav nav-treeview collapse ps-3" id="submenu3">
                                    <li class="nav-item">
                                        <a href="registro_ventas.php" class="nav-link">
                                            <i class="bi bi-calendar2-week"></i><p><b> REGISTRO VENTAS</b></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="bi bi-bar-chart-line"></i><p><b> GRAFICA VENTAS</b></p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="../controlador/controlador_usuario.php?login=salir" class="nav-link">
                                    <i class="nav-icon fas fa-sign-out-alt"></i><p><b> SALIR</b></p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu --> <!-- Botón de salir fijo abajo -->
                </div>
            </section>
            <!-- /.sidebar -->
        </aside>