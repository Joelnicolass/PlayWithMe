<?php 
    include_once(PATHCLASSES.'Database.php');
    include_once(PATHCLASSES.'User.php');
    include_once(PATHCLASSES.'Games.php');
    
    $db = new Database(SERVER, USER, PASS, DATABASE);

    $user = new User($db);
    
    $games = new Games($db);

    $listGames = $games->allGamesInfo();



?>


        <section class="adminView">

        <h3>Vista de Administrador</h3>

        <section class="adminAddGame">

        <form action="core/adminAddGame.php" method="post">
            <input type="text" placeholder="Nombre del juego" required name="nameGame">
            <input type="submit" value="Agregar">
        </form>

        </section>
                
                        <form id="form" action="core/changeimage.php" method="post" enctype="multipart/form-data">
                        
                        <select name="idg">

                        <?php 
                        
                        for ($i = 0; $i<count($listGames); $i++) {
                        
                        $imagen = $listGames[$i]['image_game'];
                        $juego = $listGames[$i]['nombre_juego'];
                        $idg = $listGames[$i]['id_juego'];

                       ?>

                        <option value="<?php echo $idg;?>"><?php echo $juego; ?></option>

                        <?php
                        

                        }

                        ?>

                        </select>

                        <div class="imgselect">

                        </div>
                        
                        <input type="file" name="archivo" id="archivo"/>

                        <input type="submit" value="Confirmar">

                        </form>                        

                        <?php


                    
            ?>

        </section>
