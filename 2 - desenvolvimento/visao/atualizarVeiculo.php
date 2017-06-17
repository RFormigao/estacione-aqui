<?php

    if($_POST){
        require_once 'auto.php';
        $veiculo = new Veiculo($_POST["id"]);
        $veiculoDAO = new VeiculoDAO();
        $resposta = $veiculoDAO->buscarVeiculos($veiculo);
        echo json_encode($resposta);

    }