var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

   $("#tbllistado_length").hide();
   $("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   })

   //cargamos los items al select categoria
   $.post("../controlador/controlador_clientes.php?op=selectRutas", function(r){
   	$("#idrutas").html(r);
   });
}

//funcion limpiar
function limpiar(){
	$("#nombre").val("");
	$("#idclientes").val("");
	$("#idruta").val("");
}

//funcion mostrar formulario
function mostrarform(flag){
	limpiar();
	if(flag){
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}else{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//cancelar form
function cancelarform(){
	limpiar();
	mostrarform(false);
}

//funcion listar
function listar(){
	tabla=$('#tbllistado').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		"ajax":
		{
			url:'../controlador/controlador_clientes.php?op=listar',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":10,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}
//funcion para guardaryeditar
function guardaryeditar(e){
     e.preventDefault();//no se activara la accion predeterminada 
     $("#btnGuardar").prop("disabled",true);
     var formData=new FormData($("#formulario")[0]);

     $.ajax({
     	url: "../controlador/controlador_clientes.php?op=guardaryeditar",
     	type: "POST",
     	data: formData,
     	contentType: false,
     	processData: false,

     	success: function(datos){
     		bootbox.alert(datos);
     		mostrarform(false);
     		tabla.ajax.reload();
     	}
     });

     limpiar();
}

function mostrar(idclientes){
	$.post("../controlador/controlador_clientes.php?op=mostrar",{idclientes : idclientes},
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarform(true);
			$("#idrutas").val(data.idrutas);
			$("#nombre").val(data.nombre);
			$("#idclientes").val(data.idclientes);
		})
}


//funcion para desactivar
function desactivar(idclientes){
	bootbox.confirm("¿Esta seguro de desactivar este dato?", function(result){
		if (result) {
			$.post("../controlador/controlador_clientes.php?op=desactivar", {idclientes : idclientes}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

function activar(idclientes){
	bootbox.confirm("¿Esta seguro de activar este dato?" , function(result){
		if (result) {
			$.post("../controlador/controlador_clientes.php?op=activar" , {idclientes : idclientes}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

init();