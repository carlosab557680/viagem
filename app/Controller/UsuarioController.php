<?php

Class UsuarioController
{

//-----------------------------------------------------------------------------------------
    public function listar()
    {
        try {
            $colectUsuarios = Usuario::selectUsuarios(); //classe Postagem - metodo selecionaTodos
                    
            $loader = new \Twig\Loader\FilesystemLoader('app/View'); //usando o componente twig
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('usuario.html');//carrega a view
            
            $parametros = array(); //variavel paramentros tipo array
            $parametros['usuarios'] = $colectUsuarios;//referencia e classe e metodo
            $conteudo = $template->render($parametros);//renderiza o conteudo da view
    
            echo $conteudo;
            //var_dump($colectUsuarios);
           
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

//-----------------------------------------------------------------------------------------
    public function delete($nome)
    {
        try {
            $colectUsuarios = Usuario::delete($nome); //classe Postagem - metodo selecionaTodos
            header('location: default.php?pagina=usuario&metodo=listar');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

/*----------------------------------------------------------------------------------------------*/
public function update($id) //metodo update
{
    Usuario::update($_POST);//metodo dentro da model
    header('location: default.php?pagina=usuario&metodo=listar');
}  

/*----------------------------------------------------------------------------------------------*/
public function insert() //metodo insert
{
    Usuario::insertUsuario($_POST);//metodo dentro da model
    header('location: default.php?pagina=usuario&metodo=listar');
}

}

