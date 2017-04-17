<div class="container">
	<form action = "/encar/index.php/encar/registrar_adminsedemodelo" class="form-horizontal" method='post' id="usuario">
		<div class="form-group">
			<label class="col-md-1"></label>
			<div class="col-md-9">		
			<legend>Datos administrador</legend>				
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Nombre</label>
			<div class="col-md-7">
				<input type="text" name="nombre" class="form-control"  value=<?php if (isset($codigo['codigo'])) {echo $codigo['codigo'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Apellido</label>
			<div class="col-md-7">
				<input type="text" name="apellido" class="form-control" value=<?php if (isset($codigo['codigo'])) {echo $codigo['codigo'];} ?>>
			</div>
		</div>		
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Tipo de documento</label>
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
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Numero de documento</label>
			<div class="col-md-7">
				<input type="text" name="numeroDocumento" class="form-control" value=<?php if (isset($admin['numeroDocumento'])) {echo $admin['numeroDocumento'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Fecha de nacimiento</label>
			<div class="col-md-7">
				<input type="date" name='fechaNacimiento' class="form-control" value=<?php if (isset($admin['fechaNacimiento'])) {echo $admin['fechaNacimiento'];} ?>>
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Correo electronico</label>
			<div class="col-md-7">
				<input type="email" name='email' class="form-control" placeholder="example@gmail.com" value=<?php if (isset($admin['email'])) {echo $admin['email'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Direccion</label>
			<div class="col-md-7">	
				<input type="text" name='direccion' class="form-control" value=<?php if (isset($admin['direccion'])) {echo $admin['direccion'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Telefeno</label>
			<div class="col-md-7">
				<input type="text" name='telefono' class="form-control" value=<?php if (isset($admin['telefono'])) {echo $admin['telefono'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Celular</label>
			<div class="col-md-7">
				<input type="text" name='celular' class="form-control" value=<?php if (isset($admin['celular'])) {echo $admin['celular'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Usuario</label>
			<div class="col-md-7">
				<input type="text" name='nombreUsuario' class="form-control" value=<?php if (isset($admin['usuario'])) {echo $admin['usuario'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Contraseña</label>
			<div class="col-md-7">
				<input type="password" name='contrasena' class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Repita la contraseña</label>
			<div class="col-md-7">
				<input type="password" name='contrasena2' class="form-control">
			</div>
		</div>
		<br><br>
		<div class="text-center">
			<button type="submit" form="usuario" class="btn btn-default">Registrar</button>
		</div>
	</form>	
</div>