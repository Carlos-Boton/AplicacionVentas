<?php 
require_once "global.php";

$conexion=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME,DB_PORT);

if ($conexion->connect_error) {
    die("Falló en la conexión con la base de datos: " . $conexion->connect_error);
} else {
    echo "Conexión exitosa";
}

// Establecer el conjunto de caracteres
if (!$conexion->set_charset("utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
    exit();
}

if (!function_exists('ejecutarConsulta')) {
	Function ejecutarConsulta($sql){ 
global $conexion;
$query=$conexion->query($sql);
return $query;

	}

	function ejecutarConsultaSimpleFila($sql){
global $conexion;
$query=$conexion->query($sql);
$row=$query->fetch_assoc();
return $row;
	}
function ejecutarConsulta_retornarID($sql){
global $conexion;
$query=$conexion->query($sql);
return $conexion->insert_id;
}

function limpiarCadena($str){
global $conexion;
$str=mysqli_real_escape_string($conexion,trim($str));
return htmlspecialchars($str);
}

}

 ?>