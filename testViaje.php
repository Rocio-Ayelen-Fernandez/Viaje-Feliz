<?php

    include 'Viaje.php';
    include 'Pasajero.php';
    include 'ResponsableV.php';

    //ARREGLOS DE PASAJEROS
    $objP1= new Pasajero("Juan", "Ramos", 2991822372, 39517428);
    $objP2= new Pasajero("Valentina", "Rodriguez", 2993773249, 42794801);
    $objP3= new Pasajero("Enzo", "Diaz", 2991260841, 30431514);
    $objP4= new Pasajero("Maria", "Rojas", 2998218402, 22812370);

    $arregloPasajeros = [$objP1, $objP2, $objP3, $objP4];

    


    //OBJETO VIAJE (EJ: 3682, "Buenos Aires", 10, $arregloPasajeros, $objResponsable )
    $objViaje = null;
    $objResponsable = null;

    //VARIABLES
    $opcion=0;
    $valorIng="";
    $opcionMod =0;
    $codigo="";
    $destino="";
    $limite="";
    $nombre ="";
    $apellido ="";
    $nEmpleado="";
    $nLicencia="";
    $telefono="";
    
    
    
    echo "Bienvenido al sistema\n";
    echo "Elija una opcion\n";
    echo "1. Cargar un viaje\n2. Modificar o agregar datos de viaje\n3. Salir";
    $opcion = trim(fgets(STDIN));

    while($opcion!=3){

        switch($opcion){
            case 1:
                echo "Ingrese el codigo de viaje: ";
                $codigo = trim(fgets(STDIN));

                echo "Ingrese el destino: ";
                $destino = trim(fgets(STDIN));

                echo "Ingrese el limite de pasajeros: ";
                $limite = trim(fgets(STDIN));

                echo "Ingrese los datos del responsable del viaje\n";
                echo "Ingrese el nombre: ";
                $nombre = trim(fgets(STDIN));

                echo "Ingrese el apellido: ";
                $apellido = trim(fgets(STDIN));

                echo "Ingrese el numero de empleado: ";
                $nEmpleado = trim(fgets(STDIN));

                echo "Ingrese el numero de licencia: ";
                $nLicencia = trim(fgets(STDIN));

                //OBJETO RESPONSABLE
                $objResponsable = new ResponsableV($nombre, $apellido, $nEmpleado, $nLicencia);

                echo "Se cargaran pasajeros por defecto\n";

                //OBJETO VIAJE

                $objViaje= new Viaje($codigo, $destino, $limite, $arregloPasajeros, $objResponsable);

                break;
            case 2:
                if($objViaje === null){
                    echo "No existe una clase Viaje para modificar\n";
                }else{

                    echo "1. Modificar datos del viaje\n2. Cargar Nuevo pasajero\n3. Modificar Pasajero\n4. Modificar Responsable de Viaje\n5. Ver datos\n6. Salir\n";
                    $opcionMod = trim(fgets(STDIN));

                    while($opcionMod != 6){
                        switch ($opcionMod) {
                            case 1:
                                echo "Modificar datos del viaje\n";

                                echo "Ingrese el codigo de viaje: ";
                                $valorIng = trim(fgets(STDIN));
                                $objViaje->setCodigo($valorIng);

                                echo "Ingrese el destino: ";
                                $valorIng = trim(fgets(STDIN));
                                $objViaje->setDestino($valorIng);
    
                                echo "Ingrese el limite de pasajeros: ";
                                $valorIng = trim(fgets(STDIN));
                                $objViaje->setCantMax($valorIng);
    
                                break;
                            case 2:
                                echo "Cargar Nuevo Pasajero\n";

                                echo "Ingrese los datos del pasajero\n";
                                echo "Ingrese el nombre: ";
                                $nombre = trim(fgets(STDIN));
                
                                echo "Ingrese el apellido: ";
                                $apellido = trim(fgets(STDIN));

                                echo "Ingrese el telefono del pasajero: ";
                                $telefono = trim(fgets(STDIN));

                                echo "Ingrese el DNI del pasajero: ";
                                $dni= trim(fgets(STDIN));

                                $nuevoPasajero= new Pasajero($nombre, $apellido, $telefono, $dni);
                                
                                if($objViaje->agregarPasajero($nuevoPasajero)){
                                    echo "Pasajero ingresado a la lista\n";
                                }else{
                                    echo "El pasajero no se ha podido ingresar (Ya esta en la lista o limite alcanzado)\n";
                                }
                                break;
                            case 3:
                                echo "Modificar Pasajero\n";

                                echo "Ingrese el DNI del pasajero que dese modificar";
                                $dni = trim(fgets(STDIN));
                                $verificacion = $objViaje->verificarPasajero($dni);
                                if($verificacion != null){
                                    echo "Se ha encontrado el pasajero,  los datos.\n";
                                    echo "Proceda a ingresar los datos a modificar\n";
                                    echo "Ingrese el nombre: ";
                                    $nombre = trim(fgets(STDIN));
                                    $objViaje->getPasajeros()[$verificacion]->setNombre($nombre);

                                    echo "Ingrese el apellido: ";
                                    $apellido = trim(fgets(STDIN));
                                    $objViaje->getPasajeros()[$verificacion]->setApellido($apellido);

                                    echo "Ingrese el telefono del pasajero: ";
                                    $telefono = trim(fgets(STDIN));
                                    $objViaje->getPasajeros()[$verificacion]->setTelefono($telefono);

                                    
                                }else{
                                    echo "El pasajero no fue encontrado en la lista\n";
                                }

                                break;
                            case 4:

                                echo "Modificar Responsable de Viaje\n";

                                echo "Ingrese el numero de empleado del responsable a modificar: ";
                                $nEmpleado = trim(fgets(STDIN));

                                if($objViaje->getResponsable()->getEmpleado() == $nEmpleado ){

                                    echo "Empleado encontrado\n";
                                    echo "Ingrese los datos a modificar\n";
                                    
                                    echo "Ingrese el nombre: ";
                                    $nombre = trim(fgets(STDIN));
                                    ($objViaje->getResponsable())->setNombre($nombre);

                                    echo "Ingrese el apellido: ";
                                    $apellido = trim(fgets(STDIN));
                                    ($objViaje->getResponsable())->setApellido($apellido);

                                    echo "Ingrese la licencia: ";
                                    $nlicencia = trim(fgets(STDIN));
                                    ($objViaje->getResponsable())->setLicencia($nLicencia);                                    
                                     
                                }else{
                                    echo "No se ha encontrado el empleado\n";
                                }

                                break;
                            case 5:
                                echo "Ver datos\n";

                                echo $objViaje."\n";
                                break;
                            default:
                            echo "La opcion elegida no se encuentra disponible\n";
                                break;
    
                        }

                        echo "1. Modificar datos del viaje\n2. Cargar Nuevo pasajero\n3. Modificar Pasajero\n4. Modificar Responsable de Viaje\n5. Ver datos\n6. Salir\n";
                        $opcionMod = trim(fgets(STDIN));


                    }

                }

                break;
            default:
                echo "La opcion elegida no se encuentra disponible\n";
                break;    
        }

        echo "Elija una opcion\n";
        echo "1. Cargar un viaje\n2. Modificar o agregar datos de viaje\n3. Salir";
        $opcion = trim(fgets(STDIN));
    }




    /*
    echo "1. Modificar datos del viaje\n2. Cargar Nuevo pasajero\n3. Modificar Pasajero\n4. Modificar Responsable de Viaje\n5. Ver datos\n6. Salir\n";
    $opcion = trim(fgets(STDIN));
    while($opcion!=3){
        
        
        switch ($opcion) {
            case 1:
                echo "Opcion elejida: Cargar un viaje\n";
                echo "Ingrese numero de viaje: ";
                $valorIng= trim(fgets(STDIN));
                $objViaje->setCodigo($valorIng);

                echo "Ingrese destino: ";
                $valorIng= trim(fgets(STDIN));
                $objViaje->setDestino($valorIng);

                echo "Ingrese limite de pasajetos: ";
                $valorIng= trim(fgets(STDIN));
                $objViaje->setCantMax($valorIng);

                echo "Se ingresaran pasajeros por defecto\n";
                break;

            case 2:
                echo "Opcion elejida: Modificar codigo de viaje\n";
                echo "Ingrese numero de viaje: ";
                $valorIng= trim(fgets(STDIN));
                $objViaje->setCodigo($valorIng);
                break;

            case 3:
                echo "Opcion elejida: Modificar destino\n";
                echo "Ingrese destino: ";
                $valorIng= trim(fgets(STDIN));
                $objViaje->setDestino($valorIng);
                break;

            case 4:
                echo "Opcion elejida: Modificar cantidad maxima de pasajeros\n";
                echo "Ingrese limite de pasajetos: ";
                $valorIng= trim(fgets(STDIN));
                $objViaje->setCantMax($valorIng);
                break;

            case 5:
                echo "Opcion elejda: Cargar Nuevo pasajero\n";
                $aPasajeros = $objViaje->getPasajeros();
                echo "Ingrese nombre del pasajero: ";
                $valorIng = trim(fgets(STDIN));
                $nuevoPasajero["nombre"] = $valorIng;

                echo "Ingrese apellido del pasajero: ";
                $valorIng = trim(fgets(STDIN));
                $nuevoPasajero["apellido"] = $valorIng;

                echo "Ingrese DNI del pasajero, sin puntos: ";
                $valorIng = trim(fgets(STDIN));
                $nuevoPasajero["dni"] = $valorIng;

                $aPasajeros[count($aPasajeros)] = $nuevoPasajero;

                $objViaje->setPasajeros($aPasajeros);
                break;
        
            case 6:
                echo "Opcion elejda: Ver datos\n";
                echo $objViaje."\n";
                break;
            case 7:
                echo "Hasta Luego\n";
                break;
            default:
                echo "Opcion no disponible\n";
                break;
        }
        echo "Elija una opcion";
        echo "\n1. Cargar un viaje\n2. Modificar codigo de viaje\n3. Modificar destino\n4. Modificar cantidad maxima de pasajeros\n5. Cargar Nuevo pasajero\n6. Ver datos\n7. Salir\n";
        $opcion= trim(fgets(STDIN));   
    }
    
    */
?>