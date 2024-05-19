<?php

namespace App\Entity;
//importar class do banco de dados
use App\DB\Database;
use PDO;

class Ambiente{
    //Definindo os atributos
    public int $id_sala;
    public string $numero;
    public string $nome;
    public string $capacidade;
    public string $flag;
    //Função cadastrar

    public function cadastrar(){
        //Instanciar banco
        $db = new Database('ambiente');
        $db->insert(
                    [
                        'numero' => $this->numero,
                        'nome' => $this->nome,
                        'capacidade' => $this->capacidade
                    ]
                    );
        //retornar sucesso
        return true;
    }

    
    public static function buscar($where = null,$order = null, $limit = null){
        //Já faz o FetchALL da classe
        return (new Database('ambiente'))
        ->select($where,$order,$limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
}

?>