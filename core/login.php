<?php
session_start();

//Variables con los datos del Formulario de ingreso (form2)
$user = $_POST['userlog'];
$pass = $_POST['passlog'];

//conexion con base de datos
include_once('connect.php');

$verificar = mysqli_query($datosdb, "SELECT user, pass FROM usuarios WHERE user = '$user' AND pass = '$pass'");


//validacion

if (mysqli_num_rows($verificar)==1) {
    
    //ingreso exitoso


    //obteniendo datos de la cuenta
    $userqy = "SELECT * FROM usuarios WHERE user = '$user'";
    $result = mysqli_fetch_array(mysqli_query($datosdb, $userqy));
    
    $_SESSION['id_usuario'] = $result['id_usuario'];
    $_SESSION['user'] = $user;
    $_SESSION['email'] = $result['email'];


    header("Location: location.php");

} else {

    //error de ingreso
    header("Location: ../index.php?loginerr");
   

}


?>