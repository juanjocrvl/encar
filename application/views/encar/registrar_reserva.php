<div class="container">
	<form action = "/encar/index.php/reservas/registrar_modelo" class="form-horizontal" method='post' id="usuario">
		<div class="form-group">
			<label class="col-md-1"></label>
			<div class="col-md-9">		
			<legend>Datos reserva</legend>				
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Vehiculo</label>
			<div class="col-md-7">
				<input type="text" name="placa" disabled class="form-control" value=<?= $placa ?>>			
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Sede</label>
			<div class="col-md-7">
				<input type="text" name="sede" disabled class="form-control" value=<?= $sede ?>>			
			</div>
		</div>						
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Fecha</label>
			<div class="col-md-7">
				<input type="date" name="fecha"  class="form-control" value=<?= $fecha ?>>			
			</div>
		</div>		
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Hora inicio</label>
			<div class="col-md-7">
				<select class="form-control" name="categoria">
					<option selected value="0"> Elige una opción </option>
   					<option value="Automovil" <?php echo set_select('categoria','Automovil'); ?>>Automovil</option> 
   					<option value="Coupe" <?php echo set_select('categoria','Coupe'); ?>>Coupé</option> 
   					<option value="Camioneta" <?php echo set_select('categoria','Camioneta'); ?>>Camioneta</option>
				</select>
				<font color="red"><?php echo form_error('categoria'); ?></font>				
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Hora fin</label>
			<div class="col-md-7">
				<select class="form-control" name="transmision">
					<option selected value="0"> Elige una opción </option>
   					<option value="Automatica" <?php echo set_select('transmision','Automatica'); ?>>Automática</option> 
   					<option value="Manual" <?php echo set_select('transmision','Manual'); ?>>Manual</option> 
				</select>
				<font color="red"><?php echo form_error('transmision'); ?></font>				
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Codigo descuento</label>
			<div class="col-md-7">
				<input type="date" name="descuento"  class="form-control" >			
			</div>
		</div>			
		<br><br>
		<div class="text-center">
			<button type="submit" form="usuario" class="btn btn-default">Registrar</button>
		</div>
	</form>	
</div>