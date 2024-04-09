<?php

namespace App\Main;

class Ubicacion
{
    private string $direccion;
    private float $latitud;
    private float $longitud;

    public function __construct(string $direccion, float $latitud, float $longitud)
    {
        $this->direccion = $direccion;
        $this->latitud = $latitud;
        $this->longitud = $longitud;
    }

    public function getDireccion(): string
    {
        return $this->direccion;
    }

    public function getLatitud(): float
    {
        return $this->latitud;
    }

    public function getLongitud(): float
    {
        return $this->longitud;
    }
}