<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
}else{

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
                        <h2 class="box-title">CLIENTES  <button class="btn btn-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i>Agregar</button>
                        </h2>

                    </div>
                    <!--box-header-->
                    <!--centro-->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-bordered border-dark">
                            <thead>
                                <th>ACCION</th>
                                <th>CLIENTE</th>
                                <th>RUTA</th>
                                <th>ESTADO</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <th>ACCION</th>
                                <th>CLIENTE</th>
                                <th>RUTA</th>
                                <th>ESTADO</th>
                            </tfoot>
                        </table>
                    </div>

                    <div class="panel-body" id="formularioregistros">
                        <form action="" name="formulario" id="formulario" method="POST">
                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                <label for="">Nombre Cliente(*):</label>
                                <input class="form-control" type="hidden" name="idclientes" id="idclientes">
                                <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Producto" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                <label for="">Ruta(*):</label>
                                <select name="idrutas" id="idrutas" class="form-control " data-Live-search="true" required>
                                    <option value="">Selecciona una categoría</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                <div id="print">
                                    <svg id="barcode"></svg>
                                </div>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button>

                                <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.0/JsBarcode.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.js"></script>
<script src="js/clientes.js"></script>

<?php 

ob_end_flush();
  ?>