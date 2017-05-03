<div class="container">
	<legend class="text-center">Codigos de descuento</legend>
	<div class="table-responsive">
		<table class="table table-bordered" >

		<tr class="info">
			<th>Codigo</th>
			<th>Fecha de vencimiento</th>
			<th>Patrocinador</th>							

		</tr>

		<?php 
		if (!empty($codigos)) {
			foreach ($codigos as $codigos) { ?>
			
			<tr>
				<td> <?= $codigos->codigo ?></td>
				<td> <?= $codigos->fecha_vencimiento ?></td>
				<td> <?= $codigos->patrocinador ?></td>																																		
			</tr>
		
		<?php
			} 
		} ?>

		</table>
	</div>
</div>