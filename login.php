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


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/main_login.php';
?>