<?php
    require_once 'menu.php';
    if($_POST) {


        $pessoa = new Pessoa(null, null,
            null, null,
            null, null,
            null, null,
            null, null, $_POST["usuario"], $_POST["senha"], null);

        $pessoaDAO = new PessoaDAO();

        $ret = $pessoaDAO->login($pessoa);

        if(count($ret) > 0)
        {
            //se for identificado
            //session_start();
            $_SESSION["tipo"] = $ret[0]->id_tipo;
            $_SESSION["id"] = $ret[0]->id_pessoa;
            $_SESSION["nome"] = $ret[0]->nome;
            $_SESSION["descritivo"] = $ret[0]->descritivo;

            //buscar as permissoes de acordo com o acesso
            $tipo = new Tipo( $ret[0]->id_tipo);
            $tipoDAO = new TipoDAO();
            $retorno=$tipoDAO->buscarPermissoes($tipo);
            $_SESSION["menu"]= $retorno;
            echo "<script>alert('Bem-Vindo!');window.location.href='index.php'</script>";
        }
        else
        {
            echo "<script>alert('email/senha não conferem');window.location.href='login.php'</script>";
        }

    }
?>
<!DOCTYPE html>
  <html>
    <head>
        <link type="text/css" rel="stylesheet" href="../css/icones.css"  media="screen,projection"/>
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

        <script type="text/javascript" src="../lib/jquery/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../lib/materialize/materialize.min.js"></script>
        <script type="text/javascript" src="../lib/jquery/main.js"></script>
    </body>
  </html>