

function enviar_pay()
{
	$("#form_pay").submit();
}

function cargaDatos(id_producto)
{
	event.preventDefault();
	var data = {"id_producto":id_producto};
	$.ajax({
		url:"php/cargaDatos.php",
		data:data,
		type:"post",
		dataType:"json",
		success:
			function(respuesta)
			{
				alert("Todo Ok");
				$("input[name='hdn_id_producto']").val(respuesta.id_producto);
				$("input[name='producto']").val(respuesta.producto);
				$("input[name='precio']").val(respuesta.precio);
				$("#txa_descripcion").val(respuesta.descripcion);
			}
	});
}

function Eliminar(id_producto)
{
	if(confirm("¿Estas se seguro de eliminar este producto?"))
	{
		var parametros = {"id_producto":id_producto};
		$.ajax({
			url:"php/eliminar_producto",
			data:parametros,
			type:"post",
			success:
				function(respuesta)
				{
					alert(respuesta);
				}
		});
	}
}

function Actualizar()
{
	var id_producto = $("input[name='hdn_id_producto'").val();
	var producto = $("input[name='producto'").val();
	var precio = $("input[name='precio'").val();
	var descripcion = $("#txa_descripcion").val();
	var datos = {"id_producto":id_producto,"producto":producto,"precio":precio,"descripcion":descripcion};
	$.ajax({
		url:"php/actualizar_product.php",
		data:datos,
		type:"post",
		success:
			function(respuesta)
			{
				alert(respuesta);
			}
	});
}

function Modificar()
{
	$("#ld").text("modificar");
	$("#res").hide();
	$("#mod").show();
}

function Registrar()
{
	$("#ld").text("registrar");
	$("#res").show();
	$("#mod").hide();
}

function AgregarProducto(id_producto)
{
	var datos = {"id_producto":id_producto};
	$.ajax({
		url:"php/agregarProducto.php",
		data:datos,
		type:"post",
		success:
			function(respuesta)
			{
				$("#div_carrito").html(respuesta);
			},
		error:
			function()
			{
				alert("error");
			}
	});
}

function EliminarProductoCarrito(id_producto)
{
	event.preventDefault();
		var datos = {"id_producto":id_producto};
		$.ajax({
			url:"php/Eliminar_Producto_carrito.php",
			data:datos,
			type:"post",
			success:
				function(respuesta)
				{
					$("#div_carrito").html(respuesta);
				},
			error:
				function()
				{
					alert("error");
				}
		});
}

function RegistrarUser()
{
	var nombre = $("input[name='txt_nombre']").val();
	var apellidos = $("input[name='txt_apellidos']").val();
	var correo = $("input[name='txt_correo']").val();
	var rfc = $("input[name='txt_RFC']").val();
	var cp = $("input[name='txt_CP']").val();
	var tel = $("input[name='txt_tel']").val();
	var pw = $("input[name='txt_pw']").val();
	var pw2 = $("input[name='txt_pw2']").val();
	var datos = {"txt_nombre":nombre,"txt_apellidos":apellidos,"rfc":rfc,"cp":cp,"tel":tel,"txt_correo":correo,"txt_pw":pw};
	if(pw != pw2)
	{
		alert("Los passwords no coinciden");
	}
	else
	{
		$.ajax({
		url:"php/registro_user.php",
		data:datos,
		type:"post",
		success:
			function(respuesta)
			{
				$("#div_resp").html(respuesta);
			}
		});
	}
	
}

function Comentar()
{
	var id_producto = $("#slp_producto").val();
	var comentario = $("#txa_comentario").val();
	if(comentario=="")
	{
		alert("debes escribir un comentario");
	}
	else
	{
		var parametros = {"id_producto":id_producto,"comentario":comentario};
		$.ajax({
		url:"php/registra_comentario.php",
		data:parametros,
		type:"post",
		success:
			function(respuesta)
			{
				$("#div_resp_coment").html(respuesta);
			}
		});
	}
	
}

function getTotalProductos()
{
	var parametros = {"funcion":"getTotalProductos"};
	$.ajax({
		url:"php/funcionesCarrito.php",
		data:parametros,
		type:"post",
		success:
			function(respuesta)
			{
				$("#lbl_product").text(respuesta+" PROD.");
			}
	});
}


function Total()
{
	var tabla = document.getElementById("tb_carrito");
	var inputs = tabla.getElementsByTagName("input");
	var total=0;
	var subtotal=0;
	for (var i=0;i<inputs.length;i=i+4) 
	{
		subtotal = (parseFloat(inputs[i+1].value)*parseFloat(inputs[i+2].value));
		inputs[i+3].value=subtotal;
		total=total+subtotal;
		console.log(total);
	}
	$("#txt_Total").val(total);
}
//018002280040
//rea


function calf(calf)
{
	$("#escala").val(calf);
}

function calificar_producto(id_producto,calif)
{
	var id_producto = $("#slp_producto").val();
	var calif = $("#escala").val();
	var parametros = {"id_producto":id_producto,"rdn_calif":calif};
	$.ajax({
		url:"php/calificar_producto.php",
		data:parametros,
		type:"post",
		success:
			function(respuesta)
			{
				alert(respuesta);
			}
	});
}

function addCantidad(id_producto,Cant)
{
	var datos = {"id_producto":id_producto,"Cant":Cant}
	$.ajax({
		url:"php/addCantidad.php",
		data:datos,
		type:"POST",
		success:
			function(respuesta)
			{
				//alert(respuesta);
			}
	});
}


function mostrarServicio(num)
{
	event.preventDefault();
	switch(num)
	{
		case 1:
			$("#serv1").show();
			$("#serv2").hide();
			$("#serv3").hide();
			$("#serv4").hide();
			break;

		case 2:
			$("#serv1").hide();
			$("#serv2").show();
			$("#serv3").hide();
			$("#serv4").hide();
			break;

		case 3:
			$("#serv1").hide();
			$("#serv2").hide();
			$("#serv3").show();
			$("#serv4").hide();
			break;

		case 4:
			$("#serv1").hide();
			$("#serv2").hide();
			$("#serv3").hide();
			$("#serv4").show();
			break;
	}
}




function actionResponder()
{
	var id_comentario = $("#hdn_id_coment").val();
	var id_producto = $("input[name='hdn_id_producto']").val();
	var comentario = $("#comentario_res").val();
	var parametros = {"comentario":comentario,"id_producto":id_producto,"id_comentario":id_comentario}
	$.ajax({
		url:"php/respuesta.php",
		data:parametros,
		type:"post",
		success: 
			function(respuesta)
			{
				cerrar();
				alert(respuesta);
				//location.reload(true);
			}
	});
}


function Responder(id_comentario)
{
	id_comentario=id_comentario;
	$("#hdn_id_coment").val(id_comentario);
	event.preventDefault();
	abrir();
}



function cerrar()
{
	$("#fondo_modal").hide();
}

function abrir()
{
	$("#fondo_modal").show();
}

function MostrarFormaPago(forma_pago)
{
	switch(forma_pago)
	{
		case 1:
			$("#pago_paypal").show();
			$("#pago_ventanilla").hide()
			break;
		case 2:
			$("#pago_paypal").hide();
			$("#pago_ventanilla").show()
			break;
	}
}

function registrarPedido()
{
	var parametros = $("#form_cart").serialize();
	$.ajax({
		url:"php/registraPedido.php",
		data:parametros,
		type:"POST",
		success:
			function(respuesta)
			{
				$("#resp_reg_pedido").html(respuesta);
			}
	});
}

function RegistraFactura()
{
	alert("todo Ok");
	var parametros = $("#form_Factura").serialize();
	$.ajax({
		url:"php/RegistraFactura.php",
		data:parametros,
		type:"POST",
		success:
			function(respuesta)
			{
				$("#div_resp_factura").html(respuesta);
			}
	});
}

function Verifica_existencia(id_producto,objCant)
{
	var obj = objCant.name;
	var cant = objCant.value;
	var parametros = {"id_producto":id_producto,"cant":cant};
	$.ajax({
		url:"php/Verifica_existencia.php",
		data:parametros,
		type:"POST",
		dataType:"json",
		success:
			function(respuesta)
			{
				if(!respuesta.bool)
				{
					$("input[name='"+obj+"']").val(respuesta.cant)
					alert(respuesta.msg);
				}
			}
	});
}


function ocultarNav()
{
	$("#nav_menu").toggle();
}

function generarPedido()
{
	var tabla = document.getElementById("tabla_pedidos");
	var inputs = tabla.getElementsByTagName("input");
	var bool = false;
	for(var i=0;i<inputs.length;i=i+3)
	{
		if(inputs[i].checked==true)
		{
			bool = true;
			inputs[i].value=true;
		}
		else
		{
			inputs[i].value=false;
		}
	}
	if(bool==true)
	{
		var datos = $("#form_pedidos").serialize();
		$.ajax({
			url:"php/generarPedido.php",
			data:datos,
			type:"POST",
			success:
				function(respuesta)
				{
					$("#div_resp_pedido").html(respuesta);
				}
		});
	}
	else
	{
		alert("Necesitas seleccionar al menos una opcion");
	}
	
}

function comentaAdmon()
{
	var comentario = $("#txa_comentario").val();
	var datos = {"comentario":comentario};
	$.ajax({
		url:"php/comentaAdmon.php",
		data:datos,
		type:"POST",
		success:
			function(respuesta)
			{
				$("#div_resp_com").html(respuesta);
			}
	});
}

function marcarComoAtendida(id_comentario)
{
	var datos = {"id_comentario":id_comentario};
	$.ajax({
		url:"php/marcarComoAtendida.php",
		data:datos,
		type:"POST",
		success:
			function(respuesta)
			{
				alert(respuesta);
			},
		error:
			function()
			{
				alert("error");
			}
	});
}