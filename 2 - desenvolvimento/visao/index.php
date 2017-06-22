
<!DOCTYPE html>
  <html>
    <head>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="../css/main.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta charset="UTF-8">    
        <title>Home</title>

    </head>

    <body class="bg-home">
        
        <div class="row">
            <div class="z-depth-5">

                <?php include "menu.php" ?>
                <?php
                if($_POST){
                    $oper = $_POST["oper"];

                    switch ($oper){
                        case "I":
                            $veiculo = new Veiculo($_POST["idveiculo"]);
                            $alocar = new Alocar(null,$_POST["vaga"],$_POST["horai"],$_POST["data"],$veiculo);
                            $alocarDAO = new AlocarDAO();
                            $retorno = $alocarDAO->inserirAlocacao($alocar);
                            if($retorno[0] -> msg){
                                echo $retorno[0] -> msg ;
                            }
                            break;
                    }
                }
                ?>
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
                        <main class="col s12 bg-vagas">
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">1</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">2</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">3</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">4</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">5</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                             <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">6</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">7</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">8</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">9</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">10</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">11</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">12</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">13</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">14</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">15</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                             <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">16</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">17</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">18</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">19</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                          
                            <div class="col l3 s12 vaga center-align z-depth-2">
                                <div class="descricao">
                                    <p class="numero">20</p>
                                    <span class="status">Ocupada</span>
                                </div>
                                <span class="hora">HH:MM:SS</span>
                                <a class="waves-effect waves-light btn alocar" href="#alocar">Alocar</a>
                            </div>
                            
                            
                            <form id="alocar" class="modal" method="post" action="#">
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
                                                <input disabled id="data" name="data" type="date">
                                            </div>
                                            <div class="input-field col l5 s12">
                                                <input disabled id="horai" name="horai" type="time">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Ok" class="modal-action waves-effect waves-green btn-flat confirmar-alocar"/>
                                    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>   
                                </div>
                            </form>
                            
                            <form id="liberar" class="modal">
                                <div class="modal-content">
                                    <h4>Liberar vaga</h4>
                                    <div class="row">
                                        <div class="input-field col s12 l10 ">
                                            <input disabled id="proprietario" placeholder="João da Silva" type="text">
                                            <label for="proprietario">Proprietário:</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12 l5">
                                            <input disabled id="veiculo" type="text">
                                            <label for="veiculo">Veículo:</label>
                                        </div>
                                        <div class="input-field col s12 l5">
                                            <input disabled id="placa" type="text">
                                            <label for="placa">Placa:</label>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="input-field col l10 s12">
                                            <input disabled id="data" type="date">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="input-field col l5 s12">
                                            <input disabled id="horai" type="text">
                                            <label for="horai">Hora Inicial:</label>
                                        </div>
                                        <div class="input-field col l5 s12">
                                            <input disabled id="horaf" type="text">
                                            <label for="horaf">Hora Final:</label>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="input-field col s12 valor">
                                            <input disabled value="100,00" id="valor" type="text">
                                            <label for="valor">Valor:</label>
                                        </div>
                                    </div>

                                    </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat confirmar-liberar">Ok</a>
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

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../lib/materialize/materialize.min.js"></script>
        <script type="text/javascript" src="../lib/materialize/main.js"></script>
        <script src="https://use.fontawesome.com/f79af210b2.js"></script>

        <script>
            function f1() {

                var placa = document.getElementById("pesquisar").value;

                $(function(){
                    $.ajax({
                        //Tipo de envio POST ou GET
                        type: "POST",
                        //Caminho do arquivo
                        url: "carregarVeiculo.php",
                        //dados passados via POST
                        data: "placa="+placa,
                        //Se der tudo ok

                        success: function(resposta){
                            var peri = JSON.parse(resposta);
                            document.getElementById("nome").value = peri[0].nome;

                        }
                    });
                });

                $.ajax({
                    url: "carregarVeiculo.php",
                    type: "POST",
                    data: "placa="+placa,
                    dataType: "html"

                }).done(function(resposta) {
                    console.log(resposta);
                    var alocar = JSON.parse(resposta);
                    document.getElementById("nome").value = alocar[0].nome;
                    document.getElementById("veiculo").value = alocar[0].modelo;
                    document.getElementById("data").value = alocar[0].datai;
                    document.getElementById("horai").value = alocar[0].horai;
                    document.getElementById("idveiculo").value = alocar[0].id_veiculo;

                }).fail(function(jqXHR, textStatus ) {
                    console.log("Request failed: " + textStatus);

                }).always(function() {
                    console.log("completou");
                });
            }
        </script>
    </body>
  </html>

