<?php 
require_once "../modelos/rutas.php";

$rutas=new Rutas();

$idrutas=isset($_POST["idrutas"])? limpiarCadena($_POST["idrutas"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (empty($idrutas)) {
		$rspta=$rutas->insertar($nombre);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$rutas->editar($idrutas,$nombre);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	
	case 'desactivar':
		$rspta=$rutas->desactivar($idrutas);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta=$rutas->activar($idrutas);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;
	
	case 'mostrar':
		$rspta=$rutas->mostrar($idrutas);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$rutas->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>($reg->condicion)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idrutas.')"><i class="bi bi-pencil-fill"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idrutas.')"><i class="bi bi-x-lg"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idrutas.')"><i class="bi bi-pencil-fill"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idrutas.')"><i class="bi bi-check2"></i></button>',
            "1"=>$reg->nombre,
            "2"=>($reg->condicion)?'<span class="label bg-green">ACT</span>':'<span class="label bg-red">DESC</span>'
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;
}
 ?>