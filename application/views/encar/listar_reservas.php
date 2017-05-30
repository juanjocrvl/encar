<div class="container">
	<legend class="text-center">Reservas</legend>	
	<div class="row">
		<form method='post' id="filtrar" action='/encar/index.php/reservas/listar'>	
			<div class="form-group">
				<div class="col-md-3">	
					<select class="form-control" name="estado">
						<option selected value="Todas"> Todas </option>
   						<option value="Registrada" <?php echo set_select('estado','Registrada'); ?>>Registrada</option> 
   						<option value="Finalizada" <?php echo set_select('estado','Finalizada'); ?>>Finalizada</option> 
   						<option value="Activa" <?php echo set_select('estado','Activa'); ?>>Activa</option>    						   												
					</select>
					<font color="red"><?php echo form_error('estado'); ?></font>				
				</div>
					<button type="submit" form="filtrar" class="btn btn-default">Filtrar</button>
				</form>			
			</div>
		</form>			
	</div>	
	<br>		
	<div class="table-responsive">
		<table class="table table-bordered" >

		<tr class="info">
			<th>Codigo</th>
			<th>Vehiculo</th>		
			<th>Sede</th>
			<th>Fecha</th>
			<th>Hora inicio</th>			
			<th>Hora fin</th>
			<th>Sede entrega</th>																
			<th>Descuento</th>
			<th>Usuario</th>
			<th>Estado</th>									
		</tr>

		<?php 
		if (!empty($reservas)) {
			foreach ($reservas as $reserva) { ?>
			
			<tr>
				<td> <?= $reserva->codigo ?></td>
				<td> <?= $reserva->vehiculo ?></td>
				<td> <?= $reserva->sede ?></td>	
				<td> <?= $reserva->fecha ?></td>
				<td> <?= $reserva->hora_inicio ?></td>
				<td> <?= $reserva->hora_fin ?></td>
				<td> <?= $reserva->sede_entrega ?></td>				
				<td> <?php if(isset($reserva->descuento)){ echo $reserva->descuento; }  ?></td>
				<td> <?= $reserva->usuario ?></td>
				<td> <?= $reserva->estado ?></td>	
			</tr>
		
		<?php
			} 
		} ?>

		</table>
	</div>
</div>