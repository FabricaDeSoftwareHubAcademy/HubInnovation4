<?php
//echo "<pre>"; print_r($_POST); echo "</pre>";

include __DIR__.'/vendor/autoload.php';
use App\Entity\Ambiente;
use \App\Session\Login;
//força login do usuário
// Login::requireLogin();


if(isset($_POST['numero']) && $_POST['nome']
  && $_POST['capacidade']){
  $ambiente = new Ambiente;

  $ambiente->numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
  $ambiente->nome = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_SPECIAL_CHARS);
  $ambiente->capacidade = filter_input(INPUT_POST, 'capacidade', FILTER_SANITIZE_NUMBER_INT);
  
  $result = $ambiente->cadastrar();
  if ($result) {
    echo '<script language="javascript">';
    echo 'alert("Ambiente cadastrado com sucesso!!")';
    echo '</script>';
  } 
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/menu_user.php';
include __DIR__.'/includes/main_salas.php';
include __DIR__.'/includes/footer.php';

