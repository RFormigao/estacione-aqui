
<!DOCTYPE html>
  <html>
    <head>
        <link type="text/css" rel="stylesheet" href="../css/icones.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="../css/main.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8">
        <title>Home</title>
        <?php
            require_once "auto.php";
            $alocarDAO = new AlocarDAO();
            $retorno = $alocarDAO ->contarAlocacoes();
            $contagem = $retorno[0] -> contagem;

             $tamanho= 100*$contagem / 20;
        ?>
    </head>

    <body class="bg-home" >
        
        <div class="row">
            <div class="z-depth-5">
                <?php include "menu.php" ?>
                <div class="col l10 s12 bg-main">
                    <div class="row">
                        <header class="col s12 cabecalho">
                            <h5>Vagas</h5>
                             <div class=" col l4 s10 progress">
                                  <div class="determinate" style="width: <?php echo $tamanho?>% " ></div>
                              </div>
                            <div class="col s2">
                                <span id="disp">
                                    <?php
                                        echo $contagem;
                                    ?> / 20
                                </span>
                            </div>
                        </header>
                    </div>
                    <div class="row">
                        <main class="col s12 bg-vagas">
                    <?php
                    $alocarDAO = new AlocarDAO();
                    $listarAlocacao = $alocarDAO->listarAlocacao();

                    foreach($listarAlocacao as $dado){
                        echo"<div class='col l3 s12 {$dado->status} center-align z-depth-2'>";
                            echo "<div class='descricao'>";
                                echo "<p class='numero'>$dado->vaga</p>";
                                echo "<span class='status'>Ocupada</span>" ;
                            echo "</div>" ;
                    ?>
                                <a class='waves-effect waves-light btn' <?php echo "id='{$dado->status}' href='#{$dado->status}'>{$dado->status}</a>" ;
                        echo "</div>" ;
                    }
                    ?>

                        <form id="alocar" class="modal" method="post">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="input-field col s12 l10">
                                        <input id="vaga" name="vaga" type="hidden">
                                        <input id="oper" name="oper" type="hidden">
                                        <input id="idveiculo" name="idveiculo" type="hidden">
                                    </div>
                                </div>
                                <div class="row">
                                    <h4 class="col s12">buscar veículo (placa) </h4>
                                    <div class="input-field offset-l1 col l9 s10">
                                          <input id="pesquisar" type="text">
                                    </div>
                                    <a class="waves-effect waves-light btn col l1 s2 pesquisar" onclick="f1()" ><i class="material-icons center">search</i></a>

                                    <div class="row">
                                        <div class="input-field offset-l1 col s12 l10">
                                            <input disabled id="nome" type="text" placeholder="Proprietario">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field offset-l1 col l10 s12">
                                            <input disabled id="veiculo" type="text" placeholder="Veículo">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col offset-l1 l5 s12">
                                            <input disabled id="datae" name="datae" type="date">
                                        </div>
                                        <div class="input-field col l5 s12">
                                            <input disabled id="horai" name="horai" type="time">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat confirmar-alocar" onclick="f2()" >Ok</a>
                                <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat" onclick="limpar()">Cancelar</a>
                            </div>
                        </form>

                        <form id="liberar" class="modal">
                            <div class="modal-content">
                                <h4>Liberar vaga</h4>
                                <div class="row">
                                    <div class="input-field col s12 l10">
                                        <input id="vagal" name="vagal" type="hidden">
                                        <input id="operl" name="operl" type="hidden">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field offset-l1 col s12 l10 ">
                                        <input disabled id="nomel" placeholder="João da Silva" type="text">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field offset-l1 col s12 l5">
                                        <input disabled id="veiculol" type="text" placeholder="Veículo">
                                    </div>
                                    <div class="input-field col s12 l5">
                                        <input disabled id="placal" type="text" placeholder="Placa">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field offset-l1 col l10 s12">
                                        <input disabled id="datael" type="date">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field offset-l1 col l5 s12">
                                        <input disabled id="horail" type="time" placeholder="">
                                    </div>
                                    <div class="input-field col l5 s12">
                                        <input disabled id="horaf" type="time">
                                    </div>
                                </div>
                                <div class="input-field offset-l1 col l10 s12">
                                    <input disabled id="tempo" type="time">
                                </div>

                                <div class="row">
                                    <div class="input-field offset-l1 col l5 s12">
                                        <select name="tipo" id="op">
                                            <option value="0">Selecione um período</option>
                                            <?php
                                            $periodoDAO = new PeriodoDAO();
                                            $listarPeriodo = $periodoDAO->listarPeriodos();

                                            foreach($listarPeriodo as $dado) {
                                              ?>  "<option onclick='f3()'  <?php echo "value='{$dado-> id_periodo}'>{$dado-> periodo}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="input-field col l5 s12">
                                        <input disabled id="valor" type="text" placeholder="Valor">
                                    </div>
                                </div>

                                </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat confirmar-liberar" onclick="f4()">Ok</a>
                                <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
                            </div>
                        </form>
                            
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
                                <a class="social" href="https://www.twitter.com"target="_blank"><i class="fa fa-twitter"></i></a
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
        <script type="text/javascript" src="../lib/jquery/main.js"></script>
        <script type="text/javascript" src="../lib/fontawsome/font.js"></script>

        <script>

            function f1() {

                var placa = document.getElementById("pesquisar").value;

                $.ajax({
                    url: "carregarVeiculo.php",
                    type: "POST",
                    data: "placa="+placa,
                    dataType: "html"

                }).done(function(resposta) {
                    console.log(resposta);

                        var alocar = JSON.parse(resposta);

                        if(alocar[0].msg){
                                alert(alocar[0].msg);
                        }
                        else {
                            document.getElementById("nome").value = alocar[0].nome;
                            document.getElementById("veiculo").value = alocar[0].modelo;
                            document.getElementById("datae").value = alocar[0].datai;
                            document.getElementById("horai").value = alocar[0].horai;
                            document.getElementById("idveiculo").value = alocar[0].id_veiculo;
                        }



                }).fail(function(jqXHR, textStatus ) {
                    console.log("Request failed: " + textStatus);

                }).always(function() {
                    console.log("completou");
                });
            }

            function f2() {

                var vaga = document.getElementById("vaga").value;
                var oper = document.getElementById("oper").value;
                var nome = document.getElementById("nome").value;
                var idveiculo = document.getElementById("idveiculo").value;
                var horai = document.getElementById("horai").value;
                var datae = document.getElementById("datae").value;

                $.ajax({
                    url: "inserirAlocar.php",
                    type: "POST",
                    data: "vaga="+vaga+"&oper="+oper+"&nome="+nome+"&idveiculo="+idveiculo+"&horai="+horai+"&datae="+datae,
                    dataType: "html"

                }).done(function(resposta) {
                    console.log(resposta);

                    window.location.reload();

                }).fail(function(jqXHR, textStatus ) {
                    console.log("Request failed: " + textStatus);

                }).always(function() {
                    console.log("completou");
                });
            }
            function f4(){

                var vagal = document.getElementById("vagal").value;
                var operl = document.getElementById("operl").value;
                var nomel = document.getElementById("nomel").value;
                var veiculol = document.getElementById("veiculol").value;
                var placal = document.getElementById("placal").value;
                var horail = document.getElementById("horail").value;
                var horaf = document.getElementById("horaf").value;
                var datael = document.getElementById("datael").value;
                var periodo = document.getElementById("op").value;

                $.ajax({
                    url: "inserirRegistro.php",
                    type: "POST",
                    data: "vagal="+vagal+"&operl="+operl+"&placal="+placal+"&nomel="+nomel+"&veiculol="+veiculol+"&horail="+horail+"&datael="+datael+"&horaf="+horaf+"&periodo="+periodo,
                    dataType: "html"

                }).done(function(resposta) {
                    console.log(resposta);

                    window.location.reload();

                }).fail(function(jqXHR, textStatus ) {
                    console.log("Request failed: " + textStatus);

                }).always(function() {
                    console.log("completou");
                });
            }

            function limpar(){
                document.getElementById("nome").value = "";
                document.getElementById("veiculo").value = "";
                document.getElementById("datae").value = "";
                document.getElementById("horai").value = "";
                document.getElementById("idveiculo").value = "";
                document.getElementById("pesquisar").value = "";
            }

        </script>
    </body>
  </html>

