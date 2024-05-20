<?php

$msg = '';
if(isset($_GET['status'])){
    switch($_GET['status']){
        case 'success':
            $msg = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;
        case 'error':
                $msg = '<div class="alert alert-danger">Ação não executada!</div>';
                break;
    }
}

include __DIR__.'/vendor/autoload.php';
use App\Entity\Palestra;
use \App\Session\Login;
//força login do usuário
// Login::requireLogin();

$obj = new Palestra();
$palestras = $obj->listar();

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/menu_user.php';
include __DIR__.'/includes/main_lista_palestra.php';
include __DIR__.'/includes/footer.php';

?>


