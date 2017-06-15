<?php

final class PessoaDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($pessoa)
    {
        $sql = "call login (?,?)";

        try {
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $pessoa->getUsuario());
            $f->bindValue(2, $pessoa->getSenha());

            $ret = $f->execute();


            $this->db = null;

            if(!$ret) {
                die ("Erro ao logar no sistema");
            } else
            {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function listarPessoas(){
        $sql = "SELECT * FROM vw_listarfuncionarios";

        try {
            $f = $this->db->prepare($sql);
            $ret = $f->execute();

            $this->db = null;

            if(!$ret){
                die ("Erro ao listar pessoa.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e){
            die ($e->getMessage());
        }
    }
    public function inserirPessoas ($pessoa){
        $sql = "CALL inserirPessoas(?,?,?,?,?,?,?,?,?,?,?,?,?)";

        try
        {
            $f = $this->db->prepare ($sql);
            $f->bindValue(1,$pessoa->getNome());
            $f->bindValue(2,$pessoa->getCpf()) ;
            $f->bindValue(3,$pessoa->getTelefone()) ;
            $f->bindValue(4,$pessoa->getCelular()) ;
            $f->bindValue(5,$pessoa->getLogradouro());
            $f->bindValue(6,$pessoa->getBairro()) ;
            $f->bindValue(7,$pessoa->getCep()) ;
            $f->bindValue(8,$pessoa->getCidade()) ;
            $f->bindValue(9,$pessoa->getUf());
            $f->bindValue(10,$pessoa->getUsuario()) ;
            $f->bindValue(11,$pessoa->getSenha()) ;
            $f->bindValue(12,$pessoa->getTipo() -> getIdTipo()) ;
            $f->bindValue(13,$pessoa->getStatus()) ;

            $ret = $f->execute();

            $this -> db = null;

            if(!$ret){
                die ("Erro ao inserir funcionario.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function alterarPessoas ($pessoa){
        $sql = "CALL alterarPessoas(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        try {
            $f = $this->db->prepare($sql);

            $f->bindValue(1,$pessoa->getIdPessoa());
            $f->bindValue(2,$pessoa->getNome());
            $f->bindValue(3,$pessoa->getCpf()) ;
            $f->bindValue(4,$pessoa->getTelefone()) ;
            $f->bindValue(5,$pessoa->getCelular()) ;
            $f->bindValue(6,$pessoa->getLogradouro());
            $f->bindValue(7,$pessoa->getBairro()) ;
            $f->bindValue(8,$pessoa->getCep()) ;
            $f->bindValue(9,$pessoa->getCidade()) ;
            $f->bindValue(10,$pessoa->getUf());
            $f->bindValue(11,$pessoa->getUsuario()) ;
            $f->bindValue(12,$pessoa->getSenha()) ;
            $f->bindValue(13,$pessoa->getTipo() -> getIdTipo()) ;

            $ret = $f->execute();
            $this->db = null;

            if(!$ret){
                die("Erro ao alterar pessoa");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function buscarPessoas($pessoa)
    {
        $sql = "SELECT * FROM pessoa WHERE id_pessoa = ?";

        try
        {
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $pessoa->getIdPessoa());
            $ret = $f->execute();

            $this -> db = null;

            if(!$ret){
                die ("Erro ao buscar uma pessoa.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function excluirPessoas($pessoa){
        $sql = "CALL excluirPessoas(?)";
        try {
            $f = $this->db->prepare($sql);

            $f->bindValue(1,$pessoa->getIdPessoa());

            $ret = $f->execute();
            $this->db = null;

            if(!$ret){
                die("Erro ao excluir pessoa");
            }else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

}