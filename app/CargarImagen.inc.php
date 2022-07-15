<?php

$mostrarError = "<div class='alert alert-warning'><h4>Ups, parece que olvidaste seleccionar una imagen antes de presionar el boton 'subir'<br>Intentalo nuevamente.</h4></div>";
$deshabilitado = true;

$fileName = $_FILES["file1"]["name"]; // nombre del archivo
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // archivo en la carpeta temporal
$fileType = $_FILES["file1"]["type"]; // tipo de archivo
$fileSize = $_FILES["file1"]["size"]; // tamaño del archivo en bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 si es falso, 1 si es verdadero

if (!$fileTmpLoc) { // if file not chosen
    echo "$mostrarError";
    return "$deshabilitado = false";
}

if(move_uploaded_file($fileTmpLoc, "../img/subidas/$fileName")){
    echo "<img src='img/subidas/$fileName' class='imagen-3'>" . "<br><br>$fileName";
} else {
    echo "Falló la subida";//error al mover el archivo
}