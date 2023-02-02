<script language= 'javascript'>
function avisoDelete(id, media, evento){
	var id;
    var media;
    var evento;
	if(confirm (' Realmente confirma a exclusão do Registro? '))
	{
		location.href="default.php?pagina=evento&metodo=deletarMedia&id="+id+"&mda="+media+"&evnt="+evento;
	}else{
		return false;
	}
}
</script>
<div class="container-fluid" style="background-color: #fff; margin: 30px; padding:10px; float:left; border: 1px solid #ddd; width: 90%">
    <form method="post" action="default.php?pagina=evento&metodo=img" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $eventid;?>" name="eventid" />    
        <span><b>Comentário da Foto (opcional):</b></span>
        <input type="text" name="comentario" id="comentario" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"/>
        </br>

        <div class="custom-file">
            <span><b>Foto:</b></span>
            <input type="file" class="custom-file-input" id="FileImg" name="foto" id="foto">
            <label class="custom-file-label" for="customFile">Insira Uma imagem Válida, permitidos: <b>.png | .jpeg | .jpg</b></label>
        </div>
        <br>
        <input type="submit" class="btn btn-Warning btn-sm" value="Inserir Imagem" /></br>
    </form>
    <hr>
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Imagem</th>
        <th scope="col">Legenda da Imagem</th>
        <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($media as $medimg){
            $mediaId = $medimg['med_id'];
            $eventoId = $medimg['even_id'];
            $mediaImg = $medimg['med_media'];
            $medComentario = $medimg['med_comentario'];
            ?>
            <tr>
                <td><img src="app/Template/media/<?php echo $mediaImg;?>" height="90"/></td>
                <td><?php echo $medComentario;?></td>

        <td>
          <button type="button" class="btn btn-danger" onclick="avisoDelete(<?php echo $mediaId;?>,'<?php echo $mediaImg;?>',<?php echo $eventid;?>)">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
          </button>
        </td>

            </tr>
            <?php
        }
    ?>
    </tbody>

</div>