<?php

    include 'Viaje.php';
    include 'Pasajero.php';
    include 'ResponsableV.php';

    /*
    //ARREGLOS DE PASAJEROS (Test)
    $objP1= new Pasajero("Juan", "Ramos", 2991822372, 39517428);
    $objP2= new Pasajero("Valentina", "Rodriguez", 2993773249, 42794801);
    $objP3= new Pasajero("Enzo", "Diaz", 2991260841, 30431514);
    $objP4= new Pasajero("Maria", "Rojas", 2998218402, 22812370);

    */
    //$arregloPasajeros = [$objP1, $objP2, $objP3, $objP4];
    $arregloPasajeros=[];

    //OBJETO VIAJE (EJ: 3682, "Buenos Aires", 10, $arregloPasajeros, $objResponsable )
    $objViaje = null;
    //OBJ RESPONSABLE (EJ: "Jorge", "Alba", 2516, 19753410)
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
    
    
    
    echo "**********************\nBienvenido al sistema\n**********************\n";
    echo "Elija una opcion\n";
    echo "1. Cargar un viaje\n2. Modificar o agregar datos de viaje\n3. Salir\n";
    $opcion = trim(fgets(STDIN));

    while($opcion!=3){

        switch($opcion){
            case 1:
                echo "***************\nCargar un viaje\n***************\n";
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

                //echo "Se cargaran pasajeros por defecto\n";
                echo "Se deberan cargar los pasajeros\n";
                echo "*********************************\n";

                //OBJETO VIAJE

                $objViaje= new Viaje($codigo, $destino, $limite, $arregloPasajeros, $objResponsable);

                break;
            case 2:
                if($objViaje === null){
                    echo "****************************************\n";
                    echo "No existe una clase Viaje para modificar\n";
                    echo "****************************************\n";
                }else{
                    echo "\n**************************\nModificar o Agregar datos\n**************************\n";
                    echo "1. Modificar datos del viaje\n2. Cargar Nuevo pasajero\n3. Modificar Pasajero\n4. Modificar Responsable de Viaje\n5. Ver datos\n6. Volver al menu anterior\n";
                    $opcionMod = trim(fgets(STDIN));

                    while($opcionMod != 6){
                        switch ($opcionMod) {
                            case 1:
                                echo "*************************\n";
                                echo "Modificar datos del viaje\n";
                                echo "*************************\n";

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
                                echo "*********************\n";
                                echo "Cargar Nuevo Pasajero\n";
                                echo "*********************\n";

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
                                echo "******************\n";
                                echo "Modificar Pasajero\n";
                                echo "******************\n";

                                echo "Ingrese el DNI del pasajero que dese modificar\n";
                                $dni = trim(fgets(STDIN));
                                $verificacion = $objViaje->verificarPasajero($dni);
                                if($verificacion !== null){
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
                                echo "******************************\n";
                                echo "Modificar Responsable de Viaje\n";
                                echo "******************************\n";

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
                                    $nLicencia = trim(fgets(STDIN));
                                    ($objViaje->getResponsable())->setLicencia($nLicencia);                                    
                                     
                                }else{
                                    echo "No se ha encontrado el empleado\n";
                                }

                                break;
                            case 5:
                                echo "*********\n";
                                echo "Ver datos\n";
                                echo "*********\n";

                                echo $objViaje."\n";
                                break;
                            default:
                            echo "\nLa opcion elegida no se encuentra disponible\n";
                                break;
    
                        }
                        echo "*****************************************************\n";

                        echo "1. Modificar datos del viaje\n2. Cargar Nuevo pasajero\n3. Modificar Pasajero\n4. Modificar Responsable de Viaje\n5. Ver datos\n6. Volver al menu anterior\n";
                        $opcionMod = trim(fgets(STDIN));


                    }
                    echo "*****************************************************\n";

                }

                break;
            default:
                echo "La opcion elegida no se encuentra disponible\n";
                break;    
        }

        echo "Elija una opcion\n";
        echo "1. Cargar un viaje\n2. Modificar o agregar datos de viaje\n3. Salir\n";
        $opcion = trim(fgets(STDIN));
        echo "*****************************************************\n";
    }

    echo "Adios\n";


?>