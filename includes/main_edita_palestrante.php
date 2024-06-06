<div class="container">
    <div class="row">
        <div class="col-12 p-3 text-center"><h1> <?=TITLE?> </h1></div>
    </div>


<form method="POST" action="" enctype="multipart/form-data">

<div class="row">
  <div class="col-md-3 mb-3">
      <input type="hidden" class="form-control" name="id_palestrante" value="<?=$obj->id_palestrante?>">  
      <label for="instagram" class="form-label"> Nova foto </label>
      <input type="file" name="foto" id="foto" class="form-control" required>
    </div>
  <div class="col-md-8 mb-8">
    <label for="nome" class="form-label"> Nome </label>
    <input
      type="text"
      class="form-control"
      id="nome"
      name="nome"
      value="<?=$obj->nome?>"
    />
  </div>
</div>

  <div class="row">
    <div class="col-md-12 mb-3">
      <label for="obs" class="form-label">Bio</label>
      <textarea
        class="form-control"
        name="bio"
        id="bio"
        rows="3"> <?=$obj->bio?>
    </textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="instagram" class="form-label"> Instagram </label>
      <input
        type="text"
        class="form-control"
        id="instagram"
        name="instagram"
        value="<?=$obj->instagram?>"
      />
    </div>
    <div class="col-md-6 mb-3">
      <label for="linkedin" class="form-label"> LinkedIn </label>
      <input
        type="text"
        class="form-control"
        id="linkedin"
        name="linkedin"
        value="<?=$obj->linkedin?>"
      />
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
