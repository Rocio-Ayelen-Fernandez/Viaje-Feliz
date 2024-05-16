<?php

include_once 'Pasajero.php';

class Pasajero_Estandar extends Pasajero
{
    /**
     * Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.
     */
    public function darPorcentajeIncremento()
    {
        $porcentaje = parent::darPorcentajeIncremento();

        return $porcentaje += 0.1;
    }
}

?>
