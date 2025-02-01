
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
        <div class="box">
            <div class="panel-body" id="formularioregistros">
                <form action="" name="formulario" id="formulario" method="POST">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Cliente(*):</label>
                            <input class="form-control" type="hidden" name="idventa" id="idventa">
                            <select name="idclientes" id="idclientes" class="form-control selectpicker" data-live-search="true" required>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Fecha(*): </label>
                            <input class="form-control" type="date" name="fecha_hora" id="fecha_hora" required>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">

                        <input type="hidden" name="comprobante" id="comprobante" value="Ticket">

                        </div>
                        <div class="form-group col-6">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Agregar Producto
                            </button>
                        </div>
                        <div class="form-group col-12">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color:#A9D0F5">
                                <th>#</th>
                                <th>Producto</th>
                                <th>#</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                            </thead>
                            <tfoot>
                                <th>TOTAL</th>
                                <th></th>
                                <th></th>
                                <th colspan="2"><h3 id="total">S/. 0.00</h3>
                                <input type="hidden" name="total_venta" id="total_venta"></th>
                            </tfoot>
                            <tbody>
                                
                            </tbody>
                            </table>
                            </div>
                            <div class="form-group col-12">
                                <button class="btn btn-primary" type="submit" id="btnGuardar">Guardar</button>
                                <button class="btn btn-primary" type="submit" id="btnGuardar2">Guardar e Imprimir</button>
                                <button class="btn btn-danger" onclick="cancelarform()" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                            </div>
                    </div>
                </form>
            </div>
            <!--fin centro-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!--Modal-->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="row modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="col-12 modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">SELECCIONA EL PRODUCTO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="tblarticulos" class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                        <th>#</th>
                        <th>Cantidad</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        </thead>
                        <tbody>
                        
                        </tbody>
                        <tfoot>
                        <th>#</th>
                        <th>Cantidad</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
  <!-- fin Modal-->
<?php
require 'footer.php';
}
?>
 <script src="js/vender.js"></script>