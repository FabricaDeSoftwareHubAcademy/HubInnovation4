<?php
//echo "<pre>"; print_r($_POST); echo "</pre>";
include __DIR__.'/vendor/autoload.php';
use App\Entity\Palestra;
use \App\Session\Login;
//força login do usuário
// Login::requireLogin();

//constante para mudar o título do form
define('TITLE','Editar Palestra');
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

if(isset($_POST['id_palestrante']) && $_POST['titulo']
  && $_POST['desc'] && $_POST['sala']){
  //$obj->id_palestra = $_POST['id_palestra'];  
  $obj->titulo = $_POST['titulo'];
  $obj->descricao = $_POST['desc'];
  $obj->sala = $_POST['sala'];
  $obj->vagas = $_POST['vagas'];
  $obj->data = $_POST['data'];
  $obj->insumos = $_POST['insumos'];
  $obj->palestrante = $_POST['id_palestrante'];

  //echo "<pre>"; print_r($obj); echo "</pre>";

  $result = $obj->atualizar();
  if ($result) {
    echo '<script language="javascript">';
    echo 'alert("Palestra atualizada com sucesso!!")';
    echo '</script>';
  } 
  header('location:index.php?status=success');
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/menu_user.php';
include __DIR__.'/includes/main_edita_palestra.php';
include __DIR__.'/includes/footer.php';

?>


