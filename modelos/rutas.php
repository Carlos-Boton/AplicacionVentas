<?php 
//incluir la conexion de base de datos
require "../config/conexion.php";
class Rutas{


	//implementamos nuestro constructor
	public function __construct(){

	}

	//metodo insertar regiustro
	public function insertar($nombre){
		$sql="INSERT INTO rutas (nombre,condicion) VALUES ('$nombre','1')";
		return ejecutarConsulta($sql);
	}

	public function editar($idrutas,$nombre){
		$sql="UPDATE rutas SET nombre='$nombre'
		WHERE idrutas='$idrutas'";
		return ejecutarConsulta($sql);
	}
	public function desactivar($idrutas){
		$sql="UPDATE rutas SET condicion='0' WHERE idrutas='$idrutas'";
		return ejecutarConsulta($sql);
	}
	public function activar($idrutas){
		$sql="UPDATE rutas SET condicion='1' WHERE idrutas='$idrutas'";
		return ejecutarConsulta($sql);
	}
	//metodo para mostrar registros
	public function mostrar($idrutas){
		$sql="SELECT * FROM rutas WHERE idrutas='$idrutas'";
		return ejecutarConsultaSimpleFila($sql);
	}
	//listar registros
	public function listar(){
		$sql="SELECT * FROM rutas";
		return ejecutarConsulta($sql);
	}
	//listar y mostrar en selct
	public function select(){
		$sql="SELECT * FROM rutas WHERE condicion = 1";
		return ejecutarConsulta($sql);
	}
}

 ?>
