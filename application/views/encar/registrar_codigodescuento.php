<div class="container">
	<form action = "/encar/index.php/codigosDescuento/registrar_modelo" class="form-horizontal" method='post' id="usuario">
		<div class="form-group">
			<label class="col-md-1"></label>
			<div class="col-md-9">		
			<legend>Datos codigo de descuento</legend>				
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Codigo</label>
			<div class="col-md-7">						
				<input type="text" name="codigo" class="form-control" value=<?php echo set_value('codigo'); ?>>
				<font color="red"><?php echo form_error('codigo'); ?></font>			
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Fecha vencimiento</label>
			<div class="col-md-7">
				<input type="date" name="fecha_vencimiento" class="form-control" placeholder="aaaa/mm/dd" value=<?php echo set_value('fecha_vencimiento'); ?>>
				<font color="red"><?php echo form_error('fecha_vencimiento'); ?></font>					
			</div>
		</div>		
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Patrocinador</label>
			<div class="col-md-7">
				<input type="text" name="patrocinador" class="form-control" value=<?php echo set_value('patrocinador'); ?>>
				<font color="red"><?php echo form_error('patrocinador'); ?></font>					
			</div>
		</div>		
		<br><br>
		<div class="text-center">
		<button type="submit" form="usuario" class="btn btn-default">Registrar</button>
		</div>
	</form>	
</div>