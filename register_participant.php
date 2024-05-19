<?php

include __DIR__.'/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Entity\Palestra;

$obj = new Usuario();

var_dump($obj);

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;


// function validaCPF($cpf) {
//     // Extrai somente os números
//     $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
//     // Verifica se foi informado todos os digitos corretamente
//     if (strlen($cpf) != 11) {
//         return false;
//     }

//     // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
//     if (preg_match('/(\d)\1{10}/', $cpf)) {
//         return false;
//     }

//     // Faz o calculo para validar o CPF
//     for ($t = 9; $t < 11; $t++) {
//         for ($d = 0, $c = 0; $c < $t; $c++) {
//             $d += $cpf[$c] * (($t + 1) - $c);
//         }
//         $d = ((10 * $d) % 11) % 10;
//         if ($cpf[$c] != $d) {
//             return false;
//         }
//     }
//     return true;
// }

// if(isset($_POST['cadastrar']))
// {
//     $nome =  filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
//     $contato = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
//     $fone = '999999999';
//     // $fone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
//     $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
//     $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
//     $data_nascimento = addslashes($_POST['data_nasc']);
//     $lgpd = addslashes($_POST['lgpd']);
//     $info = addslashes($_POST['info']);

//     //verificar se está tudo preenchido
//     if(!empty($nome) && !empty($fone) && !empty($contato) && !empty($cpf) && !empty($sexo) && !empty($data_nascimento)&& !empty($lgpd)&& !empty($info))
//     {
//         $usuario = new Usuario();
//         $usuario->nome = $nome;

//         if(!validaCPF($cpf)){
//             $message = '<script language="javascript"> alert("CPF Inválido!! Tente novamente!!")</script>';
//             echo '<meta http-equiv="refresh" content="0.2; url=./index.php">';
//             die($message);   
//         }
//         $usuario->cpf =  $cpf;
//         $usuario->email = $contato;
//         $usuario->fone = $fone;
//         $usuario->data_nasc = $data_nascimento;
//         $usuario->sexo = $sexo;
//         $usuario->info = 1;
//         $usuario->lgpd = 1;
//         $usuario->id_palestra = $id_palestra;

//         $consulta = $usuario->busca_cpf($cpf,$id_palestra);
//         if($consulta === "ERROR"){
//             $result =  $usuario->cadastrar();
//             if ($result) {

//                 $mail = new PHPMailer(true);

//                 try {
//                     //Server settings
//                     $mail->CharSet = 'UTF-8';
//                     //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//                     $mail->isSMTP();                                            //Send using SMTP
//                     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//                     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//                     $mail->Username   = 'fabrica.hub.academy@gmail.com';                     //SMTP username
//                     $mail->Password   = 'vagoylhbhsblurqt';                               //SMTP password
//                     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//                     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
//                     //Recipients
//                     $mail->setFrom('fabrica.hub.academy@gmail.com', 'HUB INNOVATION');
//                     $mail->addAddress($contato, $nome);     //Add a recipient
//                     $mail->addReplyTo('fabrica.hub.academy@gmail.com', 'HUB INNOVATION');

//                     //Content
//                     $mail->isHTML(true);                                  //Set email format to HTML
//                     $mail->Subject = 'HUB INNOVATION';

//                             //Configurando a mensagem para ser enviada
//                     $enviaMsg = ' Olá <b>' . $nome . '</b> você está inscrito na <b> 3ª Edição do HUB Innovation!!! </b> <br>
//                      Palestra: <strong>  '.$titulo.' </strong>. <br> No dia 25 de outubro às 19h, aguardamos você no Senac Hub Academy. Rua Francisco Xavier, 75. <br> Ficaremos feliz com sua presença no Encontro que multiplica conexões! ';

//                     $mail->Body = $enviaMsg;

//                     $mail->send();
//                 }
//                 catch (Exception $e) {
//                     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//                 }
              
//             //retorna Sucesso ao JS
//             $cadastro = array(
//                 'status' => 'success'
//             );
//              retornando os dados
//              echo(json_encode($cadastro));

//             } 
//         }
//         else{
//                 echo '<script language="javascript">';
//                 echo 'alert("Usuário já cadastrado em outra Palestra!")';
//                 echo '</script>'; 
//         }
//         //header('location:index.php?status=success');
//     }
// }
// ?>

