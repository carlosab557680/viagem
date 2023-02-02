
<br/><br/>


<div class="container-fluid" style="font-size: 14px; background-color: #fff; margin: 30px; margin-bottom: 60px; padding:60px; float:left; border: 2px solid #ddd; width: 90%">

<?php

foreach($objctEvento as $evento){
	$titulo = $evento['even_titulo'];
	$descricao = $evento['even_descricao'];
	$dt = $evento['even_data'];
	$n = explode('-', explode(" ",$dt)[0]);
	$CvtData = $n[2]."-".$n[1]."-".$n[0]; //padrao data

	$local = $evento['even_local'];
	$participante = $evento['even_participante'];
	$cpf = $evento['cpf'];
	$cc = $evento['centrocusto'];
}

?>
<div style="color: #333; float:left; width: 100%; margin-bottom: 10px">
	<a href="#">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
		<path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
		</svg>
	</a>
	<h2><?php echo $titulo;?></h2>
	<p><b>Descrição:</b> <?php echo $descricao;?></p>
	<b>Data:</b> <?php echo $CvtData." - <b>Local:</b> ".$local;?><br><br>
	<b>Participante:</b> <?php echo $participante.".&nbsp;<b>CPF:</b> ".$cpf;?><br>
	<b>Centro de Custo: </b><?php echo $cc;?>
</div>
<hr/>
<?php

foreach($media as $img){
	$img['med_comentario'];
	$img['med_media'];
	?>
	<div style="width:100%; float:left; background-color: #fff; padding: 0px; border: 1px solid #35a9ff; margin-bottom: 10px">
		
		<div style="float:left; width:40%; background-color: #35a9ff">
			<img width="100%" src="app/Template/media/<?php echo $img['med_media'];?>" />
		</div>
		<div style="float:left; width:60%; color: #666; padding: 20px; background-color: #fff">
			<?php echo $img['med_comentario'];?>
		</div>

	</div>

	<?php 
}
?>
<hr>
           
<?php
	foreach($info as $inf){
		//$inf['inovacao'];
		//$inf['novidade'];
		//$inf['parceiro'];
		//$inf['concorrente'];
		?>
		<b>Inovações encontradas:</b>
		<?php echo $inf['inovacao'];?>
		<hr>
		<b>Novidades diversas:</b>
		<?php echo $inf['novidade'];?>
		<hr>
		<b>Possíveis parceiros:</b>
		<?php echo $inf['parceiro'];?>
		<hr>
		<b>Possíveis concorrentes:</b>
		<?php echo $inf['concorrente'];
	}
?>
</div>
