<div class="container">
	<form action = "/encar/index.php/sedes/registrar_modelo" class="form-horizontal" method='post' id="usuario">
		<div class="form-group">
			<label class="col-md-1"></label>
			<div class="col-md-9">		
			<legend>Datos sede</legend>				
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Nombre</label>
			<div class="col-md-7">						
				<input type="text" name="nombre" class="form-control" value=<?php echo set_value('nombre'); ?>>
				<font color="red"><?php echo form_error('nombre'); ?></font>			
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Direccion</label>
			<div class="col-md-7">
				<input type="date" name="direccion" class="form-control" value=<?php echo set_value('direccion'); ?>>
				<font color="red"><?php echo form_error('direccion'); ?></font>					
			</div>
		</div>		
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Capacidad</label>
			<div class="col-md-7">
				<input type="text" name="capacidad" class="form-control" value=<?php echo set_value('capacidad'); ?>>
				<font color="red"><?php echo form_error('capacidad'); ?></font>					
			</div>
		</div>		
		<br><br>
		<div class="text-center">
		<button type="submit" form="usuario" class="btn btn-default">Registrar</button>
		</div>
	</form>	
</div>