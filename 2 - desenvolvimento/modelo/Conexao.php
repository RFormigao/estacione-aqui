<?php

abstract class conexao {
    protected $db;

    protected function __construct()
    {
        //qual banco sera utilizado=mysql
        //nome do servidor onde está o banco de dados = localhost
        //nome do banco de dados = loja

        $dc="mysql:host=localhost;dbname=estacione_aqui;charset=utf8";
        $utf = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
        );
        try
        {
            $this->db = new PDO($dc, "root", "", $utf);
        }
        catch ( Exception $e )
        {
            die ($e->getMessage());
        }
    }
}
?>
