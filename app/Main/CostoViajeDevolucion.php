<?php

namespace App\Main;

class CostoViajeDevolucion implements CostoViaje
{
    public function calcularCosto(Viaje $viaje): float
    {
        return 1000;
    }
}
