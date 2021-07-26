<?php
session_start();
$mode = $_POST['mode'];

$modeLocation = $_SESSION['modeLocation'] = "$mode";

header("Location: ../app.php");

?>