<?php

    include 'Viaje.php';
    include 'Pasajero.php';

    //ARREGLOS DE PASAJEROS
    $objP1= new Pasajero("Juan", "Ramos", 2991822372, 39517428);
    $objP2= new Pasajero("Valentina", "Rodriguez", 2993773249, 42794801);
    $objP3= new Pasajero("Enzo", "Diaz", 2991260841, 30431514);
    $objP4= new Pasajero("Maria", "Rojas", 2998218402, 22812370);

    $arregloPasajeros = [$objP1, $objP2, $objP3, $objP4];

    //OBJETO VIAJE (EJ: 3682, "Buenos Aires", 10, $arregloPasajeros )
    $objViaje = new Viaje(3682, "Buenos Aires", 10, $arregloPasajeros);

    //VARIABLES
    $opcion=0;
    $valorIng="";

    
    $objViaje->ModificarPasajero(22812370, "XLR8", "Diez", "454677986");
    echo $objViaje."\n";
    
    /*
    echo "Bienvenido al sistema\n";
    echo "Elija una opcion";
    echo "\n1. Cargar un viaje\n2. Modificar codigo de viaje\n3. Modificar destino\n4. Modificar cantidad maxima de pasajeros\n5. Cargar Nuevo pasajero\n6. Ver datos\n7. Salir\n";
    $opcion = trim(fgets(STDIN));
    while($opcion!=7){
        
        
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