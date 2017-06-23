<?php
    require_once "auto.php";
    if(!isset($_SESSION))
    {
        session_start();
    }
    if(isset($_SESSION["tipo"]))
    {
        echo "<nav class='col l2 s12 menu'>";
            echo "<div class='center-align'>";
                echo "<img class='img-responsive' src='../img/perfil.png'>";
                echo "<h1>{$_SESSION['nome']}</h1>";
                echo "<h2>{$_SESSION['descritivo']}</h2>";
            echo "</div>";

            echo "<h3>Dashboard</h3>";
            echo "<ul class='itens-menu'>";
                echo "<li class='ativo'> <a href='index.php'>Gerenciar Vagas</a></li>";
            echo "</ul>";

            echo "<h3>Cadastros</h3>";

            echo "<ul class='itens-menu'>";
                foreach($_SESSION["menu"] as $dado){
                    echo "<li><a href='{$dado->link}'>{$dado->descritivo}</a></li>";
                }
            echo "</ul>";

            echo "<h3>Relatórios</h3>";
            echo "<ul class='itens-menu'>";
                    echo "<li>Faturamento</li>";
            echo "</ul>";
                echo "<a class='btn-floating btn-large waves-effect waves-light red' href='sair.php'><i class='large material-icons'>input</i></a>";

        echo "</nav>";
    }

?>
