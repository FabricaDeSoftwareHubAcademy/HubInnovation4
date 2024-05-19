<?php

namespace App\Entity;

//importar class do banco de dados
use App\DB\Database;
use PDO;

class Palestra{
    //Definindo os atributos
    public string $id_palestra;
    public string $titulo;
    public string $descricao;
    public string $sala;
    public string $vagas;
    public string $data;
    public string $insumos;
    public string $palestrante;
    //Função cadastrar

    public function cadastrar(){
        //Instanciar banco
        $db = new Database('palestra');
        //definir a data
        $this->data = date('Y-m-d H:i:s');
        //inserir palestra no banco
        //passando um array chave valor por parametro
        //retornando o id cadastrado
        $db->insert(
                                    [
                                        'titulo' => $this->titulo,
                                        'descricao' => $this->descricao,
                                        'sala' => $this->sala,
                                        'vagas' => $this->vagas,
                                        'data_palestra' => $this->data,
                                        'insumos' => $this->insumos,
                                        'id_palestrante' => $this->palestrante,
                                    ]
                                    );

        //retornar sucesso
        return true;
    }

    public function atualizar(){
        return (new Database('palestra'))->update('id_palestra = '.$this->id_palestra,[
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'sala' => $this->sala,
            'vagas' => $this->vagas,
            'data_palestra' => $this->data,
            'insumos' => $this->insumos,
            'id_palestrante' => $this->palestrante
        ]);
  
    }

    public function excluir(){
        return (new Database('palestra'))->delete('id_palestra = '.$this->id_palestra);
    }

    public static function buscar($where = null,$order = null, $limit = null){
        //retorna o objeto do banco
        //return (new Database('palestra'))->select($where,$order,$limit)
        //Já faz o FetchALL da classe
        return (new Database('palestra'))
        ->select($where,$order,$limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    //ADD FUNÇÃO EM PRODUÇÃO
    public static function listar(){
        //Consulta as palestras cadastradas para edicao
        return (new Database('palestra'))
        ->list_palestra()
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

        //função de filtrar usuários cadastrados nas palestras
    public static function filtrar(){
            return (new Database('palestra'))
            ->search_cards()
            ->fetchAll(PDO::FETCH_CLASS,self::class);
        }

            //função de filtrar usuários cadastrados nas palestras
    public static function filtrar_by_id($id){
        //Instancia uma nova Classe com os dados do ID
        return (new Database('palestra'))->filter_palestra_by_id($id)->fetchObject(self::class);
    }

     public static function select_by_id($id){
         //Instancia uma nova Classe com os dados do ID
         return (new Database('palestra'))->select('id_palestra = '.$id)->fetchObject(self::class);
    }

    public static function get_idPalestra($id){
        //Instancia uma nova Classe com os dados do ID
        return (new Database('palestra'))->search_palestra($id)->fetchObject(self::class);
    }
}

?>
