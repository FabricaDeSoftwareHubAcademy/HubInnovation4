<?php
define('TITLE','Cadastrar Palestra');

include __DIR__.'/vendor/autoload.php';
use App\Entity\Palestra;
use App\Entity\Ambiente;
use \App\Session\Login;
//força login do usuário
Login::requireLogin();

$obj = new Ambiente();
$ambiente = $obj->buscar();

// $obj = new Palestrante();
// $palestrante = $obj->filtrar();
// echo "<pre>"; print_r($palestrante); echo "</pre>";

if(isset($_POST['id_palestrante']) && $_POST['titulo']
  && $_POST['desc'] && $_POST['sala']){
  $palestra = new Palestra;
  $palestra->titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
  $palestra->descricao = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);
  $palestra->sala = filter_input(INPUT_POST, 'sala', FILTER_SANITIZE_NUMBER_INT);
  $palestra->vagas = filter_input(INPUT_POST, 'vagas', FILTER_SANITIZE_NUMBER_INT); 
  $palestra->data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_SPECIAL_CHARS);
  $palestra->insumos = filter_input(INPUT_POST, 'insumos', FILTER_SANITIZE_SPECIAL_CHARS);
  $palestra->palestrante = filter_input(INPUT_POST, 'id_palestrante', FILTER_SANITIZE_NUMBER_INT);

  $result =  $palestra->cadastrar();
  if ($result) {
    echo '<script language="javascript">';
    echo 'alert("Palestra cadastrada com sucesso!!")';
    echo '</script>';
  } 
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/menu_user.php';
include __DIR__.'/includes/main_palestra.php';
include __DIR__.'/includes/footer.php';

?>