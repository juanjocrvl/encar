<div class="container">
	<form action =<?= '/encar/index.php/vehiculos/mover_modelo/'.$placa ?> class="form-horizontal" method='post' id="usuario">
		<div class="form-group">
			<label class="col-md-1"></label>
			<div class="col-md-9">		
			<legend>Mover vehiculo</legend>				
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Vehiculo</label>
			<div class="col-md-7">
				<input type="text" name="placa" disabled class="form-control" value=<?= $placa ?>>			
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Sede actual</label>
			<div class="col-md-7">
				<input type="text" name="sede_actual" disabled class="form-control" value=<?= $sede ?>>			
			</div>
		</div>			
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Sede nueva</label>
			<div class="col-md-7">	
				<select class="form-control" name="sede_nueva">
					<option selected value="0"> Elige una opción </option>
					<?php 	if(!empty($sedes)) {
								foreach ($sedes as $sedes) { ?>
   									<option value=<?= $sedes->nombre ?> <?php echo set_select('sede',$sedes->nombre); ?>><?= $sedes->nombre ?></option>
					<?php		}	
							}?>

				</select>
				<font color="red"><?php echo form_error('sede_nueva'); ?></font>				
			</div>
		</div>	
		<br><br>
		<div class="text-center">
			<button type="submit" form="usuario" class="btn btn-default">Mover</button>
		</div>
	</form>	
</div>