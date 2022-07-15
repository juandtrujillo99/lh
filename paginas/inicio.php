<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/EscritorEntradas.inc.php';
include_once 'app/Redireccion.inc.php';

$titulo = "Inicio | $nombreEmpresa";
$descripcionPagina = $descripcionNegocio;
$imagenCompartida = '<meta itemprop="image" content="'. RUTA_IMG .'nosotros/logo-2.jpg">';

include_once 'seccion/cabecera-inicio.inc.php';?>
        
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilo-servicios.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilo-menu.css">
        <?php 
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';

?>

    
<?php //cuerpo?>
<div class="col-sm-12 col-xs-12">
    <div class="col-sm-12 hidden-xs"><br><br></div>
    <div class="col-xs-12 visible-xs"><br><br><br><br></div>
    <div class="col-sm-1 col-xs-1"></div>
    <div class="col-sm-10 col-xs-10">
        <?php //quitar titulo <span hidden>?>
            <h1 class="texto-negrita">Últimos productos</h1>
            <div class="col-sm-5"></div>
            <div class="linea-decorativa col-sm-2">.</div>
        <?php //quitar titulo </span>?>
            <div class="col-sm-5"><br><br></div>
        
        <div class="col-sm-12 col-xs-12">
            <?php         
                EscritorEntradas::escribir_cuatro_entradas();
            ?>
        </div>
        <div class="col-sm-12 col-xs-12">
            <div class="col-sm-12 col-xs-12"><br><br></div>  
            <div class="col-sm-4 col-xs-2"></div>            
            <a class="col-sm-4 col-xs-8 boton-ver-mas waves-effect waves-light" href="<?php echo RUTA_TIENDA;?>">
                <div align="center">Ver más</div>
            </a>
            <div class="col-sm-4 col-xs-2"></div>  
            <div class="col-sm-12 col-xs-12"><br><br></div>         
        </div>
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