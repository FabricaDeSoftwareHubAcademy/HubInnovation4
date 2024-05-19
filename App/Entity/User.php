<?php

namespace App\Entity;
//importar class do banco de dados
use App\DB\Database;
use PDO;

class User{
    //Definindo os atributos
    public int $id_user;
    public string $nome;
    public string $email;
    //Função cadastrar

    public function hello(){
        echo "HELLOOOWW";
    }

    public function cadastrar(){
        //Instanciar banco
        $db = new Database('user');

        $recuperado  = $db->insert(
                                    [
                                        'nome' => $this->nome,
                                        'email' => $this->email
                                    ]
                                    );

        //retornar sucesso
        return $recuperado;
    }

}

?>