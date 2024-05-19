<?php
define('TITLE','Relatório');

include __DIR__.'/vendor/autoload.php';
use App\Entity\Usuario;
use App\Entity\Palestra;
use App\Entity\Palestrante;
use \App\Session\Login;
//força login do usuário
Login::requireLogin();


use Dompdf\Dompdf;

$obj = new Palestra();
$palestras = $obj->buscar();

$new_obj = new Palestrante();
$palestrantes = $new_obj->buscar();

$usuario = new Usuario();
$quantidade = $usuario->contar();
$results = '';

//echo "<pre>"; print_r($palestrantes); echo "</pre>";

if(isset($_POST['buscar'])){
    $id_palestra = $_POST['palestra'];
    $participante = new Usuario();
    $participante = $usuario->lista_relatorio($id_palestra); 

    $titlePalestra = '';
    //<td>'.$inscrito->titulo.'</td>
    // <td>'.$inscrito->cpf.'</td>
    // <td>'.$inscrito->telefone.'</td>    

    foreach($participante as $inscrito){
      $titlePalestra = '<div class="alert alert-secondary"> <strong> Palestra: '.$inscrito->titulo.'</strong> </div>';
      $results .= '<tr>
                      <td>'.$inscrito->nome.'</td>
                      <td>'.$inscrito->telefone.'</td>    
                      <td>'.$inscrito->email.'</td>   
                  </tr>';
  }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/menu_user.php';
include __DIR__.'/includes/main_inscricoes.php';
include __DIR__.'/includes/footer.php';

?>


