<?php

namespace App\Main;

class Paquete
{
    private float $peso;
    private float $alto;
    private float $ancho;
    private float $largo;

    public function __construct(float $peso, float $alto, float $ancho, float $largo)
    {
        $this->peso = $peso;
        $this->alto = $alto;
        $this->ancho = $ancho;
        $this->largo = $largo;
    }

    public function getPeso(): float
    {
        return $this->peso;
    }

    public function getAlto(): float
    {
        return $this->alto;
    }

    public function getAncho(): float
    {
        return $this->ancho;
    }

    public function getLargo(): float
    {
        return $this->largo;
    }
}