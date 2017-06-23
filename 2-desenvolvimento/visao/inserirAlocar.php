<?php
    require_once "auto.php";
    if($_POST){
        $oper = $_POST["oper"];

        switch ($oper){
            case "I":
                $veiculo = new Veiculo($_POST["idveiculo"]);
                $alocar = new Alocar(null,$_POST["vaga"], $_POST["horai"],null,$_POST["datae"],null,null, $veiculo);

                $alocarDAO = new AlocarDAO();
                $retorno = $alocarDAO->inserirAlocacao($alocar);
                break;
        }
    }