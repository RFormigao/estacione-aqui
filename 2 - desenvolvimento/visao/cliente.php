<?php
    require_once 'auto.php';
    if($_POST)
	{
        $oper = $_POST["oper"];


            switch ($oper) {
                case "I":
                    $cliente = new cliente(null, $_POST["proprietario"], $_POST["cpf"], $_POST["telefone"]);
                    $clienteDAO = new ClienteDAO();
                    $retorno =  $clienteDAO->inserirClientes($cliente);
                    $msg = $retorno[0] -> msg;
                    if($msg){
                        echo $msg ;
                    }

                    break;

                case "A":
                    $cliente = new cliente($_POST["id"],$_POST["proprietario"], $_POST["cpf"], $_POST["telefone"]);
                    $clienteDAO = new ClienteDAO();
                    $retorno =  $clienteDAO->alterarClientes($cliente);
                    $msg = $retorno[0] -> msg;
                    if($msg){
                        echo $msg ;
                    }

                    break;
				case "E":
                    $cliente = new cliente($_POST["id"]);
                    $clienteDAO = new ClienteDAO();
                    $retorno = $clienteDAO->excluirClientes($cliente);

                    if($retorno[0] -> msg){
                      $msg = $retorno[0]->msg;
                        echo $msg;
                    }

                    break;
            }


        header("Location:cliente.php");
    }


?>
<!DOCTYPE html>
  <html>
    <head>
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="../css/main.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta charset="UTF-8">
        <title>Gerenciar Clientes</title>

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
					url: "atualizar.php",
					//dados passados via POST 
					data: "id="+id,
					//Se der tudo ok 
					
					success: function(resposta){
						var cli = JSON.parse(resposta);
						document.getElementById("id").value = cli[0].id_cliente;
						document.getElementById("proprietario").value = cli[0].nome;
						document.getElementById("cpf").value = cli[0].cpf;
						document.getElementById("telefone").value = cli[0].telefone;
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
    </head>

    <body class="bg-home">

        <div class="row">
            <div class="z-depth-5">
                <nav class="col l2 s12 menu">

                    <div class="center-align">
                        <img class="img-responsive" src="../img/perfil.png">
                        <h1>José Almeida</h1>
                        <h2>Administrador</h2>
                    </div>
                    
                    <h3>Dashboard</h3>
                    <ul class="itens-menu">
                        <li><a href="index.php">Gerenciar Vagas</a></li>
                    </ul>
                    
                    <h3>Cadastros</h3>
                    <ul class="itens-menu">
                        <li class="ativo"><a href="cliente.php">Gerenciar Clientes</a></li>
                        <li><a href="funcionario.php">Gerenciar Funcionários</a></li>
                        <li><a href="preco.php">Gerenciar Preços</a></li>
                        <li><a href="veiculo.php">Gerenciar Veículos</a></li>
                    </ul>
                    
                    <h3>Relatórios</h3>
                    <ul class="itens-menu">
                        <li>Faturamento</li>
                    </ul>                    
                </nav>
                
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
                        <main class="col s12 bg-cadastros">
                            <div class="row">
                                <h4 class="titulos col s12">Gerenciar Clientes</h4>
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
                                                <th>Nome</th>
                                                <th>Cpf</th>
                                                <th>Telefone</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                                $clienteDAO = new ClienteDAO();
                                                $listarCliente = $clienteDAO->listarClientes();

                                                foreach($listarCliente as $dado){
                                                    echo"<tr>";
                                                    echo"<td><input type='checkbox' name='check' id='{$dado->id_cliente}'  /><label for='{$dado->id_cliente}'></label></td>";
                                                    echo"<td><label for='{$dado->id_cliente}'>{$dado->nome}</label></td>";
                                                    echo"<td><label for='{$dado->id_cliente}'>{$dado->cpf}</label></td>";
                                                    echo"<td><label for='{$dado->id_cliente}'>{$dado ->telefone}</label></td>";
                                                    echo"</tr>";

                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <a class="waves-effect waves-light btn green alocar col s12 l2 inserir" onclick="f1()" href="#inserir">Inserir</a>
                                <a class="waves-effect waves-light btn alocar col s12 l2 alterar disabled" onclick="f2()"  href="#inserir">Alterar</a>
                                <a class="waves-effect waves-light btn red alocar col s12 l2 remover disabled" onclick="f3()"href="#remover">Remover</a>

                                <form action="#" id="inserir" class="modal" method="POST">
                                    <div class="modal-content">
                                        <div class="row">
                                            <h4 class="col s12">Cadastrar Cliente </h4>
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
                                                    <input id="proprietario" name="proprietario" type="text">
                                                    <!--label for="proprietario">Nome:</label-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col l5 s12">
                                                    <input id="cpf" name="cpf" type="text">
                                                    <!--label for="cpf">Cpf:</label-->
                                                </div>
                                                <div class="input-field col l5 s12">
                                                    <input id="telefone" name="telefone" type="text">
                                                    <!--label for="telefone">Telefone:</label-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Ok" class="modal-action modal-close waves-effect waves-green btn-flat inserir-cliente"/>
                                        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
                                    </div>
                                </form>
                                
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


      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../lib/materialize/materialize.min.js"></script>
      <script type="text/javascript" src="../lib/materialize/tablesorter.min.js"></script>
      <script type="text/javascript" src="../lib/materialize/main.js"></script>
      <script src="https://use.fontawesome.com/f79af210b2.js"></script>
    </body>
  </html>

