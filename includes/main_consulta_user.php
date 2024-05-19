
<div class="container">
    <div class="row">
        <div class="col-12 p-3 text-center"><h1> <?=TITLE?> </h1></div>
    </div>

    <form method="POST">
                <div class="row">
                    <div class="col-md-9 mb-3">
                      <label for="sala" class="form-label"> CPF do Inscrito </label>
                      <input
                          type="text"
                          class="form-control"
                          id="cpf"
                          name="cpf"
                          placeholder="Digite o CPF do Caboclo"
                          required
                        />
                    </div>

                    <div class="col-md-3 mb-3">
                    <label for="filter_inscritos" class="form-label"> Buscar </label>
                      <input type="submit" class="form-control btn btn-dark" name="buscar" value="Buscar">
                    </div>

                  </div>

  </div>


<div class="container">

    <?php
      $title = isset($titlePalestra) ? $titlePalestra : "";
      echo $title;
    ?>
                <table class="table table-striped">
                <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Nome</th>
                      <th scope="col">CPF</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">Palestra</th>
                    </tr>
                  </thead>
                  <tbody id="table_result">
                        <?=$results?>
                  </tbody>
                </table>

      </form>

</div>
