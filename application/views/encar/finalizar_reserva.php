<div class="container">
	<form action ='/encar/index.php/reservas/finalizar_vista' class="form-horizontal" method='post' id="usuario">
		<div class="form-group">
			<label class="col-md-1"></label>
			<div class="col-md-9">		
			<legend>Finalizar reserva</legend>				
			</div>
		</div>		
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1" style="padding-top:8px;" >Codigo reserva</label>
			<div class="col-md-7">						
				<input type="text" name="codigo" class="form-control" >
				<font color="red"><?php echo form_error('codigo'); ?></font>	
			</div>
		</div>		
		<br>
		<div class="text-center">
		<button type="submit" form="usuario" class="btn btn-default">Buscar</button>
		</div>
	</form>	
</div>