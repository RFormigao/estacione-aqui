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
                        <li><a href="cliente.php">Gerenciar Clientes</a></li>
                        <li  class="ativo"><a href="funcionario.php">Gerenciar Funcionários</a></li>
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
                                        <tr>
                                            <td><input type="checkbox" id="id"/><label for="id"></label></td>
                                            <td><label for="id">Robson Formigão Gomes</label></td>
                                            <td><label for="id">460.706.578-10</label></td>
                                            <td><label for="id">(14) 99742-5930 </label></td>
                                            <td><label for="id">(14) 3624-7391 </label></td>
                                            <td><label for="id">17204670</label></td>
                                            <td><label for="id">Rua Deolindo de Oliveira e Souza</label></td>
                                            <td><label for="id">Jardim Sanzovo</label></td>
                                            <td><label for="id">Jau</label></td>
                                            <td><label for="id">SP</label></td>
                                            <td><label for="id">RFormigao</label></td>
                                            <td><label for="id">knop01234</label></td>
                                            <td><label for="id">administrador</label></td>
                                        </tr>  
                                        
                                        <tr>
                                            <td><input type="checkbox" id="id2"/><label for="id2"></label></td>
                                            <td><label for="id2">Jaqueline Paschoal</label></td>
                                            <td><label for="id2">597.462.715-80</label></td>
                                            <td><label for="id2">(14) 99749-1485 </label></td>
                                            <td><label for="id2">(14) 3646-7265 </label></td>
                                            <td><label for="id2">17215632</label></td>
                                            <td><label for="id2">Rua Abolição</label></td>
                                            <td><label for="id2">Centro</label></td>
                                            <td><label for="id2">Mineiros do Tiete</label></td>
                                            <td><label for="id2">SP</label></td>
                                            <td><label for="id2">JaquePaschoal</label></td>
                                            <td><label for="id2">jaque123</label></td>
                                            <td><label for="id2">administrador</label></td>
                                        </tr> 
                                    </tbody>
                                    </table>
                                </div>
                                
                                <a class="waves-effect waves-light btn green alocar col s12 l2 inserir" href="#inserir">Inserir</a>
                                <a class="waves-effect waves-light btn alocar col s12 l2 alterar disabled " href="#alterar">Alterar</a>
                                <a class="waves-effect waves-light btn red alocar col s12 l2 remover disabled" href="#remover">Remover</a>
                                
                                <form id="inserir" class="modal">
                                    <div class="modal-content">
                                        <div class="row">
                                            <h4 class="col s12">Cadastrar Funcionário </h4>
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="input-field col s12 l10">
                                                    <input id="nome" type="text">
                                                    <label for="nome">Nome:</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12 l10">
                                                    <input id="cpf" type="text">
                                                    <label for="cpf">Cpf:</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col l5 s12">
                                                    <input id="cpf" type="text">
                                                    <label for="cpf">Celular:</label>
                                                </div>
                                                <div class="input-field col l5 s12">
                                                    <input id="telefone" type="text">
                                                    <label for="telefone">Telefone:</label>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="input-field col s12 l10">
                                                    <input id="cep" type="text">
                                                    <label for="cep">Cep:</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col l5 s12">
                                                    <input id="logradouro" type="text">
                                                    <label for="logradouro">Logradouro:</label>
                                                </div>
                                                <div class="input-field col l5 s12">
                                                    <input id="bairro" type="text">
                                                    <label for="bairro">Bairro:</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col l5 s12">
                                                    <input id="cidade" type="text">
                                                    <label for="cidade">Cidade:</label>
                                                </div>
                                                <div class="input-field col l5 s12">
                                                    <input id="uf" type="text">
                                                    <label for="uf">UF:</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col l5 s12">
                                                    <input id="usuario" type="text">
                                                    <label for="usuario">Usuário:</label>
                                                </div>
                                                <div class="input-field col l5 s12">
                                                    <input id="senha" type="text">
                                                    <label for="senha">Senha:</label>
                                                </div>
                                            </div>
                                            <div class="row input-field">
                                                <select>
                                                  <option value="1">Administrador</option>
                                                  <option value="2">Funcionário</option>
                                                </select>
                                                <label>Tipo:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat inserir-funcionario">Ok</a> 
                                        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>   
                                    </div>
                                </form>
                                <form id="remover" class="modal">
                                    <div class="modal-content">
                                        <div class="row">
                                           <h4><h4>Você tem certeza disso?</h4>
                                            <p><span class="atencao">Atenção:</span> Ao clicar em "SIM" o funcionário será removido para sempre.</p>  
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat inserir-funcionario">Sim</a> 
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

