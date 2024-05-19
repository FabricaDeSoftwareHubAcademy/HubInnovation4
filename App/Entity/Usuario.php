<?php

namespace App\Entity;
//importar class do banco de dados
use App\DB\Database;
use PDO;

class Usuario{
    //Definindo os atributos
    public int $id_usuario;
    public string $nome;
    public string $cpf;
    public string $email;
    public string $fone;
    public string $data_nasc;
    public string $sexo;
    public string $info;
    public string $lgpd;
    public string $id_palestra;
    //Função cadastrar

    public function cadastrar(){
        //Instanciar banco
        $db = new Database('usuario');
        $db->insert(
                                    [
                                        'nome' => $this->nome,
                                        'cpf' => $this->cpf,
                                        'email' => $this->email,
                                        'telefone' => $this->fone,
                                        'data_nasc' => $this->data_nasc,
                                        'sexo' => $this->sexo,
                                        'info' => $this->info,
                                        'lgpd' => $this->lgpd,
                                        'id_palestra' => $this->id_palestra
                                    ]
                                    );

        //retornar sucesso
        return true;
    }

        
    public static function contar(){
        //retorna o objeto do banco
        return (new Database('usuario'))
        ->count()
        ->fetchAll(PDO::FETCH_ASSOC);
    }

            
    public static function lista_relatorio($id_palestra){
        //retorna o objeto do banco
        return (new Database('usuario'))
        ->list_user_by_palestra($id_palestra)//COLOCAR O PARAMETRO
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    //função de filtrar usuários cadastrados nas palestras
    public static function filtrar($filter){
        return (new Database('usuario'))
        ->filter_by_user($filter)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

	//função para verificar se a pessoa se inscreveu em uma palestra
    public static function consulta_inscricao($id_palestra){
        //retorna o objeto do banco
        return (new Database('usuario'))
        ->search_inscritos($id_palestra)//COLOCAR O PARAMETRO
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }


    //função de filtrar usuários cadastrados nas palestras
    public static function busca_cpf($cpf,$id){
        $search = (new Database('usuario'))->filter_by_cpf($cpf,$id);

        if($search === false){
            return "ERROR";
        }else{
            return (new Database('usuario'))
            ->filter_by_cpf($cpf,$id)
            ->fetchAll(PDO::FETCH_ASSOC);
        }
    }

}

?>
