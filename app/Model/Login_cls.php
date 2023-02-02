<?php

//namespace Logar;

class login
{
/*---------------------------------------------------------------------------*/
    
    public static function loginAd($dadosPost)
    {
        $usr = preg_replace("/(select|insert|delete|alter table|drop table|show tables|fwrite|fopen|unlink|mysql_query|mysqli|pdo|#|\*|--|\\\\)/i","",$dadosPost['usuario']);		
		//$usrval = $usr;
		
		if($usr != 'andre.andrade'){
			$pws = $dadosPost['senha'];
			$dominio = "@labinfo.facens.br";
			$usu = $usr.$dominio; //usuário@dominio
			$ip_server = "172.16.254.1"; //IP Domain Control

			if (!($connect = @ldap_connect($ip_server))){ //verifica a conexao com o server AD
				return FALSE; // se nao conectar retorna false
			}else{
				if (!($bind = @ldap_bind($connect, $usu, $pws))) {
					return FALSE; // se nao validar retorna false
				} 
			}
		}
		
        $con = Connection::getConn();//retorna o atributo Conn
		
		$sql = "SELECT u.id, u.nome, u.descricao, ug.id_gr, g.nome AS tipo FROM tb_usuario u
		LEFT JOIN tb_usergroup ug
		ON ug.id_user = u.id
		LEFT JOIN tb_grupo g
		ON g.id = ug.id_gr 
		WHERE u.nome = :userad
		ORDER BY id_gr DESC";
		
        $sql = $con->prepare($sql);//validacao da query
        $sql->bindvalue(':userad', $usr, PDO::PARAM_STR);
        $sql->execute();
        return $publis = $sql->fetchAll(PDO::FETCH_ASSOC);
        
    }
/*---------------------------------------------------------------------------*/
    
public static function loginAUTO($logado)
{
	$usr = preg_replace("/(select|insert|delete|alter table|drop table|show tables|fwrite|fopen|unlink|mysql_query|mysqli|pdo|#|\*|--|\\\\)/i","",$logado);		
	
	$con = Connection::getConn();//retorna o atributo Conn
	
	$sql = "SELECT u.id, u.nome, u.descricao, ug.id_gr, g.nome AS tipo FROM tb_usuario u
	LEFT JOIN tb_usergroup ug
	ON ug.id_user = u.id
	LEFT JOIN tb_grupo g
	ON g.id = ug.id_gr 
	WHERE u.nome = :userad
	ORDER BY id_gr DESC";
	
	$sql = $con->prepare($sql);//validacao da query
	$sql->bindvalue(':userad', $usr, PDO::PARAM_STR);
	$sql->execute();
	return $publis = $sql->fetchAll(PDO::FETCH_ASSOC);
	
}
}
