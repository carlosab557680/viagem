<?php
session_start();

$logado = $_SESSION["usr"];
$tipo = $_SESSION["tipo"];
$idGrupo = $_SESSION["idGrupo"];
define("userlog", $logado);
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="/evento/app/Template/css/default.css" type="text/css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="app/Template/img/favicon.ico">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>    
    </head>
    <div style="float:left; padding:2px; margin-top: 73px; margin-bottom: 5px; margin-left: 4%; position:absolute;">
        <a class="btn btn-outline-secondary" href="default.php?pagina=evento&metodo=listar" role="button">Início</a>
        <a class="btn btn-outline-secondary" href="default.php?pagina=evento&metodo=cadastrar" role="button">Evento</a>
        <?php
        if($tipo === "Eventos" || $idGrupo === '16'){
            ?>
            <a class="btn btn-outline-secondary" href="default.php?pagina=evento&metodo=cadastrarM" role="button">Evento para multiplos participantes</a>
            <?php
        }
        ?>
    </div>
    <div style="float:left; color: #666; padding:2px; margin-top: 40px; margin-left: 70%; position:absolute;">
        &nbsp;&nbsp;Usuário: <?php echo $logado; ?>
        <a class="dfcmsww" href="default.php?pagina=evento&metodo=listar"><b>&nbsp;Início</b></a> | 
        <a class="dfcmsww" href="default.php?pagina=evento&metodo=cadastrar"><b>&nbsp;Evento</b></a> |
        <a class="dfcmsww" href="index.php"><spam style="background-color:#df70df; padding: 4px"><b>&nbsp;Sair&nbsp;</b></spam></a>
    </div>
<?php               

/*
*Function valida login
*/
function logarin($sess1){ 
   if(!isset($sess1) || empty($sess1)){
        header('location: https://www3.facens.br/procedimentos/login');
    }
}
logarin($logado); //chama a funcao que valida o login
?>
<script type="text/javascript" src="lib/script/nicEdit.js"></script>
<!--<script type="text/javascript" src="lib/script/core.js" /> -->
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<?php

require_once 'app/core/Core.php';
require_once 'lib/Database/Connection.php';
require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';
require_once 'app/Controller/PostController.php';
require_once 'app/Controller/LoginController.php';
require_once 'app/Controller/UsuarioController.php';
require_once 'app/Controller/GrupoController.php';
require_once 'app/Controller/EventoController.php';
require_once 'app/Model/Grupo_cls.php';
require_once 'app/Model/Postagem_cls.php';
require_once 'app/Model/Login_cls.php';
require_once 'app/Model/Usuario_cls.php';
require_once 'app/Model/Evento_cls.php';
require_once 'app/Controller/SobreController.php';
require_once 'app/Controller/AdminController.php';

require_once 'vendor/autoload.php'; //para utilizar o componente twig e recaptcha

$template = file_get_contents('app/Template/mestre.html');

ob_start(); //start buffer saida
$core = new Core;
$core->start($_GET);

$saidaMenu = ob_get_contents(); //pega o conteudo e armazena na variavel saida
ob_end_clean();

//$tplPront = str_replace('{{area_menu}}', $saidaMenu,'{{area_dinamica}}', $saida, $template);
$tplPronto = str_replace('{{area_dinamica}}', $saidaMenu, $template);
$RenderizaPage = $tplPronto;
echo $RenderizaPage;

