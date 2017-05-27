<?php

final class ClienteDAO extends Conexao
{

    public function __construct()
    {
        parent::__construct();
    }

    public function listarClientes (){
        $sql = "SELECT * FROM vw_listarClientes";

        try
        {
            $f = $this->db->prepare($sql);
            $ret = $f->execute();

            $this -> db = null;

            if(!$ret){
                die ("Erro ao listar clientes.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function inserirClientes ($cliente){
        $sql = "CALL inserirClientes(?,?,?)";

        try
        {
            $f = $this->db->prepare ($sql);
            $f->bindValue(1,$cliente-> getNome());
            $f->bindValue(2,$cliente-> getCpf()) ;
            $f->bindValue(3,$cliente-> getTelefone()) ;

            $ret = $f->execute();

            $this -> db = null;

            if(!$ret){
                die ("Erro ao inserir cliente.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die ($e->getMessage());
        }
    }
}