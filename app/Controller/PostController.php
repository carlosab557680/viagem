<?php

Class PostController
{
    public function default($params)
    {
        try {
            $postagem = Postagem::selecionaPorId($params); //classe Postagem - metodo selecionaTodos
                        
            $loader = new \Twig\Loader\FilesystemLoader('app/View'); //usando o componente twig
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');//carrega a view
            
            //var_dump($postagem);
            
            $parametros = array(); //variavel paramentros tipo array
            $parametros['titulo'] = $postagem->titulo;
            $parametros['conteudo'] = $postagem->conteudo;
            $parametros['comentarios'] = $postagem->comentarios;
             
            $conteudo = $template->render($parametros);//renderiza o conteudo da view
            
            echo $conteudo;
            
           
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }


    }
}

