<?php
include __DIR__.'../../vendor/autoload.php';
use App\Entity\Palestra;

if (isset($_POST['query'])) {

  $filter = $_POST['query'];

  $obj = new Palestra;
  $result = $obj->filtrar($filter);
  //echo "<pre>"; print_r($result); echo "</pre>";

  foreach($result as $item_table){
    $data[] = array(
      'titulo' => $item_table->titulo,
      'ambiente' => $item_table->ambiente,
      'nome' => $item_table->nome,
      'cpf' => $item_table->cpf,
      'data' => $item_table->data_palestra
    );
  }

  echo json_encode($data);
}

?>