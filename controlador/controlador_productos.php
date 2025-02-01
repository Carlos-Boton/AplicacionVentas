<?php 
require_once "../modelos/productos.php";

$articulo=new Articulo();

$idarticulo=isset($_POST["idarticulo"])? limpiarCadena($_POST["idarticulo"]):"";
$idcategoria=isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':

	if (empty($idarticulo)) {
		$rspta=$articulo->insertar($idcategoria,$nombre,$descripcion);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$articulo->editar($idarticulo,$idcategoria,$nombre,$descripcion);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	

	case 'desactivar':
		$rspta=$articulo->desactivar($idarticulo);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta=$articulo->activar($idarticulo);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;
	
	case 'mostrar':
		$rspta=$articulo->mostrar($idarticulo);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$articulo->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>($reg->condicion)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idarticulo.')"><i class="bi bi-pencil-fill"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idarticulo.')"><b><i class="bi bi-x-lg"></i></b></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idarticulo.')"><i class="bi bi-pencil-fill"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idarticulo.')"><b><i class="bi bi-check2"></i></b></button>',
            "1"=>$reg->nombre,
            "2"=>'$ '.$reg->descripcion,
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

		case 'selectCategoria':
			require_once "../modelos/categoria.php";
			$categoria=new Categoria();

			$rspta=$categoria->select();

			while ($reg=$rspta->fetch_object()) {
				echo "<option value=".$reg->idcategoria.">".$reg->nombre."</option>";
			}
			break;
}
 ?>