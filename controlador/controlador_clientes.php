<?php 
require_once "../modelos/clientes.php";

$clientes=new Clientes();

$idclientes=isset($_POST["idclientes"])? limpiarCadena($_POST["idclientes"]):"";
$idrutas=isset($_POST["idrutas"])? limpiarCadena($_POST["idrutas"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";


switch ($_GET["op"]) {
	case 'guardaryeditar':

	if (empty($idclientes)) {
		$rspta=$clientes->insertar($idrutas,$nombre);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$clientes->editar($idclientes,$idrutas,$nombre);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	

	case 'desactivar':
		$rspta=$clientes->desactivar($idclientes);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta=$clientes->activar($idclientes);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;
	
	case 'mostrar':
		$rspta=$clientes->mostrar($idclientes);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$clientes->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>($reg->condicion)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idclientes.')"><i class="bi bi-pencil-fill"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idclientes.')"><b><i class="bi bi-x-lg"></i></b></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idclientes.')"><i class="bi bi-pencil-fill"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idclientes.')"><b><i class="bi bi-check2"></i></b></button>',
            "1"=>$reg->nombre,
            "2"=>$reg->rutas,
			"3"=>($reg->condicion)?'<span class="label bg-green">ACT</span>':'<span class="label bg-red">DESC</span>'
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;

		case 'selectRutas':
			require_once "../modelos/rutas.php";
			$rutas=new Rutas();

			$rspta=$rutas->select();

			while ($reg=$rspta->fetch_object()) {
				echo "<option value=".$reg->idrutas.">".$reg->nombre."</option>";
			}
			break;
}
 ?>