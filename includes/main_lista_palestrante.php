<?php
    $results = '';
    foreach($palestrante as $speaker){
        $results .= '<tr>
                        <td>'.$speaker->id_palestrante.'</td>
                        <td>'.$speaker->nome.'</td>
                        <td> <img class="mini_foto" src="'.$speaker->foto.'"></td>
                        <td>'.$speaker->instagram.'</td>
                        <td>'.$speaker->linkedin.'</td>
                        <td>
                        <a href="editar_palestrante.php?id='.$speaker->id_palestrante.'">
                        <button class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir_palestrante.php?id='.$speaker->id_palestrante.'">
                        <button class="btn btn-danger">Excluir</button>
                        </a>
                        </td>
                    </tr>';
    }

    //<td>'.($palestra->vagas == 's' ? 'Ativo' : 'Inavito').'</td>
?>

<div class="container">
    <div class="row">
        <div class="col-12 p-3 text-center"><h1> Palestrantes Cadastrados </h1></div>
    </div>

    <!-- MENSAGEM DE SUCESSO!!! -->
    <?=$msg?>

    <table class="table bg-light mt-2 mb-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Foto</th>
                <th>Instagram</th>
                <th>LinkedIn</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
            <?=$results?>
        </tbody>

    </table>



</div>
