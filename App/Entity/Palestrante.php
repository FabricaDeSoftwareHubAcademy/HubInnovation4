<?php

namespace App\Entity;
//importar class do banco de dados
use App\DB\Database;
use PDO;

class Palestrante{
    //Definindo os atributos
    public int $id_palestrante;
    public string $foto;
    public string $nome;
    public string $telefone;
    public string $email;
    public string $instagram;
    public string $linkedin;
    public string $responsavel;
    //Função cadastrar

    public function cadastrar(){
        //Instanciar banco
        $db = new Database('palestrante');
        //inserir palestra no banco
        //passando um array chave valor por parametro
        //retornando o id cadastrado
        $db->insert(
                                    [
                                        'foto' => $this->foto,
                                        'nome' => $this->nome,
                                        'telefone' => $this->telefone,
                                        'email' => $this->email,
                                        'instagram' => $this->instagram,
                                        'linkedin' => $this->linkedin,
                                        'responsavel' => $this->responsavel
                                    ]
                                    );

        //retornar sucesso
        return true;
    }

    
    public static function buscar($where = null,$order = null, $limit = null){
        //retorna o objeto do banco
        return (new Database('palestrante'))
        ->select($where,$order,$limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function filtrar($filter){
        return (new Database('palestrante'))
        ->filter($filter)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function get_idPalestrante($id){
        //Instancia uma nova Classe com os dados do ID
        return (new Database('palestrante'))->select('id_palestrante ='.$id)->fetchObject(self::class);
    }
}

?>
