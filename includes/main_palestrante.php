<div class="container">
    <div class="row">
        <div class="col-12 p-3 text-center"><h1> Cadastrar Palestrante </h1></div>
    </div>

    <form method="POST" action="" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control" required>
          </div>

          <div class="col-md-6 mb-3">
            <label for="nome" class="form-label"> Nome</label>
            <input
              type="text"
              class="form-control"
              id="nome"
              name="nome"
              placeholder="Nome do Palestrante"
              required
            />
          </div>
        </div>

        <div class="row">
    <div class="col-md-12 mb-3">
      <label for="bio" class="form-label">Bio</label>
      <textarea
        class="form-control"
        name="bio"
        id="bio"
        placeholder="Bio do(a) Palestrante"
        rows="3">
    </textarea>
    </div>
  </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="instagram" class="form-label"> Instagram </label>
            <input
              type="text"
              class="form-control"
              id="instagram"
              name="instagram"
              placeholder="Link do Instagram do Palestrante"
              required
            />
          </div>
          <div class="col-md-4 mb-3">
            <label for="linkedin" class="form-label"> LinkedIn </label>
            <input
              type="text"
              class="form-control"
              id="linkedin"
              name="linkedin"
              placeholder="Link do LinkedIn do Palestrante"
            />
          </div>
          <div class="col-md-4 mb-3">
            <label for="resp" class="form-label"> Responsável </label>
            <select class="form-select" name="resp" id="resp">
              <!-- INSERIR FOR DO COLAB -->
              <option value="x" selected disabled>Selecione o Responsável</option>
                    <?php
                      $resultado = '';
                      foreach($colaboradores as $colab){
                        $resultado .= '<option value="'.$colab->id_colab.'">'.$colab->nome.'</option>';
                      }
                      echo $resultado;
                    ?>  
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
