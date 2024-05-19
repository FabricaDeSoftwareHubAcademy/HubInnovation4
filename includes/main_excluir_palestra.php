<div class="container">
    <div class="row">
        <div class="col-12 p-3 text-center"><h1> Excluir Palestra </h1></div>
    </div>

<form method="POST" enctype="multipart/form-data">

<div class="row">

    <div class="form-group">
      <p>Você deseja realmente excluir a palestra <strong> <?=$obj->titulo?> </strong> </p>
    </div>
 
</div>

  <div class="row">
    <div class="col-md-12 mb-3 d-flex justify-content-center">
        <button type="reset" id="cancelar" class="btn  btn-dark mx-3">Cancelar</button>
        <button type="submit" id="excluir" class="btn btn-danger mx-3" name="excluir">Excluir</button>
    </div>
</div>
</form>

</div>
