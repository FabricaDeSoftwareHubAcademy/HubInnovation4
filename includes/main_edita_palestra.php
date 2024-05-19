<div class="container">
    <div class="row">
        <div class="col-12 p-3 text-center"><h1> <?=TITLE?> </h1></div>
    </div>

<form method="POST" action="" enctype="multipart/form-data">

<div class="row">
  <input type="hidden" class="form-control" value="<?=$obj->id_palestra?>">
  <div class="col mb-3">
    <label for="palestrante" class="form-label"> Palestrante</label>
    <input
      type="text"
      class="form-control"
      id="id_palestrante"
      name="id_palestrante"
      placeholder="ID do Palestrante"
      value="<?=$obj->id_palestrante?>"
    />
  </div>
</div>

  <div class="row">
    <input type="hidden" name="tipo" id="tipo" value="user">
    <div class="col mb-3">
      <label for="titulo" class="form-label"> Título </label>
      <input
        type="text"
        class="form-control"
        id="titulo"
        name="titulo"
        placeholder="Título da Palestra/Workshop"
        value="<?=$obj->titulo?>"
      />
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 mb-3">
      <label for="obs" class="form-label">Descrição</label>
      <textarea
        class="form-control"
        name="desc"
        id="desc"
        placeholder="Descrição da Palestra/Workshop"
        rows="3"> <?=$obj->descricao?>
    </textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 mb-3">
      <label for="sala" class="form-label"> Sala </label>
      <input
        type="text"
        class="form-control"
        id="sala"
        name="sala"
        placeholder="Ambiente da Palestra/Workshop"
        value="<?=$obj->sala?>"
      />
    </div>
    <div class="col-md-4 mb-3">
      <label for="vagas" class="form-label"> Vagas </label>
      <input
        type="number"
        class="form-control"
        id="vagas"
        name="vagas"
        placeholder="Qtde. Vagas"
        value="<?=$obj->vagas?>"
      />
    </div>
    <div class="col-md-4 mb-3">
      <label for="data" class="form-label"> Data </label>
      <input type="date" class="form-control" name="data" id="data">
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 mb-3">
      <label for="insumos" class="form-label">Insumos</label>
      <textarea
        class="form-control"
        name="insumos"
        id="insumos"
        placeholder="Insumos para a palestra"
        rows="3"
      > <?=$obj->insumos?> </textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 mb-3 d-flex justify-content-center">
        <button type="reset" id="cancelar" class="btn btn-danger mx-3">Cancelar</button>
	<button type="submit" id="enviar" class="btn btn-primary mx-3">Salvar</button>
    </div>
</div>
</form>

</div>
