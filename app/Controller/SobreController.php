<?php

Class SobreController
{
    public function default()
    {                        
        $loader = new \Twig\Loader\FilesystemLoader('app/View'); //usando o componente twig
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('sobre.html');//carrega a view

        //var_dump($postagem);

        $parametros = array(); //variavel paramentros tipo array

        $conteudo = $template->render($parametros);//renderiza o conteudo da view

        echo $conteudo;
            
           


    }
}

