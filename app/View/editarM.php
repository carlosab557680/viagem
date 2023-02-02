<div class="container-fluid" style="background-color: #fff; margin: 30px; padding:10px; float:left; border: 1px solid #ff0000; width: 90%">

  <h1>Formulário de Evento (edição)</h1>
  <hr>

  <form action="default.php?pagina=evento&metodo=alterarM" method='post'>

    <?php
      foreach($even as $evento){
        $eid = $evento['even_id'];
        $etitulo = $evento['even_titulo'];
        $edescricao = $evento['even_descricao'];
        $elocal = $evento['even_local'];
        $ecc = $evento['centrocusto'];

        $n = explode(" ", $evento['even_data']);
        $nResult = explode('-', $n['0']);
        $edata = $nResult[2]."/".$nResult[1]."/".$nResult[0]; //padrao data

        $nf = explode(" ", $evento['even_datafinal']);
        $nResultf = explode('-', $nf['0']);
        $edataf = $nResultf[2]."/".$nResultf[1]."/".$nResultf[0];
      }
    ?>


    </br>

    <span><b>Evento e ou Viagem Titulo:</b></span>
    <input type="text" name="titulo" id="titulo" value="<?php echo $etitulo;?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required/>
    </br>

    <span><b>Data do Evento:</b></span>
    <input class="form-control" id="data" name="data" value="<?php echo $edata;?>" size="12" type="text" placeholder="___/___/___" required/>
    </br>

    <span><b>Data Final do Evento:</b> (data final do evento) <b>* Campo NÃO Obrigatório</b></span>
    <input class="form-control" id="dataf" name="dataf" value="<?php echo $edataf;?>" size="12" type="text" placeholder="___/___/___" />
    </br>

    <span><b>Local do Evento:</b></span>
    <input type="text" name="local" id="local" value="<?php echo $elocal;?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
    </br>
    <span><b>Descrição da viagem ou evento</b></span>
    <textarea class="form-control"  name="descricao" id="descricao"><?php echo $edescricao;?></textarea>
    </br>
    <input type="hidden" value="<?php echo $eid;?>" name="eventid"/>
    <input type="submit" class="btn btn-Warning btn-lg" value="Confirmar a Alteração > " /></br>

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