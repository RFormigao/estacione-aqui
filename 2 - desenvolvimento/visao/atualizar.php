<?php
	if($_POST)
	{
		require_once 'auto.php';
        $cli = new cliente($_POST["id"]);
        $clienteDAO = new ClienteDAO();
        $resposta = $clienteDAO->buscar_um_cliente($cli);
        echo json_encode($resposta);
	}
?>