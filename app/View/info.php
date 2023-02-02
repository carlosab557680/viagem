
<div class="container-fluid" style="background-color: #fff; margin: 30px; padding:10px; float:left; border: 1px solid #ddd; width: 90%">

<div class ="divtitle">
<?php

foreach($even as $evento){
    $fdata = explode("-", explode(" ", $evento['even_data'])['0']);
    $dtFormt = $fdata['2']."/".$fdata['1']."/".$fdata['0'];

    echo "<h2>Evento: ".$evento['even_titulo']."</h2>";
    echo "<p><b>Descrição:</b>&nbsp;".$evento['even_descricao']."</p>";
    echo "<p><b>Data:</b>&nbsp;".$dtFormt.", ";
    echo "<b>Local:</b>&nbsp;".$evento['even_local']."</p>";
    $evento['even_id'];
}
?>
</div>

<form action="default.php?pagina=evento&metodo=inserirInfo" method='post'>
    <input type="hidden" value="<?php echo $evento['even_id'];?>" name="eventid" />
    <span><b>Inovações encontradas:</b></span>
    <textarea class="form-control"  name="inovacao" id="inovacao"></textarea>
    </br>

    <span><b>Novidades diversas:</b></span>
    <textarea class="form-control"  name="novidade" id="novidade"></textarea>
    </br>

    <span><b>Possíveis parceiros:</b></span>
    <textarea class="form-control"  name="parceiro" id="parceiro"></textarea>
    </br>

    <span><b>Possíveis concorrentes:</b></span>
    <textarea class="form-control"  name="concorrente" id="concorrente"></textarea>
    </br>

    <input type="submit" class="btn btn-primary btn-lg" value="Avançar > " /><br/>

    </form>
    <br/><br/><br/>
</div>



