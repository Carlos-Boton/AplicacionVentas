<?php
require "../config/conexion.php";
$idventa=isset($_POST["idventa"])? limpiarCadena($_POST["idventa"]):"";
$idclientes=isset($_POST["idclientes"])? limpiarCadena($_POST["idclientes"]):"";
$comprobante=isset($_POST["comprobante"])? limpiarCadena($_POST["comprobante"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
$total_venta=isset($_POST["total_venta"])? limpiarCadena($_POST["total_venta"]):"";

if (empty($idventa)) {
    echo $idventa." ";
    echo $idclientes." ";
    echo $comprobante." ";
    echo $fecha_hora." ";
    echo $total_venta." ";
    while ($num_elementos < count($idarticulo)) {

        echo $idarticulo[$num_elementos];
        echo $cantidad[$num_elementos];
        echo $descripcion[$num_elementos];
    }
}
?>