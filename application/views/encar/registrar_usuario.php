<div class="container">
	<form action = "/encar/index.php/encar/registrar_usuariomodelo" class="form-horizontal" method='post' id="usuario">
	<legend>REGISTRAR USUARIO</legend>	
		<div class="form-group">
			<label class="col-md-1"></label>
			<div class="col-md-9">	
			<legend>Datos personales</legend>				
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Nombres</label>
			<div class="col-md-7">
				<input type="text" name="nombre" class="form-control" value=<?php if (isset($usuario['nombre'])) {echo $usuario['nombre'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Apellidos</label>
			<div class="col-md-7">
				<input type="text" name="apellido" class="form-control" value=<?php if (isset($usuario['apellido'])) {echo $usuario['apellido'];} ?>>
			</div>
		</div>		
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Tipo de documento</label>
			<div class="col-md-7">
				<select class="form-control" name="tipoDocumento">
					<option selected value="0"> Elige una opción </option>
   					<option value="Cedula de ciudadania">Cédula de ciudadanía</option> 
   					<option value="Tarjeta de Identidad">Tarjeta de Identidad</option> 
   					<option value="Pasaporte">Pasaporte</option>
   					<option value="Cedula de extranjeria">Cédula de extranjería</option> 
   					<option value="Registro Civil">Registro Civil</option>  
				</select>

			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Número de documento</label>
			<div class="col-md-7">
				<input type="number" name="numeroDocumento" class="form-control" value=<?php if (isset($usuario['numeroDocumento'])) {echo $usuario['numeroDocumento'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Fecha de nacimiento</label>
			<div class="col-md-7">
				<input type="date" name='fechaNacimiento' class="form-control" placeholder="dd/mm/aaaa" value=<?php if (isset($usuario['fechaNacimiento'])) {echo $usuario['fechaNacimiento'];} ?>>
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Correo electronico</label>
			<div class="col-md-7">
				<input type="email" name='email' class="form-control" placeholder="example@gmail.com" value=<?php if (isset($usuario['email'])) {echo $usuario['email'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Dirección</label>
			<div class="col-md-7">	
				<input type="text" name='direccion' class="form-control" value=<?php if (isset($usuario['direccion'])) {echo $usuario['direccion'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Teléfono</label>
			<div class="col-md-7">
				<input type="text" name='telefono' class="form-control" value=<?php if (isset($usuario['telefono'])) {echo $usuario['telefono'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Celular</label>
			<div class="col-md-7">
				<input type="text" name='celular' class="form-control" value=<?php if (isset($usuario['celular'])) {echo $usuario['celular'];} ?>>
			</div>
		</div>
		<br><br>
		<div class="form-group">
			<label class="col-md-1"></label>
			<div class="col-md-9">	
			<legend>Datos de usuario</legend>				
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Usuario</label>
			<div class="col-md-7">
				<input type="text" name='nombreUsuario' class="form-control" value=<?php if (isset($usuario['nombreUsuario'])) {echo $usuario['nombreUsuario'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Contraseña</label>
			<div class="col-md-7">
				<input type="password" name='contrasena' class="form-control" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Repita la contraseña</label>
			<div class="col-md-7">
				<input type="password" name='contrasena2' class="form-control" >
			</div>
		</div>
		<br><br>
		<div class="form-group">
			<label class="col-md-1"></label>
			<div class="col-md-9">		
			<legend>Datos tarjeta credito</legend>				
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Número</label>
			<div class="col-md-7">
				<input type="number" name='numero' class="form-control" value=<?php if (isset($tarjeta['numero'])) {echo $tarjeta['numero'];} ?>>
			</div>
		</div>												
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Código de seguridad</label>
			<div class="col-md-7">
				<input type="text" name='codigo_seguridad' class="form-control" value=<?php if (isset($tarjeta['codigo_seguridad'])) {echo $tarjeta['codigo_seguridad'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Fecha de vencimiento</label>
			<div class="col-md-7">
				<input type="date" name='fecha_vencimiento' class="form-control" placeholder="dd/mm/aaaa" value=<?php if (isset($tarjeta['fecha_vencimiento'])) {echo $tarjeta['fecha_vencimiento'];} ?>>
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Saldo</label>
			<div class="col-md-7">
				<input type="number" name='saldo' class="form-control" value=<?php if (isset($tarjeta['saldo'])) {echo $tarjeta['saldo'];} ?>>
			</div>
		</div>
		<br><br>
		<div class="text-center">
			<button type="submit" form="usuario" class="btn btn-default">Registrarse</button>
		</div>
	</form>	
</div>