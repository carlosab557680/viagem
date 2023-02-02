<?php

Class AdminController
{
/*----------------------------------------------------------------------------------------------*/
    public function default() //metodo default
    {                        
        try {
            $id = $_REQUEST['id'];

            if(isset($id) && !empty($id)){
                $colectUsers = Postagem::SelUser($id); //seleciona determinado registro
            }else{
                $colectUsers = Postagem::listaUsersLemat(); //metodo selecionaTodos
            }
            include_once('app/View/lematusers.php');

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
/*----------------------------------------------------------------------------------------------*/
public function buscar() //metodo default
{
    try {
        $str = $_REQUEST['buscar'];
        $colectUsers = Postagem::BuscarUser($str); //seleciona determinado registro

        include_once('app/View/lematusers.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

/*----------------------------------------------------------------------------------------------*/
public function alter() //metodo default
{                        
    try {
        session_start();
        $id = $_POST['id'];
        $_SESSION['id'] = $id;
        $id =  $_SESSION['id'];

        $login = $_POST['login'];
        $s1 = $_POST['nsenha'];
        $s2 = $_POST['csenha'];

        if(isset($s1) && !empty($s2) && isset($s2) && !empty($s1)){
            if($s1 === $s2){
                $pwd = md5($s1);
                $colectUsers = Postagem::AlterPwd($id, $pwd); //seleciona determinado registro
                if($colectUsers == '1'){
                    echo "<h1>202: \"A senha de <b>".$login."</b> foi devidamente alterada\"!</h1>";
                    $colectUsers = Postagem::listaUsersLemat(); //metodo selecionaTodos
                    include_once('app/View/lematusersreturn.php');
                }
            }else{
                echo "<h1>403: Dados inválidos, \"A SENHA E A CONFIRMAÇÃO NÃO SÃO IGUAIS\"!</h1>";
                $colectUsers = Postagem::SelUser($id); //seleciona determinado registro
                include_once('app/View/lematusers.php');
            }
        }else{
            echo "<h1>403-2: Dados inválidos, \"A SENHA E A CONFIRMAÇÃO NÃO SÃO IGUAIS\"!</h1>";
            $colectUsers = Postagem::listaUsersLemat(); //metodo selecionaTodos
            include_once('app/View/lematusers.php');
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}



} //end class

