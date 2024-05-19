<?php
include __DIR__.'../../vendor/autoload.php';
use App\Entity\Palestrante;

if (isset($_GET['query'])) {
  echo $_GET['query'];

  $filter = $_GET['query'];

  $obj = new Palestrante;
  $result = $obj->filtrar($filter);

  echo "<pre>"; print_r($result); echo "</pre>";

  $replace_text = '<b>' . $filter . '</b>';

  foreach($result as $palestrante){
    $data[] = array(
      'id_palestrante' => $palestrante->id_palestrante,
      'nome' => $palestrante->nome
    );
  }

  echo json_encode($data);
}

?>