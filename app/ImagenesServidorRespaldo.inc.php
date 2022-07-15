<?php

if (!empty($obtenerImagen)) {
?>
<img src="<?php echo RUTA_IMG_PRODUCTOS."/".$obtenerImagen;?>" id="wows1_0"/>
<?php  
}else{
    ?>
<img src="<?php echo RUTA_IMG_PRODUCTOS;?>/no-found.jpg" id="wows1_0"/>
<?php
}
