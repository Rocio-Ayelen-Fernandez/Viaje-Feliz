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
        private $objPasajeros= []; //ARREGLO DE OBJ PASAJERO
        private $objResponsable;

        //METODO CONSTRUCTOR
        public function __construct($codigoViaje, $destinoViaje, $maxPasajeros, $oPasajeros, $oResponsable){
            $this->codigo = $codigoViaje;
            $this->destino = $destinoViaje;
            $this->cantMaxima = $maxPasajeros;
            $this->objPasajeros = $oPasajeros;
            $this->objResponsable = $oResponsable;
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
        public function getResponsable(){
            return $this->objResponsable;
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
        public function setPasajeros($oPasajeros){
            $this->objPasajeros = $oPasajeros;
        }
        public function setResponsable($oResponsable){
            $this->objResponsable = $oResponsable;
        }


        /**
         * Verifica si el objeto pasajero ya se encuentra en la lista con el DNI ingresado
         * y devuelve su indice
         * @param INT $numDni
         * @return INT
         */
        public function verificarPasajero($numDni){
            $indicePasajero=null;
            $i=0;
            if(count($this->getPasajeros()) > 0 ){
                
                do{
                    
                    //($this->getPasajeros()) devuelve el arreglo de pasajeros
                    if( ( ($this->getPasajeros())[$i]->getDni() ) == $numDni ){
                        $indicePasajero=$i;
                    }
                    $i++;
                }while( ($indicePasajero == null) && $i < ( count( ($this->getPasajeros()) ) )/*Cantidad de arreglos*/);
                
            }
            return $indicePasajero;
        }

        /**
         * Agrega a un objetoPasajero al arreglo de pasajeros en la clase 
         * y devuelve un boolean dependiendo la situacion 
         * @param OBJ $nuevoPasajero
         * @return BOOLEAN
         */
        public function agregarPasajero($nuevoPasajero){
            $estado = false;
            $nuevoArreglo=$this->getPasajeros();
            $verificacion = $this->verificarPasajero($nuevoPasajero->getDni());
            
            if( ($verificacion) == null && count($nuevoArreglo) < $this->getCantMax()  ){
                $nuevoArreglo[ count($nuevoArreglo) ] = $nuevoPasajero;
                
                $this->setPasajeros($nuevoArreglo);
                
                $estado=true;
            }
            return $estado;
        }


        //STRING
        public function __toString(){
            $pasajeros="";
            foreach ($this->getPasajeros() as $persona) {
                $pasajeros = $pasajeros .$persona ."\n";
            }
            if($pasajeros == ""){
                $pasajeros = "No hay pasajeros en este vuelo\n";
            }

            return "Codigo de Viaje: ".$this->getCodigo().", Destino: ".$this->getDestino()
            .", Maximo de pasajeros: ".$this->getCantMax().", Pasajeros: \n".$pasajeros."Responsable: ".$this->getResponsable();
        }

    }



    

?>