<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'lib/database/Connection.php';
require_once 'app/Controller/EventoController.php';
require_once 'app/Model/Evento_cls.php';

function Tratar($campo){
    return $VariavelTrat = preg_replace("/(select|insert|delete|alter table|drop|into|drop table|show tables|fwrite|fopen|unlink|mysql_query|mysqli|pdo|#|\*|--|\\\\)/i","",$campo);
}
$headerTopMargin = 30;
$mpdfConfig = array(
    'mode' => 'utf-8', 
    'format' => 'A4',    // format - A4, for example, default ''
    'default_font_size' => 0,     // font size - default 0
    'default_font' => '',    // default font family
    'margin_left' => 15,    	// 15 margin_left
    'margin_right' => 15,    	// 15 margin right
    'mgt' => $headerTopMargin,     // 16 margin top
    // 'mgb' => $footerTopMargin,    	// margin bottom
    'margin_header' => 4,     // 9 margin header
    'margin_footer' => 0,     // 9 margin footer
    'orientation' => 'P'  	// L - landscape, P - portrait
);

ob_start();

$eventid = Tratar($_GET['id']);
$objctEvento = Evento::SelEvento($eventid);
$media = Evento::listaMedia($eventid);
$info = Evento::listaInfo($eventid);
include_once('app/View/detalhepdf.php');

$html  = ob_get_contents(); //pega o conteudo e armazena na variavel saida
ob_end_clean();

$mpdf = new \Mpdf\Mpdf($mpdfConfig);	

$mpdf->SetHTMLHeader('
<div style="float:left; color: #aaa">
    <img src="app/Template/img/logo_header.png" width="90px"/>
    &nbsp; &nbsp;&nbsp;Centro Universitário Campus Alexandre Beldi Netto.
</div><hr>');

$mpdf->SetHTMLFooter('
<table width="100%" style="color: #aaa">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">Facens®</td>
    </tr>
</table>'); 

$mpdf->AddPage('P'); //orientação da página P = retrato
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

?>
