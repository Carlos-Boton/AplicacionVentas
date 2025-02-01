<?php
session_start();
require_once "../modelos/usuario.php";

$user = new user();

switch ($_GET["login"]) {
    case 'inicioSesion':
        //validar si el usuario tiene acceso al sistema
        $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
        $contra=(isset($_POST['input']))?$_POST['input']:"";

            //Hash SHA256 en la contraseña
            $contrasena=hash("SHA256", $contra);
            
            $respuesta=$user->inicioSesion($usuario, $contrasena);

            $fetch=$respuesta->fetch_object();
            if (isset($fetch)) {
                $_SESSION['idusuario']=$fetch->idUser;
                $_SESSION['usuario']=$fetch->usuario;
                $_SESSION['contra']=$fetch->password;
            }
            echo json_encode($fetch);
        

            
        
        
        break;

    case 'salir':
        //limpiamos la variables de la secion
	    session_unset();
        //destruimos la sesion
        session_destroy();
        //redireccionamos al login
        header("Location: ../index.php");
        break;
    
    default:
        # code...
        break;
}








// // se inicia una sesion para almacenar los datos del que ingresa
// session_start();
// // se pregunta con el empty si el btningresar mando una solicitud
// if (!empty($_POST["btningresar"])){
//     // se pregunta si las casillas para iniciar sesion tiene algun valor
//     if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
//         // si recibimos algun valor se almacena en las variables $usuario y $password
//         $usuario=$_POST["usuario"];
//         $password=$_POST["password"];
//         // se hace un llamado a la base de datos con la sentencia select para traer el usuario y la contraseña
//         $sql=$conexion->query("SELECT * FROM usuario where usuario = '$usuario' AND password = '$password'");  
//         if ($datos=$sql->fetch_object()) {
//             // si el usuario y la contraseña se encuentran entra en la seccion y lo redirecciona a la pagina indicada 
//             $_SESSION["id"]=$datos->idUser;
//             $_SESSION["usuario"]=$datos->usuario;
//             header("location: ventas.php"); 
//         } else {
//             // si no se encuentra ninguno de los datos para el inicio le mandara un alerta
//             echo "<div class='alert alert-danger'>Acceso denegado</div>";
//         }
        

//     } else {
//         // si se preciona el boton y se llenaron las casillas arrojara este mensaje
//         echo "<div class='alert alert-warning'>Campos Vacios</div>";;
//     }
// }

?>