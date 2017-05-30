<div class="container">
	<form action = <?= '/encar/index.php/reservas/registrar_modelo/'.$placa ?> class="form-horizontal" method='post' id="usuario">
		<div class="form-group">
			<label class="col-md-1"></label>
			<div class="col-md-9">		
			<legend>Datos reserva</legend>				
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Vehiculo</label>
			<div class="col-md-7">
				<input type="text" name="vehiculo" readonly class="form-control" value=<?= $placa ?>>			
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Sede</label>
			<div class="col-md-7">
				<input type="text" name="sede" readonly class="form-control" value=<?= $sede ?>>			
			</div>
		</div>						
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Fecha</label>
			<div class="col-md-7">
				<input type="date" name="fecha" readonly class="form-control" value=<?= $fecha ?>>			
			</div>
		</div>		
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Hora inicio</label>
			<div class="col-md-7">
				<select class="form-control" name="hora_inicio">
					<option selected value="0"> Elige una opción </option>
					<?php 	
							for ($i=((int) date("H")); $i < ((int) date("H")) + 6; $i++) {  ?>
   								<option value=<?= $i ?> <?php echo set_select('hora_inicio',$i); ?>><?= $i.":00" ?></option>
					<?php	if($i == 23){break;}
							}	
							?>
				</select>
				<font color="red"><?php echo form_error('hora_inicio'); ?></font>				
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Hora fin</label>
			<div class="col-md-7">
				<select class="form-control" name="hora_fin">
					<option selected value="0"> Elige una opción </option>
					<?php 	
							for ($i=((int) date("H"))+1; $i <= 24; $i++) {  ?>
   								<option value=<?= $i ?> <?php echo set_select('hora_fin',$i); ?>><?= $i.":00" ?></option>
					<?php	}	
							?>
				</select>
				<font color="red"><?php echo form_error('hora_fin'); ?></font>				
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Sede de entrega</label>
			<div class="col-md-7">	
				<select class="form-control" name="sede_entrega">
					<option selected value="0"> Elige una opción </option>
					<?php 	if(!empty($sedes)) {
								foreach ($sedes as $sedes) { ?>
   									<option value=<?= $sedes->nombre ?> <?php echo set_select('sede_entrega',$sedes->nombre); ?>><?= $sedes->nombre ?></option>
					<?php		}	
							}?>
				</select>
				<font color="red"><?php echo form_error('sede_entrega'); ?></font>				
			</div>
		</div>		
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Codigo descuento</label>
			<div class="col-md-7">
				<input type="date" name="descuento"  class="form-control" >	
				<font color="red"><?php if(set_value('descuento') != null){echo form_error('descuento');} ?></font>						
			</div>
		</div>			
		<br><br>
		<div class="text-center">
			<button type="submit" form="usuario" class="btn btn-default">Registrar</button>
		</div>
	</form>	
</div>