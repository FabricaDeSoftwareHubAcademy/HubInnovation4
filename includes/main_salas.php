
<div class="container">
  <div class="row">
      <div class="col-12 p-3 text-center"><h1> Cadastrar Ambiente </h1></div>
  </div>

<form method="POST">

<div class="row">
<div class="col mb-3">
  <label for="palestrante" class="form-label"> Numero </label>
  <input
    type="number"
    class="form-control"
    id="numero"
    name="numero"
    placeholder="Número da Sala"
    required
  />
</div>
</div>

<div class="row">
  <div class="col mb-3">
    <label for="nome" class="form-label"> Nome da Sala </label>
    <input
      type="text"
      class="form-control"
      id="nome"
      name="nome"
      placeholder="Nome da Sala"
      required
    />
  </div>
</div>


<div class="row">
  <div class="col mb-3">
    <label for="capacidade" class="form-label"> Capacidade </label>
    <input
      type="number"
      class="form-control"
      id="capacidade"
      name="capacidade"
      placeholder="Lotação do Ambiente"
      required
    />
  </div>

<div class="row">
  <div class="col-md-12 mb-3 d-flex justify-content-center">
      <button type="reset" id="cancelar" class="btn btn-danger mx-3">Cancelar</button>
	<button type="submit" id="enviar" class="btn btn-primary mx-3">Cadastrar</button>
  </div>
</div>
</form>

</div>

