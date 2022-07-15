<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/Admin.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';

include_once 'app/RepositorioAdmin.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';

include_once 'app/EscritorEntradas.inc.php';

$titulo = $entrada -> obtener_titulo() ." | $nombreEmpresa";
$descripcionPagina = "Precio: $".number_format($entrada -> obtener_precio()) . " COP";
$imagenCompartida = '<meta itemprop="image" content="'. RUTA_IMG_SUBIDAS. '/'. $entrada -> obtener_imagen().'">';
?>

<?php
include_once 'seccion/cabecera-inicio.inc.php';?>

        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilo-servicios.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilos.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.min.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilo-menu.css">

        <script type="text/javascript" async='async'>
            function abrirMapa(){$(".ventana").slideDown("slow");}
            function cerrarMapa(){$(".ventana").slideUp("fast");}
        </script>

<?php 
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
include_once 'seccion/iframe-instagram.inc.php';

//entrada.php es el archivo encargado de crear las entradas, es una plantilla
?>



<?php //cuerpo;?>
<div class="col-sm-12 col-xs-12" id="entrada">
    <div class="col-xs-12 visible-xs"><br><br><br></div>
    <div class="col-sm-1"></div>
    <div class="col-sm-10"><span class="hidden-xs"><br><br></span>
        <div class="col-sm-12">            
            <div class="col-sm-1"></div> 
            <div align="center" class="col-sm-4">
                <a href="javascript:abrirMapa();">
                    <div class="col-sm-12">
                        <?php
                        if(file_exists(RUTA_IMG_OPTIMIZADA. $entrada -> obtener_imagen())){
                            ?>
                            <img loading="lazy" itemprop="image" src="<?php echo RUTA_IMG_OPTIMIZADA . $entrada -> obtener_imagen(); ?>" class="imagen" alt="<?php echo $entrada -> obtener_titulo(); ?>" >
                            <?php
                        }
                        else {
                            ?>
                           <img loading="lazy" itemprop="image" src="<?php echo RUTA_IMG_SUBIDAS. "/". $entrada -> obtener_imagen(); ?>" class="imagen" alt="<?php echo $entrada -> obtener_titulo(); ?>" >
                           <?php
                       }
                       ?>
                   </div>
                </a>
            </div>   
            <div class="col-sm-1"></div>
            <div class="col-xs-1 visible-xs"></div>          
            <div class="col-xs-10 col-sm-4" align="left">
                <div class="col-sm-12">
                    <h2 itemprop="name" class="texto-negrita"><?php echo $entrada -> obtener_titulo(); ?></h2>
                    <div class="linea-decorativa col-sm-4 hidden-xs">.</div>
                    <div class="col-sm-4 hidden-xs"><br><br></div>
                </div>
                <div class="col-sm-12">
                    <h4 class="col-sm-4 precio">
                        $<?php echo nl2br(number_format($entrada -> obtener_precio())); ?> <i class="fas fa-tag"></i>
                    </h4>
                    <a target="_blank" style="text-decoration: none;" class="col-sm-4" href="<?php echo $whatsappCompra.number_format($entrada -> obtener_precio())."%20".$entrada -> obtener_titulo(); ?>">
                        <div class="boton-comprar" align="center">
                            Comprar <i class="fas fa-shopping-cart"></i>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12">
                    <hr>
                    <p>Descripción</p>
                    <p itemprop="description"><?php echo nl2br($entrada -> obtener_texto()); ?></p>
                </div>
                <div class="col-sm-12">
                    <a href="<?php echo RUTA_PREGUNTAS_FRECUENTES;?>" target="_blank"><h5>Preguntas Frecuentes <i class="fas fa-question-circle"></i></h5></a>
                </div>
            </div>         
        </div>
        <div class="col-sm-12">
            <?php
                include_once 'seccion/entradas_al_azar.inc.php';
                include_once 'seccion/footer.inc.php';
            ?>
        </div>
    </div>
</div>
<?php //cuerpo;?>


<?php
include_once 'seccion/doc-pie.inc.php';
?>


