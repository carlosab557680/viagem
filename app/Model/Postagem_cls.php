<?php

class Postagem
{
/*----------------------------------------------------------------------------------------------*/    
    public static function listaUsersLemat()
    {
        $con = Connection::getConn();//retorna o atributo Conn
        $sql = "select * from usuario where UsuarioId != '1' ORDER BY Nome ASC";
        $statement = $con->query($sql);
		return $publishers = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

/*----------------------------------------------------------------------------------------------*/  
public static function SelUser($id)
{
    $con = Connection::getConn();//retorna o atributo Conn
    $sql = "select * from usuario where UsuarioId = $id";
    $statement = $con->query($sql);
    return $publishers = $statement->fetchAll(PDO::FETCH_ASSOC);
}
/*----------------------------------------------------------------------------------------------*/  
public static function BuscarUser($str)
{
    $con = Connection::getConn();//retorna o atributo Conn
    $sql = "select * from usuario where Nome like '%$str%'";

    $statement = $con->query($sql);
    return $publishers = $statement->fetchAll(PDO::FETCH_ASSOC);
}

/*----------------------------------------------------------------------------------------------*/  
    public static function SelUser22($id)
    {
        $con = Connection::getConn();
        $sql = "select * from usuario where UsuarioId = :id";

        $sql = $con->prepare($sql);
        $sql->bindvalue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        //$resultado = $sql->fetchobject('Postagem');//cria um objeto com o resultado da query

        while($row = $sql->fetchObject('Postagem')){//cria um objeto da classe Postagem
            return $row;
        }

    }
/*----------------------------------------------------------------------------------------------*/   
public static function selecionaTarefa($idPost)
{
    $con = Connection::getConn1();
    $sql = "SELECT id, usuario, titulo, descricao, categoria, status
    FROM tarefas WHERE id = :id";

    $sql = $con->prepare($sql);
    $sql->bindvalue(':id', $idPost, PDO::PARAM_STR);
    $sql->execute();

    while($row = $sql->fetchObject()){//cria um objeto da classe Postagem
        return $row;
    }

}	 
/*----------------------------------------------------------------------------------------------*/
public static function AlterPwd($id, $s1)
{
    $con = Connection::getConn();
    $sql = 'update usuario set Senha = :pwd WHERE UsuarioId = :id';
    $sql =$con->prepare($sql);
    
    $sql->bindvalue(':id', $id);
    $sql->bindvalue(':pwd', $s1);

    if($sql->execute()){
        return TRUE;
    }  
}

/*----------------------------------------------------------------------------------------------*/
}
