<?php
    require_once 'auto.php';
    if($_POST) {
        $oper = $_POST["oper"];

        switch ($oper) {
            case "I":
                $tipo = new Tipo ($_POST["tipo"]);
                $pessoa = new Pessoa (null, $_POST["nome"], $_POST["cpf"], $_POST["celular"],
                                        $_POST["telefone"], $_POST["cep"], $_POST["logradouro"],
                                        $_POST["bairro"], $_POST["cidade"], $_POST["uf"],
                                        $_POST["usuario"], $_POST["senha"], $tipo,"A");
                $pessoaDAO = new PessoaDAO();
                $retorno = $pessoaDAO->inserirPessoas($pessoa);
                if ($retorno[0]->msg) {
                    $msg = $retorno[0] -> msg;
                    echo "<script>alert('$msg');</script>";
                }
                break;
            case "A":
                $tipo = new Tipo ($_POST["tipo"]);
                $pessoa = new pessoa($_POST["id"],$_POST["nome"], $_POST["cpf"], $_POST["celular"],
                                        $_POST["telefone"], $_POST["cep"], $_POST["logradouro"],
                                        $_POST["bairro"], $_POST["cidade"], $_POST["uf"],
                                        $_POST["usuario"], $_POST["senha"], $tipo);
                $pessoaDAO = new PessoaDAO();
                $retorno =  $pessoaDAO->alterarPessoas($pessoa);

                if($retorno[0] -> msg){
                    $msg = $retorno[0] -> msg;
                    echo "<script>alert('$msg');</script>";
                }

                break;

            case "E":
                $pessoa = new Pessoa($_POST["id"]);
                $pessoaDAO = new PessoaDAO();
                $retorno = $pessoaDAO->excluirPessoas($pessoa);

                if($retorno[0] -> msg){
                    $msg = $retorno[0] -> msg;
                    echo "<script>alert('$msg');</script>";
                }

                break;

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
        <title>Gerenciar Funcionários</title>
        <?php
        require_once "auto.php";
        $alocarDAO = new AlocarDAO();
        $retorno = $alocarDAO ->contarAlocacoes();
        $contagem = $retorno[0] -> contagem;

        $tamanho= 100*$contagem / 20;
        ?>
    </head>

    <body class="bg-home">
        
        <div class="row">
            <div class="z-depth-5">

                <?php include "menu.php" ?>
                
                <div class="col l10 s12 bg-main">
                    <div class="row">
                        <header class="col s12 cabecalho">
                            <h5>Vagas</h5>
                             <div class=" col l4 s10 progress">
                                  <div class="determinate" style="width: <?php echo $tamanho?>%" ></div>
                              </div>
                            <div class="col s2">
                                <span>
                                       <?php
                                            echo $contagem;
                                       ?>/20
                                </span>
                            </div>
                        </header>
                    </div>
                    
                    <div class="row">
                        <main class="col s12 bg-cadastros bg-funcionario">
                            <div class="row">
                                <h4 class="titulos col s12">Gerenciar Funcionários</h4>
                                <br>
                                <br>
                                <br>
                                <div class="input-field col l4 s10">
                                    <input id="pesquisar" type="text">
                                    <label for="pesquisar">Pesquisar:</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="auto-funcionario">
                                    <table class="highlight responsive-table col s12 tabela funcionario">
                                    <thead>
                                        <tr>
                                            <th><i class="material-icons">done</i></th>
                                            <th>Nome</th>
                                            <th>Cpf</th>
                                            <th>Celular</th>
                                            <th>Telefone</th>
                                            <th>Cep</th>
                                            <th>Logradouro</th>
                                            <th>Bairro</th>
                                            <th>Cidade</th>
                                            <th>UF</th>
                                            <th>Usuário</th>
                                            <th>Senha</th>
                                            <th>Tipo</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php

                                        $pessoaDAO = new PessoaDAO();
                                        $listarPessoa = $pessoaDAO->listarPessoas();

                                        foreach($listarPessoa as $dado){
                                            echo "<tr>";
                                                echo "<td><input type='checkbox' name='check' id={$dado->id_pessoa} /><label for='{$dado->id_pessoa}'></label></td>";
                                                echo "<td><label for='{$dado->id_pessoa}'>{$dado->nome}</label></td>";
                                                echo "<td><label for='{$dado->id_pessoa}'>{$dado->cpf}</label></td>";
                                                echo "<td><label for='{$dado->id_pessoa}'>{$dado->cel}</label></td>";
                                                echo "<td><label for='{$dado->id_pessoa}'>{$dado->tel}</label></td>";
                                                echo "<td><label for='{$dado->id_pessoa}'>{$dado->cep}</label></td>";
                                                echo "<td><label for='{$dado->id_pessoa}'>{$dado->logradouro}</label></td>";
                                                echo "<td><label for='{$dado->id_pessoa}'>{$dado->bairro}</label></td>";
                                                echo "<td><label for='{$dado->id_pessoa}'>{$dado->cidade}</label></td>";
                                                echo "<td><label for='{$dado->id_pessoa}'>{$dado->uf}</label></td>";
                                                echo "<td><label for='{$dado->id_pessoa}'>{$dado->usuario}</label></td>";
                                                echo "<td><label for='{$dado->id_pessoa}'>{$dado->senha}</label></td>";
                                                echo "<td><label for='{$dado->id_pessoa}'>{$dado->descritivo}</label></td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                    </tbody>
                                    </table>
                                </div>
                                
                                <a class="waves-effect waves-light btn green alocar col s12 l2 inserir"  onclick="f1()" href="#inserir">Inserir</a>
                                <a class="waves-effect waves-light btn alocar col s12 l2 alterar disabled " onclick="f2()" href="#inserir">Alterar</a>
                                <a class="waves-effect waves-light btn red alocar col s12 l2 remover disabled" onclick="f3()" href="#remover">Remover</a>


                                <form id="remover" method="post" action="#" class="modal">
                                    <div class="modal-content">
                                        <div class="row">
                                            <div class="input-field col s12 l10">
                                                <input id="oper" name="oper" type="hidden">
                                                <input id="id" name="id" type="hidden">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h4>Você tem certeza disso?</h4>
                                            <p><span class="atencao">Atenção:</span> Ao clicar em "SIM" o cliente será removido para sempre.</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Sim" class="modal-action modal-close waves-effect waves-green btn-flat inserir-cliente"/>
                                        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Não</a>
                                    </div>
                                </form>

                                <form action="#" id="inserir" class="modal" method="POST">
                                    <div class="modal-content">
                                        <div class="row">
                                            <h4 class="col s12">Cadastrar Funcionário </h4>
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="input-field col s12 l10">
                                                    <input id="oper" name="oper" type="hidden">
                                                    <input id="id" name="id" type="hidden">
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12 l10">
                                                    <input placeholder="João Pedro" id="nome" name ="nome" type="text" required>
                                                    <label for="nome">Nome:</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12 l10">
                                                    <input placeholder="999.999.999.99" id="cpf" name ="cpf" type="text" required>
                                                    <label for="cpf">Cpf:</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col l5 s12">
                                                    <input placeholder="(99) 99999-9999"  id="celular" name ="celular" type="text" required>
                                                    <label for="celular">Celular:</label>
                                                </div>
                                                <div class="input-field col l5 s12">
                                                    <input placeholder="(99) 9999-9999"  id="telefone" name ="telefone" type="text" required>
                                                    <label for="telefone">Telefone:</label>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="input-field col s12 l10">
                                                    <input placeholder="99999-999" id="cep" name ="cep" type="text" required>
                                                    <label for="cep">Cep:</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col l5 s12">
                                                    <input placeholder="Rua Domingos Salvador 999" id="logradouro" name ="logradouro" type="text" required>
                                                    <label for="logradouro">Logradouro:</label>
                                                </div>
                                                <div class="input-field col l5 s12">
                                                    <input placeholder="Jardim Nova Esperança" id="bairro" name ="bairro" type="text" required>
                                                    <label for="bairro">Bairro:</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col l5 s12">
                                                    <input placeholder="Jau" id="cidade" name ="cidade" type="text" required>
                                                    <label for="cidade">Cidade:</label>
                                                </div>
                                                <div class="input-field col l5 s12">
                                                    <input placeholder="SP" id="uf" name ="uf" type="text" required>
                                                    <label for="uf">UF:</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col l5 s12">
                                                    <input placeholder="João Pedro" id="usuario" name ="usuario" type="text" required>
                                                    <label for="usuario">Usuário:</label>
                                                </div>
                                                <div class="input-field col l5 s12">
                                                    <input placeholder="999999" id="senha" name ="senha" type="text" required>
                                                    <label for="senha">Senha:</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col l10 s12">
                                                    <select name="tipo" id="tipo" class="browser-default">
                                                        <?php
                                                        $tipoDAO = new TipoDAO();
                                                        $listarTipo = $tipoDAO->listarTipo();

                                                        foreach($listarTipo as $dado) {
                                                            echo"<option id='{}' value='{$dado-> id_tipo}'>{$dado-> descritivo}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Ok" class="modal-action waves-effect waves-green btn-flat inserir-cliente"/>
                                        <a href="#!" onclick="limpar()" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
                                    </div>
                                </form>


                            </div>
                        </main>
                    </div>
                    
                </div>
                
                <footer class="page-footer rodape">
                    <div class="row">
                        
                        <div class="col l8 s12 info-rodape">
                            <h4>Sobre nós</h4>
                            <div class="row">
                                <div class="col s12 l2 center-align">
                                    <img class="responsive-img" src="../img/mini-logo.png">
                                </div>
                                <div class="col s12 l10">
                                    <p>Somos uma empresa desenvolvedora de Softwares.<br>Criamos soluções para gestão de estabelecimentos.</p>
                                </div>                                    
                            </div>                            
                        </div>

                        <div class="col l4 s12 info-rodape">
                            <h4>Encontre-nos</h4>
                            <div>
                                <a class="social" href="https://www.facebook.com"target="_blank"><i class="fa fa-facebook" ></i></a>  
                                <a class="social" href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
                                <a class="social" href="mailto:rformigao.gomes@gmail.com"><i class="fa fa-envelope"></i></a> 
                                <a class="social" href="https://www.twitter.com"target="_blank"><i class="fa fa-twitter"></i></a> 
                          
                            </div>
                        </div>
                        
                    </div>                    
                    <div class="footer-copyright">
                    <div class="container">
                        © 2017 Copyright Estacione aqui
                    </div>
                    </div>
                </footer>

            </div>
        </div>

        <script type="text/javascript" src="../lib/jquery/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../lib/materialize/materialize.min.js"></script>
        <script type="text/javascript" src="../lib/materialize/tablesorter.min.js"></script>
        <script type="text/javascript" src="../lib/jquery/cadastro-modal.js"></script>
        <script type="text/javascript" src="../lib/jquery/tabelas.js"></script>
        <script type="text/javascript" src="../lib/fontawsome/font.js"></script>

        <script>
            function f1()
            {
                var operacao = document.getElementsByName("oper");
                operacao[1].value = "I";

                limpar();
            }

            function f2() {

                var operacao = document.getElementsByName("oper");
                operacao[1].value = "A";

                var check = document.getElementsByName("check");
                var id;
                for(var x=0;x<check.length;x++){

                    if(check[x].checked){
                        id = check[x].id;
                        break;
                    }
                }
                $(function(){
                    $.ajax({
                        //Tipo de envio POST ou GET
                        type: "POST",
                        //Caminho do arquivo
                        url: "atualizarFuncionario.php",
                        //dados passados via POST
                        data: "id="+id,
                        //Se der tudo ok

                        success: function(resposta){

                            var pessoa = JSON.parse(resposta);
                            var id = document.getElementsByName("id");
                            id[1].value = pessoa[0].id_pessoa;
                            document.getElementById("nome").value = pessoa[0].nome;
                            document.getElementById("cpf").value = pessoa[0].cpf;
                            document.getElementById("celular").value = pessoa[0].cel;
                            document.getElementById("telefone").value = pessoa[0].tel;
                            document.getElementById("cep").value = pessoa[0].cep;
                            document.getElementById("logradouro").value = pessoa[0].logradouro;
                            document.getElementById("bairro").value = pessoa[0].bairro;
                            document.getElementById("cidade").value = pessoa[0].cidade;
                            document.getElementById("uf").value = pessoa[0].uf;
                            document.getElementById("usuario").value = pessoa[0].usuario;
                            document.getElementById("senha").value = pessoa[0].senha;
                            document.getElementById("tipo").value = pessoa[0].id_tipo;

                        }
                    });
                });
            }
            function f3()
            {

                var operacao = document.getElementsByName("oper");
                operacao[0].value = "E";

                var check = document.getElementsByName("check");
                var id;
                for(var x=0;x<check.length;x++){
                    if(check[x].checked){
                        id = check[x].id;
                        break;
                    }
                }
                document.getElementById("id").value = id;
                var identificador = document.getElementsByName("id");
                identificador[0].value = id;
            }

            function limpar(){
                document.getElementById("id").value = "";
                document.getElementById("nome").value = "";
                document.getElementById("cpf").value = "";
                document.getElementById("celular").value = "";
                document.getElementById("telefone").value = "";
                document.getElementById("cep").value = "";
                document.getElementById("logradouro").value = "";
                document.getElementById("bairro").value = "";
                document.getElementById("cidade").value = "";
                document.getElementById("uf").value = "";
                document.getElementById("usuario").value = "";
                document.getElementById("senha").value = "";
            }

        </script>

    </body>
  </html>

