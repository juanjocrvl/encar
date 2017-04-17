<div class="container">
	<form action = "/encar/index.php/encar/registrar_vehiculomodelo" class="form-horizontal" method='post' id="usuario">
		<div class="form-group">
			<label class="col-md-1"></label>
			<div class="col-md-9">		
			<legend>Datos vehiculo</legend>				
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Placa</label>
			<div class="col-md-7">
				<input type="text" name="placa" class="form-control" value=<?php if (isset($vehiculo['placa'])) {echo $vehiculo['placa'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Precio</label>
			<div class="col-md-7">
				<input type="number" name="precio" class="form-control" value=<?php if (isset($vehiculo['precio'])) {echo $vehiculo['precio'];} ?>>
			</div>
		</div>		
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Categoria</label>
			<div class="col-md-7">
				<select class="form-control" name="categoria">
					<option selected value="0"> Elige una opción </option>
   					<option value="Automovil">Automovil</option> 
   					<option value="Coupe">Coupé</option> 
   					<option value="Camioneta">Camioneta</option>
				</select>
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Transmision</label>
			<div class="col-md-7">
				<select class="form-control" name="transmision">
					<option selected value="0"> Elige una opción </option>
   					<option value="Automatica">Automática</option> 
   					<option value="Manual">Manual</option> 
				</select>
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Combustible</label>
			<div class="col-md-7">
				<select class="form-control" name="combustible">
					<option selected value="0"> Elige una opción </option>
   					<option value="Gasolina corriente">Gasolina corriente</option>
   					<option value="Diesel">Diesel</option> 
   					<option value="Electrico">Eléctrico</option>
   					<option value="Gas">Gas</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Color</label>
			<div class="col-md-7">	
				<select class="form-control" name="color">
					<option selected value="0"> Elige una opción </option>
   					<option value="Azul cielo">Azul Cielo</option>
   					<option value="Negro">Negro</option> 
   					<option value="Gris">Gris</option>
   					<option value="Dorado">Dorado</option>
   					<option value="Verde agua">Verde Agua</option>
				</select>
			</div>
		</div>
		<br><br>
		<div class="text-center">
			<button type="submit" form="usuario" class="btn btn-default">Registrar</button>
		</div>
	</form>	
</div>