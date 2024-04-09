<?php

namespace Tests\Unit;

use App\Main\CostoViajeDevolucion;
use App\Main\Paquete;
use App\Main\Ubicacion;
use App\Main\Viaje;
use PHPUnit\Framework\TestCase;

class CostoViajeDevolucionTest extends TestCase
{
    public function test_calculo_de_costo_para_viaje_devolucion()
    {
        $origen = new Ubicacion('Origen', 40.730610, -73.935242);
        $destino = new Ubicacion('Destino', 40.730610, -73.935242);

        $paquetes = [
            new Paquete(10, 0.5, 0.3, 0.2),
            new Paquete(5, 0.4, 0.2, 0.1)
        ];

        $viaje = new Viaje($origen, $destino, $paquetes, new CostoViajeDevolucion());

        $costoEsperado = 1000;

        $costoObtenido = $viaje->getCosto();

        $this->assertEquals($costoEsperado, $costoObtenido);
    }
}
