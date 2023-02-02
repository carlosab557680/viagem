<?php

//namespace Logar;

class Grupo
{

/*----------------------------------------------------------------------------------------------*/
    public static function selectGrupos()
    {
		
        $con = Connection::getConn();//retorna o atributo Conn
        $sql = "select id, nome from tb_grupo ORDER BY nome ASC";
        $sql = $con->prepare($sql);//validacao da query
        $sql->execute();
        
        $resultado = array(); //array que sera carregado com o resultado da query
        
        while($row = $sql->fetchObject('Grupo')){ //cria um objeto da classe
            $resultado[] = $row;
        }
        if(count($resultado) >= 1){
            return $resultado;
        }else{
           throw new Exception("Nao foi encontrado nehum registro no BD"); 
        }
    }  

/*----------------------------------------------------------------------------------------------*/

	public static function update($dadosPost)
	{
		if(empty($dadosPost['nome'])){
			throw new Exception("Preencha todos os campos");
			return false;
		}
			
		$con = Connection::getConn();
		$sql = 'update `tb_grupo` set `nome` = :nome where `id` = :id';
		$sql =$con->prepare($sql);
		
		$sql->bindvalue(':nome', $dadosPost['nome']);
		$sql->bindvalue(':id', $dadosPost['id_gr']);

		if($sql->execute()){
			return TRUE;
		}  
	}

/*----------------------------------------------------------------------------------------------*/
	public static function delete($id)
	{
		$con = Connection::getConn();
		$sql = 'delete from `tb_grupo` where id = :id';
		$sql =$con->prepare($sql);
		$sql->bindvalue(':id', $id);
		$sql->execute();     
	}


/*----------------------------------------------------------------------------------------------*/
	public static function insertGrupo($dadosPost)
	{
		if(empty($dadosPost['insertnome'])){
			throw new Exception("Preencha todos os campos");
			return false;
		}
		$con = Connection::getConn();
		$sql = 'insert into `tb_grupo` (`nome`) values (:nome)';
		$sql =$con->prepare($sql);
		
		$sql->bindvalue(':nome', $dadosPost['insertnome']);
		//$sql->bindvalue(':descricao', $dadosPost['insertdescricao']);
		//$sql->bindvalue(':tipo', $dadosPost['tipo']);
		$sql->execute();     
	}
/*----------------------------------------------------------------------------------------------*/
	public static function insertUserGrupo($IdG, $IdU)
	{

		$con = Connection::getConn();
		
		$sql = 'insert into `tb_usergroup` (`id_user`, `id_gr`) values (:iduser, :idgr)';
		$sql =$con->prepare($sql);
		
		$sql->bindvalue(':idgr', $IdG);
		$sql->bindvalue(':iduser', $IdU);

		$sql->execute();     
	}
/*----------------------------------------------------------------------------------------------  */
	public static function delAppGrupo($GrId)
	{
		$con = Connection::getConn();
		
		/*
		* limpa a base se já possuir permissão
		*/
		$del = 'Delete from `tb_permissao` WHERE `id_gr` = :idg';
		$del =$con->prepare($del);
		$del->bindvalue(':idg', $GrId);
		$del->execute();  
	}
/*----------------------------------------------------------------------------------------------  */
	public static function delUsuGrupo($GrId)
	{
		$con = Connection::getConn();
		/*
		* limpa a base se já possuir permissão
		*/
		$del = 'Delete from `tb_usergroup` WHERE `id_gr` = :idg';
		$del =$con->prepare($del);
		$del->bindvalue(':idg', $GrId);
		$del->execute();  
	}
/*----------------------------------------------------------------------------------------------  */
	public static function insertAppGrupo($GrId, $Appl)
	{
		$con = Connection::getConn();
		$sql = 'insert into `tb_permissao` (`id_app`, `id_gr`) values (:idapp, :idgr)';
		$sql =$con->prepare($sql);
		$sql->bindvalue(':idgr', $GrId);
		$sql->bindvalue(':idapp', $Appl);
		$sql->execute();     
	}
/*----------------------------------------------------------------------------------------------  */
	public static function selAppGrp($GrId){
		//var_dump($GrId);
			$con = Connection::getConn();
			
			$query = 'SELECT distinct(app.id) as idapp, app.nome FROM tb_postagem app
			JOIN tb_permissao p
			ON p.id_app = app.id
			WHERE id_gr = :id';		
			
			$sth= $con->prepare($query);
			$sth->bindParam(':id',$GrId);

			$sth->execute(); // Query is executed successfully
			return $result = $sth->fetchAll(); // Returns the result of the query
			
	}
/*----------------------------------------------------------------------------------------------  */
	public static function selUsuGrp($GrId){
		//var_dump($GrId);
			$con = Connection::getConn();
			
			$query = 'SELECT u.id as idusu, u.nome FROM tb_usuario u
			JOIN tb_usergroup g
			ON g.id_user = u.id
			WHERE g.id_gr = :id';
				
			$sth= $con->prepare($query);
			$sth->bindParam(':id',$GrId);

			$sth->execute(); // Query is executed successfully
			return $result = $sth->fetchAll(); // Returns the result of the query
	}
/*----------------------------------------------------------------------------------------------  */
	public static function userVisao()
	{

		$con = Connection::getConn();
		
		$sql = 'SELECT u.id as user_id, u.nome AS user_nome, us.id_user, g.nome 
				FROM tb_usuario u
				LEFT JOIN tb_usergroup us
				ON u.id = us.id_user
				LEFT JOIN tb_grupo g
				ON g.id = us.id_gr';
        $sql = $con->prepare($sql);//validacao da query
        $sql->execute();
        
        $resultado = array(); //array que sera carregado com o resultado da query
        
        while($row = $sql->fetchObject('Grupo')){ //cria um objeto da classe
            $resultado[] = $row;
        }
        if(count($resultado) >= 1){
            return $resultado;
        }else{
           throw new Exception("Nao foi encontrado nehum registro no BD"); 
        }
	}


/*
    public static function selectVisao($id)
    {
		
        $con = Connection::getConn();//retorna o atributo Conn
        $sql2 = "SELECT p.id_app, a.nome, ug.id_gr, ug.id_user, u.nome as usuario  from tb_grupo g 
				JOIN tb_permissao p 
				ON g.id = p.id_gr
				JOIN tb_postagem a
				On a.id = p.id_app
				JOIN tb_usergroup ug
				ON ug.id_gr = g.id
				JOIN tb_usuario u
				ON u.id = ug.id_user
				WHERE g.id = :id";
				
		$sql = "SELECT p.id_app, a.nome as apnome, ug.id_gr, ug.id_user, g.nome as grupo from tb_grupo g 
				JOIN tb_permissao p 
				ON g.id = p.id_gr
				JOIN tb_postagem a
				On a.id = p.id_app
				JOIN tb_usergroup ug
				ON ug.id_gr = g.id
				WHERE g.id = '7'
				group by a.nome;
				";

		$statement = $con->query($sql);
		//return $publishers = $statement->fetchAll(PDO::FETCH_ASSOC);

        ///$sql = $con->prepare($sql);//validacao da query
		///$sql->bindvalue(':id', $id, PDO::PARAM_INT);
        //$sql->execute();	
		
        ///$resultado = array(); //array que sera carregado com o resultado da query
        
        ///while($row = $sql->fetchObject('Grupo')){ //cria um objeto da classe
            ///$resultado[] = $row;
        ///}
        ///if(count($resultado) >= 1){
            ///return $resultado;
        }else{
           throw new Exception("Nao foi encontrado nehum registro no BD"); 
        }
    }   
*/
}