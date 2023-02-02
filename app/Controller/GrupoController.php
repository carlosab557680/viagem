<?php
Class GrupoController
{
//-----------------------------------------------------------------------------------------
    public function grapp($id) //grupo app
    {
        try {
			$_SESSION["groupid"]=$id; 
            $colectGrupos = Postagem::listaTodosApps(); //classe Postagem - metodo selecionaTodos.
			$colectGr = Grupo::selAppGrp($id);
			
			foreach($colectGr as $selec){
				$sel = $sel.$selec['idapp'].","; //carrega o array que será gerado.
			}
			$NewArraySel = explode(',', $sel); //gera uma array com os ids selecionados.
			
			foreach($colectGrupos as $grupos){	
				if(in_array($grupos['id'], $NewArraySel)){	
					$Slct = "checked";				
				}else{
					$Slct = "";
				}
				$bList = $bList.$grupos['id']."<->".$grupos['nome']."<->".$Slct.'$';	
			}
		   include_once('app/View/grupoAPP.php');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
//-----------------------------------------------------------------------------------------
    public function gruser($id) //grupo app
    {
        try {
			session_start();
			$_SESSION["groupid"]=$id; 
            $colectUsers = Usuario::selUsuarios(); //classe Postagem - metodo selecionaTodos
			$colectUs = Grupo::selUsuGrp($id); //usuário por grupo
			foreach($colectUs as $selec){
				$sel = $sel.$selec['idusu'].","; //carrega o array que será gerado.
			}
			$NewArraySel = explode(',', $sel); //gera uma array com os ids dos usuarios.
			foreach($colectUsers as $usr){
				if(in_array($usr['id'], $NewArraySel)){	
					$Slct = "checked";				
				}else{
					$Slct = "";
				}
				$bList = $bList.$usr['id']."<->".$usr['nome']."<->".$Slct.'$';	
			}
		   include_once('app/View/grupoUS.php');   
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
//-----------------------------------------------------------------------------------------
    public function paramGr() //grupo app
    {
		session_start();
			$GrId = $_SESSION["groupid"];
			$Obj = $_POST;

			Grupo::delAppGrupo($GrId);
			
			foreach($Obj as $Appl){
				Grupo::insertAppGrupo($GrId, $Appl);//metodo dentro da model			
			}
			header('location: default.php?pagina=grupo&metodo=grapp&id='.$GrId.'&grn='.$_GET['grn'].'&a=1');
    }
//-----------------------------------------------------------------------------------------
    public function paramUs() //grupo app
    {
			$GrId = $_SESSION["groupid"];
			$Obj = $_POST;
			
			Grupo::delUsuGrupo($GrId);
			
			foreach($Obj as $Uss){
				Grupo::insertUserGrupo($GrId, $Uss);//metodo dentro da model grupo
			}
			header('location: default.php?pagina=grupo&metodo=gruser&id='.$GrId.'&grn='.$_GET['grn'].'&a=1');
    }
//-----------------------------------------------------------------------------------------
    public function listar()
    {
        try {
            $colectGrupos = Grupo::selectGrupos(); //classe Postagem - metodo selecionaTodos
                    
            $loader = new \Twig\Loader\FilesystemLoader('app/View'); //usando o componente twig
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('grupo.html');//carrega a view
            
            $parametros = array(); //variavel paramentros tipo array
            $parametros['grupos'] = $colectGrupos;//referencia e classe e metodo
            $conteudo = $template->render($parametros);//renderiza o conteudo da view
    
            echo $conteudo;
           
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
/*----------------------------------------------------------------------------------------------*/
  public function userVisao()
    {
        try {
			$idgrupo = $_GET['id'];
			
            $colectGrupos = Grupo::visao(); //classe Postagem - metodo selecionaTodos
			
			//var_dump($colectGrupos);
                    
            $loader = new \Twig\Loader\FilesystemLoader('app/View'); //usando o componente twig
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('userpermissao.html');//carrega a view
            $parametros = array(); //variavel paramentros tipo array
            $parametros['grupos'] = $colectGrupos;//referencia e classe e metodo
            $conteudo = $template->render($parametros);//renderiza o conteudo da view
            echo $conteudo;
           
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
//-----------------------------------------------------------------------------------------
    public function delete($id)
    {
        try {
            $colectGrupos = Grupo::delete($id);
            header('location: default.php?pagina=grupo&metodo=listar');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

/*----------------------------------------------------------------------------------------------*/
public function update($id) //metodo update
{
	try{
		Grupo::update($_POST);//metodo dentro da model
		echo  "<h1>Alteração efetuada!</h1>";
		?>
		<script>
			alert('Alteração efetuada com sucesso!');
			window.location = "default.php?pagina=grupo&metodo=listar";
		</script>
		<?php
		//header('location: default.php?pagina=grupo&metodo=listar');
	} catch (Exeption $e){
		echo $e->getMessage();
	}
}  
/*----------------------------------------------------------------------------------------------*/
public function insert() //metodo insert
{
    Grupo::insertGrupo($_POST);//metodo dentro da model
    header('location: default.php?pagina=grupo&metodo=listar');
}
/*----------------------------------------------------------------------------------------------*/

}

