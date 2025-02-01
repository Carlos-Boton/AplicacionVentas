<?php
ob_start();
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
} else{

    require 'header.php';
?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border pt-3">
                        <h1 class="box-title">Rutas <button class="btn btn-success" onclick="mostrarform(true)">Agregar</button></h1>
                        <div class="box-tools pull-right">
        
                        </div>
                    </div>

                    <!--box-header-->
                    <!--centro-->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-bordered border-dark">
                            <thead>
                                <th>ACCION</th>
                                <th>RUTAS</th>
                                <th>ESTADO</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <th>ACCION</th>
                                <th>RUTAS</th>
                                <th>ESTADO</th>
                            </tfoot>   
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form action="" name="formulario" id="formulario" method="POST">
                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                <label for="">Ruta</label>
                                <input class="form-control" type="text" name="idrutas" id="idrutas">
                                <input class="form-control" type="text" name="nombre" id="nombre" maxlength="50" placeholder="Ruta" required>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-primary" type="submit" id="btnGuardar"></i>  Guardar</button>

                                <button class="btn btn-danger" onclick="cancelarform()" type="button">Cancelar</button>
                            </div>
                        </form>
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
    require 'footer.php';
?>
    <script src="js/rutas.js"></script>
<?php
}
ob_end_flush();
?>