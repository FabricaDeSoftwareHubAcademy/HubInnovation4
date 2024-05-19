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
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUB INNOVATION 3</title>
    <link rel="stylesheet" href="./CSS/inscricao.css">
    <link rel="stylesheet" href="./CSS/estilo.css">
    <link rel="stylesheet" href="./CSS/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

</head>

<body>
    <div class="fundo">
		 	<!-- particles.js container -->
		<div id="particles-js"></div>
		<!-- scripts -->
		<script src="./JS/particles.js"></script>
		<script src="./JS/app.js"></script>

		<script>
			var count_particles, stats, update;
			stats = new Stats;
			stats.setMode(0);
			stats.domElement.style.position = 'absolute';
			stats.domElement.style.left = '0px';
			stats.domElement.style.top = '0px';
			document.body.appendChild(stats.domElement);
			count_particles = document.querySelector('.js-count-particles');
			update = function () {
				stats.begin();
				stats.end();
				if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
					count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
				}
				requestAnimationFrame(update);
			};
			requestAnimationFrame(update);
		</script>

	</div>
    <a href="./index.php"><img src="./IMG/HubInnovation3.png" alt="" class="logo"></a>
    <main class="main_content incricao">
        <section class="incricao">
            
            <div class="container_dados container_form">
                <div class="img-palestrante">
                    <img src="<?=$foto ?>">
                </div>
                <div class="dados_palestra">                    
                    <h3 class="nome_palestrante"> <?=$nome_palestrante?>  </h3>
                    <h3 class="vagas_palestrante">VAGAS RESTANTES:  <?=$vagas ?></h3>
                    <h3 class="titulo-palestra"> <?=$titulo ?> </h3>
                    <p class="descricao"> </p> <?=$descricao ?> </p>
                </div>
            </div>
            <div class="container_form">
                <h1>Formulário de Cadastro</h1>

                <form class="form" method="post">
                    <div class="form_grupo">
                        <label for="nome" class="form_label">Nome</label>
                        <input type="text" name="nome" class="form_input" id="nome" placeholder="Nome" required>
                    </div>
                    <div class="form_grupo">
                        <label for="e-mail" class="form_label">Email</label>
                        <input type="email" name="email" class="form_input" id="email" placeholder="seuemail@email.com"
                            required>
                    </div>
                    <div class="form_grupo">
                        <label for="telefone" class="form_label">Telefone</label>
                        <input type="tel" name="telefone" class="form_input" id="telefone" placeholder="Telefone"
                            required>
                    </div>
                    <div class="form_grupo">
                        <label for="cpf" class="form_label">CPF</label><br>
                        <input type="number" name="cpf" class="form_input" id="cpf" placeholder="Digite Seu CPF"
                            required>
                    </div>
                    <div class="form_grupo">
                        <label for="datanascimento" class="form_label">Data de Nascimento</label>
                        <input type="date" name="data_nasc" class="form_input" id="datanascimento"
                            placeholder="Data de Nascimento" required>
                    </div>
                    <div class="form_grupo">
                        <span class="legenda">Genero:</span>
                        <div class="radio-btn">
                            <input type="radio" class="form_new_input" id="masculino" name="sexo" value="Masculino">
                            <label for="masculino" class="radio_label form_label"> <span
                                    class="radio_new_btn"></span> Masculino</label>
                        </div>
                        <div class="radio-btn">
                            <input type="radio" class="form_new_input" id="feminino" name="sexo" value="Feminino">
                            <label for="feminino" class="radio_label form_label"> <span
                                    class="radio_new_btn"></span> Feminino</label>
                        </div>

			<div class="radio-btn">
			   <input type="radio" class="form_new_input" id="outro" name="sexo" value="Outro">
			   <label for="outro" class="radio_label form_label"> <span class="radio_new_btn"></span>Outro</label>
			</div>

                    </div>
                    <div class="form_grupo">
                        <div class="check-btn">
                            <input type="checkbox" class="form_new_input" id="lgpd" name="lgpd" checked>
                            <label for="lgpd" class="form_label check_label"> <span class="check_new_btn"></span> Ao
                                enviar este formulário, você permite que seus dados pessoais sejam processados em nossas
                                plataformas educacionais.</label>
                        </div>
                        <div class="check-btn">
                            <input type="checkbox" class="form_new_input" id="info" name="info" checked>
                            <label for="info" class="form_label check_label"><span class="check_new_btn"></span>
                                Você concorda em receber informações a respeito de cursos
                                relacionados ao Senac.</label>
                        </div>
                      

                        <div class="botoes">
                            <div class="submit">
                                <input type="hidden" name="acao" value="canecelar">
                                <button type="reset" name="cancelar" class="submit_btn">CANCELAR</button>
                            </div>

                            <div class="submit">
                                <input type="hidden" name="acao" value="enviar">
                                <button type="submit" name="cadastrar" class="submit_btn">CADASTRAR</button>
                            </div>
                        </div>
                    </div>
                </form>
              
            </div>
        </section>
    </main>

</body>

</html>
