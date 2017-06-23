<?php
    if($_POST)
    {
        require_once 'auto.php';
        $pessoa = new Pessoa ($_POST["id"]);
        $pessoaDAO = new PessoaDAO();
        $resposta = $pessoaDAO->buscarPessoas($pessoa);
        echo json_encode($resposta);
    }
?>