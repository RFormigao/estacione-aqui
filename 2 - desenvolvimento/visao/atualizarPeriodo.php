<?php
if($_POST)
{
    require_once 'auto.php';
    $periodo = new Periodo($_POST["id"]);
    $periodoDAO = new PeriodoDAO();
    $resposta = $periodoDAO->buscarPeriodos($periodo);
    echo json_encode($resposta);
}
?>