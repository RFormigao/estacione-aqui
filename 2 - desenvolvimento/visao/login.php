<?php
    require_once 'auto.php';
    if($_POST) {


        $pessoa = new Pessoa(null, null,
            null, null,
            null, null,
            null, null,
            null, $_POST["usuario"], $_POST["senha"], null);

        $pessoaDAO = new PessoaDAO();

        $retorno = $pessoaDAO->login($pessoa);

        if($retorno) {
            header("location: index.php");
        }
        else
        {
            echo "<script>alert('Usuário/Senha não confere');window.location.href='login.php';</script>";
        }



    }


?>
<!DOCTYPE html>
  <html>
    <head>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="../css/main.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta charset="UTF-8">
        <title>Login - Estacione Aqui</title>
    </head>

    <body class="bg-login">
        
        
        <div class="row">
            <form class="col s10 l4 offset-l4 offset-s1 login z-depth-5" action="#" method="post">
                <img class="responsive-img" src="../img/logo.jpg" alt="logo">
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <i class="material-icons prefix">perm_identity</i>
                      <input id="icon_prefix" name="usuario" type="text">
                      <label for="icon_prefix" id="teste">Usuário</label>
                    </div>
                </div>
                
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <i class="material-icons prefix">lock_outline</i>
                      <input id="icon_telephone" name="senha" type="password">
                      <label for="icon_telephone">Senha</label>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col offset-s4">
                        <input type="submit" value="Entrar" class="waves-effect waves-light btn"></input>
                    </div>
                </div>
            </form>
        </div>
      
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../lib/materialize/materialize.min.js"></script>
        <script type="text/javascript" src="../lib/materialize/main.js"></script>
    </body>
  </html>