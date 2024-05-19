<div class="container">
    <div class="row">
        <div class="col-12 p-3 text-center"><h1> <?=TITLE?> </h1></div>
    </div>

<form method="POST">

<div class="row">
  <div class="col mb-3">
    <!-- BUSCA PALESTRANTE NO BANCO -->
    <label for="search_box" class="form-label"> Palestrante</label>
    <input
      type="text"
      class="form-control"
      id="search_box" name="search_box"
      placeholder="Buscar Palestrante"
      onkeyup="javascript:load_data(this.value)"
      required
    />
    <span id="search_result" name="search_result"></span>

    <input type="hidden" id="id_palestrante" name="id_palestrante" value="<?=$id_palestrante?>">
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
        required
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
        rows="3">
    </textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 mb-3">
      <label for="sala" class="form-label"> Ambiente </label>
      <select class="form-select" name="sala" id="sala">
              <!-- INSERIR FOR DO COLAB -->
              <option value="x" selected disabled>Selecione o Ambiente</option>
                    <?php
                      $resultado = '';
                      foreach($ambiente as $sala){
                        $resultado .= '<option value="'.$sala->id_sala.'">'.$sala->nome.'</option>';
                      }
                      echo $resultado;
                    ?>  
        </select>
    </div>
    <div class="col-md-4 mb-3">
      <label for="vagas" class="form-label"> Vagas </label>
      <input
        type="number"
        class="form-control"
        id="vagas"
        name="vagas"
        placeholder="Qtde. Vagas"
        required
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
      >
    </textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 mb-3 d-flex justify-content-center">
        <button type="reset" id="cancelar" class="btn  btn-dark mx-3">Cancelar</button>
        <button type="submit" id="enviar" class="btn mx-3">Cadastrar</button>
    </div>
</div>
</form>

</div>


<script>

function select_data(event) {
            var data = event.textContent;
            document.getElementsByName('search_box')[0].value = data;
            document.getElementById('search_result').innerHTML = '';
}

function load_data(query) {

  if (query.length > 2) {
        var form_data = new FormData();
        form_data.append('query', query)

        var ajax = new XMLHttpRequest();

        ajax.onreadystatechange = function(){
          if(ajax.readyState == 4 && ajax.status == 200 ){
            console.log(ajax);
            var response = JSON.parse(ajax.responseText);
            console.log(response);
            var html = '<div class="list-group">';

                  if (response.length > 0) {

                    for (var cont = 0; cont < response.length; cont++) {
                      html += '<a href="#" class="list-group-item list-group-item-action" onclick="select_data(this)">' + response[cont].nome + '</a>';

                      document.getElementById("id_palestrante").value = response[cont].id_palestrante;
                    }

                  } else {
                    html += '<a href="#" class="list-group-item list-group-item-disabled">Palestrante não encontrado </a>';
                  }

                  html += '</div>';

                  document.getElementById('search_result').innerHTML = html;
          }
        }

        ajax.open("POST","./includes/main_search.php",true);
        ajax.send(form_data);

  }
  else {
        document.getElementById('search_result').innerHTML = '';
      }

}
</script>