<?php
session_start();
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <link rel="shortcut icon" type="image/x-icon" href="app/Template/img/favicon.ico">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Core_app Facens</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="app/Template/css/default.css" type="text/css" rel="stylesheet"/>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body id="login">
        <div id="topo">
            <header>
                <div id="menu">
                    <a>HOME</a> |
                    <a>SOBRE</a> 
                    <a class="dfcms">cms</a>
                </div>
            </header>
        </div>        
        <div id="corpologin">
            <div class="container">
                    <div id="login" class="bg-light bg-gradient" style="border-radius: 10px; margin: 30px; Padding: 30px; Padding-top: 0px; width: 390px; box-shadow: 4px 4px 10px #33333e;" >
                        
                        <div id="titlelogin" style="margin-top: -20px; height: 90px; margin-bottom: 20px">
							<img src="/core/app/Template/img/novo_logo_ti_facens.png" style="width: 140px;"/></br>
                        </div>
						
                        <div class="container-fluid">   
							Core App						
                            <form style="width: 19rem;" action="default.php?pagina=login&metodo=login" method="post">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example18">Usuário</label>
                                    <input required type="text" name="usuario" id="form2Example18" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example28">Senha</label>
                                    <input required type="password" name="senha" id="form2Example28" class="form-control form-control-lg" />
                                </div>

                                <br>
                              
                                    <div class="pt-1 mb-4">
                                    <input type="submit" class="btn btn-primary" name="acao" value="Login">
                                </div>
                            </form>       
                        </div>
                    </div>
                </div>
        </div>
        
        <div id="rodape">
            <img width="30px" src="/core/app/Template/img/logo-facens-2.png" />
            by Tecnologia da Informação - Facens
        </div>
        
    </body>
</html>