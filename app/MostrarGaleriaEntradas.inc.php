<?php
//Le decimos al programa cual es el directorio donde queremos escanear las imágenes
$directorio = DIRECTORIO_RAIZ."/img/subidas/";

//Asignamos la ruta a la variable path
$path=$directorio;

//asignamos a $directorio el objeto dir creado con la ruta
$directorio=dir($path);

//y ahora el programa ira leyendo los archivos hasta el final
while ($archivo = $directorio->read())
{							
//
	if($archivo!='.' AND $archivo!='..')
//ponemos el nombre de archivo a minuscula y recojemos solo los tres caracteres por la izquierda para saber la extensión
	if (strtolower(substr($archivo, -3) == "jpg" || substr($archivo, -3) == "png" || substr($archivo, -3) == "jpeg" || substr($archivo, -3) == "gif" || substr($archivo, -3) == "JPG" || substr($archivo, -3) == "PNG" || substr($archivo, -3) == "GIF"))
{
//El archivo solo se mostrará si es jpg, png, jpeg o gif 

?>
<div class="col-sm-4 thumbnail" id="contenedor-subir-imagen" align="left">
	<img align="center" src="<?php echo SERVIDOR."/img/subidas/".$archivo; ?>" id="imagen-recortada-3" class="imagen-1 col-sm-12" title="<?php echo $archivo;?>">
	<div class="col-sm-12" id="info">
		<h4><small>Nombre de la imagen:</small></h4>
		<p><?php echo $archivo;?></p>
		<h4><small>Tamaño de la imagen:</small></h4>
		<p>Desconocido</p>
		<a href="<?php echo SERVIDOR."/img/subidas/".$archivo; ?>" target="_blank">Ampliar</a>						
	</div>
</div>
<?php
}
}
//descargo el objeto
$directorio->close();