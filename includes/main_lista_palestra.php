<?php
    $results = '';
    foreach($palestras as $palestra){
        $results .= '<tr>
                        <td>'.$palestra->id_palestra.'</td>
                        <td>'.$palestra->titulo.'</td>
                        <td>'.$palestra->sala.'</td>    
                        <td>'.$palestra->vagas.'</td>
                        <td>'.$palestra->nome_palestrante.'</td>
                        <td>
                        <a href="editar_palestra.php?id='.$palestra->id_palestra.'">
                        <button class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir_palestra.php?id='.$palestra->id_palestra.'">
                        <button class="btn btn-danger">Excluir</button>
                        </a>
                        </td>
                    </tr>';
    }

    //<td>'.($palestra->vagas == 's' ? 'Ativo' : 'Inavito').'</td>
?>

<div class="container">
    <div class="row">
        <div class="col-12 p-3 text-center"><h1> Palestras Cadastradas </h1></div>
    </div>

    <!-- MENSAGEM DE SUCESSO!!! -->
    <?=$msg?>

    <table class="table bg-light mt-2 mb-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Sala</th>
                <th>Vagas</th>
                <th>Palestrante</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>

            <?=$results?>

        </tbody>

    </table>



</div>
