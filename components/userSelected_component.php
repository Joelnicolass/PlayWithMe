<?php


if (isset($_GET['userinfo'])) {
    
    include_once(PATHCLASSES.'Database.php');
    include_once(PATHCLASSES.'User.php');
    include_once(PATHCLASSES.'Games.php');
    
    $db = new Database(SERVER, USER, PASS, DATABASE);

    $user = new User($db);
    
    $games = new Games($db);

    $idUserSelected = $_GET['userinfo'];
    
    $userSelectedInfo = $user->infoUsarSelected($idUserSelected);

    $userSelectedInfo[0]['user'];
    $imagen =  $userSelectedInfo[0]['img_perfil'];

?>



<div class="myPerfilNameU">
    <h3><?php echo $userSelectedInfo[0]['user']; ?></h3>
    <div class="imgselect">
        <form id="form">
            <div class="myPerfilImgU">
                <label for="file-input">
                <img id="imgprfl" src="

            <?php
                if ($imagen == NULL) {
                    echo 'resources/images/user.svg';
                } else {
                    echo 'data:image/jpeg;base64,'.base64_encode($imagen).'';
                }
            ?>
                
                " alt="" title="">
                </label>
            </div>
        </form>
    </div>
</div>



<?php

$gameNick = $user->gameNick($idUserSelected);
$gameId = $user->gameId($idUserSelected);

?>

<section class="gamesUserContent">

<?php for ($i = 0; $i<count($gameId)-1; $i++) {?>

<section class="gamesUser">

    <?php
    $idg = $gameId[$i];
    $gameName = $games->gameInfo($idg);
    $idArr = $i;

    $gamesAll = $games->allGamesInfo();

    $imagen = $gamesAll[$i]['image_game'];

    ?>

    <?php if ($imagen == NULL) {
                echo '<img src="resources/images/logo.svg"/>';
            } else {
                echo '<img src="data:image/jpeg;base64,'.base64_encode($imagen).'"/>';
            }
    ?>



    <?php 
    
    //eliminando espacios del nombre
    $gameName = $gameName[0]['nombre_juego'];
    $gameName = str_replace('_', ' ', $gameName); 
    
    ?>
    <p><?php echo $gameName; ?></p>
    <p> <?php echo $gameNick[$i]; ?> </p>

</section>

<?php } ?>

</section>

<?php
    }
    
?>




