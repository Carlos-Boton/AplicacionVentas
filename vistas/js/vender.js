var tabla;

//funcion que se ejecuta al inicio
function init(){
	mostrarform()

	$("#formulario").on("submit",function(e){
		guardaryeditar(e);
	});

   //cargamos los items al select cliente
   $.post("../controlador/controlador_vender.php?op=selectCliente", function(r){
   	$("#idclientes").html(r);
   	$('#idclientes').selectpicker('refresh');
   });

}

function increaseValue(element) {
    var input = element.parentNode.querySelector('.numberInput');
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    input.value = value;
}

function decreaseValue(element) {
    var input = element.parentNode.querySelector('.numberInput');
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value = value > 0 ? value - 1 : 0;
    input.value = value;
}

//funcion limpiar
function limpiar(){

	$("#idclientes").val("");
	$("#cliente").val("");
	$("#total_venta").val("");
	$(".filas").remove();
	$("#total").html("0");

	//obtenemos la fecha actual
	var now = new Date();
	var day =("0"+now.getDate()).slice(-2);
	var month=("0"+(now.getMonth()+1)).slice(-2);
	var today=now.getFullYear()+"-"+(month)+"-"+(day);
	$("#fecha_hora").val(today);

}

//funcion mostrar formulario
function mostrarform(){
	limpiar();
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		//$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		listarArticulos();

		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		detalles=0;
		$("#btnAgregarArt").show();
}

//cancelar form
function cancelarform(){
	limpiar();
	mostrarform(false);
}

//funcion listar
// function listar(){
// 	tabla=$('#tbllistado').dataTable({
// 		"aProcessing": true,//activamos el procedimiento del datatable
// 		"aServerSide": true,//paginacion y filrado realizados por el server
// 		dom: 'Bfrtip',//definimos los elementos del control de la tabla
// 		buttons: [
//                   'copyHtml5',
//                   'excelHtml5',
//                   'csvHtml5',
//                   'pdf'
// 		],
// 		"ajax":
// 		{
// 			url:'../ajax/venta.php?op=listar',
// 			type: "get",
// 			dataType : "json",
// 			error:function(e){
// 				console.log(e.responseText);
// 			}
// 		},
// 		"bDestroy":true,
// 		"iDisplayLength":5,//paginacion
// 		"order":[[0,"desc"]]//ordenar (columna, orden)
// 	}).DataTable();
// }

function listarArticulos(){
	tabla=$('#tblarticulos').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [

		],
		"ajax":
		{
			url:'../controlador/controlador_vender.php?op=listarArticulos',
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
     //$("#btnGuardar").prop("disabled",true);
     var formData=new FormData($("#formulario")[0]);

     $.ajax({
     	url: "../controlador/controlador_vender.php?op=guardaryeditar",
     	type: "POST",
     	data: formData,
     	contentType: false,
     	processData: false,

     	success: function(datos){
     		bootbox.alert(datos);
     		mostrarform(false);
     		listar();
     	}
     });

     limpiar();
}

function mostrar(idventa){
	$.post("../ajax/venta.php?op=mostrar",{idventa : idventa},
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarform(true);

			$("#idcliente").val(data.idcliente);
			$("#idcliente").selectpicker('refresh');
			$("#tipo_comprobante").val(data.tipo_comprobante);
			$("#tipo_comprobante").selectpicker('refresh');
			$("#serie_comprobante").val(data.serie_comprobante);
			$("#num_comprobante").val(data.num_comprobante);
			$("#fecha_hora").val(data.fecha);
			$("#impuesto").val(data.impuesto);
			$("#idventa").val(data.idventa);
			
			//ocultar y mostrar los botones
			$("#btnGuardar").hide();
			$("#btnCancelar").show();
			$("#btnAgregarArt").hide();
		});
	$.post("../ajax/venta.php?op=listarDetalle&id="+idventa,function(r){
		$("#detalles").html(r);
	});

}


//funcion para desactivar
function anular(idventa){
	bootbox.confirm("¿Esta seguro de desactivar este dato?", function(result){
		if (result) {
			$.post("../ajax/venta.php?op=anular", {idventa : idventa}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

//declaramos variables necesarias para trabajar con las compras y sus detalles
var impuesto=18;
var cont=0;
var detalles=0;

$("#btnGuardar").hide();
$("#btnGuardar2").hide();
$("#tipo_comprobante").change(marcarImpuesto);

function marcarImpuesto(){
	var tipo_comprobante=$("#tipo_comprobante option:selected").text();
	if (tipo_comprobante=='Factura') {
		$("#impuesto").val(impuesto);
	}else{
		$("#impuesto").val("0");
	}
}

function agregarDetalle(idarticulo, nombre, descripcion, buttonElement) {
    var parent = buttonElement.parentNode.parentNode;
    var input = parent.querySelector('#numberInput');
    var cantidad = input.value;

	if (idarticulo!="") {
		var subtotal=cantidad*descripcion;
		var fila='<tr class="filas" id="fila'+cont+'">'+
        '<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
        '<td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+nombre+'</td>'+
        '<td><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td>'+
        '<td><input type="hidden" name="descripcion[]" value="'+descripcion+'">$ '+descripcion+'</td>'+
		'<td>$ <span id="subtotal'+cont+'" name="subtotal">'+subtotal+'</span></td>'+
		'</tr>';
		cont++;
		detalles++;
		$('#detalles').append(fila);
		modificarSubtotales();

	}else{
		alert("error al ingresar el detalle, revisar las datos del articulo ");
	}
}

function modificarSubtotales(){
	var cant=document.getElementsByName("cantidad[]");
	var prev=document.getElementsByName("descripcion[]");
	var sub=document.getElementsByName("subtotal");


	for (var i = 0; i < cant.length; i++) {
		var inpV=cant[i];
		var inpP=prev[i];
		var inpS=sub[i];


		inpS.value=(inpV.value*inpP.value);
		document.getElementsByName("subtotal")[i].innerHTML=inpS.value;
	}

	calcularTotales();
}

function calcularTotales(){
	var sub = document.getElementsByName("subtotal");
	var total=0.0;

	for (var i = 0; i < sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;
	}
	$("#total").html("$ " + total);
	$("#total_venta").val(total);
	evaluar();
}

function evaluar(){

	if (detalles>0) 
	{
		$("#btnGuardar").show();
		$("#btnGuardar2").show();
	}
	else
	{
		$("#btnGuardar").hide();
		$("#btnGuardar2").hide();
		cont=0;
	}
}

function eliminarDetalle(indice){
$("#fila"+indice).remove();
calcularTotales();
detalles=detalles-1;

}

init();