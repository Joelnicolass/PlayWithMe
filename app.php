<?php session_start();
include_once('core/const.php');
if ($_SESSION['id_usuario']) {
} else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="resources/images/logo.svg">
    <title>Play With Me</title>
    <link rel="stylesheet" href="resources/styles/styleapp.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    <script src="resources/scripts/scriptLocation.js"></script>
</head>
<body>


<?php

if (isset($_SESSION['modeLocation'])) {
} else {
    ?>
    <section class="modeLocation">
    <img src="resources/images/logo.svg" alt="">
    <p>Ver usuarios de tu:</p>
    <form action="core/modeLocation.php" method="POST">
    <input type="submit" value="Ciudad" name="mode">
    </form>
    <form action="core/modeLocation.php" method="POST">
    <input type="submit" value="Provincia" name="mode">
    </form> 
    </section>
    <?php
}


?>





<section class="cont">

    <section class="users">

        <?php 
        if (isset($_SESSION['modeLocation'])) {
            include_once(PATHCOMPONENTS.'users_component.php'); 
        }

        ?>

    </section>

    <section class="userinfo">

<!-- ------------------------------------------------------------- -->
    <section class="main">


    <!--<input type="button" value="REFRESH" onclick="location.reload()">

    <input type="button" value="TEST" onclick="window.location.assign('test.php');">-->

    <?php 

    if (isset($_GET['userconfig'])) {
        ?> <section class="myPerfil"> <?php
        include_once(PATHCOMPONENTS.'myPerfilName_component.php');
        ?> <section class="content_formPerfil"> 
            
        <div class="infoPerfil"> <?php
        include_once(PATHCOMPONENTS.'gameUser_component.php');
        ?> </div> <?php
        include_once(PATHCOMPONENTS.'formAddGame_component.php');
        ?> </section> <?php
        ?> </section> <?php

    }


    if (isset($_GET['userinfo'])) { ?>


        <section class="contInfUserGames"> 
        <?php include_once(PATHCOMPONENTS.'userSelected_component.php'); ?>
        </section>
    <?php
    }
    ?>

    </section>

<!-- ------------------------------------------------------------- -->


<?php include_once('components/navProfile_component.php'); ?>

<section class="myuser"></section>


    </section>




</section>

    <script>
       //tomando elementods del dom
        const cityname = document.querySelector('.namecity');
        const city = document.querySelector('.city');
        let citynameall = document.querySelectorAll('cityname');
        let cityall = document.querySelectorAll('.city');
        const modeLoc = document.querySelector('.modeLocation');
        //--------------------------------------------------------

        //hover de mostrar y ocultar ciudades
        function cityLook (e) {
            e.lastChild.parentElement.style.overflow = "visible";
            e.children[0].classList.add('active');
        }

        function cityHidden (e) {
            e.lastChild.parentElement.style.overflow = "hidden";
            e.children[0].classList.remove('active');
        }
        //-------------------------------------------------------

        //pasar id de usuario seleccioando        
        function userinfo(user, id) {

            window.location.assign("app.php?userinfo=" + id);

        }
        //-------------------------------------------------------

        //salir de la sesion
        function exitSession() {
            window.location.assign("core/exitSession.php");
        }

        //-------------------------------------------------------

        //Modo

        function modeLocationCity (e){
            modeLoc.classList.add('desact');
        }

        function modeLocationProv (e){
            modeLoc.classList.add('desact');
        }

        //mostrar input de cambiar imagen
        function btnSubirImgOn() {
        const btnUpImg = document.querySelector(".btnup");
        btnUpImg.classList.add('active');
        }

        //-------------------------------------------------------
        //preview de imagen al subir
        //convertir archivo a base64 url
        const readURL = file => {
            return new Promise((res, rej) => {
                const reader = new FileReader();
                reader.onload = e => res(e.target.result);
                reader.onerror = e => rej(e);
                reader.readAsDataURL(file);
            });
        };
        //capturando ids de input y de img
        const fileInput = document.querySelector('#file-input');
        const img = document.querySelector('#imgprfl');

        //generando preview
        const preview = async event => {
            const file = event.target.files[0];
            const url = await readURL(file);
            img.src = url;
        };

        fileInput.addEventListener('change', preview);
        //-------------------------------------------------------
        

        //-------------------------------------------------------
    </script>

</body>
</html>


</body>


</html>