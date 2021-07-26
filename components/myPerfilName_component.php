<?php
include_once(PATHCLASSES.'Database.php');
include_once(PATHCLASSES.'User.php');
$ids = $_SESSION['id_usuario'];

$db = new Database(SERVER, USER, PASS, DATABASE);
$user = new User($db);

$userInfo = $user->infoUsarSelected($ids);
$imagen = $userInfo[0]['img_perfil'];

?>


<div class="myPerfilName">
    <h3><?php echo $_SESSION['user']; ?></h3>
    <div class="imgselect">
        <form id="form" action="core/sendImage.php" method="post" enctype="multipart/form-data">
            <div class="myPerfilImg">
                <label for="file-input">
                <img id="imgprfl" src="

            <?php
                if ($imagen == NULL) {
                    echo 'resources/images/user.svg';
                } else {
                    echo 'data:image/jpeg;base64,'.base64_encode($imagen).'';
                }
            ?>
                
                " alt="Cambiar foto de perfil" title="Cambiar foto de perfil" onclick="btnSubirImgOn()">
                </label>
                <input id="file-input" type="file" name="archivo" id="archivo"/>
            </div>
            <input class="btnup" type="submit" value="Confirmar">
        </form>
    </div>
</div>

