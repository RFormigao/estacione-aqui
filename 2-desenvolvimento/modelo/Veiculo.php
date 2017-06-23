<?php


final class Veiculo
{
    private $id_veiculo;
    private $placa;
    private $modelo;
    private $cliente;
    private $status;

    public function __construct($id_veiculo=null, $placa=null, $modelo=null, $cliente=null, $status=null)
    {
        $this->id_veiculo = $id_veiculo;
        $this->placa = $placa;
        $this->modelo = $modelo;
        $this->cliente = $cliente;
        $this->status = $status;
    }

    public function getIdVeiculo()
    {
        return $this->id_veiculo;
    }
    public function setIdVeiculo($id_veiculo)
    {
        $this->id_veiculo = $id_veiculo;
    }

    public function getPlaca()
    {
        return $this->placa;
    }
    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    public function getModelo()
    {
        return $this->modelo;
    }
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getCliente()
    {
        return $this->cliente;
    }
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }




}