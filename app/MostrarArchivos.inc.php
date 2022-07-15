<?php
//Le decimos al programa cual es el directorio donde queremos escanear los archivos
$directorio = DIRECTORIO_RAIZ."/archivos/";

//Asignamos la ruta a la variable path
$path=$directorio;

//asignamos a $directorio el objeto dir creado con la ruta
$directorio=dir($path);

//y ahora el programa ira leyendo los archivos hasta el final
while ($archivo = $directorio->read())
{							

	if($archivo!='.' AND $archivo!='..'){
/*/ponemos el nombre de archivo a minuscula y recojemos solo los tres caracteres por la izquierda para saber la extensión
	if (strtolower(substr($archivo, -3) == "jpg" || substr($archivo, -3) == "png" || substr($archivo, -3) == "jpeg" || substr($archivo, -3) == "gif"))
{
*///El archivo solo se mostrará si es jpg, png, jpeg o gif 

?>
<div class="col-sm-4 thumbnail" id="contenedor-subir-imagen" align="left">
	<div class="col-sm-12" id="info">
		<h4><small>Nombre del archivo:</small></h4>
		<p><?php echo $archivo;?></p>
		<h4><small>Tamaño del archivo:</small></h4>
		<p>no disponible</p>
		<a download="<?php echo $archivo; ?>" href="<?php echo SERVIDOR."/archivos/".$archivo; ?>" target="_blank">Descargar</a>						
	</div>
</div>
<?php
}
}
//descargo el objeto
$directorio->close();