<div class="container">
	<legend class="text-center">Vehiculos</legend>	
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
			<th>Estado</th>	
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
				<td> <?= $vehiculos->estado ?></td>		
				<td align="center">
					<form method='post' id="mover" action=<?= '/encar/index.php/vehiculos/mover_vista/'.$vehiculos->placa ?>>
						<button type="submit" form="mover" class="btn btn-default">Mover</button>
					</form>
				</td>																																		
			</tr>
		
		<?php
			} 
		} ?>

		</table>
	</div>
</div>