<?php

final class PeriodoDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listarPeriodos (){
        $sql = "SELECT * FROM vw_listarPrecos";

        try
        {
            $f = $this->db->prepare($sql);
            $ret = $f->execute();

            $this -> db = null;

            if(!$ret){
                die ("Erro ao listar os periodo.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function inserirPeriodos ($periodo)
    {
        $sql = "CALL inserirPeriodos(?,?,?)";

        try {
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $periodo->getPeriodo());
            $f->bindValue(2, $periodo->getValor());
            $f->bindValue(3, $periodo->getStatus());

            $ret = $f->execute();

            $this->db = null;

            if (!$ret) {
                die ("Erro ao inserir periodo.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function alterarPeriodos ($periodo){
        $sql = "CALL alterarPeriodos(?,?,?)";
        try {
            $f = $this->db->prepare($sql);

            $f->bindValue(1,$periodo->getIdPeriodo());
            $f->bindValue(2,$periodo->getPeriodo());
            $f->bindValue(3,$periodo->getValor());

            $ret = $f->execute();
            $this->db = null;

            if(!$ret){
                die("Erro ao alterar periodo");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function excluirPeriodos($periodo){
        $sql = "CALL excluirPeriodos(?)";
        try {
            $f = $this->db->prepare($sql);

            $f->bindValue(1,$periodo->getIdPeriodo());

            $ret = $f->execute();
            $this->db = null;

            if(!$ret){
                die("Erro ao excluir periodo");
            }else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function buscarPeriodos($peri)
    {
        $sql = "SELECT * FROM periodo WHERE id_periodo = ?";

        try
        {
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $peri->getIdPeriodo());
            $ret = $f->execute();

            $this -> db = null;

            if(!$ret){
                die ("Erro ao buscar um preço.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function buscarValor($peri){
        $sql = "CALL buscarValor(?) ";

        try
        {
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $peri->getIdPeriodo());
            $ret = $f->execute();

            $this -> db = null;

            if(!$ret){
                die ("Erro ao buscar um valor.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die ($e->getMessage());
        }
    }
}