<?php

    require_once "auto.php";
    if($_POST){
        $operl = $_POST["operl"];

        switch ($operl){
            case "L":
                $alocar = new alocar(null, $_POST["vagal"], null,null,null,null, null, null);
                $alocarDAO = new AlocarDAO();
                $resposta = $alocarDAO->buscarAlocacao($alocar);
                echo json_encode($resposta);
                break;
        }
    }
?>