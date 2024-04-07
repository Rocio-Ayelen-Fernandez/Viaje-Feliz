<?php
    /**
     * cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido.
     */

    class ResponsableV{

        private $nombre;
        private $apellido;
        private $numEmpleado;
        private $licencia;

        //METODO CONSTRUCTOR
        public function __construct($nombreIng, $apellidoIng, $empleado, $numLicencia){
            $this->nombre= $nombreIng;
            $this->apellido= $apellidoIng;
            $this->numEmpleado= $empleado;
            $this->licencia= $numLicencia;
        }

        //METODOS DE ACCESO
        //GETTERS
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        public function getEmpleado(){
            return $this->numEmpleado;
        }
        public function getLicencia(){
            return $this->licencia;
        }

        //SETTERS
        public function setNombre($nombreIng){
            $this->nombre = $nombreIng;    
        }
        public function setApellido($apellidoIng){
            $this->apellido = $apellidoIng;
        }
        public function setEmpleado($empleado){
            $this->numEmpleado = $empleado;
        }
        public function setLicencia($numLicencia){
            $this->licencia = $numLicencia;
        }

        //STRING
        public function __toString(){
            return "Nombre: ".$this->getNombre().", Apellido: ".$this->getApellido().". Numero de empleado: ".
            $this->getEmpleado().", Licencia: ".$this->getLicencia();
        }



    }


?>