<html>
<head>


<meta charset="UTF-8">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="css/misEstilos.css">


	<script type="text/javascript" src="./js/FuncionesParcial.js"></script>


	<title>Mascotas</title>
</head>

<body style='background-color:white'>
<div class="row">
	<div class="col-md-12">
			<body id="Menu" class="Menu">
				<img id="foto" src="fotosSitio/otro3.jpg" class="img-thumbnail img-circle">
				<h1 id="Titulo"><u>ABM de Mascotas</u> <small id="subtitulo">con archivos de texto</small></h1>
	</div>

</div>		

	<div class="row">
		<div class="col-md-5" id="Inicio">
			<form id='iniciar'>

				 <button type="button" id="btnIngresar" class="btn btn-primary btn-block btnComun" onClick='LoginUser()'> 
			 	 <span class="glyphicon glyphicon-play"></span>INGRESAR
				 </button>

				 <button type="button" id="btnReg" class="btn btn-primary btn-block btnComun" onClick='LoginRegistrarse()'> 
			 	 <span class="glyphicon glyphicon-user"></span>REGISTRARSE
			 	</button>
			</form>

	    </div>

	    <div class="col-md-7" id="Contenedor">


	    </div>
	</div>

	<div class="row">

		<div class="col-md-12"  id="Respuesta">

		</div>
	</div>


</body>
</html>