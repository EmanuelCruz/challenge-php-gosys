<?php

namespace Tests\Unit;

use App\Main\CostoViajeNormal;
use App\Main\Paquete;
use App\Main\Ubicacion;
use App\Main\Viaje;
use PHPUnit\Framework\TestCase;

use function App\Helpers\getDistanceBetweenPoints;

class CostoViajeNormalTest extends TestCase
{
    public function test_calculo_de_costo_para_viaje_normal()
    {
        $origen = new Ubicacion('Origen', 40.730610, -73.935242);
        $destino = new Ubicacion('Destino', 40.712776, -74.005974);
        $paquetes = [
            new Paquete(10, 0.5, 0.3, 0.2),
            new Paquete(5, 0.4, 0.2, 0.1)
        ];

        $costoEsperado = $this->costoEsperado($origen, $destino, $paquetes);

        $viaje = new Viaje($origen, $destino, $paquetes, new CostoViajeNormal());
        $costoObtenido = $viaje->getCosto();

        $this->assertEquals($costoEsperado, $costoObtenido);
    }

    public function costoEsperado($origen, $destino, $paquetes)
    {
        $distancia = getDistanceBetweenPoints(
            $origen->getLatitud(),
            $origen->getLongitud(),
            $destino->getLatitud(),
            $destino->getLongitud()
        );

        $pesoTotal = array_sum(array_map(function ($paquete) {
            return $paquete->getPeso();
        }, $paquetes));

        return 2 * $pesoTotal * $distancia;
    }
}
