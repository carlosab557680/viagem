<?
function redimensiona_imagens($comprimento,$altura,$uploaddir,$imagename,$qualidade,$tipo,$imagem_prefixo,$nome)
{
	 $imagepath = $imagename;
           $save = $uploaddir. $nome . "_".$imagem_prefixo.".jpg"; //This is the new file you saving
	      $file = $uploaddir.$imagem_prefixo.".jpg"; //This is the original file

              list($width, $height) = getimagesize($file); 
              if($height>$width){		
	      $modwidth = $altura ;
	      }
              else{
	      $modwidth = $comprimento ; 
	      }                                                 
              $diff = $width / $modwidth;                                           
              $modheight = $height / $diff; 
              $tn = imagecreatetruecolor($modwidth, $modheight) ; 
              //$image = imagecreatefromjpeg($file) ;
				if($tipo == "image/jpeg" or $tipo == "image/pjpeg" or $tipo == "image/jpg" or $tipo == "image/JPG" or $tipo == "image/JPEG"){
	   				$image = imagecreatefromjpeg($file);
				}elseif($tipo == "image/x-png" or $tipo == "image/png" or $tipo == "image/PNG"){
       				$image = imagecreatefrompng($file);
       			}elseif($tipo == "image/gif" or$tipo == "image/GIF"){
       		 		$image = imagecreatefromgif($file);
        		}
				
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;                                           
              imagejpeg($tn, $save, $qualidade) ;
}

//ini_set("memory_limit","50M");
function gera_imagens($imagem_prefixo,$url,$tipo){
$qualidade = 72; //Qualidade das novas imagens geradas
// Diretório de Upload: para o funcionamento deve ter a permissão 777
//$uploaddir = "../../images/materia/"; // pasta onde serão geradas as imagens
$uploaddir = $url;
// Lista de arquivos não permitidos?
$badfiles = array(".php", ".phtml", ".php3", ".php4", ".php5", ".exe", ".js",".html", ".htm", ".inc", ".bin", ".dmg", ".swf", ".app", ".asp", ".aspx", ".dll", ".cgi", ".pif", ".doc", ".xls",".jar");
 // allowed filetypes
$allowed_filetypes = array('.pjpg', '.PJPG','.jpg', '.JPG','.jpeg','.JPEG','.gif','.GIF','.png','.PNG');
if (!is_dir($uploaddir)) {
	die ("Upload directory does not exists.");
}
if (!is_writable($uploaddir)) {
	die ("Upload directory is not writable.");
}
if ($_POST['submit']) {
	if (isset($_FILES['foto'])) {
		if ($_FILES['foto']['error'] != 0) {
			switch ($_FILES['foto']['error']) {
				case 1:
					print 'O arquivo excedeu o limite de tamanho permitido!'; //  alterar o php ini para por exemplo upload_max_filesize = 10M ; o default do php é 2MB
					break;
				case 2:
					print 'O arquivo excedeu o limite de tamanho permitido!'; // form max file size error - DEPRECATED
					break;
				case 3:
					print 'O arquivo foi salvo apenas parcialmente, por favor tente novamente ! ';
					break;
				case 4:
					print 'Nenhum arquivo foi salvo';
					break;
				case 6:
					print "Erro de Pasta.";
					break;
				case 7:
					print "Falha ao gravar arquivo!";
					break;
				case 8:
					print "Upload interrompido pela extensão!";
					break;
			}
		} else {
			foreach ($badfiles as $item) {
				if (preg_match("/$item$/i", $_FILES['foto']['name'])) {
					echo "Arquivo Inválido!";
					unset($_FILES['foto']['tmp_name']);
					exit;
				}
			}
			// Pega a extensão do arquivo.
			$ext = substr($_FILES['foto']['name'], strpos($_FILES['foto']['name'],'.'), strlen($_FILES['foto']['name'])-1);
			// Check if the filetype is allowed, if not DIE and inform the user.
			if(!in_array($ext,$allowed_filetypes)){
				die('Formato de arquivo não permitido.');
			}
			if (!file_exists($uploaddir . $_FILES["foto"]["name"])) {
				// Proceed with file upload
				if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
					//File was uploaded to the temp dir, continue upload process
					
					if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploaddir.$imagem_prefixo.".jpg")) {
						// uploaded file was moved and renamed succesfuly. Display a message.
						//echo "Arquivo salvo com sucesso!";
					} else {
						echo "Erro durante o upload, Por favor entre em contato com o webmaster.";
						unset($_FILES['foto']['tmp_name']);
					}
				} else {
					//File was NOT uploaded to the temp dir
					switch ($_FILES['foto']['error']) {
						case 1:
							print 'O arquivo excedeu o limite de tamanho permitido!'; // php installation max file size error
							break;
						case 2:
							print 'O arquivo excedeu o limite de tamanho permitido!'; // form max file size error
							break;
						case 3:
							print 'O arquivo foi salvo apenas parcialmente, por favor tente novamente !';
							break;
						case 4:
							print 'Nenhum arquivo foi salvo';
							break;
						case 6:
							print "Erro de Pasta.";
							break;
						case 7:
							print "Falha ao gravar arquivo!";
							break;
						case 8:
							print "Salvamento interrompido pela extensão!";
							break;
					}
				}
			} else { // There's a file with the same name
				echo "Arquivo já existente, Por favor renomeie o arquivo e tente novamente.";
				unset($_FILES['foto']['tmp_name']);
			}
		}
	} else { // user did not select a file to upload
		echo "Por favor selecione o arquivo para upload.";
	}
} else { // upload button was not pressed
	echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=index.php\">";
}
        if(isset($_POST['submit'])){
          if (isset ($_FILES['foto'])){
              $imagename = $_FILES['foto']['name'];
              $source = $_FILES['foto']['tmp_name'];
              //$target = "../../images/anuncio/original".$imagename;
	      $target = $uploaddir.$imagem_prefixo.".jpg";
              move_uploaded_file($source, $target);
			  
//______________________________ Gera Imagens ______________________________

    include ('config.php');

	//redimensiona_imagens($img_muito_grande_w, $img_muito_grande_h, $uploaddir, $imagename, $qualidade, $tipo, $imagem_prefixo,'900');
	//redimensiona_imagens($img_grande_w, $img_grande_h, $uploaddir, $imagename, $qualidade, $tipo, $imagem_prefixo,'580');
	redimensiona_imagens($img_grande_w, $img_grande_h, $uploaddir, $imagename, $qualidade, $tipo, $imagem_prefixo,'500');	
	//redimensiona_imagens($img_media_w, $img_media_h, $uploaddir, $imagename, $qualidade, $tipo, $imagem_prefixo,'320');
	//redimensiona_imagens($img_pequena_w, $img_pequena_h, $uploaddir, $imagename, $qualidade, $tipo, $imagem_prefixo,'270');
	//redimensiona_imagens($img_icone_medio_w, $img_icone_medio_h, $uploaddir, $imagename, $qualidade, $tipo, $imagem_prefixo,'100');
	redimensiona_imagens($img_icone_pequeno_w, $img_icone_pequeno_h, $uploaddir, $imagename, $qualidade, $tipo, $imagem_prefixo,'75');

//__________________________________________________________________________
  }
 }				
}	
return $imagem_nome = $imagem_prefixo.".jpg";
?>
