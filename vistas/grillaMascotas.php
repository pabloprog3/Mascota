

<div class='row'>

	<div class='col-md-4'>
		<form class='form-group' id='formMascota' method='post' action='nexo.php'>
			<input type='text' id='nombre' name='nombre' placeholder='Ingrese Marca' class='form-control'>
			<br>
			<input type='text' id='edad' name='edad' placeholder='Modelo' class='form-control'>
			<br>
			<input type='date' id='fecha' name='fecha' class='form-control'>
			<br>
			<select <select class='form-control' id='selectTipo'>

				<option value='Android'>Android</option>
				<option value='iOS'>iOS</option>
				<option value='Windows'>Windows</option>
			</select>
			<br>
			<label class='label label-primary'>sim: </label><br>
			<input  style='color:green' type='radio' value='1' name='sexo' id='macho'/>1
			<br>
			<input style='BACKGROUND-COLOR:white' type='radio' value='2' name='sexo' id='hembra'/>2
			<input type='file' value='foto' name="foto" id="foto">
			<input type='button' class='btn btn-success' value='Ingresar Producto' id='ingresar' onClick='ingresarMascota()'>
			<br>

		</form>

	</div>

	<div class='col-md-8'>

		<?php

			error_reporting(E_ERROR | E_WARNING | E_PARSE);

			include_once '../clases/mascota.php';

			$matrizDeMascotas = Mascota::traerMascotas();
			$id=null;

		if ($matrizDeMascotas != -1) {
				
			

			echo "<table class='table table-responsive' align='center'>

						<tr>
							<td style='color:black' id='patenteTH' align='center'>Marca</td>
							<td style='color:black' id='ingresoTH' align='center'>Modelo</td>
							<td style='color:black' id='ingresoTH' align='center'>Fecha</td>
							<td style='color:black' id='ingresoTH' align='center'>SO</td>
							<td style='color:black' id='ingresoTH' align='center'>SIM</td>";


					echo "<td style='color:black'></td>";

					echo "</tr>";

						foreach ($matrizDeMascotas as $i) 
						{
							$imagenActual = $i->GetPathFoto();
							$mascota = array();
							$mascota["nombre"] = $i->GetNombre();
							$mascota["edad"] = $i->GetEdad();
							$mascota["fecha"] = $i->GetFecha();
							$mascota["tipo"] = $i->GetTipo();
							$mascota["sexo"] = $i->GetSexo();
							$mascota["foto"] = $i->GetPathFoto();

							$mascota = json_encode($mascota);

								echo "<tr class='success'>";
								echo "<td align='center'>".$i->GetNombre()."</td>";
								echo "<td align='center'>".$i->GetEdad()."</td>";
								echo "<td align='center'>".$i->GetFecha()."</td>";
								echo "<td align='center'>".$i->GetTipo()."</td>";
								echo "<td align='center'>".$i->GetSexo()."</td>";
								echo "<td><input type='submit' value='BORRAR' onClick='sacarMascota($mascota)' class='btn btn-danger'> </td>";
								echo "<td><input type='button' value='MODIFICAR' onClick='modificarMascota($mascota)' class='btn btn-warning'> </td>";
								echo "</tr>";
											
			}

		echo  "</table>";	
	}

?>



	</div>



</div>


						
			


