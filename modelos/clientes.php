<?php 
//incluir la conexion de base de datos
require "../config/conexion.php";
class Clientes{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($idrutas,$nombre){
	$sql="INSERT INTO clientes (idrutas,nombre,condicion)
	 VALUES ('$idrutas','$nombre','1')";
	return ejecutarConsulta($sql);
}

public function editar($idclientes,$idrutas,$nombre){
	$sql="UPDATE clientes SET idrutas='$idrutas', nombre='$nombre'
	WHERE idclientes='$idclientes'";
	return ejecutarConsulta($sql);
}
public function desactivar($idclientes){
	$sql="UPDATE clientes SET condicion='0' WHERE idclientes='$idclientes'";
	return ejecutarConsulta($sql);
}
public function activar($idclientes){
	$sql="UPDATE clientes SET condicion='1' WHERE idclientes='$idclientes'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idclientes){
	$sql="SELECT * FROM clientes WHERE idclientes='$idclientes'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT a.idclientes,a.idrutas,c.nombre as rutas,a.nombre,a.condicion FROM clientes a INNER JOIN rutas c ON a.idrutas=c.idrutas";
	return ejecutarConsulta($sql);
}

public function select(){
	$sql="SELECT * FROM clientes WHERE condicion = 1";
	return ejecutarConsulta($sql);
}

//listar registros activos
public function listarActivos(){
	$sql="SELECT a.idclientes,a.idrutas,c.nombre as rutas,a.nombre,a.condicion FROM clientes a INNER JOIN rutas c ON a.idrutas=c.idrutas WHERE a.condicion='1'";
	return ejecutarConsulta($sql);
}

//implementar un metodo para listar los activos, su ultimo precio y el stock(vamos a unir con el ultimo registro de la tabla detalle_ingreso)
public function listarActivosVenta(){
	$sql="SELECT a.idclientes,a.idrutas,c.nombre as rutas,a.codigo, a.nombre,a.stock,(SELECT precio_venta FROM detalle_ingreso WHERE idclientes=a.idclientes ORDER BY iddetalle_ingreso DESC LIMIT 0,1) AS precio_venta,a.descripcion,a.imagen,a.condicion FROM clientes a INNER JOIN rutas c ON a.idrutas=c.idrutas WHERE a.condicion='1'";
	return ejecutarConsulta($sql);
}
}
 ?>
