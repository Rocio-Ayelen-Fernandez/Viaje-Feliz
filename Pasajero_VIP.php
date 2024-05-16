<?php

include_once 'Pasajero.php';
//La clase "PasajeroVIP" tiene como atributos adicionales el
//número de viajero frecuente y cantidad de millas de pasajero.
class Pasajero_VIP extends Pasajero
{
    private $numViajero;
    private $cantidadMillas;

    public function __construct(
        $nombreIng,
        $apellidoIng,
        $numTelefono,
        $numDni,
        $numAsiento,
        $numTickey,
        $numViajero,
        $cantidadMillas
    ) {
        parent::__construct(
            $nombreIng,
            $apellidoIng,
            $numTelefono,
            $numDni,
            $numAsiento,
            $numTickey
        );
        $this->numViajero = $numViajero;
        $this->cantidadMillas = $cantidadMillas;
    }

    //METODOS DE ACCESO
    //GETTERS
    public function getNumViajero()
    {
        return $this->numViajero;
    }
    public function getCantidadMillas()
    {
        return $this->cantidadMillas;
    }
    //SETTERS
    public function setNumViajero($numViajero)
    {
        $this->numViajero = $numViajero;
    }
    public function setCantidadMillas($cantidadMillas)
    {
        $this->cantidadMillas = $cantidadMillas;
    }

    /**
     * Para un pasajero VIP se incrementa el importe un 35% y si la cantidad
     * de millas acumuladas supera a las 300 millas se realiza un incremento del 30%
     */
    public function darPorcentajeIncremento()
    {
        $porcentaje = parent::darPorcentajeIncremento();

        if ($this->getCantidadMillas() > 300) {
            $porcentaje += 0.3;
        } else {
            $porcentaje += 0.35;
        }
        return $porcentaje;
    }

    //STRING
    public function __toString()
    {
        $string = parent::__toString();
        $string .=
            ', Numero de Viajero Frecuente: ' .
            $this->getNumViajero() .
            ' , Cantidad Millas: ' .
            $this->getCantidadMillas();

        return $string;
    }
}

?>
