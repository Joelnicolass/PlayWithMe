<?php 
session_start();
include_once('const.php');
include_once(PATHCLASSES.'Database.php');
include_once(PATHCLASSES.'User.php');

$id = $_SESSION['id_usuario'];

$idDelete = $_POST['idDelete'];
$idArr = $_POST['idArr'];

$db = new Database(SERVER, USER, PASS, DATABASE);

$user = new User($db);

$deleteGameList = $user->deleteGameList($id, $idDelete);

header('Location: ../app.php?userconfig');


?>
