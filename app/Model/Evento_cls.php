<?php

class Evento
{
/*----------------------------------------------------------------------------------------------*/

public static function deletar($idevento)
{
    $con = Connection::getConn1();
    $sql = 'DELETE FROM tb_evento WHERE even_id = :id';

    $sql = $con->prepare($sql);
    $sql->bindvalue(':id', $idevento);

    if($sql->execute()){
       return TRUE;
    }
}
/*----------------------------------------------------------------------------------------------*/

public static function deletarM($idevento)
{
    $con = Connection::getConn1();
    $sql = 'DELETE FROM tb_preevento WHERE even_id = :id';

    $sql = $con->prepare($sql);
    $sql->bindvalue(':id', $idevento);

    if($sql->execute()){
       return TRUE;
    }
}
/*----------------------------------------------------------------------------------------------*/
public static function deletarMedia($idmedia)
{
    $con = Connection::getConn1();
    $sql = 'DELETE FROM tb_media WHERE med_id = :id';

    $sql = $con->prepare($sql);
    $sql->bindvalue(':id', $idmedia);

    if($sql->execute()){
       return TRUE;
    }
}
/*----------------------------------------------------------------------------------------------*/  
public static function SelEvento($id)
{
    $con = Connection::getConn1();

    $sql = "SELECT * FROM tb_evento WHERE even_id = '$id'";

    $statement = $con->query($sql);
    return $row = $statement->fetchAll(PDO::FETCH_ASSOC);
}	
/*----------------------------------------------------------------------------------------------*/  
public static function SelEventoM($id)
{
    $con = Connection::getConn1();

    $sql = "SELECT * FROM tb_preevento WHERE even_id = '$id'";

    $statement = $con->query($sql);
    return $row = $statement->fetchAll(PDO::FETCH_ASSOC);
}	
/*----------------------------------------------------------------------------------------------*/  
public static function listaEvento($usuario, $tipo)
{
    $con = Connection::getConn1();

    if(isset($tipo) && $tipo === 'Eventos'){
        $sql = "SELECT * FROM tb_evento ORDER BY even_id DESC";
    }else{
        $sql = "SELECT * FROM tb_evento WHERE login = '$usuario' ORDER BY even_id DESC";
    }
    $statement = $con->query($sql);
    return $row = $statement->fetchAll(PDO::FETCH_ASSOC);
}	
/*----------------------------------------------------------------------------------------------*/  
public static function listaEventoM($tipo)
{
    $con = Connection::getConn1();

    //if(isset($tipo) && $tipo === 'Eventos'){
        $sql = "SELECT * FROM tb_preevento ORDER BY even_id DESC";
    //}
    $statement = $con->query($sql);
    return $row = $statement->fetchAll(PDO::FETCH_ASSOC);
}
/*----------------------------------------------------------------------------------------------*/  
public static function ShowEventosM()
{
    $con = Connection::getConn1();

    $sql = "SELECT * FROM tb_preevento ORDER BY even_id DESC";

    $statement = $con->query($sql);
    return $row = $statement->fetchAll(PDO::FETCH_ASSOC);
}
/*----------------------------------------------------------------------------------------------*/  
public static function ShowEventosMS($id)
{
    $con = Connection::getConn1();

    $sql = "SELECT * FROM tb_preevento WHERE even_id = $id";

    $statement = $con->query($sql);
    return $row = $statement->fetchAll(PDO::FETCH_ASSOC);
}
/*----------------------------------------------------------------------------------------------*/  
public static function listaInfo($eventid)
{
    $con = Connection::getConn1();

    $sql = "SELECT * FROM tb_info WHERE even_id = '$eventid' ORDER BY even_id DESC";

    $statement = $con->query($sql);
    return $row = $statement->fetchAll(PDO::FETCH_ASSOC);
}

/*----------------------------------------------------------------------------------------------*/  
public static function listaMedia($eventId)
{
    $con = Connection::getConn1();

    $sql = "SELECT * FROM tb_media WHERE even_id = '$eventId' ORDER BY med_id DESC";

    $statement = $con->query($sql);
    return $row = $statement->fetchAll(PDO::FETCH_ASSOC);
}	
/*----------------------------------------------------------------------------------------------*/   
public static function listaCentroCusto()
{
    $con = Connection::getConn2();

    $sql = "SELECT id, descricao FROM frd_centro where ativo = '1'";

    $statement = $con->query($sql);

    return $row = $statement->fetchAll(PDO::FETCH_ASSOC);
}	 
/*----------------------------------------------------------------------------------------------*/   
public static function SelFuncionario($usuario)
{
    $con = Connection::getConnTotvs();
    $sql = "select a.usuario, a.nome, a.cpf, a.codigo_setor, a.setor from vw_func a  
    where (a.usuario = '$usuario' or a.usuarioad = '$usuario')  and codsituacao <> 'D';";
    $statement = $con->query($sql);
    return $row = $statement->fetchAll(PDO::FETCH_ASSOC);
}	
/*----------------------------------------------------------------------------------------------*/
public static function InserirEvento($dadosPost)
{
    //var_dump($dadosPost);
    $con = Connection::getConn1();

    if($dadosPost['dataf'] == '--'){
        $sql = 'INSERT INTO tb_evento (even_titulo, even_descricao, even_data, even_local, even_participante, cpf, centrocusto, login) 
        VALUES
        (:vartitulo, :vardescricao, :vardata, :varlocal, :varusuario, :varcpf, :varcentrocusto, :varlogin)';
            $sql = $con->prepare($sql);
    }else{
        $sql = 'INSERT INTO tb_evento (even_titulo, even_descricao, even_data, even_datafinal, even_local, even_participante, cpf, centrocusto, login) 
        VALUES
        (:vartitulo, :vardescricao, :vardata, :vardataf, :varlocal, :varusuario, :varcpf, :varcentrocusto, :varlogin)';
        $sql = $con->prepare($sql);
        $sql->bindvalue(':vardataf', $dadosPost['dataf']);
    }

    $sql->bindvalue(':vartitulo', $dadosPost['titulo']);
    $sql->bindvalue(':vardescricao', $dadosPost['descricao']);
    $sql->bindvalue(':vardata', $dadosPost['data']);
    $sql->bindvalue(':varlocal', $dadosPost['local']); 
    $sql->bindvalue(':varusuario', $dadosPost['usuario']);
    $sql->bindvalue(':varcpf', $dadosPost['cpf']);
    $sql->bindvalue(':varcentrocusto', $dadosPost['centrocusto']);
    $sql->bindvalue(':varlogin', $dadosPost['login']);

    if($sql->execute()){
       return TRUE;
    }
}
/*----------------------------------------------------------------------------------------------*/
public static function InserirEventoM($dadosPost)
{
    $con = Connection::getConn1();
    $sql = 'INSERT INTO tb_preevento (even_titulo, even_descricao, even_data, even_datafinal, even_local) 
    VALUES
	(:vartitulo, :vardescricao, :vardata, :vardataf, :varlocal)';
    $sql = $con->prepare($sql);
    $sql->bindvalue(':vartitulo', $dadosPost['titulo']);
    $sql->bindvalue(':vardescricao', $dadosPost['descricao']);
    $sql->bindvalue(':vardata', $dadosPost['data']);
    $sql->bindvalue(':vardataf', $dadosPost['dataf']);
    $sql->bindvalue(':varlocal', $dadosPost['local']); 
    if($sql->execute()){
       return TRUE;
    }
}
/*----------------------------------------------------------------------------------------------*/
public static function InserirInfo($dadosPost)
{
    $con = Connection::getConn1();
    $sql = 'INSERT INTO tb_info (even_id, inovacao, novidade, parceiro, concorrente) 
    VALUES (:even_id, :inovacao, :novidade, :parceiro, :concorrente)';
    $sql = $con->prepare($sql);
    $sql->bindvalue(':even_id', $dadosPost['eventid']);
    $sql->bindvalue(':inovacao', $dadosPost['inovacao']);
    $sql->bindvalue(':novidade', $dadosPost['novidade']);
    $sql->bindvalue(':parceiro', $dadosPost['parceiro']); 
    $sql->bindvalue(':concorrente', $dadosPost['concorrente']);

    if($sql->execute()){
       return TRUE;
    }
}

/*----------------------------------------------------------------------------------------------*/
public static function InsereMedia($even_id, $med_media, $med_comentario)
{
    $con = Connection::getConn1();
    $sql = 'INSERT INTO tb_media (even_id, med_media, med_comentario) 
    VALUES
	(:varid, :varmedia, :varcomentario)';
    $sql = $con->prepare($sql);
    $sql->bindvalue(':varid', $even_id);
    $sql->bindvalue(':varmedia', $med_media);
    $sql->bindvalue(':varcomentario', $med_comentario);

    if($sql->execute()){
       return TRUE;
    }
}

/*----------------------------------------------------------------------------------------------*/
public static function AlterarEvento($dadosPost)
{
    $con = Connection::getConn1();
    $sql = 'UPDATE tb_evento SET even_titulo = :vartitulo,
    even_descricao = :vardescricao,
    even_data = :vardata,
    even_datafinal = :vardataf,
    even_local = :varlocal,
    centrocusto = :varcentrocusto
    WHERE even_id = :varid';

    $sql = $con->prepare($sql);
    $sql->bindvalue(':vartitulo', $dadosPost['titulo']);
    $sql->bindvalue(':vardescricao', $dadosPost['descricao']);
    $sql->bindvalue(':vardata', $dadosPost['data']);
    $sql->bindvalue(':vardataf', $dadosPost['dataf']);
    $sql->bindvalue(':varlocal', $dadosPost['local']); 
    $sql->bindvalue(':varcentrocusto', $dadosPost['centrocusto']);
    $sql->bindvalue(':varid', $dadosPost['id']);

    if($sql->execute()){
       return TRUE;
    }
}
/*----------------------------------------------------------------------------------------------*/
public static function AlterarEventoM($dadosPost)
{
    $con = Connection::getConn1();
    $sql = 'UPDATE tb_preevento SET even_titulo = :vartitulo,
    even_descricao = :vardescricao,
    even_data = :vardata,
    even_datafinal = :vardataf,
    even_local = :varlocal
    WHERE even_id = :varid';

    $sql = $con->prepare($sql);
    $sql->bindvalue(':vartitulo', $dadosPost['titulo']);
    $sql->bindvalue(':vardescricao', $dadosPost['descricao']);
    $sql->bindvalue(':vardata', $dadosPost['data']);
    $sql->bindvalue(':vardataf', $dadosPost['dataf']);
    $sql->bindvalue(':varlocal', $dadosPost['local']); 
    $sql->bindvalue(':varid', $dadosPost['id']);

    if($sql->execute()){
       return TRUE;
    }
}

/*----------------------------------------------------------------------------------------------*/
}
