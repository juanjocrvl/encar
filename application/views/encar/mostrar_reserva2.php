<div class="container">
	<legend class="text-center">Reserva</legend>	
	<div class="table-responsive">
		<table class="table table-bordered" >

		<tr class="info">
			<th>Codigo</th>
			<th>Vehiculo</th>		
			<th>Sede</th>
			<th>Fecha</th>
			<th>Hora inicio</th>
			<th>Hora fin</th>													
			<th>Descuento</th>
			<th>Usuario</th>
			<th>Estado</th>
			<th></th>								

		</tr>

		<?php 
		if (!empty($reserva)) {
			foreach ($reserva as $reserva) { ?>
			
			<tr>
				<td> <?= $reserva->codigo ?></td>
				<td> <?= $reserva->vehiculo ?></td>
				<td> <?= $reserva->sede ?></td>	
				<td> <?= $reserva->fecha ?></td>
				<td> <?= $reserva->hora_inicio ?></td>
				<td> <?= $reserva->hora_fin ?></td>
				<td> <?php if(isset($reserva->descuento)){ echo $reserva->descuento; }  ?></td>
				<td> <?= $reserva->usuario ?></td>
				<td> <?= $reserva->estado ?></td>	
				<td align="center">
					<form method='post' id="mover" action=<?= '/encar/index.php/reservas/finalizar_modelo/'.$reserva->codigo ?>>
						<button type="submit" form="mover" class="btn btn-default">Finalizar</button>
					</form>
				</td>																																		
			</tr>
		
		<?php
			} 
		} ?>

		</table>
	</div>
</div>