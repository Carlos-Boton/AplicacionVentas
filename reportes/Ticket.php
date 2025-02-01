<?php 
//activamos almacenamiento en el buffer
ob_start();
if (strlen(session_id())<1) 
  session_start();

if (!isset($_SESSION['nombre'])) {
  echo "debe ingresar al sistema correctamente para vosualizar el reporte";
}else{

?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="../vistas/css/ticket.css">
</head>
<body onload="window.print();">
	<?php 
// incluimos la clase venta
require_once "../modelos/vender.php";

$venta = new Venta();

//en el objeto $rspta obtenemos los valores devueltos del metodo ventacabecera del modelo
$rspta = $venta->ventacabecera($_GET["id"]);

$reg=$rspta->fetch_object();

//establecemos los datos de la empresa
$empresa = "Distribuidor TIGER";
$direccion = "calle Independencia #99";
$telefono = "9821038088";
	 ?>
<div class="zona_impresion">
	<!--codigo imprimir-->
	<br>
	<table border="0" align="center" width="200px">
		<tr>
			<td align="center">
				<!--mostramos los datos de la empresa en el doc HTML-->
				.::<strong> <?php echo $empresa; ?></strong>::.<br>
				<?php echo $direccion;?><br>
                <span>TELEFONO : <?php echo $telefono;?> </span>
			</td>
		</tr>
		<tr>
			<td align="center"><span>FECHA : <?php echo $reg->fecha; ?></span></td>
		</tr>
		<tr> 
			<td align="center"></td>
		</tr>
		<tr>
			<!--mostramos los datos del cliente -->
			<td>Cliente: <?php echo $reg->cliente; ?>
			</td>
		</tr>
		<!-- <tr>
			<td>
				N° de venta: <?php
                // echo $reg->serie_comprobante." - ".$reg->num_comprobante;
                ?>
			</td>
		</tr> -->
	</table>
	<br>

	<!--mostramos lod detalles de la venta -->

	<table border="0" align="center" width="300px">
		<tr>
			<td align="center">CANT.</td>
			<td>PRODUCTO</td>
            <td align="center">PRECIO</td>
			<td align="right">IMPORTE</td>
		</tr>
		<tr>
			<td colspan="4">=============================================</td>
		</tr>
		<?php
		$rsptad = $venta->ventadetalles($_GET["id"]);
		$cantidad=0;
		while ($regd = $rsptad->fetch_object()) {
            echo "<tr>";
            echo "<td align='center'>".$regd->cantidad."</td>";
            echo "<td>".$regd->articulo."</td>";
            echo "<td align='center'>$ ".$regd->precio_venta."</td>";
		 	echo "<td align='right'>$ ".$regd->subtotal."</td>";
		 	echo "</tr>";
			echo "<tr>";
			echo "<td colspan='4'>=============================================</td>";
			echo "<tr>";
		 	$cantidad+=$regd->cantidad;
		 }

		 ?>
		 <!--mostramos los totales de la venta-->
		<tr>
			<td>&nbsp;</td>
			<td align="right"><b>TOTAL:</b></td>
			<td align="right"><b>$ <?php echo $reg->total_venta; ?></b></td>
		</tr>
		<tr>
			<td colspan="4">N° de articulos: <?php echo $cantidad; ?> </td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="center">¡Gracias por su compra!</td>
		</tr>
		<tr>
			<td colspan="4" align="center">DISTRIBUIDOR TIGER</td>
		</tr>
		<tr>
			<td colspan="4" align="center">SANTO DOMINGO KESTE</td>
		</tr>
	</table>
	<br>
</div>
<p>&nbsp;</p>
</body>
</html>



<?php

}


ob_end_flush();
  ?>