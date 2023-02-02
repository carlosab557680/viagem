<?php

Class HomeController
{
    public function default()
    {
        try {
            $colectPostagens = Postagem::selecionaTodos(); //classe Postagem - metodo selecionaTodos
            
            //$colectPostagens = Postagem::selecionaUser(); //classe Postagem - metodo selecionaTodos
                        
            $loader = new \Twig\Loader\FilesystemLoader('app/View'); //usando o componente twig
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');//carrega a view
            
            $parametros = array(); //variavel paramentros tipo array
            //$parametros['nome'] = 'Homer'; teste apenas
            
            $parametros['postagens'] = $colectPostagens;//referencia e classe e metodo
            
            $conteudo = $template->render($parametros);//renderiza o conteudo da view
            
            if($_SESSION["tipo"] == 1){
                echo $conteudo;
            }
           
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }


    }
}

