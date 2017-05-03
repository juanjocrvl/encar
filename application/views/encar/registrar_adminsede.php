<div class="container">
	<form action = "/encar/index.php/administradoresSede/registrar_modelo" class="form-horizontal" method='post' id="usuario">
		<div class="form-group">
			<label class="col-md-1"></label>
			<div class="col-md-9">		
			<legend>Datos administrador</legend>				
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Nombres</label>
			<div class="col-md-7">
				<input type="text" name="nombre" class="form-control"  value=<?php echo set_value('nombre'); ?>>
				<font color="red"><?php echo form_error('nombre'); ?></font>					
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Apellidos</label>
			<div class="col-md-7">
				<input type="text" name="apellido" class="form-control" value=<?php echo set_value('apellido'); ?>>
				<font color="red"><?php echo form_error('apellido'); ?></font>					
			</div>
		</div>		
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Tipo de documento</label>
			<div class="col-md-7">
				<select class="form-control" name="tipoDocumento">
					<option selected value="0"> Elige una opción </option>
   					<option value="Cedula de ciudadania" <?php echo set_select('tipoDocumento','Cedula de ciudadania'); ?>>Cédula de ciudadanía</option> 
   					<option value="Tarjeta de Identidad" <?php echo set_select('tipoDocumento','Tarjeta de Identidad'); ?>>Tarjeta de Identidad</option> 
   					<option value="Pasaporte" <?php echo set_select('tipoDocumento','Pasaporte'); ?>>Pasaporte</option>
   					<option value="Cedula de extranjeria" <?php echo set_select('tipoDocumento','Cedula de extranjeria'); ?>>Cédula de extranjería</option> 
   					<option value="Registro Civil" <?php echo set_select('tipoDocumento','Registro Civil'); ?>>Registro Civil</option>  
				</select>
				<font color="red"><?php echo form_error('tipoDocumento'); ?></font>					
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Numero de documento</label>
			<div class="col-md-7">
				<input type="text" name="numeroDocumento" class="form-control" placeholder="aaaa/mm/dd" value=<?php echo set_value('numeroDocumento'); ?>>
				<font color="red"><?php echo form_error('numeroDocumento'); ?></font>	
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Fecha de nacimiento</label>
			<div class="col-md-7">
				<input type="date" name='fechaNacimiento' class="form-control" value=<?php echo set_value('fechaNacimiento'); ?>>
				<font color="red"><?php echo form_error('fechaNacimiento'); ?></font>	
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Correo electronico</label>
			<div class="col-md-7">
				<input type="email" name='email' class="form-control" placeholder="example@gmail.com" value=<?php echo set_value('email'); ?>>
				<font color="red"><?php echo form_error('email'); ?></font>	
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Direccion</label>
			<div class="col-md-7">	
				<input type="text" name='direccion' class="form-control" value=<?php echo set_value('direccion'); ?>>
				<font color="red"><?php echo form_error('direccion'); ?></font>	
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Teléfono</label>
			<div class="col-md-7">
				<input type="text" name='telefono' class="form-control" value=<?php echo set_value('telefono'); ?>>
				<font color="red"><?php echo form_error('telefono'); ?></font>	
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Celular</label>
			<div class="col-md-7">
				<input type="text" name='celular' class="form-control" value=<?php echo set_value('celular'); ?>>
				<font color="red"><?php echo form_error('celular'); ?></font>	
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Usuario</label>
			<div class="col-md-7">
				<input type="text" name='nombreUsuario' class="form-control" value=<?php echo set_value('nombreUsuario'); ?>>
				<font color="red"><?php echo form_error('nombreUsuario'); ?></font>	
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;">Contraseña</label>
			<div class="col-md-7">
				<input type="password" name='contrasena' class="form-control">
				<font color="red"><?php echo form_error('contrasena'); ?></font>	
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Repita la contraseña</label>
			<div class="col-md-7">
				<input type="password" name='contrasena2' class="form-control">
				<font color="red"><?php echo form_error('contrasena2'); ?></font>	
			</div>
		</div>
		<br><br>
		<div class="text-center">
			<button type="submit" form="usuario" class="btn btn-default">Registrar</button>
		</div>
	</form>	
</div>