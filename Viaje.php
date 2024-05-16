<?php

/**
 * La empresa de Transporte de Pasajeros “Viaje Feliz”
 * quiere registrar la información referente a sus viajes.
 * De cada viaje se precisa almacenar el código del mismo,
 * destino, cantidad máxima de pasajeros y los pasajeros del viaje
 */
/**
 * Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos
 * abonados por los pasajeros e implementar el método venderPasaje($objPasajero) que
 * debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible),
 * actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.
 */

class Viaje
{
    private $codigo;
    private $destino;
    private $cantMaxima;
    private $objPasajeros = []; //ARREGLO DE OBJ PASAJERO
    private $objResponsable;
    private $costo;
    private $totalAbonado;

    //METODO CONSTRUCTOR
    public function __construct(
        $codigoViaje,
        $destinoViaje,
        $maxPasajeros,
        $oPasajeros,
        $oResponsable,
        $costo,
        $totalAbonado
    ) {
        $this->codigo = $codigoViaje;
        $this->destino = $destinoViaje;
        $this->cantMaxima = $maxPasajeros;
        $this->objPasajeros = $oPasajeros;
        $this->objResponsable = $oResponsable;
        $this->costo = $costo;
        $this->totalAbonado = $totalAbonado;
    }

    //METODOS DE ACCESO
    //GETTERS
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getDestino()
    {
        return $this->destino;
    }
    public function getCantMax()
    {
        return $this->cantMaxima;
    }
    public function getPasajeros()
    {
        return $this->objPasajeros;
    }
    public function getResponsable()
    {
        return $this->objResponsable;
    }
    public function getCosto()
    {
        return $this->costo;
    }
    public function getTotalAbonado()
    {
        return $this->totalAbonado;
    }

    //SETTERS
    public function setCodigo($codigoViaje)
    {
        $this->codigo = $codigoViaje;
    }
    public function setDestino($destinoViaje)
    {
        $this->destino = $destinoViaje;
    }
    public function setCantMax($maxPasajeros)
    {
        $this->cantMaxima = $maxPasajeros;
    }
    public function setPasajeros($oPasajeros)
    {
        $this->objPasajeros = $oPasajeros;
    }
    public function setResponsable($oResponsable)
    {
        $this->objResponsable = $oResponsable;
    }
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }
    public function setTotalAbonado($totalAbonado)
    {
        $this->totalAbonado = $totalAbonado;
    }

    /**
     * Verifica si el objeto pasajero ya se encuentra en la lista con el DNI ingresado
     * y devuelve su indice
     * @param INT $numDni
     * @return INT
     */
    public function verificarPasajero($numDni)
    {
        $indicePasajero = null;
        $i = 0;
        if (count($this->getPasajeros()) > 0) {
            do {
                //($this->getPasajeros()) devuelve el arreglo de pasajeros
                if ($this->getPasajeros()[$i]->getDni() == $numDni) {
                    $indicePasajero = $i;
                }
                $i++;
            } while (
                $indicePasajero == null &&
                $i < count($this->getPasajeros()) /*Cantidad de arreglos*/
            );
        }
        return $indicePasajero;
    }

    /**
     * Agrega a un objetoPasajero al arreglo de pasajeros en la clase
     *
     * @param OBJ $nuevoPasajero
     */
    public function agregarPasajero($nuevoPasajero)
    {
        $nuevoArreglo = $this->getPasajeros();
        $nuevoPasajero->setNumAsiento(count($nuevoArreglo) + 1);
        $nuevoPasajero->setNumTicket(count($nuevoArreglo) + 1);
        $nuevoArreglo[count($nuevoArreglo)] = $nuevoPasajero;

        $this->setPasajeros($nuevoArreglo);
    }

    public function modificarViaje($codigo, $destino, $cantMax, $costo)
    {
        $this->setCodigo($costo);
        $this->setDestino($destino);
        $this->setCantMax($cantMax);
        $this->setCosto($costo);
    }

    public function modificarPasajero($indice, $nombre, $apellido, $telefono)
    {
        $this->getPasajeros()[$indice]->setNombre($nombre);
        $this->getPasajeros()[$indice]->setApellido($apellido);
        $this->getPasajeros()[$indice]->setTelefono($telefono);
    }

    public function modificarResponsable($nombre, $apellido, $licencia)
    {
        $this->getResponsable()->setNombre($nombre);
        $this->getResponsable()->setApellido($apellido);
        $this->getResponsable()->setLicencia($licencia);
    }

    /**
     * Implementar el método venderPasaje($objPasajero) que debe incorporar el
     * pasajero a la colección de pasajeros (solo si hay espacio disponible),
     * actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.
     */
    public function venderPasaje($objPasajero)
    {
        if ($this->hayPasajesDisponible()) {
            $this->agregarPasajero($objPasajero);
            $precio =
                $this->getCosto() *
                (1 + $objPasajero->darPorcentajeIncremento());
            $totalAbonado = $this->getTotalAbonado();
            $totalAbonado += $precio;
            $this->setTotalAbonado($totalAbonado);
        }
        return $precio;
    }

    /**
     * Implemente la función hayPasajesDisponible() que retorna verdadero
     * si la cantidad de pasajeros del viaje es menor a la cantidad máxima
     * de pasajeros y falso caso contrario
     */
    public function hayPasajesDisponible()
    {
        $estado = false;
        if (count($this->getPasajeros()) < $this->getCantMax()) {
            $estado = true;
        }
        return $estado;
    }

    public function darString()
    {
        $pasajeros = '';
        foreach ($this->getPasajeros() as $persona) {
            $pasajeros = $pasajeros . $persona . "\n";
        }
        if ($pasajeros == '') {
            $pasajeros = "No hay pasajeros en este vuelo\n";
        }
        return $pasajeros;
    }

    //STRING
    public function __toString()
    {
        return 'Codigo de Viaje: ' .
            $this->getCodigo() .
            ', Destino: ' .
            $this->getDestino() .
            ', Maximo de pasajeros: ' .
            $this->getCantMax() .
            ", Pasajeros: \n" .
            $this->darString() .
            'Responsable: ' .
            $this->getResponsable() .
            "\nCosto de viaje: " .
            $this->getCosto() .
            ', Total Abonado:' .
            $this->getTotalAbonado();
    }
}

?>
