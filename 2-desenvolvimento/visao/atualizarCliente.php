<?php
	if($_POST)
	{
		require_once 'auto.php';
        $cli = new cliente($_POST["id"]);
        $clienteDAO = new ClienteDAO();
        $resposta = $clienteDAO->buscarClientes($cli);
        echo json_encode($resposta);
	}
?>