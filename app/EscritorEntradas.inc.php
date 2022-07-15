<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'scripts/imagen-recortada.php';


class EscritorEntradas {


    public static function escribir_entradas() {
        $entradas = RepositorioEntrada::obtener_todas_por_fecha_descendiente(Conexion::obtener_conexion());


        if (count($entradas)) {


            foreach ($entradas as $entrada) {


                self::escribir_todas_entradas($entrada);
            }
        }
    }


    public static function escribir_cuatro_entradas() {
        $entradas = RepositorioEntrada::obtener_cuatro_por_fecha_descendiente(Conexion::obtener_conexion());


        if (count($entradas)) {


            foreach ($entradas as $entrada) {


                self::escribir_entrada($entrada);
            }
        }
    }


    //Funcion encargada de crear el "abrebocas" de la entrada, en el home.php (inicio)
    public static function escribir_entrada($entrada) {
        if (!isset($entrada)) {
            return;
        }
        ?>        


        <div class="col-xs-6 col-sm-3">
            <div class="col-xs-1"></div>
            <div class="col-xs-10 col-sm-12 " id="abrebocas-entrada">              
                <div class="col-sm-12">
                <div class="card col-sm-11 anime">
                    <div class="card-image waves-effect waves-block waves-light">                    
                        <?php
                        if(file_exists(RUTA_IMG_OPTIMIZADA. $entrada -> obtener_imagen())){
                            ?>


                            <img loading="lazy" itemprop="image" src="<?php echo RUTA_IMG_OPTIMIZADA . $entrada -> obtener_imagen(); ?>" class="imagen activator" alt="<?php echo $entrada -> obtener_titulo(); ?>" >
                            <?php
                        }
                        else {
                            ?>
                           <img loading="lazy" itemprop="image" src="<?php echo RUTA_IMG_SUBIDAS. "/". $entrada -> obtener_imagen(); ?>" class="imagen activator" alt="<?php echo $entrada -> obtener_titulo(); ?>" >
                           <?php
                       }
                       ?>
                    </div>
                        <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">
                            <!--Card Title-->
                            <h3 class="activator" itemprop="name"><?php echo nl2br(self::resumir_titulo($entrada -> obtener_titulo())); ?></h3>
                            <h3 class="activator" itemprop="description">$<?php echo nl2br(number_format($entrada -> obtener_precio())); ?></h3>
                            <!--Card Title-->
                        </span>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <!--Card Title-->
                            <h3 itemprop="name"><?php echo nl2br($entrada -> obtener_titulo()); ?></h3>
                            <!--Card Title-->
                            <i class="material-icons right" style="cursor: pointer;">close</i>
                            <div id="resumen">
                                <?php echo nl2br($entrada -> obtener_texto()); ?>
                            </div><br>
                        </span>
                        <p class="boton-detalles"><a href="<?php echo RUTA_ENTRADA . '/' . $entrada -> obtener_url(); ?>">Ver más <i class="fas fa-chevron-circle-down"></i></a></p>
                    </div>
                </div>
                </div>
            </div>
        </div>   
        <?php
    }
    //funciona en el home.php (fin)


    //Funcion encargada de crear el "abrebocas" de la entrada, en el blog.php (inicio)
    public static function escribir_todas_entradas($entrada) {
        if (!isset($entrada)) {
            return;
        }
        ?>
        <div class="col-xs-6 col-sm-3">
            <div class="col-xs-1"></div>
            <div class="col-xs-10 col-sm-12 " id="abrebocas-entrada">              
                <div class="col-sm-12 col-xs-12">
                <div class="card col-sm-11 anime">
                    <div class="card-image waves-effect waves-block waves-light">                    
                        <?php
                        if(file_exists(RUTA_IMG_OPTIMIZADA. $entrada -> obtener_imagen())){
                            ?>


                            <img loading="lazy" itemprop="image" src="<?php echo RUTA_IMG_OPTIMIZADA . $entrada -> obtener_imagen(); ?>" class="imagen activator" alt="<?php echo $entrada -> obtener_titulo(); ?>" >
                            <?php
                        }
                        else {
                            ?>
                           <img loading="lazy" itemprop="image" src="<?php echo RUTA_IMG_SUBIDAS. "/". $entrada -> obtener_imagen(); ?>" class="imagen activator" alt="<?php echo $entrada -> obtener_titulo(); ?>" >
                           <?php
                       }
                       ?>
                    </div>
                        <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">
                            <!--Card Title-->
                            <h3 class="activator" itemprop="name"><?php echo nl2br(self::resumir_titulo($entrada -> obtener_titulo())); ?></h3>
                            <h3 class="activator" itemprop="description">$<?php echo nl2br(number_format($entrada -> obtener_precio())); ?></h3>
                            <!--Card Title-->
                        </span>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <!--Card Title-->
                            <h3 itemprop="name"><?php echo nl2br($entrada -> obtener_titulo()); ?></h3>
                            <!--Card Title-->
                            <i class="material-icons right" style="cursor: pointer;">close</i>
                            <div id="resumen">
                                <?php echo nl2br($entrada -> obtener_texto()); ?>
                            </div><br>
                        </span>
                        <p class="boton-detalles"><a href="<?php echo RUTA_ENTRADA . '/' . $entrada -> obtener_url(); ?>">Ver más <i class="fas fa-chevron-circle-down"></i></a></p>
                    </div>
                </div>
                </div>
            </div>
        </div>   
        <?php
    }
    //funciona en el home.php (fin)


    public static function mostrar_entradas_busqueda($entradas) {
        for ($i = 1; $i <= count($entradas); $i++) {
            if($i % 3 == 0) {
                ?>
                <div class="row">
                <?php
            }


            $entrada = $entradas[$i - 1];
            self::mostrar_entrada_busqueda($entrada);


            if($i % 3 == 0) {
                ?>
                </div>
                <?php
            }
        }
    }


    public static function mostrar_entradas_busqueda_multiple($entradas) {
        for ($i = 0; $i < count($entradas); $i++) {
            ?>
            <div class="row">
            <?php


            $entrada = $entradas[$i];
            self::mostrar_entrada_busqueda_multiple($entrada);


            ?>
            </div>
            <?php
        }
    }


    // funcion encargada de crear los enlaces al realizar la busqueda, es decir, crea el abrebocas cuando una persona intenta buscar cualquier entrada
    public static function mostrar_entrada_busqueda($entrada) {
        if (!isset($entrada)) {
            return;
        }
        ?>
        <?php //moviles;?>
        <a itemprop="url" href="<?php echo RUTA_ENTRADA . '/' . $entrada -> obtener_url(); ?>" class="visible-xs">
            <div class="col-xs-12" id="abrebocas">
                <div class="col-xs-6">
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
                <div class="col-xs-6" align="justify" style="padding: 1em;">
                    <h4><?php echo nl2br(self::resumir_texto($entrada -> obtener_titulo())); ?></h4>
                </div>                    
            </div>
        </a>
        <?php //moviles;?>
        <?php //pc;?>
        <a itemprop="url" href="<?php echo RUTA_ENTRADA . '/' . $entrada -> obtener_url(); ?>" class="hidden-xs col-sm-3" id="abrebocas" align="center">
            <div class="col-sm-12">
                <div class="col-sm-10">
                    <div class="col-sm-6" align="center">
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
                    <div class="col-sm-6" align="justify" style="padding: 1em 0 0 1em;">                        
                        <h4><?php echo nl2br(self::resumir_texto($entrada -> obtener_titulo())); ?></h4>
                    </div>
                </div>                   
            </div>
        </a>
        <?php //pc;?>
        <?php
    }


    public static function mostrar_entrada_busqueda_multiple($entrada) {
        if (!isset($entrada)) {
            return;
        }
        ?>
        <?php //moviles;?>
        <a itemprop="url" href="<?php echo RUTA_ENTRADA . '/' . $entrada -> obtener_url(); ?>" class="visible-xs">
            <div class="col-xs-12" id="abrebocas">
                <div class="col-xs-6">
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
                <div class="col-xs-6" align="justify" style="padding: 1em;">
                    <h4><?php echo nl2br(self::resumir_texto($entrada -> obtener_titulo())); ?></h4>                        
                                        </div>                    
            </div>
        </a>
        <?php //moviles;?>
        <?php //pc;?>
        <a itemprop="url" href="<?php echo RUTA_ENTRADA . '/' . $entrada -> obtener_url(); ?>" class="hidden-xs col-sm-3" id="abrebocas" align="center">
            <div class="col-sm-12">
                <div class="col-sm-10">
                    <div class="col-sm-6" align="center">
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
                    <div class="col-sm-6" align="justify" style="padding: 1em 0 0 1em;">                        
                        <h4><?php echo nl2br(self::resumir_texto($entrada -> obtener_titulo())); ?></h4>
                    </div>
                </div>                   
            </div>
        </a>
        <?php //pc;?>
        <?php
    }


    public static function resumir_titulo($titulo) {
        $longitud_maxima = 18;


        $resultado = '';


        if (strlen($titulo) >= $longitud_maxima) {


            $resultado = substr($titulo, 0, $longitud_maxima);


            $resultado .= '...';
        } else {
            $resultado = $titulo;
        }


        return $resultado;
    }


    public static function resumir_2_titulo($titulo) {
        $longitud_maxima = 35;


        $resultado = '';


        if (strlen($titulo) >= $longitud_maxima) {


            $resultado = substr($titulo, 0, $longitud_maxima);


            $resultado .= '...';
        } else {
            $resultado = $titulo;
        }


        return $resultado;
    }


    public static function resumir_3_titulo($titulo) {
        $longitud_maxima = 58;


        $resultado = '';


        if (strlen($titulo) >= $longitud_maxima) {


            $resultado = substr($titulo, 0, $longitud_maxima);


            $resultado .= '...';
        } else {
            $resultado = $titulo;
        }


        return $resultado;
    }




    public static function resumir_texto($texto) {
        $longitud_maxima = 75;


        $resultado = '';


        if (strlen($texto) >= $longitud_maxima) {


            $resultado = substr($texto, 0, $longitud_maxima);


            $resultado .= '...';
        } else {
            $resultado = $texto;
        }


        return $resultado;
    }


    public static function resumir_2_texto($texto) {
        $longitud_maxima = 160;


        $resultado = '';


        if (strlen($texto) >= $longitud_maxima) {


            $resultado = substr($texto, 0, $longitud_maxima);


            $resultado .= '...';
        } else {
            $resultado = $texto;
        }


        return $resultado;
    }


    public static function resumir_texto_compartir($texto) {
        $longitud_maxima = 145;


        $resultado = '';


        if (strlen($texto) >= $longitud_maxima) {


            $resultado = substr($texto, 0, $longitud_maxima);


            $resultado .= '...';
        } else {
            $resultado = $texto;
        }


        return $resultado;
    }




    public static function resumir_texto_abrebocas($texto) {
        $longitud_maxima = 395;


        $resultado = '';


        if (strlen($texto) >= $longitud_maxima) {


            $resultado = substr($texto, 0, $longitud_maxima);


            $resultado .= '...';
        } else {
            $resultado = $texto;
        }


        return $resultado;
    }


}