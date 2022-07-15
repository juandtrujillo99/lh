<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/EscritorEntradas.inc.php';
include_once 'app/Redireccion.inc.php';

$titulo = "Sorteo | $nombreEmpresa";
$descripcionPagina = $descripcionNegocio;
$imagenCompartida = '<meta itemprop="image" content="'. RUTA_IMG .'nosotros/logo-2.jpg">';

include_once 'seccion/cabecera-inicio.inc.php';?>
        
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>materialize.min.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>bootstrap.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilo-servicios.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilos.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>galeria-lightbox.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>efecto-imagen.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.min.css">
        <?php 
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';

?>

    
<?php //cuerpo?>
<div class="col-sm-12 col-xs-12">
    <div class="col-sm-1"></div>
    <div class="col-sm-10 col-xs-12" align="center">
        <span class="hidden-xs"><br><br></span>
        <?php
        include_once 'seccion/anuncio.php';
        ?>
        <span class="hidden-xs"><br><br></span>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <?php include_once 'seccion/footer.inc.php'; ?>
        </div>
    </div>
</div>

<?php //cuerpo ?>

<?php
include_once 'seccion/doc-pie.inc.php';
?>