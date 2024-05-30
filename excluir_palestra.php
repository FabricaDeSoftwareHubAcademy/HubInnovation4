<?php
//echo "<pre>"; print_r($_POST); echo "</pre>";
include __DIR__.'/vendor/autoload.php';
use App\Entity\Palestra;
use \App\Session\Login;
//força login do usuário
Login::requireLogin();

$id = $_GET['id'];
//Instancia uma palestra específica de acordo com o ID
//valida ID
if(!isset($id) or !is_numeric($id)){
  header('location: index.php?status=error');
  exit;
}

$obj = Palestra::select_by_id($id);

if(!$obj instanceof Palestra){
  header('location: index.php?status=error');
  exit;
}

//echo "<pre>"; print_r($obj); echo "</pre>";

if(isset($_POST['excluir'])){
  //chama a função excluir passando o ID como parâmetro
  $obj->excluir($obj->id_palestra);
  header('location:lista_palestra.php?status=success');
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/menu_user.php';
include __DIR__.'/includes/main_excluir_palestra.php';
include __DIR__.'/includes/footer.php';

?>


