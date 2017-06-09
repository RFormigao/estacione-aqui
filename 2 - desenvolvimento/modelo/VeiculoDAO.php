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
}