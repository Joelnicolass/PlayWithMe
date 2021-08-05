<?php 
session_start();
include_once('const.php');
include_once(PATHCLASSES.'Database.php');
include_once(PATHCLASSES.'User.php');
include_once(PATHCLASSES.'Games.php');


$db = new Database(SERVER, USER, PASS, DATABASE);

$user = new User($db);

$games = new Games($db);

$nameGame = $_POST['nameGame'];

$nameGame = str_replace(' ', '_', $nameGame);

$games->gameAdd($nameGame);

header('Location: ../app.php');

?>