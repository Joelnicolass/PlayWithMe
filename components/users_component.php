<?php 

include_once(PATHCLASSES.'Database.php');
include_once(PATHCLASSES.'User.php');

include('core/connect.php');

$city = $_SESSION['city'];
$prov = $_SESSION['prov'];

$mode = $_SESSION['modeLocation'];


if ($_SESSION['user'] == 'ADMINISTRADOR') {

    echo "<p>----ADMIN----</p>";

} else {




if ($mode == 'Provincia') {
    

        $db = new Database(SERVER, USER, PASS, DATABASE);

        $user = new User($db);

        $usersProv = $user->selectAllUsersProv($prov);


        ?>



        <?php for ($i = 0; $i<count($usersProv); $i++) {
                    
            $imagen = $usersProv[$i]['img_perfil'];

        ?>


            <?php if ($usersProv[$i]['user'] == 'ADMINISTRADOR') {
            } else {
        ?>
            
        <div class="user">

        <section class="city" onmouseover="cityLook(this)" onmouseout="cityHidden(this)">
            <section class="namecity"><p><?php echo str_replace('_', ' ',$usersProv[$i]['ciudad'])." - ".str_replace('_', ' ',$usersProv[$i]['provincia']); ?></p></section>
        </section>

        <div class="contimg" onclick="userinfo(this, <?php echo $usersProv[$i]['id_usuario']; ?>)">
        <?php
            if ($imagen == NULL) {
                echo '<img src="resources/images/user.svg"/>';
            } else {
                echo '<img src="data:image/jpeg;base64,'.base64_encode($imagen).'"/>';
            }
        ?>
        </div>

        <div class="username"><p><?php echo $usersProv[$i]['user']; ?></p></div>

        </div>




<?php } 

    }

} 

if ($mode == 'Ciudad') {

        $db = new Database(SERVER, USER, PASS, DATABASE);

        $user = new User($db);

        $usersProv = $user->selectAllUsersCity($city);


        ?>



        <?php for ($i = 0; $i<count($usersProv); $i++) {
            
            $imagen = $usersProv[$i]['img_perfil'];

        ?>

<?php if ($usersProv[$i]['user'] == 'ADMINISTRADOR') {
            } else {
        ?>
            
        <div class="user">

        <section class="city" onmouseover="cityLook(this)" onmouseout="cityHidden(this)">
            <section class="namecity"><p><?php echo str_replace('_', ' ',$usersProv[$i]['ciudad'])." - ".str_replace('_', ' ',$usersProv[$i]['provincia']); ?></p></section>
        </section>

        <div class="contimg" onclick="userinfo(this, <?php echo $usersProv[$i]['id_usuario']; ?>)">
        <?php
            if ($imagen == NULL) {
                echo '<img src="resources/images/user.svg"/>';
            } else {
                echo '<img src="data:image/jpeg;base64,'.base64_encode($imagen).'"/>';
            }
        ?>
        </div>

        <div class="username"><p><?php echo $usersProv[$i]['user']; ?></p></div>

        </div>




<?php       }    
   
        }
    
    }

}
?>
