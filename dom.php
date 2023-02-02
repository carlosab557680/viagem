<?php

require_once 'vendor/autoload.php';

// referenciando o namespace do dompdf

use Dompdf\Dompdf;

$nome_arquivo = "nome_arquivo";

$dompdf = new Dompdf();

$html= 'conteudo HTML '; //Insira o seu HTML dentro desta variável

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream($nome_arquivo);

?>