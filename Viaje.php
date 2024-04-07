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
        private $objPasajeros= [];

        //METODO CONSTRUCTOR
        public function __construct($codigoViaje, $destinoViaje, $maxPasajeros, $oPasajeros){
            $this->codigo = $codigoViaje;
            $this->destino = $destinoViaje;
            $this->cantMaxima = $maxPasajeros;
            $this->objPasajeros = $oPasajeros;
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
            return $this->objPasajeros;
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

        /**
         * Con el DNI del pasajero se verifica que el pasajero este en el viaje y se modifican sus atributos
         * @param INT $numDni
         * @param STRING $nuevoNombre
         * @param STRING $nuevoApellido
         * @param STRING $nuevoTelefono
         * @return STRING
         */
        public function ModificarPasajero($numDni, $nuevoNombre, $nuevoApellido, $nuevoTelefono){
            $mensaje="";
            $pasajeroEncontrado=false;
            $i=0;
            do{

                //($this->getPasajeros()) devuelve el arreglo de pasajeros
                
                if( ($this->getPasajeros())[$i]->getDni() == $numDni){
                    $pasajeroEncontrado=true;
                    ($this->getPasajeros())[$i]->setNombre($nuevoNombre);
                    ($this->getPasajeros())[$i]->setApellido($nuevoApellido);
                    ($this->getPasajeros())[$i]->setTelefono($nuevoTelefono);
                }
                $i++;
            }while(!$pasajeroEncontrado);

            if($pasajeroEncontrado){
                $mensaje="Se ha encontrado el pasajero  ha sido modificada su informacion";
            }


        }


        //STRING
        public function __toString(){
            $pasajeros="";
            foreach ($this->getPasajeros() as $persona) {
                $pasajeros = $pasajeros .$persona->getNombre()." ".$persona->getApellido()." ".$persona->getTelefono()." ".$persona->getDni().", ";
            }

            return "Codigo de Viaje: ".$this->getCodigo().", Destino: ".$this->getDestino()
            .", Maximo de pasajeros: ".$this->getCantMax().", Pasajeros: ".$pasajeros;
        }

    }


?>