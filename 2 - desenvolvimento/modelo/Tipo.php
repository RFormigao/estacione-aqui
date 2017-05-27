<?php


class Tipo
{
    private $descritivo;
    private $menu;

    public function __construct($descritivo, $menu)
    {
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



}