
<div class="container-fluid" style="background-color: #fff; margin: 30px; padding:10px; float:left; border: 1px solid #ff0000; width: 90%">

  <h1>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
      <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
    </svg>
    Formulário de Evento - Cadastro / Multiplos Participantes
  </h1>
  <a href="default.php?pagina=evento&metodo=listarM" title="Listar Cadastrados">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
      <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
      <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
    </svg> Listar Cadastrados
  </a>
  <hr>

  <form action="default.php?pagina=evento&metodo=inserirM" method='post'>

    <span><b>Evento e ou Viagem Titulo:</b></span>
    <input type="text" name="titulo" id="titulo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required/>
    </br>

    <span><b>Data do Evento:</b> (data inicial ou data única do evento) <b>* Campo Obrigatório</b></span>
    <input class="form-control" id="data" name="data" size="12" type="text" placeholder="___/___/___" required/>
    </br>

    <span><b>Data Final do Evento:</b> (data final do evento) <b>* Campo NÃO Obrigatório</b></span>
    <input class="form-control" id="dataf" name="dataf" size="12" type="text" placeholder="___/___/___" />
    </br>

    <span><b>Local do Evento:</b></span>
    <input type="text" name="local" id="local" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
    </br>
    
    <span><b>Descrição da viagem ou evento</b></span>
    <textarea class="form-control"  name="descricao" id="descricao"></textarea>
    </br>
    <input type="submit" class="btn btn-primary btn-lg" value="Avançar > " /></br>

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