<?php session_start();


$ciudad = $_REQUEST["ciudad"];
$provincia = $_REQUEST["provincia"];

$user = $_SESSION['id_usuario'];

$ciudad = str_replace(' ', '_', $ciudad);
$provincia = str_replace(' ', '_', $provincia);

//conexion bd
include_once('connect.php');

//Validaciones y envio de datos de ubicacion

$verificar = mysqli_query($datosdb, "SELECT ciudad FROM ubicacion WHERE usuario_id = $user");


if (mysqli_num_rows($verificar)==1) {
    
    //user existe - actualia datos de ubicacion

    mysqli_query($datosdb, "UPDATE ubicacion SET ciudad='$ciudad' WHERE usuario_id = $user");
    mysqli_query($datosdb, "UPDATE ubicacion SET provincia='$provincia' WHERE usuario_id = $user");

} else {

    //user no existe - crea datos de ubicacion
    mysqli_query($datosdb, "INSERT INTO ubicacion (provincia, ciudad, usuario_id) VALUES ('$provincia', '$ciudad', $user)");

}



//guardado de variables de ubicacion en la sesion

$_SESSION['city'] = $ciudad;
$_SESSION['prov'] = $provincia;

//redireccion a app
header("Location: ../app.php");



?>