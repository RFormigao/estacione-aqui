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
}