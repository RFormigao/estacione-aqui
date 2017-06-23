<?php
    require_once "auto.php";


    if($_POST) {
        $oper = $_POST["oper"];

        switch ($oper) {
            case "I":
                $periodo = new Periodo(null, $_POST["periodo"], $_POST["valor"], "A");
                $periodoDAO = new PeriodoDAO();
                $retorno = $periodoDAO->inserirPeriodos($periodo);

                if($retorno[0] -> msg){
                    echo $retorno[0] -> msg ;
                }
                break;

            case "A":
                $periodo = new Periodo($_POST["id"],$_POST["periodo"], $_POST["valor"]);
                $periodoDAO = new PeriodoDAO();
                $retorno =  $periodoDAO->alterarPeriodos($periodo);

                if($retorno[0] -> msg){
                    echo $retorno[0] -> msg ;
                }
                break;

            case "E":
                $periodo = new Periodo($_POST["id"]);
                $periodoDAO = new PeriodoDAO();
                $retorno = $periodoDAO->excluirPeriodos($periodo);

                break;
        }

        header("Location:periodo.php");

    }
?>
<!DOCTYPE html>
  <html>
    <head>
        <link type="text/css" rel="stylesheet" href="../css/icones.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="../css/main.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8">
        <title>Gerenciar Preços</title>
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
                                  <div class="determinate" style="width: 70%" ></div>
                              </div>
                            <div class="col s2">
                                <span>0/20</span>
                            </div>
                        </header>
                    </div>
                    
                    <div class="row">
                        <main class="col s12 bg-cadastros bg-preco">
                            <div class="row">
                                <h4 class="titulos col s12">Gerenciar Preços</h4>
                                <br>
                                <br>
                                <br>
                                <div class="input-field col l4 s10">
                                    <input id="pesquisar" type="text">
                                    <label for="pesquisar">Pesquisar:</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="auto">
                                    <table class="highlight responsive-table col s12 tabela">
                                    <thead>
                                        <tr>
                                            <th><i class="material-icons">done</i></th>
                                            <th>Período</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                            $precoDAO = new PeriodoDAO();
                                            $listarPreco = $precoDAO ->listarPeriodos();

                                            foreach ($listarPreco as $dado){
                                                echo "<tr>";
                                                    echo"<td><input type='checkbox' name='check' id='{$dado->id_periodo}'  /><label for='{$dado->id_periodo}'></label></td>";
                                                    echo"<td><label for='{$dado->id_periodo}'>{$dado->periodo}</label></td>";
                                                    echo" <td><label for='{$dado->id_periodo}'>{$dado->valor}</label></td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                    </table>
                                </div>
                                
                                <a class="waves-effect waves-light btn green alocar col s12 l2 inserir" onclick="f1()" href="#inserir">Inserir</a>
                                <a class="waves-effect waves-light btn alocar col s12 l2 alterar disabled" onclick="f2()" href="#inserir">Alterar</a>
                                <a class="waves-effect waves-light btn red alocar col s12 l2 remover disabled"  onclick="f3()" href="#remover">Remover</a>
                                
                                 <form action="#" id="inserir" class="modal" method="POST">
                                    <div class="modal-content">
                                        <div class="row">
                                            <h4 class="col s12">Cadastrar Preço </h4>
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="input-field col s12 l10">
                                                    <input id="oper" name="oper" type="hidden">
                                                    <input id="id" name="id" type="hidden">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12 l10">
                                                    <input placeholder="00:00:00" id="periodo" name="periodo" type="text" required>
                                                    <label for="periodo">Período:</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12 l10">
                                                    <input placeholder="00,00" id="valor" name="valor" type="text" required>
                                                    <label for="valor">Valor:</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Ok" class="modal-action waves-effect waves-green btn-flat inserir-periodo"/>
                                        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>   
                                    </div>
                                </form>
                                <form id="remover" class="modal" method="post" action="#">
                                    <div class="modal-content">
                                        <div class="row">
                                            <div class="input-field col s12 l10">
                                                <input id="oper" name="oper" type="hidden">
                                                <input id="id" name="id" type="hidden">
                                            </div>
                                        </div>
                                        <div class="row">
                                           <h4>Você tem certeza disso?</h4>
                                            <p><span class="atencao">Atenção:</span> Ao clicar em "SIM" o preço será removido para sempre.</p>  
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Sim" class="modal-action modal-close waves-effect waves-green btn-flat inserir-cliente"/>
                                        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Não</a>   
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
                                <a class="social" href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook" ></i></a>  
                                <a class="social" href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
                                <a class="social" href="mailto:rformigao.gomes@gmail.com"><i class="fa fa-envelope"></i></a> 
                                <a class="social" href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a> 
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
        <script type="text/javascript" src="../lib/jquery/main.js"></script>
        <script type="text/javascript" src="../lib/jquery/tabelas.js"></script>
        <script type="text/javascript" src="../lib/fontawsome/font.js"></script>

        <script>
            function f1()
            {
                var operacao = document.getElementsByName("oper");
                operacao[0].value = "I";
            }

            function f2() {

                var operacao = document.getElementsByName("oper");
                operacao[0].value = "A";

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
                        url: "atualizarPeriodo.php",
                        //dados passados via POST
                        data: "id="+id,
                        //Se der tudo ok

                        success: function(resposta){
                            var peri = JSON.parse(resposta);
                            document.getElementById("id").value = peri[0].id_periodo;
                            document.getElementById("periodo").value = peri[0].periodo;
                            document.getElementById("valor").value = peri[0].valor;
                        }
                    });
                });
            }

            function f3()
            {

                var operacao = document.getElementsByName("oper");
                operacao[1].value = "E";

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
                identificador[1].value = id;
            }
        </script>
    </body>
  </html>

