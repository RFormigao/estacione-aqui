<?php


final class Periodo
{
    private $idPeriodo;
    private $periodo;
    private $valor;
    private $status;

    public function __construct($idPeriodo=null, $periodo=null, $valor=null, $status=null)
    {
        $this->idPeriodo = $idPeriodo;
        $this->periodo = $periodo;
        $this->valor = $valor;
        $this->status = $status;
    }

    public function getIdPeriodo()
    {
        return $this->idPeriodo;
    }
    public function setIdPeriodo($idPeriodo)
    {
        $this->idPeriodo = $idPeriodo;
    }

    public function getPeriodo()
    {
        return $this->periodo;
    }
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
    }

    public function getValor()
    {
        return $this->valor;
    }
    public function setValor($valor)
    {
        $this->valor = $valor;
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