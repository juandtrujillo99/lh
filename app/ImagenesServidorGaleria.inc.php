<?php
if(!empty($obtenerImagen))
{
    if(!file_exists(RUTA_IMG_SUBIDAS."/".$obtenerImagen)){
    ?>
    <a href="<?php echo $numeroImg;?>">
        <img src="<?php echo RUTA_IMG_SUBIDAS."/".$obtenerImagen; ?>">
    </a>
    <?php
    } else {
        ?>
        
        <?php
    }
}
else{
    ?>
    
    <?php
}               
 