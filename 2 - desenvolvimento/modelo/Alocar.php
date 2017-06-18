<?php


final class Alocar
{
    private $id_alocar;
    private $vaga;
    private $hora_entrada;
    private $hora_saida;
    private $dataa;
    private $valor;
    private $id_periodo;
    private $id_veiculo;

    public function __construct($id_alocar=null, $vaga=null, $hora_entrada=null, $hora_saida=null, $dataa=null, $valor=null, $id_periodo=null, $id_veiculo=null)
    {
        $this->id_alocar = $id_alocar;
        $this->vaga = $vaga;
        $this->hora_entrada = $hora_entrada;
        $this->hora_saida = $hora_saida;
        $this->dataa = $dataa;
        $this->valor = $valor;
        $this->id_periodo = $id_periodo;
        $this->id_veiculo = $id_veiculo;
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

    public function getIdPeriodo()
    {
        return $this->id_periodo;
    }
    public function setIdPeriodo($id_periodo)
    {
        $this->id_periodo = $id_periodo;
    }

    public function getIdVeiculo()
    {
        return $this->id_veiculo;
    }
    public function setIdVeiculo($id_veiculo)
    {
        $this->id_veiculo = $id_veiculo;
    }

}