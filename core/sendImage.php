<?php
session_start();
$ids = $_SESSION['id_usuario'];
echo $ids;

//recibiendo archivo
$archivoNombre = $_FILES['archivo']['name'];
$archivoTamano = $_FILES['archivo']['size'];
$archivoTipo = $_FILES['archivo']['type'];
$archivoTemp = $_FILES['archivo']['tmp_name'];

//prepara el archivo para enviar
$archivoLeer = fopen($archivoTemp, "r+");
$archivoDB = fread($archivoLeer, $archivoTamano);
//elimina tamaño innecesario
$archivoDB = addslashes($archivoDB);

//conexion bd
include('connect.php');


//envio de datos
mysqli_query($datosdb, "UPDATE usuarios SET img_perfil='$archivoDB' WHERE id_usuario=$ids");


//feedback al usuario luego de enviar
header('Location: ../app.php?userconfig');

?>