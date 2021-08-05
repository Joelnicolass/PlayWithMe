<?php
include_once('core/connect.php');

$option = $_GET['id'];

$sql = mysqli_query($datosdb,"SELECT * FROM `productos` WHERE id=$option");

$datos = [];

while ($q = mysqli_fetch_array($sql)) {
    $datos [] = [
        'id' => $q['id'],
        'prod' => $q['nombre'],
    ];
    
}

echo json_encode(['data' => $datos]);

?>