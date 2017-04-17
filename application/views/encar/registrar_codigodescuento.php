<div class="container">
	<form action = "/encar/index.php/encar/registrar_codigodescuentomodelo" class="form-horizontal" method='post' id="usuario">
		<div class="form-group">
			<label class="col-md-1"></label>
			<div class="col-md-9">		
			<legend>Datos codigo de descuento</legend>				
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Codigo</label>
			<div class="col-md-7">						
				<input type="text" name="codigo" class="form-control" value=<?php if (isset($codigo['codigo'])) {echo $codigo['codigo'];} ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Fecha vencimiento</label>
			<div class="col-md-7">
				<input type="date" name="fecha_vencimiento" class="form-control" placeholder="dd/mm/aaaa" value=<?php if (isset($codigo['fecha_vencimiento'])) {echo $codigo['fecha_vencimiento'];} ?>>
			</div>
		</div>		
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Patrocinador</label>
			<div class="col-md-7">
				<input type="text" name="patrocinador" class="form-control" value=<?php if (isset($codigo['patrocinador'])) {echo $codigo['patrocinador'];} ?>>
			</div>
		</div>		
		<br><br>
		<div class="text-center">
		<button type="submit" form="usuario" class="btn btn-default">Registrar</button>
		</div>
	</form>	
</div>