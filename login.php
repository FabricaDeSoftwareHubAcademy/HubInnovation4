<?php
include './vendor/autoload.php';
use \App\Entity\Colaborador;
use \App\Session\Login;

// Login::requireLogout();

if(isset($_POST['logar'])){
    
        $login = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        //Buscar usuário por email
        $colab = Colaborador::colab_by_mail($login);
        if(!$colab instanceof Colaborador || !password_verify($_POST['passwd'],$colab->senha) ){
            echo '<script language="javascript">';
            echo 'alert("Usuário ou Senha inválidos, tente novamente!!")';
            echo '</script>';
        }else{
            Login::login($colab);
        }
        //echo "<pre>"; print_r($colab); echo "</pre>";
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUB INNOVATION</title>
    <link rel="stylesheet" href="./CSS/menu.css">
    <link rel="stylesheet" href="./CSS/login.css">
</head>

<body class="tela-login">
    <header class="header ">
        <nav class="navbar ">
            <ul class="nav-menu ">
                <li class="nav-item ">
                    <a href="./index.php" class="nav-link ">HOME</a>
                </li>
            </ul>
            <div class="hamburger ">
                <span class="bar "></span>
                <span class="bar "></span>
                <span class="bar "></span>
            </div>
        </nav>

    </header>

    <section class="container">
        <div class="container-login">
            <img src="./IMG/HubInnovation3.png" alt="Carregando...." id="logo-login">
            <div class="wrap-login">
                <form class="login-form" method="POST">
                    <span class="login-form-title">
                        LOGIN
                    </span>
                    <div class="wrap-input margin-top-35 margin-bottom-35">
                        <input type="email" name="email" class="input-form" autocomplete="off">
                        <span class="focus-input-form" data-placeholder="Email"></span>
                    </div>
                    <div class="wrap-input margin-bottom-35">
                        <input type="password" name="passwd" class="input-form">
                        <span class="focus-input-form" data-placeholder="Senha"></span>
                    </div>
                    <div class="container-login-form-btn">
                        <button type="submit" name="logar" class="login-form-btn">
                            Logar
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <script>
        const hamburger = document.querySelector(".hamburger");
        const navMenu = document.querySelector(".nav-menu");

        hamburger.addEventListener("click", mobileMenu);

        function mobileMenu() {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        }

        const navLink = document.querySelectorAll(".nav-link");

        navLink.forEach(n => n.addEventListener("click", closeMenu));

        function closeMenu() {
            hamburger.classList.remove("active");
            navMenu.classList.remove("active");
        }
    </script>

</body>

</html>
