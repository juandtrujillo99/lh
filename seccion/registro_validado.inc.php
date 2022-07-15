<div>
	<p align="left">Escribe tu nombre*</p>
	<input type="text" name="nombre" placeholder="Nombre de usuario" required <?php $validador -> mostrar_nombre()?>>
	<?php
	$validador -> mostrar_error_nombre();
	?>
</div>
<div>
	<p align="left">Escribe tu número de whatsapp (sin signos ni espacios)*</p>
	<input type="number" name="email" placeholder="3507043982" required <?php $validador -> mostrar_email()?>>
	<?php
	$validador -> mostrar_error_email();
	?>
</div>
