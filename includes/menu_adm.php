<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?='./index.html';?>">Hub Innovation</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="<?='./salas.php';?>">Ambientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?='./colabs.php';?>">Colaboradores</a>
        </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Palestrantes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                    <a class="dropdown-item" href="<?='./palestrante.php';?>">Cadastrar</a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <a class="dropdown-item" href="<?='./lista_palestrantes.php';?>">Listar Palestrantes</a>
                  </li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Palestra
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">        
                  <li>
                    <a class="dropdown-item" href="<?='./palestra.php';?>">Cadastrar </a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <a class="dropdown-item" href="<?='./lista_palestra.php';?>">Listar Palestra </a>
                  </li>
          </ul>
        </li>

        <li class="nav-item">
	        <a class="nav-link active" href="<?='./consulta_usuario.php';?>"> Consultar Inscritos </a>
	      </li>
        <li class="nav-item">
	        <a class="nav-link active" href="<?='./rel_inscricoes.php';?>"> Relatório </a>
	      </li>
        <li class="nav-item">
          <a class="nav-link active" href="./logout.php" tabindex="-1">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="p-5 bg-dark text-white rounded">
  <img src="./src/images/logo_hub4.png" class="img-fluid" id="logo" alt="">
</div>
