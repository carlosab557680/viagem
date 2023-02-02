<?php

Class LoginController
{
    public function login()
    {
        try {
			function sdecode($string) {
				$data = str_replace(array('-','_'),array('+','/'),$string);
				$data = str_replace('a(2)','A',$data);
				$data = str_replace('i(1%)','E',$data);
				$data = str_replace('Ar2','M',$data);
				$data = str_replace('m@rCat9','b',$data);
				$data = str_replace('1967s','c',$data);
				$mod4 = strlen($data) % 4;
				if ($mod4) {
					$data .= substr('====', $mod4);
				}
				return base64_decode($data);
			}
				
			if($_GET['auths'] && !empty($_GET['auths'])){
					$auth = $_GET['auths'];
					$autUser = explode('#',sdecode(substr($auth, 8, -7)));	
					//echo $autUser[1];
					//echo date("Y-m-d H:i");
					//if(date("Y-m-d H:i") === $autUser[1]){
					if($autUser[2] === md5('core@facens')){
						$logado = $autUser[0];
						//$_SESSION['tipo'] = '1';
						//echo "usuario importado = ".$_SESSION["usr"] = $autUser[0];
						$colectPostagens = Login::loginAUTO($logado);
						
						//var_dump($colectPostagens);

						foreach ($colectPostagens as $login) {
							$tipo = $login['tipo']; //nome grupo
							$logado = $login['nome'];
							$idGrupo = $login['id_gr'];
			
							$_SESSION['usr'] = $logado;
							echo "grupo".$_SESSION['tipo'] = $tipo;
							echo "idg".$_SESSION['idGrupo'] = $idGrupo;
							header('location: default.php?pagina=evento&metodo=listar');
						}
					}
					//}
			}else{
				$colectPostagens = Login::loginAd($_POST); //classe Login - metodo login   
							
				if($_SERVER['REQUEST_METHOD'] === 'POST'){
					//if(!$_POST['g-recaptcha-response']){
					//	header('location: index.php');
					//}else{
						///$recaptcha = new ReCaptcha\ReCaptcha(SECRET);
						///$resp = $recaptcha->verify($_POST['g-recaptcha-response']);
						///if ($resp->isSuccess()){
							foreach ($colectPostagens as $login) {
								$tipo = $login['tipo']; //nome grupo
								$logado = $login['nome'];
								$idGrupo = $login['id_gr'];
				
								$_SESSION['usr'] = $logado;
								$_SESSION['tipo'] = $tipo;
								$_SESSION['idGrupo'] = $idGrupo;
								header('location: default.php?pagina=evento&metodo=listar');
							}	
						///}else{
							////header('location: index.php');
						///}
					//}
				}else{
					header('location: index.php');
				}
			}


		

        } catch (Exception $e) {
			header('location: default.php'); 
        }
    }
	
}

 
