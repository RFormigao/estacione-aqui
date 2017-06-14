<?php
    if($_POST)
    {
        require_once 'auto.php';

        $cli = new cliente($_POST["id2"]);
        $clienteDAO = new ClienteDAO();
        $resposta = $clienteDAO->excluirClientes($cli);
        echo json_encode($resposta);
    }
?>