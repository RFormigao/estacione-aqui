<?php
    require_once "auto.php";
    if($_POST){
        $operl = $_POST["operl"];

        switch ($operl){
            case "L":
                echo"<script>console.log('oi');</script>";
                $periodo = new Periodo($_POST["periodo"]);
                $veiculo = new Veiculo(null,$_POST["placal"],$_POST["veiculol"],null,null);
                $alocar = new Alocar(null,$_POST["vagal"], $_POST["horail"],null,$_POST["datael"],null,$periodo, $veiculo);

                $alocarDAO = new AlocarDAO();
                $retorno = $alocarDAO->inserirRegistro($alocar);
                break;
        }
    }