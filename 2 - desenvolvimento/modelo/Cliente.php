<?php


final class Cliente
{
    private $idCliente;
    private $proprietario;
    private $cpf;
    private $telefone;

    public function __construct($idCliente=null, $proprietario=null, $cpf=null, $telefone=null)
    {
        $this->idCliente = $idCliente;
        $this->proprietario = $proprietario;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }


    public function getProprietario()
    {
        return $this->proprietario;
    }
    public function setProprietario($proprietario)
    {
        $this->proprietario = $proprietario;
    }

    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }




}