<?php

    /**
     * Ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono.
     */

    class Pasajero{

        private $nombre;
        private $apellido;
        private $telefono;
        private $dni;

        //METODO CONSTRUCTOR
        public function __construct($nombreIng, $apellidoIng, $numTelefono, $numDni){
            $this->nombre = $nombreIng;
            $this->apellido = $apellidoIng;
            $this->telefono = $numTelefono;
            $this->dni = $numDni;
        }

        //METODOS DE ACCESO
        //GETTERS
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        public function getTelefono(){
            return $this->telefono;
        }
        public function getDni(){
            return $this->dni;
        }

        //SETTERS
        public function setNombre($nombreIng){
            $this->nombre = $nombreIng;
        }
        public function setApellido($apellidoIng){
            $this->apellido = $apellidoIng;
        }
        public function setTelefono($numTelefono){
            $this->telefono = $numTelefono;
        }
        public function setDni($numDni){
            $this->dni = $numDni;
        }

        //STRING
        public function __toString(){
            return "Nombre: ".$this->getNombre().", Apellido: ".$this->getApellido().", Telefono: ".$this->getTelefono().", DNI: ".$this->getDni();
        }


    }

?>