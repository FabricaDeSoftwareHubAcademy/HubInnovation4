
<div class="container">
    <div class="row">
        <div class="col-12 p-3 text-center"><h1> <?=TITLE?> </h1></div>
    </div>

    <div class="row">
          <div class="alert alert-secondary col-12 p-2 align-items-center d-flex align-items-center" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                  </svg>
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                Total de inscrições: <?php echo $quantidade[0]["numero_inscritos"]; ?>
          </div>     
    </div>



    <form method="POST">
                <div class="row">
                    <div class="col-md-9 mb-3">
                      <label for="sala" class="form-label"> Filtrar por Palestra </label>
                      <select class="form-select" name="palestra" id="palestra">
                              <!-- INSERIR FOR DO COLAB -->
                              <option value="x" selected disabled>Selecione a Palestra</option>
                                    <?php
                                      $resultado = '';
                                      foreach($palestras as $palestra){
                                        $resultado .= '<option value="'.$palestra->id_palestra.'">'.$palestra->titulo.'</option>';
                                      }
                                      echo $resultado;
                                    ?>  
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                    <label for="filter_inscritos" class="form-label"> Buscar </label>
                      <input type="submit" class="form-control btn btn-primary" name="buscar" value="Buscar">
                    </div>

                  </div>

  </div>


<div class="container">
  
    <!-- TITULO DA PALESTRA!!! -->
    <?php
      $title = isset($titlePalestra) ? $titlePalestra : "";
      echo $title;
    ?>
                <table class="table table-striped">
                <thead>
                    <tr>
                      <th scope="col">Nome Completo</th>
                      <th scope="col">Telefone</th>
                      <th scope="col">E-mail</th>
                    </tr>
                  </thead>
                  <tbody id="table_result">
                        <?=$results?>
                  </tbody>
                </table>

          <div class="container d-flex justify-content-center">
                    <div class="col-md-4 mb-3">
                      <input type="submit" class="form-control btn btn-primary" name="gerar_pdf" value="Gerar PDF">
                    </div>            
          </div>

      </form>

</div>


<script>

var select_Palestra = document.getElementById("palestra");

select_Palestra.addEventListener("change", (event) => {
  //alert("CAPTOU O VALOR: "+select_Palestra.value); DEBUG
  var form_data = new FormData();
      form_data.append('query', select_Palestra.value)

      var ajax = new XMLHttpRequest();

      ajax.onreadystatechange = function(){
        if(ajax.readyState == 4 && ajax.status == 200 ){
          console.log(ajax);
          var response = JSON.parse(ajax.responseText);
         
          var table = document.getElementById('table_result');

                if (response.length > 0) {

                  for (var i = 0; i < response.length; i++) {
                    var row = `<tr>
                                  <td> ${response[i].titulo} </td>
                                  <td> ${response[i].ambiente} </td>
                                  <td> ${response[i].nome} </td>
                                  <td> ${response[i].cpf} </td>
                                  <td> ${response[i].data} </td>
                              </td>`;                    
                      table.innerHTML += row;
                  }

                } else {
                  var table = document.getElementById('table_result');
                  table += `<tr>
                                  <td colspan="5"> Resultado não encontrado </td>
                            </td>`;
                }
                //document.getElementById('filter_inscritos').innerHTML = table;
        }
      }

      ajax.open("POST","./includes/main_filter_palestra.php",true);
      ajax.send(form_data);

});

function search_filter(query) {
if (query.length > 4) {
      var form_data = new FormData();
      form_data.append('query', query)

      var ajax = new XMLHttpRequest();

      ajax.onreadystatechange = function(){
        if(ajax.readyState == 4 && ajax.status == 200 ){
          console.log(ajax);
          var response = JSON.parse(ajax.responseText);
         
          var table = document.getElementById('table_result');

                if (response.length > 0) {

                  for (var i = 0; i < response.length; i++) {
                    var row = `<tr>
                                  <td> ${response[i].titulo} </td>
                                  <td> ${response[i].ambiente} </td>
                                  <td> ${response[i].nome} </td>
                                  <td> ${response[i].cpf} </td>
                                  <td> ${response[i].data} </td>
                              </td>`;                    
                      table.innerHTML += row;
                  }

                } else {
                  var table = document.getElementById('table_result');
                  table += `<tr>
                                  <td colspan="5"> Resultado não encontrado </td>
                            </td>`;
                }
                //document.getElementById('filter_inscritos').innerHTML = table;
        }
      }

      ajax.open("POST","./includes/main_filter.php",true);
      ajax.send(form_data);

}
else {
      document.getElementById('filter_inscritos').innerHTML = '';
    }

}
</script>
