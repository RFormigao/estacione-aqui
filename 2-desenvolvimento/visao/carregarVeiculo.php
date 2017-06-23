<?php
    if($_POST)
    {
        require_once 'auto.php';
        $veiculo = new Veiculo(NULL,$_POST["placa"],null,null,null);
        $alocarDAO = new AlocarDAO();
        $resposta = $alocarDAO->buscarVeiculos($veiculo);
        echo json_encode($resposta);
    }
?>