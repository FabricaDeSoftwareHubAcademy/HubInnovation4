<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?='./index.html';?>">Hub Innovation</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="<?='./palestrante.php';?>">Palestrantes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?='./palestra.php';?>">Palestras</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?='./salas.php';?>">Ambientes</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Relatórios
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?='./inscricoes.php';?>">Inscritos</a></li>
            <li><a class="dropdown-item" href="<?='./lista_palestra.php';?>">Listar Palestras</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Total Inscrições</a></li>
          </ul>
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
