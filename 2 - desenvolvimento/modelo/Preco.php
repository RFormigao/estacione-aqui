<?php


class Preco
{
    private $idPeriodo;
    private $periodo;
    private $valor;

    public function __construct($idPeriodo=null, $periodo=null, $valor=null)
    {
        $this->idPeriodo = $idPeriodo;
        $this->periodo = $periodo;
        $this->valor = $valor;
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


}