<?php
include '../vendor/autoload.php';

use App\Entity\Usuario;

 //retorna Sucesso ao JS
//  $cadastro = array(
//     'status' => 'success'
// );

// echo json_encode($cadastro);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// echo "<pre>"; print_r($_POST); echo "</pre>";
// exit();

function limpa_cpf($value){
    $value = trim($value);
    $value = str_replace(array('.','-','/'), "", $value);
    return $value;
   }


if(isset($_POST['cpf']))
 {
    $nome =  filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $contato = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $fone = '999999999';
    // $fone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf2 = limpa_cpf($cpf);
    $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
    $data_nascimento = addslashes($_POST['data_nasc']);
    $lgpd = addslashes($_POST['lgpd']);
    $info = addslashes($_POST['info']);

//verificar se está tudo preenchido
    if(!empty($nome) && !empty($fone) && !empty($contato) && !empty($cpf) && !empty($sexo) && !empty($data_nascimento)&& !empty($lgpd)&& !empty($info))
        {
         $usuario = new Usuario();
         $usuario->nome = $nome;
         $usuario->cpf =  $cpf2;
         $usuario->email = $contato;
         $usuario->fone = $fone;
         $usuario->data_nasc = $data_nascimento;
         $usuario->sexo = $sexo;
         $usuario->info = 1;
         $usuario->lgpd = 1;
         $usuario->id_palestra = 3;

         $result =  $usuario->cadastrar();

             //retorna Sucesso ao JS
             $cadastro = array(
                 'status' => 'success'
            );
            
            echo json_encode($cadastro);

        }

    }
?>