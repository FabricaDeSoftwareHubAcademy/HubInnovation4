
<?php
define('TITLE','Consultar Inscrito');

include __DIR__.'/vendor/autoload.php';
use App\Entity\Usuario;
use \App\Session\Login;
//força login do usuário
// Login::requireLogin();

$results = '';

//$obj = new Usuario();
//$teste = $obj->consulta_inscricao("04918530176");
//echo "<pre>"; print_r($teste); echo "</pre>";

if(isset($_POST['buscar'])){
    $cpf = $_POST['cpf'];
    $obj_User = new Usuario();
    $participante = $obj_User->consulta_inscricao($cpf); 

    $titlePalestra = ''; 

    foreach($participante as $inscrito){
      $titlePalestra = '<div class="alert alert-secondary"> <strong> Palestra: '.$inscrito->titulo.'</strong> </div>';
      $results .= '<tr>
                      <td>'.$inscrito->id_usuario.'</td>
                      <td>'.$inscrito->nome.'</td>
                      <td>'.$inscrito->cpf.'</td>    
                      <td>'.$inscrito->email.'</td>   
                      <td>'.$inscrito->titulo.'</td>   
                  </tr>';
  }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/menu_user.php';
include __DIR__.'/includes/main_consulta_user.php';
include __DIR__.'/includes/footer.php';

?>
