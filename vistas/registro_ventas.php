<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{


require 'header.php';

if ($_SESSION['ventas']==1) {

 ?>
<div class="content-wrapper">
<!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h1 class="box-title">Registro de ventas</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!--box-header-->
                    <!--centro-->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>Opciones</th>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Total Venta</th>
                                <th>Estado</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <th>Opciones</th>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Total Venta</th>
                                <th>Estado</th>
                            </tfoot>   
                        </table>
                    </div>
                    <!--fin centro-->
                </div>
            </div>
        </div>
        <!-- /.box -->
    </section>
<!-- /.content -->
</div>
<?php 
}else{
 require 'noacceso.php'; 
}

require 'footer.php';
 ?>
 <script src="js/registro_ventas.js"></script>
 <?php 
}

ob_end_flush();
  ?>

