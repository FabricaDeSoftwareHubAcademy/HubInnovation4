<?php

include __DIR__ . '/vendor/autoload.php';

use App\Entity\Palestra;

$new_obj = new Palestra();
$palestras = $new_obj->filtrar();

$results = '';
foreach ($palestras as $palestra) {
  $contVagas = $palestra->vagas;
  if ($contVagas <= 0) {
    $results .= '		
            <div class="card-container move" animation="top" href="inscricao.html"> 
             
            <div class="card">
              <div class="imgs_palestrante" data-carousel=0>
                <img class="palestrante" src="' . $palestra->foto . '" alt="">
                <img class="palestrante"
                  src="https://media.licdn.com/dms/image/C4D12AQE5OPBvIYUuRw/article-cover_image-shrink_720_1280/0/1593273772702?e=2147483647&v=beta&t=3rWo8Zt_UMWdu65-F3x7G0lXapM1bd6pvs1DSZJAB5g" alt="">
                <img class="palestrante"
                  src="https://miro.medium.com/v2/resize:fit:700/1*nN4903HEGDRx33s0e1oSUA.jpeg"
                  alt="">
                <img class="palestrante"
                  src="https://uploads.spiritfanfiction.com/historias/capas/202008/o-assassinato-de-cavalao-20237301-170820202319.jpg"
                  alt="">
                <img class="palestrante"
                  src="https://www.creativefabrica.com/wp-content/uploads/2021/03/08/Go-Horse-Graphics-9343870-1.png"
                  alt="">
              </div> 
              <div class="front-content">
                <p class="nome-palestrante">' . $palestra->nome_palestrante . '</p>
              </div>
              <div class="content">
                <h1> ENCERRADAS </h1> 
                <div class="area_icons">
                  <a href="https://instagram.com" target="_blank" rel="noopener noreferrer"> <i class="fa-brands fa-instagram"></i></a> 
                  <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer"> <i class="fa-brands fa-linkedin"></i></a> 
                </div>
                <p class="titulo-palestra"> ' . $palestra->palestra . '</p>
                <p class="titulo-palestra2"></p>
              </div>
            </div>
          </div> 
          ';
  } else {
    $results .= '
          <div class="card-container move" animation="top" href="inscricao.html"> 
            
            <div class="card">
              <div class="imgs_palestrante" data-carousel=0>
                <img class="palestrante" src="' . $palestra->foto . '" alt="">
                <img class="palestrante"
                  src="https://media.licdn.com/dms/image/C4D12AQE5OPBvIYUuRw/article-cover_image-shrink_720_1280/0/1593273772702?e=2147483647&v=beta&t=3rWo8Zt_UMWdu65-F3x7G0lXapM1bd6pvs1DSZJAB5g" alt="">
                <img class="palestrante"
                  src="https://miro.medium.com/v2/resize:fit:700/1*nN4903HEGDRx33s0e1oSUA.jpeg"
                  alt="">
                <img class="palestrante"
                  src="https://uploads.spiritfanfiction.com/historias/capas/202008/o-assassinato-de-cavalao-20237301-170820202319.jpg"
                  alt="">
                <img class="palestrante"
                  src="https://www.creativefabrica.com/wp-content/uploads/2021/03/08/Go-Horse-Graphics-9343870-1.png"
                  alt="">
              </div> 
              <div class="front-content">
                <p class="nome-palestrante">' . $palestra->nome_palestrante . '</p>
              </div>
              <div class="content">
                <h1> ' . $palestra->vagas . ' VAGAS</h1>
                <div class="area_icons">
                  <a href="https://instagram.com" target="_blank" rel="noopener noreferrer"> <i class="fa-brands fa-instagram"></i></a> 
                  <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer"> <i class="fa-brands fa-linkedin"></i></a> 
                </div>
                <p class="titulo-palestra"> ' . $palestra->palestra . '</p>
                <p class="titulo-palestra2"></p>
                <a href="./inscricao.php?id_palestra=' . $palestra->id_palestra . '" class="ver_palestra clicavel"><span class="span_btn_inscricao">Ver <i class="fa-solid fa-arrow-right "></i></span> </a>
              </div>
            </div>
          </div>
 
    ';
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="src/styles/styles.css">
  <link rel="stylesheet" href="src/styles/hub.css">
  <link rel="stylesheet" href="src/styles/patrocinadores.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="node_modules/animejs/lib/anime.min.js"></script>
  <script defer src="./src/javascript/cursor.js"></script>
  <script defer src="./src/javascript/card.js"></script>
  <title>HUB INNOVATION 4</title>
</head>

<body>

   

  <header>
    <nav id="navbar">
      <a href="index.php"><img src="src/images/logo_hub4.png" alt="Logo" id="nav_logo"></a>

      <ul id="nav_list">
        <li class="nav-item active">
          <a href="#home">HOME</a>
        </li>
        <li class="nav-item">
          <a href="#sobre">SOBRE</a>
        </li>
        <li class="nav-item">
          <a href="#palestras">PALESTRAS</a>
        </li>
      </ul>

      <button id="mobile_btn" class="clicavel">
        <i class="fa-solid fa-bars"></i>
      </button>
    </nav>

    <div id="mobile_menu">
      <ul id="mobile_nav_list">
        <li class="nav-item">
          <a href="#home">HOME</a>
        </li>
        <li class="nav-item">
          <a href="#sobre">SOBRE</a>
        </li>
        <li class="nav-item">
          <a href="#palestras">PALESTRAS</a>
        </li>
      </ul>

      <a class="link_login" href="login.html"><button class="btn-default">
          LOGIN
        </button></a>
    </div>
  </header>

  <main id="content">
    <div class="area_cubeA">
      <div class="cubeEffect">
      </div>
      <div class="cubePreenchimento  move" animation="left"></div>
    </div>

    <div class="area_cubeB">
      <div class="cubeEffect">
      </div>
      <div class="cubePreenchimento move" animation="top"></div>
    </div>

    <section id="home">
      <img src="src/images/logo_hub4.png" class="move" animation="top" alt="" id="logo_principal">
      <div class="title-principal">
        <h2 class="section-title move" animation="left">
          19 de Junho de 2024 às 19:00
        </h2>
        <a href="https://maps.app.goo.gl/8rerj9CcsVAoG1yd9" target="_blank" class="section-subtitle move"
          animation="right">
          SENAC HUB ACADEMY
        </a>
      </div>
      <div class="setas">
        <a class="btn-content clicavel" href="#sobre">

          <span class="icon-arrow">
            <svg viewBox="0 0 66 43" version="1.1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="arrow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <path id="arrow-icon-one"
                  d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z"
                  fill="#FFFFFF"></path>
                <path id="arrow-icon-two"
                  d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z"
                  fill="#FFFFFF"></path>
                <path id="arrow-icon-three"
                  d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z"
                  fill="#FFFFFF"></path>
              </g>
            </svg>
          </span>
        </a>
      </div>
      </div>
    </section>
    <section id="sobre">
      <div class="gerentes">
        <img class="move" animation="left" src="src/images/Ana.png" id="gerenteshub" alt="">
        <img class="move gilkaimg " animation="right" src="src/images/Gilka.png" id="gerenteshub" alt="">
      </div>

      <div id="testimonials_content">
        <div class="title">
          <h2 class="section-title">
            CONHEÇA E VIVA O
          </h2>
          <h3 class="section-subtitle">
            HUB INNOVATION
          </h3>
        </div>
        <div class="history">
          <article class="gallery">
            <img class="move" animation="left" src="src/images/1 (1).jpg" alt="guitar player at concert" />
            <img class="move" animation="top" src="src/images/1 (8).jpg" alt="duo singing" />
            <img class="move" animation="top" src="src/images/1 (9).jpg" alt="crowd cheering" />
            <img class="move" animation="top" src="src/images/1 (12).jpg" alt="crowd cheering" />
            <img class="move" animation="right" src="src/images/1 (13).jpg" alt="singer performing" />
            <img class="move" animation="top" src="src/images/1 (14).jpg" alt="guitar player at concert"
              id="mobile-history" />
            <img class="move" animation="right" src="src/images/1 (15).jpg" alt="duo singing" id="mobile-history" />
            <img class="move" animation="top" src="src/images/1 (2).jpg" alt="crowd cheering" id="mobile-history" />
            <img class="move" animation="right" src="src/images/1 (3).jpg" alt="crowd cheering" id="mobile-history" />
            <img class="move" animation="left" src="src/images/1 (4).jpg" alt="singer performing" id="mobile-history" />
            <img class="move" animation="bottom" src="src/images/1 (5).jpg" alt="crowd cheering" id="mobile-history" />
            <img class="move" animation="bottom" src="src/images/1 (6).jpg" alt="singer performing"
              id="mobile-history" />
            <img class="move" animation="bottom" src="src/images/1 (11).jpg" alt="singer performing"
              id="mobile-history" />
            <img class="move" animation="right" src="src/images/1 (7).jpg" alt="singer performing"
              id="mobile-history" />



          </article>
        </div>
        <div class="container-hub">
          <div class="sobre-hub">
            <article class="hub clicavel">
              <header class="hub-cab">
                <h3 class="dados-hub">É um evento realizado pelo Senac Hub Academy, semestralmente, que reúne
                  mais de 30
                  profissionais de mercado e empresas atuantes em áreas como Tecnologia da Informação,
                  Gamificação, Comunicação e Marketing, Beleza e Estética, Gestão e Varejo e Saúde para o
                  compartilhamento de conhecimento em novos métodos e técnicas de trabalho, tendências de
                  mercado e processos inovadores.</h3>
              </header>
              <section class="cadastro">
                <button class="btn-cadastro">O que é o <strong>Hub Innovation</strong>?</button>
              </section>
            </article>
            <article class="hub clicavel">
              <header class="hub-cab">
                <h3 class="dados-hub">Os momentos proporcionados pelo evento são ótima oportunidade de contato com as
                  novidades do
                  mercado nos temas abordados e por isso mesmo são destinados a profissionais de mercado,
                  empresários, universitários e alunos da Educação Profissional. <br><br><br><br><br><br><br></h3>
              </header>
              <section class="cadastro">
                <button class="btn-cadastro">Para quem é o <strong>Hub Innovation</strong>?</button>
              </section>
            </article>
            <article class="hub clicavel">
              <header class="hub-cab">
                <h3 class="dados-hub">Porque é conhecimento gratuito e torna possível ter contato com os maiores ativos
                  do século
                  XXI – conhecimento e networking, o primeiro é possibilitado pela competência do profissional
                  responsável pelo momento e o segundo porque no mundo atual a rede de relacionamento é
                  essencial para o crescimento na carreira e para novas ideias de negócio. <br><br><br><br></h3>
              </header>
              <section class="cadastro">
                <button class="btn-cadastro">Por que ir ao <strong>Hub Innovation</strong>?</button>
              </section>
            </article>
          </div>
        </div>
      </div>
    </section>


    <section id="palestras">
      <div class="area_palestras_cards">
        <div class="title-palestras">
          <h2 class="section-title title-seciton-space move" animation="left">Selecione uma Palestra ou Workshop e </h2>
          <h3 class="section-subtitle move" animation="right">INSPIRE-SE</h3>
        </div>


        <div class="cards-palestrantes">

          <div class="card-container move" animation="top" href="inscricao.html">
             
            <div class="card">
              <div class="imgs_palestrante" data-carousel=0>
                <img class="palestrante" src="src/images/Thiago.jpg" alt="">
                <img class="palestrante"
                  src="https://media.licdn.com/dms/image/C4D12AQE5OPBvIYUuRw/article-cover_image-shrink_720_1280/0/1593273772702?e=2147483647&v=beta&t=3rWo8Zt_UMWdu65-F3x7G0lXapM1bd6pvs1DSZJAB5g"
                  alt="">
                <img class="palestrante" src="https://miro.medium.com/v2/resize:fit:700/1*nN4903HEGDRx33s0e1oSUA.jpeg"
                  alt="">
                <img class="palestrante"
                  src="https://uploads.spiritfanfiction.com/historias/capas/202008/o-assassinato-de-cavalao-20237301-170820202319.jpg"
                  alt="">
                <img class="palestrante"
                  src="https://www.creativefabrica.com/wp-content/uploads/2021/03/08/Go-Horse-Graphics-9343870-1.png"
                  alt="">
              </div>
              <div class="front-content">
                <p class="nome-palestrante">Thiago Almeida</p>
              </div>
              <div class="content">
                <h1>999 VAGAS</h1>
                <p class="titulo-palestra">GO HORSE 🐴: A Metodologia do Futuro 🚀🚀🚀</p>
                <p class="titulo-palestra2"></p>
                <a href="inscricao.html" class="ver_palestra clicavel"><span class="span_btn_inscricao">Ver <i
                      class="fa-solid fa-arrow-right "></i></span> </a>
              </div>
            </div>
          </div>
          <?= $results ?>


        </div>

      </div>
    </section>

    <section id="patrocinadores">
      <h3 class="section-subtitle move" animation="right">APOIADORES</h3>
      <div class="area_imgs_patrocinadores">
        <img src="src/images/logo_senac.png" alt="logo apoiador" srcset="">
        <img src="src/images/logo_hub4.png" alt="logo apoiador" srcset="">
        <img src="src/images/logo_senac.png" alt="logo apoiador" srcset="">
        <img src="src/images/logo_hub4.png" alt="logo apoiador" srcset="">
        <img src="src/images/logo_hub4.png" alt="logo apoiador" srcset="">
        <img src="src/images/logo_senac.png" alt="logo apoiador" srcset="">

      </div>

    </section>


  </main>

  <footer>
    <img src="src/images/wave.svg" alt="">

    <div id="footer_items">
      <span id="copyright">
        &copy 2024 FABRICA DE SOFTWARE
      </span>

      <div class="social-media-buttons">
        <a href="">
          <i class="fa-brands fa-whatsapp"></i>
        </a>

        <a href="https://www.instagram.com/senachubacademy/" target="_blank">
          <i class="fa-brands fa-instagram"></i>
        </a>

        <a href="">
          <i class="fa-brands fa-facebook"></i>
        </a>
      </div>
    </div>
  </footer>
  <script src="src/javascript/script.js"></script>
</body>

</html>