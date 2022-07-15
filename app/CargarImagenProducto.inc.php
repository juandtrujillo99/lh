<?php
$fileName = $_FILES["file1"]["name"]; // nombre del archivo
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // archivo en la carpeta temporal
$fileType = $_FILES["file1"]["type"]; // tipo de archivo
$fileSize = $_FILES["file1"]["size"]; // tamaño del archivo en bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 si es falso, 1 si es verdadero
if (!$fileTmpLoc) { // if file not chosen
    echo "<div class='alert alert-info'><h4>Ups, parece que olvidaste seleccionar una imagen antes de presionar el boton 'subir'<br>Intentalo nuevamente.</h4></div>";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "../img/productos/$fileName")){
    echo "<img src='img/productos/$fileName' class='imagen-3'>" . "<br><br>$fileName ";
} else {
    echo "Falló la producto";//error al mover el archivo
}