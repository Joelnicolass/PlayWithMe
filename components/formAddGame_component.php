<?php
include_once('core/const.php');
include_once(PATHCLASSES.'Database.php');
include_once(PATHCLASSES.'Games.php');

$id = $_SESSION['id_usuario'];

$db = new Database(SERVER, USER, PASS, DATABASE);

$games = new Games($db);

$listAllGames = $games->allGamesInfo();

?>
   
   
   <div class="form_addPerfil">
       <form action="core/addGame.php" method="POST">
           <img src="resources/images/addGame.svg" alt="">
           <select id="games" name="games">
        <?php for ($i = 0; $i<count($listAllGames); $i++) { ?>
               <option value="<?php echo $i;?> "><?php echo str_replace('_', ' ',$listAllGames[$i]['nombre_juego']); ?></option>
        <?php } ?>
            </select>
           <input type="text" placeholder="Nickname" name="nick">
           <input type="submit" value="Añadir">
       </form>
   </div>

