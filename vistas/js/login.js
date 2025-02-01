$("#loginSesion").on('submit', function(e)
{
	e.preventDefault();
	usuario=$("#usuario").val();
	input=$("#input").val();

	$.post("../controlador/controlador_usuario.php?login=inicioSesion",
        {"usuario":usuario, "input":input},
        function(data)
        {
           if (data != "null")
            {
            	$(location).attr("href","vender.php");
            }else{
                
                Swal.fire({
                        title: "ERROR",
                        text: "Usuario y/o contraseña incorrectos",
                        icon: "warning"
                      });
            }
        });
})