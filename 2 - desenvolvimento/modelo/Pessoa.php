<?php


final class Pessoa
{
    private $idPessoa;
    private $nome;
    private $cpf;
    private $telefone;
    private $celular;
    private $logradouro;
    private $bairro;
    private $cep;
    private $cidade;
    private $uf;
    private $usuario;
    private $senha;
    private $tipo;
    private $status;

    public function __construct($idPessoa=null,$nome = null, $cpf = null, $telefone = null,
                                $celular = null, $logradouro = null,
                                $bairro = null, $cep = null, $cidade = null,
                                $uf = null, $usuario = null,
                                $senha = null, $tipo = null,$status = null)
    {
        $this->idPessoa = $idPessoa;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->celular = $celular;
        $this->logradouro = $logradouro;
        $this->bairro = $bairro;
        $this->cep = $cep;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->tipo = $tipo;
        $this->status = $status;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
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

    public function getCelular()
    {
        return $this->celular;
    }
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    public function getLogradouro()
    {
        return $this->logradouro;
    }
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    public function getBairro()
    {
        return $this->bairro;
    }
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function getCep()
    {
        return $this->cep;
    }
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getCidade()
    {
        return $this->cidade;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getUf()
    {
        return $this->uf;
    }
    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getTipo()
    {
        return $this->tipo;
    }
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getIdPessoa()
    {
        return $this->idPessoa;
    }

    public function setIdPessoa($idPessoa)
    {
        $this->idPessoa = $idPessoa;
    }




}