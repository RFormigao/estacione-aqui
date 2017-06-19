<?php


final class alocarDAO extends conexao
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
}