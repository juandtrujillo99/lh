<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, inicial-scale=1.0, maximun-scale=1.0, Mminimun-scale=1.0">
		<link rel="shortcut icon" href="#" />  
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo RUTA_CUENTA_REGRESIVA; ?>Bootstrap_4/css/bootstrap.min.css">

		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>fuentes.css">	
		<link rel="stylesheet" href="<?php echo RUTA_CUENTA_REGRESIVA; ?>estilos.css">
		<link href="<?php echo RUTA_CUENTA_REGRESIVA; ?>img/mini-logo.png" type="imagen/x-icon" rel="ahortcut icon" />
		<title>Los huecos</title>

	</head>
	<body>
		<div class="container" align="center">
			<div class="col-sm-12 col-xs-12">
				<div class="col-sm-1"></div>
				<div class="col-sm-10 col-xs-12">
				<?php
				include_once 'seccion/anuncio.php';
				?>
				<span class="hidden-xs"><br><br></span>
				</div>
			</div>
			<div class="col-sm-3"></div>
			<div class="col-sm-6 col-xs-12">
				<div id="countdown" class="row justify-content-center align-items-center"></div>
				<div><br><br><br></div>
			</div>
		</div>

		<script src="<?php echo RUTA_CUENTA_REGRESIVA; ?>JQuery/jquery-3.3.1.min.js"></script>	 	
		<script src="<?php echo RUTA_CUENTA_REGRESIVA; ?>Popper/popper.min.js"></script>	 	 	
		<script src="<?php echo RUTA_CUENTA_REGRESIVA; ?>Bootstrap_4/js/bootstrap.min.js"></script>

		<!--    Plugin countdown  -->
		<script src="<?php echo RUTA_CUENTA_REGRESIVA; ?>plugins/countdown-timezone/js/countdown.jquery.js"></script>
		<script src="<?php echo RUTA_CUENTA_REGRESIVA; ?>codigo.js"></script> 	  

	</body>
</html>