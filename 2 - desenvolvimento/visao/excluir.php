<?php
    if($_POST)
    {
        require_once 'auto.php';
        echo "<script>alert('oii')</script>";
        $cli = new cliente($_POST["id"]);
        $clienteDAO = new ClienteDAO();
        $resposta = $clienteDAO->excluirClientes($cli);
        echo json_encode($resposta);
    }
?>