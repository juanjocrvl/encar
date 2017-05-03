<div class"container">
	<form action =<?php if(isset($link)){echo $link;}  ?> id="usuario" >
	<h2 class="text-center"><?= $success ?></h2>
	<br><br>
	<?php if (isset($boton)) { ?>
		<div class="text-center">
			<button type="submit" form="usuario" class="btn btn-default"><?= $boton ?></button>
		</div>
	<?php } ?>	
	</form>		
</div>