<?php


final class AlocarDAO extends conexao
{
    public function __construct()
    {
        parent::__construct();
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
}