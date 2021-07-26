<?php session_start();
include_once('core/const.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/styles/style.css">
    <title>Play With Me - Registro</title>
    <link rel="icon" type="image/png" href="resources/images/logo.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
</head>






<body>




    <section class="container animated vanishIn">


        <section class="blueBg">

            <section class="box signin">

                <h2>Ya tienes cuenta?</h2>
                <button class="signinBtn">Loguearme</button>

                <?php 
            if (isset($_GET['r'])) {

                switch ($_GET['r']) {
                    case '1':
                        echo "<script>alert('El registro se completó con éxito');</script>";
                        break;

                    case '2':
                        echo "<script>alert('El nombre de usuario o la dirección de correo ya han sido registradas');</script>";
                    break;
                }
            }
            ?>

            </section>

            <section class="box signup">

                <h2>No tienes cuenta?</h2>
                <button class="signupBtn">Registrarme</button>

            </section>


            <section class="formBx">

                <section class="form signinForm">

                    <section  class="hdiv animated2 transporter">
                    <h1>Play With Me!</h1>
                    </section>

                    <img src="resources/images/logo.svg" alt="">
                    <form action="core/login.php" method="post" class="formsg">
                        <input type="text" name="userlog" id="userlog" placeholder="Nombre de Usuario" required onkeypress="validateFeedback()" onkeyup="validateFeedback()">
                        <input type="password" name="passlog" id="passlog" placeholder="Contraseña" required onkeypress="validateFeedback()" onkeyup="validateFeedback()">
                        <hr>
                        <input class="btnsumbit" type="button" value="Ingresar" onclick="validar()">


                    </form>
                </section>

                <section class="form signupForm">
                
                <form class="form_register" action="core/register.php" method="post">

                        <input type="text" name="user" id="user" placeholder="Nombre de usuario" required onkeypress="validateFeedbackr()" onkeyup="validateFeedbackr()" minlength="6" maxlength="20">
                        <input type="password" name="pass" id="pass" placeholder="Contraseña" required minlength="6" maxlength="20" onkeypress="validateFeedbackr()" onkeyup="validateFeedbackr()">
                        <input type="email" name="email" id="email" placeholder="Dirección de e-mail" onkeypress="validateFeedbackr()" onkeyup="validateFeedbackr()">
                        <hr>
    
                        <input class="btnsumbit" type="button" value="Registrarse" onclick="validarReg()">
                    </form>


                </section>
            </section>

        </section>



        <script>
            const signinBtn = document.querySelector('.signinBtn');
            const signupBtn = document.querySelector('.signupBtn');
            const formBx = document.querySelector('.formBx');
            const body = document.querySelector('body');
            const blueBg = document.querySelector('.blueBg');
            const box = document.querySelector('.box');
            const hdiv = document.querySelector('.hdiv');
            const form = document.querySelector('.formsg');
            const passSignForm = document.querySelector('#passlog');
            const userSignForm = document.querySelector('#userlog');
            const passSignFormr = document.querySelector('#pass');
            const userSignFormr = document.querySelector('#user');
            const emailSignFormr = document.querySelector('#email');
            const formr = document.querySelector('.form_register');

            signupBtn.onclick = function() {
                formBx.classList.add('active');
                body.classList.add('active');
                blueBg.classList.add('active');
                box.classList.add('active');
                hdiv.classList.add('active');
            }

            signinBtn.onclick = function() {
                formBx.classList.remove('active');
                body.classList.remove('active');
                blueBg.classList.remove('active');
                box.classList.remove('active');
                hdiv.classList.remove('active');
            }



            //-------------------------------- validacion
            //validaciones de login-feedback al usuario




            function validateFeedback () {              

                let passvalid = false;
                let uservalid = false;

                let username = userSignForm.value;
                let password = passSignForm.value;

                const resUser = /^[a-zA-Z0-9_]{6,20}$/.exec(username);
                const validUser = !!resUser;
                
                const resPass = /^[a-zA-Z0-9_]{6,20}$/.exec(password);
                const validPass = !!resPass;
                
                if (validUser == true) {
                    userSignForm.style.borderBottomColor = "steelblue";
                    uservalid = true;
                    console.log(uservalid);
                    
                } else {
                    userSignForm.style.borderBottomColor = "red";
                    passvalid = false;
                    console.log(uservalid);
                }

                if (validPass) {
                    passSignForm.style.borderBottomColor = "steelblue";
                    passvalid = true;
                    console.log(passvalid);
                } else {
                    passSignForm.style.borderBottomColor = "red";
                    passvalid = false;
                    console.log(passvalid);
                }

                if (uservalid && passvalid) {
                    return 1;
                }
                return 2;
            }


            function validateFeedbackr () {

                let passvalid = false;
                let uservalid = false;
                let emailvalid = false;
                
                let username = userSignFormr.value;
                let password = passSignFormr.value;
                let email = emailSignFormr.value;

                const resUser = /^[a-zA-Z0-9_]{6,20}$/.exec(username);
                const validUser = !!resUser;
                
                const resPass = /^[a-zA-Z0-9_]{6,20}$/.exec(password);
                const validPass = !!resPass;

                const resEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.exec(email);
                const validEmail = !!resEmail;
                
                if (validUser == true) {
                    userSignFormr.style.borderBottomColor = "steelblue";
                    uservalid = true;
                    
                } else {
                    userSignFormr.style.borderBottomColor = "red";
                    passvalid = false;
                }
                
                if (validPass) {
                    passSignFormr.style.borderBottomColor = "steelblue";
                    passvalid = true;
                } else {
                    passSignFormr.style.borderBottomColor = "red";
                    passvalid = false;
                }

                if (validEmail == true) {
                    emailSignFormr.style.borderBottomColor = "steelblue";
                    emailvalid = true;
                    
                } else {
                    emailSignFormr.style.borderBottomColor = "red";
                    emailvalid = false;
                }

                if (uservalid && passvalid && emailvalid) {
                    return 1;
                }
                return 2;

            }

            

            function validar() { 
                let res = validateFeedback();
                console.log(res);

                if (res == 1) {
                    form.submit();
                } else { 
                    alert("Datos incorrectos");
                }
                
            }

            function validarReg() { 
                let res = validateFeedbackr();
                console.log(res);

                if (res == 1) {
                    formr.submit();
                } else { 
                    alert("Datos incorrectos");
                }
                
            }






        </script>
</body>


</html>