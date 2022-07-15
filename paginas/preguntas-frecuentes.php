<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/EscritorEntradas.inc.php';
include_once 'app/Redireccion.inc.php';

$titulo = "Preguntas frecuentes | $nombreEmpresa";
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
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilo-menu.css">
        <?php 
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';

?>

    
<?php //cuerpo?>
<div class="col-sm-12 col-xs-12">    
    <div class="col-sm-1 col-xs-1"></div>
    <div class="col-sm-10 col-xs-10">
        <?php //quitar titulo <span hidden>?>
            <h1 class="texto-negrita">Preguntas Frecuentes</h1>
            <div class="col-sm-5"></div>
            <div class="linea-decorativa col-sm-2">.</div>
        <?php //quitar titulo </span>?>
            <div class="col-sm-5"><br><br></div>
        <div class="col-sm-5 col-xs-12" id="preguntas-frecuentes">
<h3>¿En dónde se encuentran ubicados?</h3>
            <p>
                Al sur de Cali en el barrio Ciudadela Comfandi, cerca a El Caney.
            </p>
            <hr>
            <h3>¿Cuál es su número de contacto?</h3>
            <p>
                Te puedes comunicar con nosotros a través del 3128446080 (Whatsapp disponible).
            </p>
            <hr>
            <h3>¿Hasta que hora trabajan?</h3>
            <p>
                Lunes a Sábados de 10 am a 9 pm, domingos de 10 am a 3 pm. 
            </p>
            <hr>
            <h3>¿Realizan domicilio?</h3>
            <p>
               Sí, en Cali el costo mínimo del domicilio son 5.000 pesos, para el resto del país la tarifa es variable y se acuerda con el cliente.
            </p>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-5 col-xs-12" id="preguntas-frecuentes">
            
            <h3>¿El pago se realiza contra-entrega?</h3>
            <p>
               No, el cliente tendrá que realizar el desembolso total de la factura antes del envío, a través de recargas <b>Nequi</b> en la cuenta 3113796791 o <b>Movii</b> en la cuenta 3162926487.
            </p>
            <hr>
            <h3>¿Podrán separarme algunos productos que deseo comprar?</h3>
            <p>
               Separamos productos siempre y cuando el cliente realice el desembolso de la mitad del precio de los productos previamente, a través de recargas <b>Nequi</b> en la cuenta 3113796791 o <b>Movii</b> en la cuenta 3162926487.
            </p>
            <hr>
            <h3>¿Venden al por mayor?</h3>
            <p>
               Por el momento no, pero se informará a todos los clientes cuando la empresa pueda ofrecer esta facilidad, al igual que todos los servicios que prestamos.
            </p>
        </div>
    </div>
    </div>
    
    <div class="col-sm-12 col-xs-12">
        <div class="col-sm-12 col-xs-12"><br><br></div>  
        <div class="col-sm-4 col-xs-2"></div>            
        <a class="col-sm-4 col-xs-8 boton-ver-mas" target="_blank" href="<?php echo $whatsappEmpresa;?>">
            <div align="center">Realizar otra pregunta</div>
        </a>
        <div class="col-sm-4 col-xs-2"></div>  
        <div class="col-sm-12 col-xs-12"><br><br></div>         
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
