<?php

    require_once "auto.php";

    $periodo = new Periodo($_POST["idperiodo"],null,null,null);
    $periodoDAO = new PeriodoDAO();
    $resposta = $periodoDAO->buscarValor($periodo);
    echo json_encode($resposta);


