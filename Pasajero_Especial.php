<?php

include_once 'Pasajero.php';
//La clase Pasajeros con necesidades especiales se refiere a pasajeros que
//pueden requerir servicios especiales como sillas de ruedas, asistencia
//para el embarque o desembarque, o comidas especiales para personas con
//alergias o restricciones alimentarias.

class Pasajero_Especial extends Pasajero
{
    private $servicio; //BOOLEAN
    private $asistencia; //BOLEAN
    private $comidaEspecial; //BOLEAN

    public function __construct(
        $nombreIng,
        $apellidoIng,
        $numTelefono,
        $numDni,
        $numAsiento,
        $numTickey,
        $servicio,
        $asistencia,
        $comidaEspecial
    ) {
        parent::__construct(
            $nombreIng,
            $apellidoIng,
            $numTelefono,
            $numDni,
            $numAsiento,
            $numTickey
        );
        $this->servicio = $servicio;
        $this->asistencia = $asistencia;
        $this->comidaEspecial = $comidaEspecial;
    }

    //METODOS DE ACCESO
    //GETTERS
    public function getServicio()
    {
        return $this->servicio;
    }
    public function getAsistencia()
    {
        return $this->asistencia;
    }
    public function getComidaEspecial()
    {
        return $this->comidaEspecial;
    }

    //GETTERS
    public function setServicio($servicio)
    {
        $this->servicio = $servicio;
    }
    public function setAsistencia($asistencia)
    {
        $this->asistencia = $asistencia;
    }
    public function setComidaEspecial($comidaEspecial)
    {
        $this->comidaEspecial = $comidaEspecial;
    }

    public function booleanString($valor)
    {
        $string = '';
        if ($valor) {
            $string = 'si';
        } else {
            $string = 'no';
        }
        return $string;
    }

    /**
     * Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y
     * comida especial entonces el pasaje tiene un incremento del 30%;
     * si solo requiere uno de los servicios prestados entonces el incremento es del 15%.
     */
    public function darPorcentajeIncremento()
    {
        $porcentaje = parent::darPorcentajeIncremento();

        if (
            $this->getAsistencia() &&
            $this->getComidaEspecial() &&
            $this->getServicio()
        ) {
            $porcentaje += 0.3;
        } elseif (
            ($this->getAsistencia() && $this->getComidaEspecial()) ||
            ($this->getComidaEspecial() && $this->getServicio()) ||
            ($this->getAsistencia() && $this->getServicio())
        ) {
            $porcentaje += 20; // ¿?
        } elseif (
            $this->getAsistencia() ||
            $this->getComidaEspecial() ||
            $this->getServicio()
        ) {
            $porcentaje += 0.15;
        }

        return $porcentaje;
    }

    //STRING
    public function __toString()
    {
        $string = parent::__toString();

        $string .=
            ', Necesita Servicio: ' .
            $this->booleanString($this->getServicio()) .
            ' , Necesita Asistencia: ' .
            $this->booleanString($this->getAsistencia()) .
            ' , Necesita Comida Especial: ' .
            $this->booleanString($this->getComidaEspecial());
        return $string;
    }
}
?>
