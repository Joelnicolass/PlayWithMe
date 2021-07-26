<?php
include_once(PATHCLASSES.'Database.php');
include_once(PATHCLASSES.'User.php');
include_once(PATHCLASSES.'Games.php');

$db = new Database(SERVER, USER, PASS, DATABASE);

$user = new User($db);

$games = new Games($db);


$gameNick = $user->gameNick($_SESSION['id_usuario']);
$gameId = $user->gameId($_SESSION['id_usuario']);


?>




<?php for ($i = 0; $i<count($gameId)-1; $i++) {?>

<section class="gamesUser">

    <?php
    $idg = $gameId[$i];
    $gameName = $games->gameInfo($idg);
    $idArr = $i;
    ?>

    <div class="delGame">
        <form action="core/deleteOneGame.php" method="POST">
        <input type="submit" value="" title="Eliminar Juego">
        <input type="hidden" name="idDelete" value="<?php echo $idg ?>">
        <input type="hidden" name="idArr" value="<?php echo $idArr ?>">
    </form>
    </div>

    <img src="resources/images/logo.svg" alt="">


    <?php 
    
    //eliminando espacios del nombre
    $gameName = $gameName[0]['nombre_juego'];
    $gameName = str_replace('_', ' ', $gameName); 
    
    ?>
    <p><?php echo $gameName; ?></p>
    <p> <?php echo $gameNick[$i]; ?> </p>

</section>

<?php } ?>

