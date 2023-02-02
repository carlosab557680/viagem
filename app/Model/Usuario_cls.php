<?php

//namespace Logar;

class Usuario
{
    /*
	private $usuario;
    private $senha;
    
    public function setusuario($usuario) 
    {
        $this->usuario = $usuario;
    }
    function setsenha($senha)
    {
        $this->senha = $senha;
    }
	*/

/*----------------------------------------------------------------------------------------------*/
    public static function selectUsuarios()
    {
        $con = Connection::getConn();//retorna o atributo Conn
        //$sql = "select id, nome, descricao, tipo from tb_usuario ORDER BY nome ASC";
		
		$sql = "SELECT u.id, u.nome, u.descricao, u.tipo as tp, ug.id_gr, g.nome AS tipo FROM tb_usuario u
		LEFT JOIN tb_usergroup ug
		ON ug.id_user = u.id
		LEFT JOIN tb_grupo g
		ON g.id = ug.id_gr ORDER BY u.nome ASC";
		
        $sql = $con->prepare($sql);//validacao da query
        $sql->execute();
        
        $resultado = array(); //array que sera carregado com o resultado da query
        
        while($row = $sql->fetchObject('Usuario')){ //cria um objeto da classe
            $resultado[] = $row;
        }
        if(count($resultado) >= 1){
            return $resultado;
        }else{
           throw new Exception("Nao foi encontrado nehum registro no BD"); 
        }
    }         
 /*----------------------------------------------------------------------------------------------*/
    public static function selUsuarios()
    {
        $con = Connection::getConn();//retorna o atributo Conn
        $sql = "select id, nome from tb_usuario ORDER BY nome ASC";            
		$statement = $con->query($sql);
		return $publishers = $statement->fetchAll(PDO::FETCH_ASSOC);
    }     
/*----------------------------------------------------------------------------------------------*/    
public static function update($dadosPost)
{
    if(empty($dadosPost['nome']) or empty($dadosPost['descricao'])){
        throw new Exception("Preencha todos os campos");
        return false;
    }
    $con = Connection::getConn();
    $sql = 'update `tb_usuario` set `descricao` = :descricao, `tipo` = :tipo where `nome` = :nome';
    $sql =$con->prepare($sql);
    
    $sql->bindvalue(':nome', $dadosPost['nome']);
    $sql->bindvalue(':descricao', $dadosPost['descricao']);
    $sql->bindvalue(':tipo', $dadosPost['tipo']);

    if($sql->execute()){
        return TRUE;
    }  
}

/*----------------------------------------------------------------------------------------------*/
public static function delete($nome)
{
    $con = Connection::getConn();
    $sql = 'delete from `tb_usuario` where nome = :nome';
    $sql =$con->prepare($sql);
    $sql->bindvalue(':nome', $nome);
    $sql->execute();     
}


/*----------------------------------------------------------------------------------------------*/
public static function insertUsuario($dadosPost)
{
    if(empty($dadosPost['insertnome'])){
        throw new Exception("Preencha todos os campos");
        return false;
    }
    $con = Connection::getConn();
    $sql = 'insert into `tb_usuario` (`nome`, `descricao`, `tipo`) values (:nome, :descricao, :tipo)';
    $sql =$con->prepare($sql);
    
    $sql->bindvalue(':nome', $dadosPost['insertnome']);
    $sql->bindvalue(':descricao', $dadosPost['insertdescricao']);
    $sql->bindvalue(':tipo', $dadosPost['tipo']);
    $sql->execute();     
}
/*----------------------------------------------------------------------------------------------*/  
}
