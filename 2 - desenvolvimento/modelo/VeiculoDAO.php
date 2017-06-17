<?php


final class VeiculoDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listatVeiculos(){

        $sql = "SELECT * FROM vw_listarveiculos";

        try {

            $f = $this->db->prepare($sql);
            $ret = $f->execute();

            $this->db =  null;

            if(!$ret){
                die ("Erro ao listar veiculos.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }

        }
        catch (Exception $e){
            $e->getMessage();
        }
    }


    public function inserirVeiculos($veiculo){

        $sql = "CALL inserirVeiculos(?,?,?,?)";

        try {
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $veiculo->getPlaca());
            $f->bindValue(2, $veiculo->getModelo());
            $f->bindValue(3, $veiculo->getCliente()->getIdCliente());
            $f->bindValue(4, $veiculo->getStatus());

            $ret = $f->execute();

            $this->db = null;

            if (!$ret) {
                die ("Erro ao inserir veiculo.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function alterarVeiculos($veiculo){
        $sql = "CALL alterarVeiculos(?,?,?,?)";

        try {
            $f = $this->db->prepare($sql);

            $f->bindValue(1, $veiculo->getIdVeiculo());
            $f->bindValue(2, $veiculo->getPlaca());
            $f->bindValue(3, $veiculo->getModelo());
            $f->bindValue(4, $veiculo->getCliente()->getIdCliente());

            $ret = $f->execute();

            $this->db = null;

            if (!$ret) {
                die ("Erro ao alterar veiculo.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }

        } catch (Exception $e) {
            die ($e->getMessage());
        }

    }

    public  function excluirVeiculos($veiculo){

        $sql = "CALL excluirVeiculos(?)";
        try {

            $f = $this->db->prepare($sql);
            $f->bindValue(1, $veiculo->getIdVeiculo());
            $ret = $f->execute();

            if (!$ret) {
                die ("Erro ao excluir veiculo.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }

        } catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function buscarVeiculos($veiculo)
    {
        $sql = "SELECT * FROM veiculo WHERE id_veiculo = ?";

        try
        {
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $veiculo->getIdVeiculo());
            $ret = $f->execute();

            $this -> db = null;

            if(!$ret){
                die ("Erro ao buscar um veiculo.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die ($e->getMessage());
        }
    }

}