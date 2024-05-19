<?php

namespace App\Entity;
//importar class do banco de dados
use App\DB\Database;
use PDO;

class Colaborador{
    //Definindo os atributos
    public int $id_colab;
    public string $nome;
    public string $matricula;
    public string $email;
    public string $senha;
    public string $cargo;
    //Função cadastrar

    public function cadastrar(){
        //Instanciar banco
        $db = new Database('colaborador');
        //inserir palestra no banco
        //passando um array chave valor por parametro
        //retornando o id cadastrado
        $db->insert(
                                    [
                                        'nome' => $this->nome,
                                        'matricula' => $this->matricula,
                                        'email' => $this->email,
                                        'senha' => $this->senha,
                                        'cargo' => $this->cargo
                                    ]
                                    );

        //retornar sucesso
        return true;
    }

    public static function buscar($where = null,$order = null, $limit = null){
        //Já faz o FetchALL da classe
        return (new Database('colaborador'))
        ->select($where,$order,$limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function colab_by_mail($email){
        //Já faz o FetchALL da classe
        return (new Database('colaborador'))
        ->select('email="'.$email.'"')
        ->fetchObject(self::class);
    }

}

?>