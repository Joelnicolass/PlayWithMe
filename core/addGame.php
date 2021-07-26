<?php 
session_start();
include_once('const.php');
include_once(PATHCLASSES.'Database.php');
include_once(PATHCLASSES.'User.php');


$id = $_SESSION['id_usuario'];

$db = new Database(SERVER, USER, PASS, DATABASE);

$user = new User($db);

$idgame = $_POST['games']+1;
$nickname = $_POST['nick'];

$addNickAndGame = $user->newGameAndNick($id, $nickname, $idgame);

header('Location: ../app.php?userconfig');

?>
