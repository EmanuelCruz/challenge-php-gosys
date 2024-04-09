<?php

namespace App\Main;

class HojaDeRuta
{
    private array $viajes;
    private array $otrasHojasDeRuta;

    public function __construct(array $viajes, array $otrasHojasDeRuta)
    {
        $this->viajes = $viajes;
        $this->otrasHojasDeRuta = $otrasHojasDeRuta;
    }

    public function calcularPesoTotal(): float
    {
        $pesoTotal = 0;
        foreach ($this->viajes as $viaje) {
            $pesoTotal += $viaje->calcularPesoTotal();
        }
        foreach ($this->otrasHojasDeRuta as $otraHojaDeRuta) {
            $pesoTotal += $otraHojaDeRuta->calcularPesoTotal();
        }
        return $pesoTotal;
    }

    public function calcularVolumenTotal(): float
    {
        $volumenTotal = 0;
        foreach ($this->viajes as $viaje) {
            $volumenTotal += $viaje->calcularVolumenTotal();
        }
        foreach ($this->otrasHojasDeRuta as $otraHojaDeRuta) {
            $volumenTotal += $otraHojaDeRuta->calcularVolumenTotal();
        }
        return $volumenTotal;
    }

    public function calcularCosto(): float
    {
        $costo = 0;
        foreach ($this->viajes as $viaje) {
            $costo += $viaje->getCosto();
        }
        foreach ($this->otrasHojasDeRuta as $otraHojaDeRuta) {
            $costo += $otraHojaDeRuta->calcularCosto();
        }
        return $costo;
    }
}
