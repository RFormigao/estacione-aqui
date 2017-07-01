<?php


final class AlocarDAO extends conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listarAlocacao()
    {
        $sql = "SELECT * FROM vw_listarAlocacao";

        try {
            $f = $this->db->prepare($sql);
            $ret = $f->execute();

            $this->db = null;

            if (!$ret) {
                die ("Erro ao listar alocacao.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function buscarVeiculos($veiculo){
        $sql = "call buscarVeiculos(?)";

        try
        {
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $veiculo->getPlaca());
            $ret = $f->execute();

            $this -> db = null;

            if(!$ret){
                die ("Erro ao buscar veiculo.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function inserirAlocacao($alocacao){
        $sql = "call inserirAlocacao (?,?,?,?)";
        try
        {
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $alocacao->getVaga());
            $f->bindValue(2, $alocacao->getHoraEntrada());
            $f->bindValue(3, $alocacao->getDataa());
            $f->bindValue(4, $alocacao->getVeiculo()->getIdVeiculo());
            $ret = $f->execute();

            $this -> db = null;

            if(!$ret){
                die ("Erro ao inserir alocação.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function buscarAlocacao($alocacao) {
        $sql = "CALL buscarAlocacao(?)";
        try
        {
            $f = $this->db->prepare($sql);
            $f->bindValue(1,$alocacao->getVaga());
            $ret = $f->execute();

            $this -> db = null;

            if(!$ret){
                die ("Erro ao inserir alocação.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function inserirRegistro($alocacao){
        $sql = "call inserirRegistro (?,?,?,?,?,?,?)";
        try
        {
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $alocacao->getVaga());
            $f->bindValue(2, $alocacao->getDataa());
            $f->bindValue(3, $alocacao->getHoraEntrada());
            $f->bindValue(4, $alocacao->getHoraSaida());
            $f->bindValue(5, $alocacao->getPeriodo()->getIdPeriodo());
            $f->bindValue(6, $alocacao->getVeiculo()->getPlaca());
            $f->bindValue(7, $alocacao->getVeiculo()->getModelo());
            $ret = $f->execute();

            $this -> db = null;

            if(!$ret){
                die ("Erro ao inserir registro.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function contarAlocacoes(){
        $sql = "SELECT * FROM  vw_contarAlocacoes;";
        try
        {
            $f = $this->db->prepare($sql);;
            $ret = $f->execute();

            $this -> db = null;

            if(!$ret){
                die ("Erro contar alocações.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die ($e->getMessage());
        }
    }
}