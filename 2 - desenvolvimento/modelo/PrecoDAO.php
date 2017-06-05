<?php

final class PrecoDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listarPrecos (){
        $sql = "SELECT * FROM vw_listarPrecos";

        try
        {
            $f = $this->db->prepare($sql);
            $ret = $f->execute();

            $this -> db = null;

            if(!$ret){
                die ("Erro ao listar os preços.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function inserirPreco ($preco)
    {
        $sql = "CALL inserirPrecos(?,?)";

        try {
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $preco->getPeriodo());
            $f->bindValue(2, $preco->getValor());

            $ret = $f->execute();

            $this->db = null;

            if (!$ret) {
                die ("Erro ao inserir preço.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (Exception $e) {
            die ($e->getMessage());
        }
    }
}