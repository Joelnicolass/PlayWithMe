<?php
session_start();
include_once('const.php');
include_once(PATHCLASSES.'Database.php');
include_once(PATHCLASSES.'User.php');

$userf = $_POST['user'];
$passf = $_POST['pass'];
$emailf = $_POST['email'];

$db = new Database(SERVER, USER, PASS, DATABASE);

$user = new User($db);

$register = $user->registerUser($emailf, $userf, $passf);

if ($register) {
    header('Location: ../index.php?r=1');
} else {
    header('Location: ../index.php?r=2');
}

?>