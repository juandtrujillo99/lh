<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/EscritorEntradas.inc.php';
include_once 'app/Redireccion.inc.php';

$titulo = "Cerrado | $nombreEmpresa";
$descripcionPagina = "Cerrado por emergencia sanitaria y situación de orden público";
$imagenCompartida = '<meta itemprop="image" content="'. RUTA_IMG .'nosotros/logo-2.jpg">';

include_once 'seccion/cabecera-inicio.inc.php';?>
        
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>materialize.min.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>bootstrap.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilos.css">

<?php 
include_once 'seccion/cabecera-cierre.inc.php';
?>

    
<?php //cuerpo?>
<div class="col-sm-12 col-xs-12" align="center">
    <br><br>
    <img src="<?php echo RUTA_IMG."fondos/cerrado.png"; ?>" class="imagen">
    <div class="col-sm-2 col-xs-2"></div>
    <div class="col-sm-8 col-xs-8">
        <br>
        <h2 class="texto-negrita">
            Por culpa del coronavirus, no podemos enviarte las joyas :(
        </h2>
        <br><br>
        <a href="javascript:history.back(-1);"><h4 class="boton-ver-mas">&larr; Escríbenos al DM por Instagram.</h4></a>
        <h1><br><br></h1>

    </div>
</div>

<?php //cuerpo ?>

<?php
include_once 'seccion/doc-pie.inc.php';
?>