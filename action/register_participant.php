<?php
include '../vendor/autoload.php';

use App\Entity\Usuario;
use App\Entity\Palestra;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['id_palestra']))
{
    $id_palestra = filter_input(INPUT_POST,'id_palestra',FILTER_SANITIZE_NUMBER_INT);
    $new_obj = new Palestra();
    $palestra = $new_obj->get_idPalestra($id_palestra);
    $titulo = $palestra->palestra;
    $descricao = $palestra->descricao; 
    $foto =  $palestra->foto;
    $nome_palestrante = $palestra->nome_palestrante; 
    $vagas = $palestra->vagas;
    $sala = $palestra->sala; 
    //echo "<pre>"; print_r($new_obj); echo "</pre>";
}else{
    header('location:./index.php');
}


function limpa_cpf($value){
    $value = trim($value);
    $value = str_replace(array('.','-','/'), "", $value);
    return $value;
   }


if(isset($_POST['cpf']))
 {
    $nome =  filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $contato = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $fone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
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
         $usuario->id_palestra = $id_palestra;

         $consulta = $usuario->busca_cpf($cpf2,$id_palestra);
            if($consulta === "ERROR"){
                $result =  $usuario->cadastrar();
                        if($result) {

                            $mail = new PHPMailer(true);
                    
                                     try {
                                         //Server settings
                                         $mail->CharSet = 'UTF-8';
                                         //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                                         $mail->isSMTP();                                            //Send using SMTP
                                         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                         $mail->Username   = 'fabrica.hub.academy@gmail.com';                     //SMTP username
                                         $mail->Password   = 'vagoylhbhsblurqt';                               //SMTP password
                                         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                                         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                                         //Recipients
                                         $mail->setFrom('fabrica.hub.academy@gmail.com', 'HUB INNOVATION');
                                         $mail->addAddress($contato, $nome);     //Add a recipient
                                         $mail->addReplyTo('fabrica.hub.academy@gmail.com', 'HUB INNOVATION');
                    
                                         //Content
                                         $mail->isHTML(true);                                  //Set email format to HTML
                                         $mail->Subject = 'HUB INNOVATION';
                    
                                                 //Configurando a mensagem para ser enviada
                                         $enviaMsg = ' Olá <b>' . $nome . '</b> você está inscrito(a) na <b> 4ª Edição do HUB Innovation!!! </b> <br>
                                         Palestra: <strong>  '.$titulo.' </strong>. <br> No dia 18 de junho às 19h, aguardamos você no Senac Hub Academy. Rua Francisco Xavier, 75. <br> Ficaremos feliz com sua presença no Encontro que multiplica conexões! ';
                    
                                         $mail->Body = $enviaMsg;
                                         $mail->send();
                                     }
                                     catch (Exception $e) {
                                         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                     }
                                  
                                //retorna Sucesso ao JS
                                $cadastro = array(
                                     'status' => 'success'
                                );
                                echo(json_encode($cadastro));
                    
                        } 
                }

            else{
                $cadastro = array(
                    'status' => 'error'
                );
                echo json_encode($cadastro);
            }
        
        }

    }
?>