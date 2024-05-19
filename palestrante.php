<?php

define('TITLE','Cadastrar Palestrante');

include __DIR__.'/vendor/autoload.php';
use App\Entity\Palestrante;
use App\Entity\Colaborador;
// use \App\Session\Login;
//força login do usuário
// Login::requireLogin();

$obj = new Colaborador();
$colaboradores = $obj->buscar();

//echo "<pre>"; print_r($colaboradores); echo "</pre>";

if(isset($_POST['formacao']) && $_POST['nome']
  && $_POST['fone'] && $_POST['email']){
  $convidado = new Palestrante;

  $arquivo = $_FILES['foto'];
  if ($arquivo['error']) die("Falha ao enviar a foto");
  $pasta = './uploads/fotos/';
  $nome_foto = $arquivo['name'];
  $novo_nome = uniqid();
  $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
  if (($extensao != 'jfif' && $extensao != 'jpg') && ($extensao != 'png' && $extensao != 'jpeg')) die("falha ao enviar o arquivo");
  $path = $pasta . $novo_nome . '.' . $extensao;

  $foto = move_uploaded_file($arquivo['tmp_name'], $path);

  $convidado->foto = $path;
  $convidado->nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
  $convidado->telefone = filter_input(INPUT_POST, 'fone', FILTER_SANITIZE_SPECIAL_CHARS);
  $convidado->email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $convidado->instagram = filter_input(INPUT_POST, 'formacao', FILTER_SANITIZE_SPECIAL_CHARS);
  $convidado->linkedin = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_SPECIAL_CHARS);
  $convidado->responsavel = filter_input(INPUT_POST, 'resp', FILTER_SANITIZE_SPECIAL_CHARS);

  //echo "<pre>"; print_r($convidado); echo "</pre>";

  $result = $convidado->cadastrar();
  if ($result) {
    echo '<script language="javascript">';
    echo 'alert("Palestrante cadastrado com sucesso!!")';
    echo '</script>';
  } 
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/menu_user.php';
include __DIR__.'/includes/main_palestrante.php';
include __DIR__.'/includes/footer.php';

?>


