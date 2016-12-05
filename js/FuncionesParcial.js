


$(document).ready(function () 
{

	
});


function LoginUser() 
{
	$('#Contenedor').load("vistas/loginUsuario.html");
	//$('#Respuesta').html("");

	$('#Inicio').attr("class", "col-md-2");
	

}

function LoginRegistrarse () {

	$('#Contenedor').load("vistas/registrarUsuario.html");
	$('#Inicio').attr("class", "col-md-2");
}

function RegistrarUsuario()
{
	var queHago = "registrarUsuario";

	var nombre = $('#nombre').val();
	var correo = $('#correo').val();

	 	$.ajax({
		type:"post",
		url:"nexo.php",
		data:{queHacer:queHago, nombre:nombre, correo:correo},	
		success: function (resp) 
				{	

				}

		});

		window.location="index.php";
}


function ValidarUsuario () 
{
	var queHago = "validarUsuario";

	var nombre = $('#nombre').val();
	var correo = $('#correo').val();

	 	$.ajax({
		type:"post",
		url:"validarUsuario.php",
		//dataType:"json",
		data:{queHacer:queHago, nombre:nombre, correo:correo},	
		success: function (resp) 
				{	

						//alert(resp);

					$('#login').hide();

					if(resp == "Usuario Encontrado")
					$('#Contenedor').load('vistas/grillaMascotas.php');					
					$('#Respuesta').html("<p style='color:white'>" + resp + "</p>");
				},

		error: function (msg) 
		{
			
		}

		});

		
}




function enviarFoto (nombre) 
{
	var foto=$('#foto').val();
	
	var archivo = $("#foto")[0];


	var formData = new FormData();
	formData.append("foto",archivo.files[0]);
	formData.append("queHacer", "subirFoto");
	formData.append("nombre", nombre);

	$.ajax({
        type: 'post',
        url: 'nexo.php',
        dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
        data: formData,
        async: true,

		success: function (objJson) {

		 return;
		}
	});

}



function ingresarMascota () 
{
	var nombre = $('#nombre').val();
	var edad = $('#edad').val();
	var fecha = $('#fecha').val();
	var tipo = $('#selectTipo').val();
	var sexo = $("input[name='sexo']:checked").val();

	var queHago = "insertarMascota";


		$.ajax({
		type:"post",
		url:"nexo.php",
		
		data:{queHacer:queHago, nombre:nombre, edad:edad, fecha:fecha, tipo:tipo, sexo:sexo},	
		success: function (resp) 
				{	
					alert('ingreso correctamente la mascota');
					$('#Contenedor').load('vistas/grillaMascotas.php');
				}

		});

}


function sacarMascota (mascota) 
{
	var nombre = mascota.nombre;

	// if(!confirm("Desea ELIMINAR la MASCOTA "+mascota.nombre+"??")){
	// 	return;
	// }
	alert(nombre);
	
    $.ajax({
        type: "POST",
        url: "nexo.php",
        //dataType: "json",
        data: {
			queHacer : "sacarMascota",
			mascota : mascota
		}
    })
	.done(function (objJson) {

			alert("borrado");
			alert(objJson);

			$('#Contenedor').load('vistas/grillaMascotas.php');
		})
	.fail(function  () {
		alert("no borrado");
	});
}


function modificarMascota (nombre) 
{
	
}


function pablo (cssd) {
	alert(cssd);

}


function Cancelar() 
{
	window.location="index.php";
}