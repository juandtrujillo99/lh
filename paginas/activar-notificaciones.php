<?php

include_once 'app/config.inc.php';

$titulo = "Activar notificaciones | $nombreEmpresa";
?>
<!DOCTYPE html>
<html lang="es">
	<head>
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
		<meta charset="UTF-8">
		<meta name="theme-color" content="#000">
		<meta name="viewport" content="width=device-width, user-scalable=no, inicial-scale=1.0, maximun-scale=1.0, Mminimun-scale=1.0">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>bootstrap.css">
<?php
include 'seccion/cabecera-cierre.inc.php';?>
	<div class="col-xs-12">
		<div class="col-xs-4"></div>
		<div class="col-xs-4">
			<script> window._peq = window._peq || []; window._peq.push(["init"]); </script>
			<script src="https://clientcdn.pushengage.com/core/3801cb2cd02c80fea6a1958a0cefcfc7.js" async></script>
		</div>
	</div>
<?php include 'seccion/doc-pie.inc.php';?>

