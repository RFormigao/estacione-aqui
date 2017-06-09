<?php

/**
 * Created by PhpStorm.
 * User: RFormigao
 * Date: 26/05/2017
 * Time: 08:39
 */
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

}