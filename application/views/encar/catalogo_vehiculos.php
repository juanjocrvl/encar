<div class="container">
	<legend class="text-center">Vehiculos</legend>	
	<div class="row">
		<form method='post' id="filtrar" action=<?= '/encar/index.php/vehiculos/catalogo' ?>>	
			<div class="form-group">
				<div class="col-md-3">	
					<select class="form-control" name="sede">
						<option selected value="0"> Todas </option>
						<?php 	if(!empty($sedes)) {
									foreach ($sedes as $sedes) { ?>
		   								<option value=<?= $sedes->nombre ?> <?php echo set_select('sede',$sedes->nombre); ?>><?= $sedes->nombre ?></option>
						<?php		}	
								}?>
					</select>
					<font color="red"><?php echo form_error('sede'); ?></font>				
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
			<th>Placa</th>
			<th>Categoria</th>
			<th>Transmision</th>
			<th>Combustible</th>
			<th>Color</th>
			<th>Precio</th>
			<th>Sede</th>
			<th></th>								

		</tr>

		<?php 
		if (!empty($vehiculos)) {
			foreach ($vehiculos as $vehiculos) { ?>
			
			<tr>
				<td> <?= $vehiculos->placa ?></td>
				<td> <?= $vehiculos->categoria ?></td>
				<td> <?= $vehiculos->transmision ?></td>
				<td> <?= $vehiculos->combustible ?></td>
				<td> <?= $vehiculos->color ?></td>
				<td> <?= $vehiculos->precio ?></td>	
				<td> <?= $vehiculos->sede ?></td>	
				<td align="center">
					<form method='post' id="mover" action=<?= '/encar/index.php/reservas/registrar_vista/'.$vehiculos->placa ?>>
						<button type="submit" form="mover" class="btn btn-default">Reservar</button>
					</form>
				</td>																																		
			</tr>
		
		<?php
			} 
		} ?>

		</table>
	</div>
</div>