<?php

include __DIR__.'/vendor/autoload.php';

use App\Entity\Usuario;
use App\Entity\Palestra;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function validaCPF($cpf) {
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

if(isset($_GET['id_palestra']))
{
    $id_palestra = filter_input(INPUT_GET,'id_palestra',FILTER_SANITIZE_NUMBER_INT);
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


if(isset($_POST['cadastrar']))
{
    $nome =  filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $contato = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $fone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
    $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
    $data_nascimento = addslashes($_POST['data_nasc']);
    $lgpd = addslashes($_POST['lgpd']);
    $info = addslashes($_POST['info']);

    //verificar se está tudo preenchido
    if(!empty($nome) && !empty($fone) && !empty($contato) && !empty($cpf) && !empty($sexo) && !empty($data_nascimento)&& !empty($lgpd)&& !empty($info))
    {
        $usuario = new Usuario();
        $usuario->nome = $nome;

        if(!validaCPF($cpf)){
            $message = '<script language="javascript"> alert("CPF Inválido!! Tente novamente!!")</script>';
            echo '<meta http-equiv="refresh" content="0.2; url=./index.php">';
            die($message);   
        }
        $usuario->cpf =  $cpf;
        $usuario->email = $contato;
        $usuario->fone = $fone;
        $usuario->data_nasc = $data_nascimento;
        $usuario->sexo = $sexo;
        $usuario->info = 1;
        $usuario->lgpd = 1;
        $usuario->id_palestra = $id_palestra;

        $consulta = $usuario->busca_cpf($cpf,$id_palestra);
        if($consulta === "ERROR"){
            $result =  $usuario->cadastrar();
            if ($result) {

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
                    $enviaMsg = ' Olá <b>' . $nome . '</b> você está inscrito na <b> 3ª Edição do HUB Innovation!!! </b> <br>
                     Palestra: <strong>  '.$titulo.' </strong>. <br> No dia 25 de outubro às 19h, aguardamos você no Senac Hub Academy. Rua Francisco Xavier, 75. <br> Ficaremos feliz com sua presença no Encontro que multiplica conexões! ';

                    $mail->Body = $enviaMsg;

                    $mail->send();
                }
                catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
              
		 echo '<script language="javascript">';
                 echo 'alert("Cadastrado realizado com sucesso!!")';
                 echo '</script>';
		 echo '<meta http-equiv="refresh" content="0.3; url=./index.php">';
            } 
        }
        else{
                echo '<script language="javascript">';
                echo 'alert("Usuário já cadastrado em outra Palestra!")';
                echo '</script>'; 
        }
        //header('location:index.php?status=success');
    }
}
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="src/styles/styles.css">
    <link rel="stylesheet" href="src/styles/hub.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="src/styles/inscricao.css">
    
    <script src="node_modules/animejs/lib/anime.min.js"></script>
    <script defer src="src/javascript/inscricao.js"></script>
    <script defer src="src/javascript/cursor.js"></script>

     
    <script>

        var captchaElement
        var onloadCaptcha = () => { 
            captchaElement = grecaptcha.render('localCaptcha', {
                'sitekey' : '6LfjTtgpAAAAAGj0_nSkB7RCNsvZ8HvbZMxe3GW7',
                'theme':"dark"
            });
        }

    </script>
    
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCaptcha&render=explicit" async defer></script>
 

</head>
<body class="body_inscricao">
<!-- cursor effect  -->
    <div id="cursor">
        <div class="content_cursor"> 
        <i class="fa-solid fa-arrow-right arrow_direction"></i>
        </div> 
  </div>
  <!-- ===================== -->
    <div class="modal_inscricao">
        <div class="lineModal"></div>
        <div class="areaX"> 
            <i class="fa-solid fa-xmark btn_x_modal" onclick="closeModal()"></i> 
        </div>
        <div class="area-text-modal">
            <p id="text_modal"></p>
        </div>

    </div>


    <div class="balls">
        
        <div class="ball ball5" ></div>
        <div class="ball ball1"></div>
        <div class="ball ball2"></div>
        <div class="ball ball3"></div>
        <div class="ball ball4"></div>
    </div>

    <div class="area_inscricao">
        <div class="container_inscricao">
            <div class="left_side">
                
                <div class="vagas_title">
                    <h1><?=$vagas?> Vagas</h1>
                </div>

                <div class="area_img move"   animation="left">
                    <img src="<?=$foto?>" >
                </div>
                
                <h1 class="nome_palestra move" animation="right"> <?=$nome_palestrante?> </h1>
                
                <div class="about_area">
                    <div class="title_about">
                        <div class="tracer"></div>
                        <h2 class="move" animation="top">SOBRE</h2>
                        <div class="tracer"></div>
                    </div>
                    <h1 class="move" animation="left"> <?=$titulo?> </h1>
                    <p  animation="left" class="desc_about move"> <?=$descricao?></p>
                </div>
            </div>

            <div class="right_side">
                <form class="content_right_side" id="form_inscricao">
                    <h1 class="title_inscreva "  >INSCREVA-SE</h1>
                    <!-- DATA NASCIMENTO | SEXO | DUAS CHECKBOX -->
                    <div class="inputs"  >

                        <div class="input_area">
                            <input required maxlength="100"  class="input" name="nome" id="nome_input" type="text"> 
                            <label for=""  class="input_label"  maxlength="11">NOME</label>
                        </div>
                        <div class="input_area align_input_top">
                            <input required maxlength="100"  class="input" name="email" id="email_input" type="text"> 
                            <label for=""  class="input_label"  maxlength="11">E-MAIL</label>
                        </div>

                        <div class="twoCollumn">
                            
                            <div class="input_area">
                                <input required oninput="mascaraPhone(this)" name="telefone" id="phone_input" maxlength="100"  class="input" type="text"> 
                                <label for=""  class="input_label"  maxlength="11">TELEFONE</label>
                            </div>
    
                            <div class="input_area">
                                <input required  oninput="mascaraCPF(this)" name="cpf" id="cpf_input" class="input" type="text"> 
                                <label for=""  class="input_label"  maxlength="11">CPF</label>
                            </div> 

                        </div>

                        <div class="twoCollumn aling_two_40">
                            <div class="input_area_genero">
                                <label class="label_gen" for="">GÊNERO</label>
                                <select class="input_select_gen" id="gen_input" name="sexo">
                                    <option selected>Selecione</option>
                                    <option value="m">Masculino</option>
                                    <option value="f">Feminino</option>
                                    <option value="o">Outros</option>
                                    <option value="n">Não informar</option>
                                </select>
                            </div> 

                            <div class="input_area_genero">
                                <label class="label_gen" for="">NASCIMENTO</label> 
                                <input class="input_select_gen" name="data_nasc" id="date_input" type="date" name="" id="">
                            </div>

                        </div>

                        <div class="area_checkboxes">
                            <input type="checkbox" name="lgpd" id="lgpd1">
                            <Label>Ao clicar este formulário, você permite que seus dados pessoais sejam processados em nossas plataformas educacionais.</Label>
                        </div>

                        <div class="area_checkboxes">
                            <input type="checkbox" name="info" id="lgpd2">
                            <Label>Você concorda em receber informações a respeito de cursos relacionados ao Senac.</Label>
                        </div>
                        <div id="localCaptcha"></div>
                       

                    </div>


                    <div class="buttons_content">
                        <button class="clicavel" id="cancel_button">Voltar</button>
                         
                        <button name="cadastrar" class="clicavel"> 
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
<script src="src/javascript/script.js"></script>
</html>