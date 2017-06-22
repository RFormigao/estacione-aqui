<?php


final class Alocar
{
    private $id_alocar;
    private $vaga;
    private $hora_entrada;
    private $hora_saida;
    private $dataa;
    private $valor;
    private $periodo;
    private $veiculo;

    public function __construct($id_alocar=null, $vaga=null, $hora_entrada=null, $hora_saida=null, $dataa=null, $valor=null, $periodo=null, $veiculo=null)
    {
        $this->id_alocar = $id_alocar;
        $this->vaga = $vaga;
        $this->hora_entrada = $hora_entrada;
        $this->hora_saida = $hora_saida;
        $this->dataa = $dataa;
        $this->valor = $valor;
        $this->periodo = $periodo;
        $this->veiculo = $veiculo;
    }

    public function getIdAlocar()
    {
        return $this->id_alocar;
    }
    public function setIdAlocar($id_alocar)
    {
        $this->id_alocar = $id_alocar;
    }

    public function getVaga()
    {
        return $this->vaga;
    }
    public function setVaga($vaga)
    {
        $this->vaga = $vaga;
    }

    public function getHoraEntrada()
    {
        return $this->hora_entrada;
    }
    public function setHoraEntrada($hora_entrada)
    {
        $this->hora_entrada = $hora_entrada;
    }

    public function getHoraSaida()
    {
        return $this->hora_saida;
    }
    public function setHoraSaida($hora_saida)
    {
        $this->hora_saida = $hora_saida;
    }

    public function getDataa()
    {
        return $this->dataa;
    }
    public function setDataa($dataa)
    {
        $this->dataa = $dataa;
    }

    public function getValor()
    {
        return $this->valor;
    }
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getPeriodo()
    {
        return $this->periodo;
    }
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
    }

    public function getVeiculo()
    {
        return $this->veiculo;
    }
    public function setVeiculo($veiculo)
    {
        $this->veiculo = $veiculo;
    }

}