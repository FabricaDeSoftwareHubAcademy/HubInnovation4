<?php
//echo "<pre>"; print_r($_POST); echo "</pre>";
include __DIR__.'/vendor/autoload.php';
use App\Entity\Colaborador;
use \App\Session\Login;
//força login do usuário
Login::requireLogin();

if(isset($_POST['nome']) && $_POST['matricula']
  && $_POST['email'] && $_POST['senha']){
  $colab = new Colaborador;
  $colab->nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
  $colab->matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
  $colab->email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $colab->senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);
  $colab->cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_SPECIAL_CHARS);

  $result =  $colab->cadastrar();
  if ($result) {
    echo '<script language="javascript">';
    echo 'alert("Colaborador cadastrado com sucesso!!")';
    echo '</script>';
  } 
  
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/menu_user.php';
include __DIR__.'/includes/main_colabs.php';
include __DIR__.'/includes/footer.php';

?>


