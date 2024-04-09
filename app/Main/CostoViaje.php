<?php

namespace App\Main;

interface CostoViaje
{
    public function calcularCosto(Viaje $viaje): float;
}
