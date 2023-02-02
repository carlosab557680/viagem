<?php

class Comentario{
    public static function selecionarComentarios($id)
    {
        $con = Connection::getConn();
        $sql = "select * from comentario where id_postagem = :id";
        $sql = $con->prepare($sql);
        $sql->bindvalue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        
        $resultado = array(); //array vazio que será carregado o retorno da query
        
        while($row = $sql->fetchobject('Comentario')){
            $resultado[] = $row;
        }
        return $resultado;
    }
}