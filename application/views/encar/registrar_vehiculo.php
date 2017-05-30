<div class="container">
	<form action = "/encar/index.php/vehiculos/registrar_modelo" class="form-horizontal" method='post' id="usuario">
		<div class="form-group">
			<label class="col-md-1"></label>
			<div class="col-md-9">		
			<legend>Datos vehiculo</legend>				
			</div>
		</div>	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Placa</label>
			<div class="col-md-7">
				<input type="text" name="placa" class="form-control" value=<?php echo set_value('placa'); ?>>
				<font color="red"><?php echo form_error('placa'); ?></font>				
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Precio</label>
			<div class="col-md-7">
				<input type="number" name="precio" class="form-control" value=<?php echo set_value('precio'); ?>>
				<font color="red"><?php echo form_error('precio'); ?></font>				
			</div>
		</div>		
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Categoria</label>
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
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Transmision</label>
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
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Combustible</label>
			<div class="col-md-7">
				<select class="form-control" name="combustible">
					<option selected value="0"> Elige una opción </option>
   					<option value="Gasolina corriente" <?php echo set_select('combustible','Gasolina corriente'); ?>>Gasolina corriente</option>
   					<option value="Diesel" <?php echo set_select('combustible','Diesel'); ?>>Diesel</option> 
   					<option value="Electrico" <?php echo set_select('combustible','Electrico'); ?>>Eléctrico</option>
   					<option value="Gas" <?php echo set_select('combustible','Gas'); ?>>Gas</option>
				</select>
				<font color="red"><?php echo form_error('combustible'); ?></font>				
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Color</label>
			<div class="col-md-7">	
				<select class="form-control" name="color">
					<option selected value="0"> Elige una opción </option>
   					<option value="Azul cielo" <?php echo set_select('color','Azul cielo'); ?>>Azul Cielo</option>
   					<option value="Negro" <?php echo set_select('color','Negro'); ?>>Negro</option> 
   					<option value="Gris" <?php echo set_select('color','Gris'); ?>>Gris</option>
   					<option value="Dorado" <?php echo set_select('color','Dorado'); ?>>Dorado</option>
   					<option value="Verde agua" <?php echo set_select('color','Verde agua'); ?>>Verde Agua</option>
				</select>
				<font color="red"><?php echo form_error('color'); ?></font>				
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Sede</label>
			<div class="col-md-7">	
				<select class="form-control" name="sede">
					<option selected value="0"> Elige una opción </option>
					<?php 	if(!empty($sedes)) {
								foreach ($sedes as $sedes) { ?>
   									<option value=<?= $sedes->nombre ?> <?php echo set_select('sede',$sedes->nombre); ?>><?= $sedes->nombre ?></option>
					<?php		}	
							}?>
				</select>
				<font color="red"><?php echo form_error('sede'); ?></font>				
			</div>
		</div>		
		<br><br>
		<div class="text-center">
			<button type="submit" form="usuario" class="btn btn-default">Registrar</button>
		</div>
	</form>	
</div>