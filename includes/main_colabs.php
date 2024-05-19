<div class="container">
    <div class="row">
        <div class="col-12 p-3 text-center"><h1> Cadastrar Colaboradores </h1></div>
    </div>


<form method="POST">
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="nome" class="form-label"> Nome</label>
            <input
              type="text"
              class="form-control"
              id="nome"
              name="nome"
              placeholder="Nome do Colaborador"
              required
            />
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="matricula" class="form-label"> Matricula</label>
            <input
              type="text"
              class="form-control"
              id="matricula"
              name="matricula"
              placeholder="Número da Matricula"
              required
            />
          </div>
        </div>


        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="email" class="form-label"> E-mail</label>
            <input
              type="email"
              class="form-control"
              id="email"
              name="email"
              placeholder="E-mail"
              required
            />
          </div>

        </div>

        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="senha" class="form-label"> Senha </label>
            <input
              type="password"
              class="form-control"
              id="senha"
              name="senha"
              placeholder="Senha"
              required
            />
          </div>

        </div>

        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="cargo" class="form-label"> Cargo </label>
            <select class="form-select" name="cargo" id="cargo">
              <option value="NULL" selected disabled>Selecione o Cargo</option>
              <option value="Gerente">Bibliotecário</option>
              <option value="Docente">Docente</option>
              <option value="Eventos">Eventos</option>
              <option value="Gerente">Gerente</option>
              <option value="Logistica">Logística</option>
              <option value="Inovação">Núcleo de Inovação</option>
            </select>
          </div>

        </div>

        <div class="row">
          <div class="col-md-12 mb-3 d-flex justify-content-center">
              <button type="reset" id="cancelar" class="btn btn-danger mx-3">Cancelar</button>
		<button type="submit" id="enviar" class="btn btn-primary mx-3">Cadastrar</button>
          </div>
      </div>
      </form>
    
</div>
