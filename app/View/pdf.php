<?php
// Require composer autoload
//require_once __DIR__ . '/vendor/autoload.php';

//require_once 'vendor/autoload.php';
//require_once 'lib/database/Connection.php';
//require_once 'app/Model/Postagem_cls.php';

///$colectPostagens = Postagem::selecionaPorId('1');//metodo dentro da model  

//var_dump($colectPostagens);
//$loader = new \Twig\Loader\FilesystemLoader('app/View'); //usando o componente twig
//$twig = new \Twig\Environment($loader);
//$template = $twig->load('detalhepdf.html');//carrega a view
//$parametros = array(); //variavel paramentros tipo array
//$parametros['detalhe'] = $colectPostagens;//referencia e classe e metodo
//$conteudo = $template->render($parametros);//renderiza o conteudo da view     
//echo $conteudo;
$conteudo = "Parangaricotirrimiruaro";

$html = $conteudo;

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();


