<?php

namespace App\Session;

class Login{

    private static function init(){
        //verifica status da sessão
        if(session_status() !== PHP_SESSION_ACTIVE){
            //inicia a sessão
            session_start();
        }
    }

    public static function get_user_logged(){
            //inicia a sessao
            self::init();
            return self::isLogged() ? $_SESSION['user'] : null;
        }

    public static function login($User){
        //inicia a sessao
        self::init();
        $_SESSION['user'] = [
            'id' => $User->id_colab,
            'nome' => $User->nome,
            'email' => $User->email,
            'perfil' => $User->perfil
        ];
        //redirecionar usuário para painel adm
        header('location:./palestrante.php');
        exit;
    }

    public static function logout(){
            //inicia a sessao
            self::init();
            //remove a sessao do usuário logado
            unset($_SESSION['user']);
            //redirecionamento
            header('location:./login.php');
            exit;
    }


    public static function isLogged(){
            //inicia a sessão
            self::init();
            //validação da sessão
            return isset($_SESSION['user']['id']);
    }

    public static function requireLogin(){
        if(!self::isLogged()){
            header('location:./login.php');
            exit;
        }
    }

    public static function requireLogout(){
        if(self::isLogged()){
            header('location:./index.php');
            exit;
        }
    }
}
