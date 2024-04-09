<?php

namespace App\Main;

class Camion
{
    private string $modelo;
    private string $patente;
    private float $volumenMaximo;
    private float $pesoMaximo;
    private ?HojaDeRuta $hojaDeRuta = null;

    public function __construct(string $modelo, string $patente, float $volumenMaximo, float $pesoMaximo)
    {
        $this->modelo = $modelo;
        $this->patente = $patente;
        $this->volumenMaximo = $volumenMaximo;
        $this->pesoMaximo = $pesoMaximo;
    }
    public function asignarHojaDeRuta(HojaDeRuta $hojaDeRuta): void
    {
        if ($this->puedeCargar($hojaDeRuta)) {
            $this->hojaDeRuta = $hojaDeRuta;
        } else {
            throw new \Exception("La hoja de ruta supera la capacidad del camión.");
        }
    }

    private function puedeCargar(HojaDeRuta $hojaDeRuta): bool
    {
        $pesoTotal = $hojaDeRuta->calcularPesoTotal();
        $volumenTotal = $hojaDeRuta->calcularVolumenTotal();
        return $pesoTotal <= $this->pesoMaximo && $volumenTotal <= $this->volumenMaximo;
    }
}
