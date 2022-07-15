<div>
	<input type="text" name="codigo" placeholder="Código" required <?php $validador -> mostrar_codigo()?>><br><br>
	<?php
	$validador -> mostrar_error_codigo();
	?>
</div>
<div>
	<input type="text" name="nombre" placeholder="Nombre" required <?php $validador -> mostrar_nombre()?>><br><br>
	<?php
	$validador -> mostrar_error_nombre();
	?>
</div>
<div>
	<input type="email" name="email" placeholder="Correo" required <?php $validador -> mostrar_email()?>><br><br>
	<?php
	$validador -> mostrar_error_email();
	?>
</div>
<div>
	<input type="password" name="clave1" placeholder="Contraseña" required><br><br>
	<?php
	$validador -> mostrar_error_clave1();
	?>
</div>
<div>
	<input type="password" name="clave2" placeholder="Contraseña otra vez" required><br><br>
	<?php
	$validador -> mostrar_error_clave2();
	?>
</div>
<button type="reset" class="button2" id="boton2" title="Se eliminarán todos los datos escritos">Eliminar formulario</button>
<br><br>
<button type="submit" id="boton" name="enviar">Registrar</button>