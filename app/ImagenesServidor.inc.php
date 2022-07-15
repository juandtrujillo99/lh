<?php
if(!empty($obtenerImagen))
{
if(!file_exists(RUTA_IMG_PRODUCTOS."/".$obtenerImagen)){
?>
<div class="modal" id="img2" align="right"><br>
    <a class="cerrar" href="" title="Cerrar">X</a>
    <div class="imagen-producto">
        <a href="#img1">&#60;</a>
        <a href="#img3">
        <img src="<?php echo RUTA_IMG_PRODUCTOS."/".$obtenerImagen; ?>">
        </a>
        <a href="#img3">></a>
    </div>
</div>
<?php
} else {
    ?>
    
    <?php
}
}
else{
?>


<?php
};
