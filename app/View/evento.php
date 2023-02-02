<script type= text/javascript>
  function redirect() {
    var select = document.getElementById("evnt12");
    var opcaoTexto = select.options[select.selectedIndex].text;
    var opcaoValor = select.options[select.selectedIndex].value;
    window.location.assign("default.php?pagina=evento&metodo=cadastrar&sel="+opcaoValor)
  }
</script>

<div class="container-fluid" style="background-color: #fff; margin: 30px; padding:10px; float:left; border: 1px solid #ddd; width: 90%">
<form action="default.php?pagina=evento&metodo=inserir" method='post'>
  <h1>Formulário de Evento</h1>

  <hr>
  <span style="color: #ff0000;"><b>Lista de Eventos Ativos.</b></span>

<select id="evnt12" onchange="redirect()">
  <option>Selecione...</option>
  <?php
  foreach($eve as $evM){
    $titulo = $evM['even_titulo'];
    $id = $evM['even_id'];
    ?><option value="<?php echo $id;?>" ><?php echo $titulo;?></option><?php
  }
  foreach($selid as $selItem){
    $seltit = $selItem['even_titulo'];
    $fdata = explode("-", explode(" ", $selItem['even_data'])['0']);
    $dtFormt = $fdata['2']."/".$fdata['1']."/".$fdata['0'];
    $fdataf = explode("-", explode(" ", $selItem['even_datafinal'])['0']);
    $dtFormtF = $fdataf['2']."/".$fdataf['1']."/".$fdataf['0'];
    $selLoc = $selItem['even_local'];
    $seldescr = $selItem['even_descricao'];
    $itemvalido = "1";
  }
  ?>
</select>
  <hr>
    <span><b>Participante:</b></span>
    <?php
    foreach($usr as $usrio){
      $usrio['nome'];
      $usrio['cpf'];
    }
    ?>
    <div class="row">
      <div class="col">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><b>Nome</b></span>
          </div>
          <input type="text" name="usuario" id="usuario" class="form-control" value="<?= $usrio[nome];?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" readonly required>
        </div>
      </div>

      <div class="col">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><b>CPF</b></span>
          </div>
        <input type="text" name="cpf" id="cpf" value="<?= $usrio[cpf];?>" class="form-control" readonly required>
      </div>
    </div>
    </div>

    </br>

    <span><b>Centro de Custo:</b></span>
    <select class="form-control" name = "centrocusto" id = "centrocusto" required>
      <option value="">Selecione o Centro de Custo...</option>
      <?php
      foreach($cc as $ccentro){
        ?>
        <option value = "<?php echo $ccentro['descricao'];?>"><?php echo $ccentro['descricao'];?></option>
        <?php
      }
      ?>
    </select>
    </br>

    <span><b>Evento e ou Viagem Titulo:</b></span>
    <?php
      if($itemvalido === '1'){
        ?>
             <input type="text" name="titulo" id="titulo" value="<?php echo $seltit;?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" readonly required/>
        <?php
      }else{
        ?>
             <input type="text" name="titulo" id="titulo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required/>
        <?php       
      }

    ?>

    </br>

    <span><b>Data do Evento:</b> (data inicial ou data única do evento) <b>* Campo Obrigatório</b></span>
    <?php
      if($itemvalido === '1'){
        ?>
        <input class="form-control" id="data" name="data" size="12" type="text" placeholder="___/___/___" required value="<?php echo $dtFormt;?>" readonly/>
        <?php
      }else{
        ?>
        <input class="form-control" id="data" name="data" size="12" type="text" placeholder="___/___/___" required/>
        <?php
      }
    ?>
    </br>
    <span><b>Data Final do Evento:</b> (data final do evento) <b>* Campo NÃO Obrigatório</b></span>

    <?php
      if($itemvalido === '1'){
        ?>
        <input class="form-control" id="dataf" name="dataf" size="12" type="text" placeholder="___/___/___" value="<?php echo $dtFormtF;?>" readonly />
        <?php
      }else{
        ?>
        <input class="form-control" id="dataf" name="dataf" size="12" type="text" placeholder="___/___/___" />
        <?php
      }
    ?>
    </br>
    <span><b>Local do Evento:</b></span>
    <?php
      if($itemvalido === '1'){
        ?>
        <input type="text" value="<?php echo $selLoc;?>" name="local" id="local" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" readonly>
        <?php
      }else{
        ?>
        <input type="text" name="local" id="local" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        <?php
      }
    ?>
    </br>
    <span><b>Descrição da viagem ou evento</b></span>

    <?php
    if($itemvalido === '1'){
      ?>
      <textarea readonly class="form-control"  name="descricao" id="descricao"><?php echo $seldescr;?></textarea>
      <?php
    }else{
      ?>
      <textarea class="form-control"  name="descricao" id="descricao"><?php echo $seldescr;?></textarea>
      <?php
    }
    ?>
    </br>
    <input type="submit" class="btn btn-primary btn-lg" value="Avançar >" /></br>

  </br>
  </form>
  </br>
</div>

    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="lib/script/index.js"></script>
    <script src="lib/script/jquery.mask.min.js"></script>

  <script>
		$("#telefone").mask("(99) 99999-9999");
		$("#cep").mask("99999-999");
		$("#cpf").mask("999.999.999-99");
		$("#cnpj").mask("99.999.999/9999-99");
		$("#data").mask("99/99/9999");
    $("#dataf").mask("99/99/9999");
	</script>