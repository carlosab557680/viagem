<?php
function Tratar($campo){
    return $VariavelTrat = preg_replace("/(select|insert|delete|alter table|drop|into|drop table|show tables|fwrite|fopen|unlink|mysql_query|mysqli|pdo|#|\*|--|\\\\)/i","",$campo);
}
//require_once '../lib/database/Connection.php';
require_once '../app/Controller/EventoController.php';
require_once '../app/Model/Evento_cls.php';

$eventid = Tratar($_GET['id']);

require_once 'vendor/autoload.php';

// referenciando o namespace do dompdf

use Dompdf\Dompdf;

$nome_arquivo = "nome_arquivo";

ob_start();
echo "-->>".$eventid = Tratar($_GET['id']);
$conteudo  = ob_get_contents(); //pega o conteudo e armazena na variavel saida
ob_end_clean();

$dompdf = new Dompdf();

//$html= 'conteudo HTML '.$eventid; //Insira o seu HTML dentro desta variável


$dompdf->loadHtml($conteudo);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream($nome_arquivo);

?>