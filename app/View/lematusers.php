<?php


if(isset($id) && !empty($id)){

  foreach($colectUsers as $obj){
    $nome = utf8_encode($obj['Nome']).">>>";
    $login = utf8_encode($obj['Login']);
    $UsuarioId = $obj['UsuarioId'];
  }
  ?>
  <div style="Float:left; width: 104%; background-color:#fff; padding: 50px; margin-top: 20px; margin-left: -25px; ">
  <div style="Float:left; padding: 50px;">
    <img src="app/Template/img/citlogo.png"/>
    <a href="http://localhost/troca_senha_lemat/default.php?pagina=admin&metodo=default">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
      </svg> <b>voltar</b>
    </a>
  </div>

    <br>
    <spam class = "chamada">Atenção você está prestes a redefinir a senha de:</spam>
    <h1><?php echo $nome;?></h1>
    <h2>Login: <?php echo $login;?></h2><hr>
    <div style="Float:left; width: 400px">
      <form method="post" action="default.php?pagina=admin&metodo=alter" >
          <label><b>Nova Senha:</b></label><br>
          <input type="hidden" id="id" name="id" value="<?= $UsuarioId;?>"/>
          <input type="hidden" id="login" name="login" value="<?= $login;?>"/>
          <input type="password" id="nsenha" name = "nsenha" required class="form-control form-control-lg"><br><br>
          <label><b>Redigite a Senha:</b></label><br>
          <input type="password" id="csenha" name = "csenha" required class="form-control form-control-lg"><br><hr>
          <input type="submit" class="btn btn-info btn-sm" value="Salvar" />
      </form> 
    </div>
  </div>

  <?php

}else{
?>
  <div style="Float:left; width: 104%; background-color:#fff; padding: 50px; margin-top: 20px; margin-left: -25px; ">
<table class="table table-hover">
  <thead>
    <tr>
      <td><spam class = "cliente"><?= $ativo;?></spam></td>
      <th scope="col">Nome (Razão Social)</th>
      <th scope="col">login</th>
      <th scope="col">Trocar a Senha</th>
    </tr>
  </thead>
  <tbody>
        <?php
            foreach($colectUsers as $obj){
                ///$nome = utf8_encode($obj['Nome']);
                ///$login = utf8_encode($obj['Login']);
                $nome = $obj['Nome'];
                $login = $obj['Login'];
                $UsuarioId = $obj['UsuarioId'];
                $ativo = $obj['Ativo'];
                if($ativo == '1'){
                  $situacao  = 'Ok';
                  $cor = "style=\"color: #339944;\"";
                }elseif($ativo == '0'){
                  $situacao  = 'Off';
                  $cor = "style=\"color: #ff7766;\"";
                }
                ?>
                <tr>
                    <td><spam class = "cliente" <?php echo $cor;?>><?= $situacao;?></spam></td>
                    <td><spam class = "cliente"><?= $nome;?></spam></td>
                    <td><?= $login;?></td>
                    <td>
                        <a href="default.php?pagina=admin&metodo=default&id=<?= $UsuarioId;?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                <?php
            }
        ?>

  </tbody>
</table>
          </div>
<?php
}
?>