<?php


final class Tipo
{
    private $idTipo;
    private $descritivo;
    private $menu;

    public function __construct($idTipo=null,$descritivo=null, $menu=null)
    {
        $this->idTipo = $idTipo;
        $this->descritivo = $descritivo;
        $this->menu[] = $menu;
    }

    public function getDescritivo()
    {
        return $this->descritivo;
    }
    public function setDescritivo($descritivo)
    {
        $this->descritivo = $descritivo;
    }

    public function getMenu()
    {
        return $this->menu;
    }
    public function setMenu($menu)
    {
        $this->menu[] = $menu;
    }

    public function getIdTipo()
    {
        return $this->idTipo;
    }

    public function setIdTipo($idTipo)
    {
        $this->idTipo = $idTipo;
    }




}