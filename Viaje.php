<?php

    /**
     * La empresa de Transporte de Pasajeros “Viaje Feliz” 
     * quiere registrar la información referente a sus viajes. 
     * De cada viaje se precisa almacenar el código del mismo, 
     * destino, cantidad máxima de pasajeros y los pasajeros del viaje
     */

    class Viaje{
        private $codigo;
        private $destino;
        private $cantMaxima;
        private $pasajeros= [];

        //METODO CONSTRUCTOR
        public function __construct($codigoViaje, $destinoViaje, $maxPasajeros, $aPasajeros){
            $this->codigo = $codigoViaje;
            $this->destino = $destinoViaje;
            $this->cantMaxima = $maxPasajeros;
            $this->pasajeros = $aPasajeros;
        }

        //METODOS DE ACCESO
        //GETTERS
        public function getCodigo(){
            return $this->codigo;
        }
        public function getDestino(){
            return $this->destino;
        }
        public function getCantMax(){
            return $this->cantMaxima;
        }
        public function getPasajeros(){
            return $this->pasajeros;
        }

        //SETTERS
        public function setCodigo($codigoViaje){
            $this->codigo = $codigoViaje;
        }
        public function setDestino($destinoViaje){
            $this->destino = $destinoViaje;
        }
        public function setCantMax($maxPasajeros){
            $this->cantMaxima = $maxPasajeros;
        }
        public function setPasajeros($aPasajeros){
            $this->pasajeros = $aPasajeros;
        }

        //STRING
        public function __toString(){
            $pasajeros="";
            foreach ($this->getPasajeros() as $key => $value) {
                $mensaje = $mensaje.$value.", ";
            }

            return "Codigo de Viaje: ".$this->getCodigo().", Destino: ".$this->getDestino()
            .", Maximo de pasajeros".$this->getCantMax()." Pasajeros: ".$pasajeros;
        }

    }


?>