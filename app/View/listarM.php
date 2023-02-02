<script language= 'javascript'>
function avisoDelete(id){
	var id;
	if(confirm (' Realmente confirma a exclusão do Registro? '))
	{
		location.href="default.php?pagina=evento&metodo=deletarM&id="+id;
	}else{
		return false;
	}
}
</script>

<div class="container-fluid" style="background-color: #fff; margin: 30px; padding:10px; float:left; border: 1px solid #ff0000; width: 90%">

  <h1>Evento / Viagem / Multiplos Participantes</h1>
  <hr>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Título</th>
      <th scope="col">Data</th>
      <th scope="col">Editar</th>
      <th scope="col">Exluir</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

  <?php

    foreach($eventList as $lista){
      $idEvento = $lista['even_id'];
      $fdata = explode("-", explode(" ", $lista['even_data'])['0']);
      $dtFormt = $fdata['2']."/".$fdata['1']."/".$fdata['0'];
      ?>
      <tr>
        <td><?php echo $lista['even_titulo'];?></td>

        <td><?php echo $dtFormt;?></td>

        <td>
          <a href="default.php?pagina=evento&metodo=editarM&id=<?php echo $idEvento;?>" class="btn btn-primary active" role="button" aria-pressed="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg>
          </a>
        </td>

        <td>
          <button type="button" class="btn btn-danger" onclick="avisoDelete(<?php echo $idEvento;?>)">
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
  </table>




 


