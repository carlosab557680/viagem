<?php

Class EventoController
{
    protected function Tratar($campo){
        return $VariavelTrat = preg_replace("/(select|insert|delete|alter table|drop|into|drop table|show tables|fwrite|fopen|unlink|mysql_query|mysqli|pdo|#|\*|--|\\\\)/i","",$campo);
    }
    protected function TratarImagem($nomeform){
        $foto_temp = $_FILES[$nomeform]['tmp_name'];
        $foto_nome = $_FILES[$nomeform]['name'];
        $tipo = $_FILES[$nomeform]['type'];
        if($tipo == "image/jpeg" or $tipo == "image/pjpeg" or $tipo == "image/jpg" or $tipo == "image/JPG" or $tipo == "image/JPEG" or $tipo == "image/x-png" or $tipo == "image/png" or $tipo == "image/PNG" or $tipo == "image/gif" or$tipo == "image/GIF"){
            $ext = strtolower(substr($foto_nome,-4)); // obter a extencao do arquivo
            $new_name = "img".date("YmdHis") . $ext; // renomeando o arquivo
            $dir = './app/Template/media/'; // pasta destino
            move_uploaded_file($foto_temp, $dir.$new_name); //Fazer upload do arquivo
            return $new_name;
            exit;
        }else{
            return false;
            exit;
        }
    }
/*----------------------------------------------------------------------------------------------*/
    public function cadastrar()
    {                        
        try {
            $logado = $_SESSION["usr"];
            //$tipo = $_SESSION["tipo"];
            //$idGrupo = $_SESSION["idGrupo"];
            $idsel = $this->Tratar($_GET['sel']);

            $usr = Evento::SelFuncionario($logado); //lista os dados do usuário logado.
            $cc = Evento::listaCentroCusto(); //lista os Centros de Custo.
            $eve = Evento::ShowEventosM(); //lista os Centros de Custo.
            if(isset($idsel) && !empty($idsel)){
                $selid = Evento::ShowEventosMS($idsel); //lista os Centros de Custo.
            }
            include_once('app/View/evento.php');

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
/*----------------------------------------------------------------------------------------------*/
public function cadastrarM()
{                        
    try {
        //$logado = $_SESSION["usr"];
        //$usr = Evento::SelFuncionario($logado); //lista os dados do usuário logado.
        //$cc = Evento::listaCentroCusto(); //lista os Centros de Custo.

        include_once('app/View/eventoM.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
/*----------------------------------------------------------------------------------------------*/
public function foto()
{                        
    try {
        $eventid = $this->Tratar($_GET['id']);
        $media = Evento::listaMedia($eventid);

        include_once('app/View/foto.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
/*----------------------------------------------------------------------------------------------*/
public function info()
{                        
    try {
        $eventid = $this->Tratar($_GET['id']);
        $even = Evento::SelEvento($eventid);


        include_once('app/View/info.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
//-------------------------------------------------------------------------
public function consolidado()
{                        
    try {
    //ob_start();
    $eventid = $this->Tratar($_GET['id']);
    $objctEvento = Evento::SelEvento($eventid);
    $media = Evento::listaMedia($eventid);
    $info = Evento::listaInfo($eventid);
    include_once('app/View/detalhepdf.php');
    //echo $htmlp  = ob_get_contents(); //pega o conteudo e armazena na variavel saida

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
/*----------------------------------------------------------------------------------------------*/
public function img()
{                        
    try {
        $eventid = $this->Tratar($_POST['eventid']);
        $comentario = $this->Tratar($_POST['comentario']);

        if($this->TratarImagem('foto')){
           $media = Evento::InsereMedia($eventid, $this->TratarImagem('foto'),  $comentario); // inserir no banco;
           header('Location: default.php?pagina=evento&metodo=foto&id='.$eventid.'&error=false');
        }else{
            header('Location: default.php?pagina=evento&metodo=foto&id='.$eventid.'&error=true');
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
/*----------------------------------------------------------------------------------------------*/
public function editar()
{                        
    try {
        $logado = $_SESSION["usr"];
        $tipo = $_SESSION["tipo"];
        $idGrupo = $_SESSION["idGrupo"];

        $idevento = $this->Tratar($_GET['id']);
        $even = Evento::SelEvento($idevento);

        foreach($even as $event){
            $usuariolog = $event['login'];
        }

        $usr = Evento::SelFuncionario($usuariolog); //lista os dados do usuário logado.

        $cc = Evento::listaCentroCusto(); //lista os Centros de Custo.
        include_once('app/View/editar.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
/*----------------------------------------------------------------------------------------------*/
public function editarM()
{                        
    try {
        //$logado = $_SESSION["usr"];
        //$tipo = $_SESSION["tipo"];
        //$idGrupo = $_SESSION["idGrupo"];

        $idevento = $this->Tratar($_GET['id']);
        $even = Evento::SelEventoM($idevento);

        //foreach($even as $event){
        //    $usuariolog = $event['login'];
        //}
        //$usr = Evento::SelFuncionario($usuariolog); //lista os dados do usuário logado.
        //$cc = Evento::listaCentroCusto(); //lista os Centros de Custo.

        include_once('app/View/editarM.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
/*----------------------------------------------------------------------------------------------*/
        public function deletar()
        {                        
            try {
                $idevento = $this->Tratar($_GET['id']);
                $obj = Evento::deletar($idevento); //lista os Centros de Custo.

                if($obj == '1'){
                    header('Location: default.php?pagina=evento&metodo=listar');
                }
    
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
/*----------------------------------------------------------------------------------------------*/
public function deletarM()
{                        
    try {
        $idevento = $this->Tratar($_GET['id']);
        $obj = Evento::deletarM($idevento); //lista os Centros de Custo.

        if($obj == '1'){
            header('Location: default.php?pagina=evento&metodo=listarM');
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
/*----------------------------------------------------------------------------------------------*/
public function deletarMedia()
{                        
    try {
        $idmedia = $this->Tratar($_GET['id']);
        $idevento = $this->Tratar($_GET['evnt']);
        $media = $this->Tratar($_GET['mda']);
    
        $obj = Evento::deletarMedia($idmedia); //remove a entrada no BD.

        if($obj == '1'){
            unlink('./app/Template/media/'.$media); //remove a imagem da pasta.
            header('Location: default.php?pagina=evento&metodo=foto&id='.$idevento);
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
/*----------------------------------------------------------------------------------------------*/
        public function listar()
        {                        
            try {
                $logado = $_SESSION["usr"];
                $tipo = $_SESSION["tipo"];
                $eventList = Evento::listaEvento($logado, $tipo); // lista os eventos. viagens por usuário
                include_once('app/View/listar.php');
    
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    /*----------------------------------------------------------------------------------------------*/
    public function listarM()
    {                        
        try {
            //$logado = $_SESSION["usr"];
            $tipo = $_SESSION["tipo"];
            $eventList = Evento::listaEventoM($tipo); // lista os eventos. viagens por usuário
            include_once('app/View/listarM.php');

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    /*----------------------------------------------------------------------------------------------*/
    public function inserir()
    {                        
        try {
            $logado = $_SESSION["usr"];
            $objdata = $this->Tratar($_POST['data']);
            $n = explode('/', $objdata);
            $CvtData = $n[2]."-".$n[1]."-".$n[0]; //padrao data
            $objdataf = $this->Tratar($_POST['dataf']);
            $nf = explode('/', $objdataf);
            $CvtDataf = $nf[2]."-".$nf[1]."-".$nf[0]; //padrao data
            $dadosPost = array( //aqui eu crio um array com os dados do formulário com o tratamento para injection
                'usuario'     => $this->Tratar($_POST['usuario']),
                'titulo'      => $this->Tratar($_POST['titulo']),
                'data'        => $CvtData,
                'dataf'        => $CvtDataf,
                'local'       => $this->Tratar($_POST['local']),
                'descricao'   => $this->Tratar($_POST['descricao']),
                'cpf'         => $this->Tratar($_POST['cpf']),
                'centrocusto' => $this->Tratar($_POST['centrocusto']),
                'login' => $logado
            );
            $Insere = Evento::InserirEvento($dadosPost);
            header('Location: default.php?pagina=evento&metodo=listar');

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    /*----------------------------------------------------------------------------------------------*/
    public function inserirM()
    {                        
        try {
            $objdata = $this->Tratar($_POST['data']);
            $n = explode('/', $objdata);
            $CvtData = $n[2]."-".$n[1]."-".$n[0]; //padrao data
            $objdataf = $this->Tratar($_POST['dataf']);
            $nf = explode('/', $objdataf);
            $CvtDataf = $nf[2]."-".$nf[1]."-".$nf[0]; //padrao data
            $dadosPost = array( //aqui eu crio um array com os dados do formulário com o tratamento para injection
                'titulo'      => $this->Tratar($_POST['titulo']),
                'data'        => $CvtData,
                'dataf'       => $CvtDataf,
                'local'       => $this->Tratar($_POST['local']),
                'descricao'   => $this->Tratar($_POST['descricao']),
            );
            $Insere = Evento::InserirEventoM($dadosPost);
            header('Location: default.php?pagina=evento&metodo=listarM');

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    /*----------------------------------------------------------------------------------------------*/
    public function inserirInfo()
    {                        
        try {
            $dadosPost = array( //aqui eu crio um array com os dados do formulário com o tratamento para injection
                'inovacao'    => $this->Tratar($_POST['inovacao']),
                'novidade'    => $this->Tratar($_POST['novidade']),
                'parceiro'    => $this->Tratar($_POST['parceiro']),
                'concorrente' => $this->Tratar($_POST['concorrente']),
                'eventid'     => $this->Tratar($_POST['eventid'])
            );
            $Insere = Evento::InserirInfo($dadosPost);
            ///header('Location: default.php?pagina=evento&metodo=listar');

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

/*----------------------------------------------------------------------------------------------*/
    public function alterar()
    {                        
        try {
            $objdata = $this->Tratar($_POST['data']);
            $objdataf = $this->Tratar($_POST['dataf']);

            $n = explode('/', $objdata);
            $CvtData = $n[2]."-".$n[1]."-".$n[0]; //padrao data

            $nf = explode('/', $objdataf);
            $CvtDataf = $nf[2]."-".$nf[1]."-".$nf[0]; //padrao data

            $dadosPost = array( //aqui eu crio um array com os dados do formulário com o tratamento para injection
                'titulo'      => $this->Tratar($_POST['titulo']),
                'data'        => $CvtData,
                'dataf'        => $CvtDataf,
                'local'       => $this->Tratar($_POST['local']),
                'descricao'   => $this->Tratar($_POST['descricao']),
                'centrocusto' => $this->Tratar($_POST['centrocusto']),
                'id' => $this->Tratar($_POST['eventid'])
            );

            $Insere = Evento::AlterarEvento($dadosPost);

            header('Location: default.php?pagina=evento&metodo=listar');

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
/*----------------------------------------------------------------------------------------------*/
public function alterarM()
{                        
    try {
        $objdata = $this->Tratar($_POST['data']);
        $objdataf = $this->Tratar($_POST['dataf']);
        $n = explode('/', $objdata);
        $CvtData = $n[2]."-".$n[1]."-".$n[0]; //padrao data
        $nf = explode('/', $objdataf);
        $CvtDataf = $nf[2]."-".$nf[1]."-".$nf[0]; //padrao data

        $dadosPost = array( //aqui eu crio um array com os dados do formulário com o tratamento para injection
            'titulo'      => $this->Tratar($_POST['titulo']),
            'data'        => $CvtData,
            'dataf'        => $CvtDataf,
            'local'       => $this->Tratar($_POST['local']),
            'descricao'   => $this->Tratar($_POST['descricao']),
            'id' => $this->Tratar($_POST['eventid'])
        );

        $Insere = Evento::AlterarEventoM($dadosPost);

        header('Location: default.php?pagina=evento&metodo=listarM');

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
/*----------------------------------------------------------------------------------------------*/
    public function default() //metodo default
    {                        
        try {
            include_once('app/View/evento.php');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
/*----------------------------------------------------------------------------------------------*/

} 

