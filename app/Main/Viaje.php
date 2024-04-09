<?php

namespace App\Main;

use App\Main\Ubicacion;
use function App\Helpers\getDistanceBetweenPoints;

class Viaje
{
    private Ubicacion $origen;
    private Ubicacion $destino;
    private array $paquetes;
    private CostoViaje $calculadorCosto;

    public function __construct(Ubicacion $origen, Ubicacion $destino, array $paquetes, CostoViaje $calculadorCosto)
    {
        $this->origen = $origen;
        $this->destino = $destino;
        $this->paquetes = $paquetes;
        $this->calculadorCosto = $calculadorCosto;
    }

    public function getOrigen(): Ubicacion
    {
        return $this->origen;
    }

    public function getDestino(): Ubicacion
    {
        return $this->destino;
    }

    public function getPaquetes(): array
    {
        return $this->paquetes;
    }

    public function agregarPaquete($paquete)
    {
        $this->paquetes[] = $paquete;
    }

    public function calcularCosto(): float
    {
        return $this->calculadorCosto->calcularCosto($this);
    }

    public function calcularDistancia(Ubicacion $origen, Ubicacion $destino): float
    {
        return getDistanceBetweenPoints(
            $origen->getLatitud(),
            $origen->getLongitud(),
            $destino->getLatitud(),
            $destino->getLongitud()
        );
    }

    public function calcularPesoTotal(): float
    {
        return array_sum(array_map(function (Paquete $paquete) {
            return $paquete->getPeso();
        }, $this->paquetes));
    }

    public function calcularVolumenTotal(): float
    {
        return array_sum(array_map(function (Paquete $paquete) {
            return $paquete->getAlto() * $paquete->getAncho() * $paquete->getLargo();
        }, $this->paquetes));
    }

    public function getCosto(): float
    {
        return $this->calculadorCosto->calcularCosto($this);
    }
}
