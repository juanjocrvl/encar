<div class="container">
	<form action = "/encar/index.php/personas/login" class="form-horizontal" method='post' id="usuario">
		<div class="form-group">
			<label class="col-md-1"></label>
			<div class="col-md-9">		
			<legend>Login</legend>				
			</div>
		</div>		
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Usuario</label>
			<div class="col-md-7">						
				<input type="text" name="nombreUsuario" class="form-control" value=<?php echo set_value('nombreUsuario'); ?>>
				<font color="red"><?php echo form_error('nombreUsuario'); ?></font>	
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Contraseña</label>
			<div class="col-md-7">
				<input type="password" name="contrasena" class="form-control" >
				<font color="red"><?php echo form_error('contrasena'); ?></font>				
			</div>
		</div>			
		<br><br>
		<div class="text-center">
		<button type="submit" form="usuario" class="btn btn-default">Ingresar</button>
		</div>
	</form>	
</div>