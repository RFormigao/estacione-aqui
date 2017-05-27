<?php

/**
 * Created by PhpStorm.
 * User: RFormigao
 * Date: 26/05/2017
 * Time: 08:39
 */
class PessoaDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($pessoa)
    {
        $sql = "select * from pessoa where usuario = ? and senha = ?";

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

}