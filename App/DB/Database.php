<?php
/**
 * Autor: @Thiago Almeida
 */

namespace App\DB;
use PDO;
use PDOException;

class Database{

    private $conn;
    private string $local="localhost";
    private string $db="hub3";
    private string $user = "hubinnovation2";
    private string $password = "*38E22D5716B2B51B5C11EBD852A497C1D16A9897";
   private $table;

    public function __construct($table = null){
        $this->table = $table;
        $this->conecta();
    }

    private function conecta(){
        try {
            $this->conn = new PDO("mysql:host=".$this->local.";dbname=$this->db",$this->user,$this->password); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            //echo "Conectado com Sucesso!!";
        } catch (PDOException $err) {
            //retirar msg em produção
            die("Connection Failed " . $err->getMessage());
        }
    }

    public function execute($query,$binds = []){
        //BINDS = parametros
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;

        }catch (PDOException $err) {
            //retirar msg em produção
            die("Connection Failed " . $err->getMessage());
        }

    }

    public function insert($values){
        //DEBUG
        //echo "<pre>";print_r($values);echo "</pre>";
        //Dados query $fields=campos $binds=parametros
        $fields = array_keys($values);
        //$data = array_values($values); TESTE DE RECEBIMENTO
        $binds = array_pad([],count($fields),'?');

        //Montar query
        $query = 'INSERT INTO ' . $this->table .'  (' .implode(',',$fields). ') VALUES (' .implode(',',$binds).')';
        //DEBUG para saber se está montando a query corretamente
        // print_r($query);
        // print_r(array_values($values));
        
        //Método para executar a Query
        $this->execute($query,array_values($values));
    }

    public function select($where = null,$order = null,$limit = null,$fields = '*'){
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        //Método para montar a consulta/query
        $query ='SELECT '.$fields.' FROM ' .$this->table .' '.$where.' '.$order.' '.$limit;
        
        //Método para executar a consulta/query
        return $this->execute($query);
    }

    public function update($where,$values){
        $fields = array_keys($values);
        //Método para montar a consulta/query
        $query = 'UPDATE ' . $this->table .' SET '.implode('=?,',$fields). '=? WHERE '. $where;
        //Método para executar o update
        $this->execute($query,array_values($values));

        return true;
    }

    public function filter($filter,$fields='id_palestrante, nome',$where='nome',$order = "BY DESC"){
        //Método para montar a consulta/query
        $where = strlen($where) ? 'WHERE '.$where : '';
        $query ='SELECT '.$fields.' FROM ' .$this->table.' '.$where.' LIKE "%'.$filter.'%"';

        $result = $this->execute($query);

        if($result->rowCount() >= 1){
            return $result;
        }else{
            return "Palestrante não encontrado!";
        }
    }

    public function filter_by_idPalestra($filter){
        //Método para montar a consulta/query
        $query = 'SELECT palestra.titulo, ambiente.nome as ambiente, usuario.nome, usuario.cpf, palestra.data_palestra
        FROM palestra
        INNER JOIN palestrante
        ON palestra.id_palestrante = palestrante.id_palestrante
        INNER JOIN usuario 
        ON palestra.id_palestra = usuario.id_palestra
        INNER JOIN ambiente 
        ON ambiente.id_sala = palestra.sala
        WHERE palestra.id_palestra = '. $filter .'';

        $result = $this->execute($query);
        if($result->rowCount() >= 1){
            return $result;
        }else{
            return "Palestra não encontrada!";
        }
    }

    public function list_palestra(){
        $query ='SELECT palestra.id_palestra as id_palestra, palestra.titulo as titulo,
        palestra.descricao as descricao, palestra.vagas as vagas, palestra.sala as sala,
        palestra.insumos as insumos, palestrante.id_palestrante as id_palestrante,
        palestrante.nome as nome_palestrante
        FROM palestra INNER JOIN palestrante
        ON palestra.id_palestrante = palestrante.id_palestrante;';
        
        //Método para executar a consulta/query
        return $this->execute($query);
    }

    public function list_user_by_palestra($id){
        $query ='SELECT usuario.nome, usuario.cpf, usuario.telefone,usuario.email, palestra.id_palestra, palestra.titulo 
        FROM usuario 
        INNER JOIN palestra WHERE usuario.id_palestra = palestra.id_palestra AND palestra.id_palestra = '. $id .' ORDER BY usuario.nome ';
        
        //Método para executar a consulta/query
        return $this->execute($query);
    }

    public function search_inscritos($cpf){
        $query ='SELECT usuario.id_usuario, usuario.nome, usuario.cpf, usuario.telefone,usuario.email, palestra.id_palestra, palestra.titulo 
        FROM usuario 
        INNER JOIN palestra WHERE usuario.id_palestra = palestra.id_palestra AND usuario.cpf LIKE "%'.$cpf.'%"';
        
        //Método para executar a consulta/query
        return $this->execute($query);
    }

    public function search_cards(){
        //Método para montar a consulta/query
        $query = 'SELECT palestrante.id_palestrante,palestrante.nome as nome_palestrante,
        palestrante.foto,palestra.id_palestra,palestra.titulo as palestra,
        palestra.descricao, palestra.vagas, palestrante.instagram, palestrante.linkedin
        FROM `palestrante` INNER JOIN `palestra`
        ON palestra.id_palestrante = palestrante.id_palestrante
	ORDER BY palestrante.id_palestrante DESC';

        $result = $this->execute($query);
        if($result->rowCount() >= 1){
            return $result;
        }else{
            return "Palestra não encontrada!";
        }
    }

    public function search_palestra($id){
        //Método para montar a consulta/query
        $query = 'SELECT palestrante.id_palestrante,palestrante.nome as nome_palestrante,
        palestrante.foto,palestra.id_palestra,palestra.titulo as palestra,
        palestra.descricao as descricao, palestra.vagas as vagas, palestra.sala as sala
        FROM `palestrante` INNER JOIN `palestra`
        ON palestra.id_palestrante = palestrante.id_palestrante AND
        palestra.id_palestra = '. $id .'';

        $result = $this->execute($query);
        if($result->rowCount() >= 1){
            return $result;
        }else{
            return "Palestra não encontrada!";
        }
    }

    public function filter_palestra_by_id($id){
        //Método para montar a consulta/query
        $query = 'SELECT palestrante.id_palestrante,palestrante.nome as nome_palestrante,
        palestrante.foto as foto,palestra.id_palestra,palestra.titulo as titulo,
        palestra.descricao as descricao, palestra.vagas as vagas, palestra.sala as sala
        FROM `palestrante` INNER JOIN `palestra`
        ON palestra.id_palestrante = palestrante.id_palestrante AND palestra.id_palestra = '. $id .'';

        $result = $this->execute($query);
        if($result->rowCount() >= 1){
            return $result;
        }else{
            return "Palestra não encontrada!";
        }
    }

    public function filter_by_cpf($cpf,$id){
        //Método para montar a consulta/query
        $query = 'SELECT usuario.nome,usuario.cpf,palestra.id_palestra,palestra.titulo
        FROM usuario INNER JOIN palestra
        WHERE cpf = ' .$cpf. '  and palestra.id_palestra = '. $id .'';

        $result = $this->execute($query);
        if($result->rowCount() >= 1){
            return $result;
        }else{
            return false;
        }
    }


    public function filter_by_user($filter){
        //Método para montar a consulta/query
        $query ='SELECT palestra.titulo, ambiente.nome as ambiente, usuario.id_usuario, usuario.nome, usuario.cpf, palestra.data_palestra
        FROM palestra
        INNER JOIN palestrante
        ON palestra.id_palestrante = palestrante.id_palestrante
        INNER JOIN usuario 
        ON palestra.id_palestra = usuario.id_palestra
        INNER JOIN ambiente 
        ON ambiente.id_sala = palestra.sala
        WHERE usuario.nome LIKE "%'.$filter.'%"';

        $result = $this->execute($query);
        if($result->rowCount() >= 1){
            return $result;
        }else{
            return "Usuario não encontrado!";
        }
    }

    //funcao para contar o numero de usuarios inscritos
    public function count(){
        //Método para montar a consulta/query
        $query ='SELECT count(*) as numero_inscritos FROM usuario';
        
        //Método para executar a consulta/query
        return $this->execute($query);
    }

    public function delete($where){
        //montar a query
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        $this->execute($query);
        return true;
    }

}

?>
