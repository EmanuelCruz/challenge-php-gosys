<?php

namespace App\Main;

class CostoViajeNormal implements CostoViaje
{
    public function calcularCosto(Viaje $viaje): float
    {
        $distancia = $viaje->calcularDistancia($viaje->getOrigen(), $viaje->getDestino());
        $pesoTotal = $viaje->calcularPesoTotal();

        $costo = 2 * $pesoTotal * $distancia;

        return $costo;
    }
}
