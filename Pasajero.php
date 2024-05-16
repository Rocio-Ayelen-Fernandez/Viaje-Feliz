<?php

/**
 * Ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono.
 */
/**
 * La clase Pasajero tiene como atributos
 * el nombre, el número de asiento y el número de ticket del pasaje del viaj
 */
class Pasajero
{
    private $nombre;
    private $apellido;
    private $telefono;
    private $dni;
    private $numAsiento;
    private $numTicket;

    //METODO CONSTRUCTOR
    public function __construct(
        $nombreIng,
        $apellidoIng,
        $numTelefono,
        $numDni,
        $numAsiento,
        $numTicket
    ) {
        $this->nombre = $nombreIng;
        $this->apellido = $apellidoIng;
        $this->telefono = $numTelefono;
        $this->dni = $numDni;
        $this->numAsiento = $numAsiento;
        $this->numTicket = $numTicket;
    }

    //METODOS DE ACCESO
    //GETTERS
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getDni()
    {
        return $this->dni;
    }
    public function getNumAsiento()
    {
        return $this->numAsiento;
    }
    public function getNumTicket()
    {
        return $this->numTicket;
    }

    //SETTERS
    public function setNombre($nombreIng)
    {
        $this->nombre = $nombreIng;
    }
    public function setApellido($apellidoIng)
    {
        $this->apellido = $apellidoIng;
    }
    public function setTelefono($numTelefono)
    {
        $this->telefono = $numTelefono;
    }
    public function setDni($numDni)
    {
        $this->dni = $numDni;
    }
    public function setNumAsiento($numAsiento)
    {
        $this->numAsiento = $numAsiento;
    }
    public function setNumTicket($numTicket)
    {
        $this->numTicket = $numTicket;
    }

    public function darPorcentajeIncremento()
    {
        return 0;
    }

    //STRING
    public function __toString()
    {
        return 'Nombre: ' .
            $this->getNombre() .
            ', Apellido: ' .
            $this->getApellido() .
            ', Telefono: ' .
            $this->getTelefono() .
            ', DNI: ' .
            $this->getDni() .
            ', Numero de Asiento: ' .
            $this->getNumAsiento() .
            ', Numero de Ticket: ' .
            $this->getNumTicket();
    }
}

?>
