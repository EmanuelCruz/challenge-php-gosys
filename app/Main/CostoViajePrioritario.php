<?php

namespace App\Main;

class CostoViajePrioritario implements CostoViaje
{

    public function calcularCosto(Viaje $viaje): float
    {
        $distancia = $viaje->calcularDistancia($viaje->getOrigen(), $viaje->getDestino());
        $pesoTotal = $viaje->calcularPesoTotal();
        $volumenTotal = $viaje->calcularVolumenTotal();

        $costoPorPeso = 4 * $pesoTotal * $distancia;
        $costoPorVolumen = 10 * $volumenTotal * $distancia;

        $costo = max($costoPorPeso, $costoPorVolumen);

        return $costo;
    }
}
