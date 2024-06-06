<?php
//echo "<pre>"; print_r($_POST); echo "</pre>";
include __DIR__.'/vendor/autoload.php';
use App\Entity\Palestrante;
use \App\Session\Login;
//força login do usuário
// Login::requireLogin();

//constante para mudar o título do form
define('TITLE','Editar Palestrante');
$id = $_GET['id'];
//Instancia uma palestra específica de acordo com o ID
//valida ID
if(!isset($id) or !is_numeric($id)){
  header('location: index.php?status=error');
  exit;
}

$obj = Palestrante::select_by_id($id);

if(!$obj instanceof Palestrante){
  header('location: index.php?status=error');
  exit;
}


if(isset($_POST['id_palestrante']) && $_POST['bio']
  && $_POST['nome'] && $_POST['linkedin']){
    
  $obj->nome = $_POST['nome'];
  $obj->bio = $_POST['bio'];
  $obj->instagram = $_POST['instagram'];
  $obj->linkedin = $_POST['linkedin'];
  $arquivo = $_FILES['foto'];
  if ($arquivo['error']) die("Falha ao enviar a foto");
  $pasta = './uploads/fotos/';
  $nome_foto = $arquivo['name'];
  $novo_nome = uniqid();
  $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
  if (($extensao != 'jfif' && $extensao != 'jpg') && ($extensao != 'png' && $extensao != 'jpeg')) die("falha ao enviar o arquivo");
  $path = $pasta . $novo_nome . '.' . $extensao;

  $foto = move_uploaded_file($arquivo['tmp_name'], $path);
  
  $obj->foto = $path;

  $result = $obj->atualizar();
  if ($result) {
    echo '<script language="javascript">';
    echo 'alert("Palestrante atualizado com sucesso!!")';
    echo '</script>';
  } 
  
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/menu_user.php';
include __DIR__.'/includes/main_edita_palestrante.php';
include __DIR__.'/includes/footer.php';

?>


