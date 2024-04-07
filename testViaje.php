<?php

    include 'Viaje.php';

    //ARREGLOS DE PASAJEROS
    $p1=["nombre"=>"Juan", "apellido" => "Ramos", "dni" => "39517428"];
    $p2=["nombre"=>"Valentina", "apellido" => "Rodriguez", "dni" => "42794801"];
    $p3=["nombre"=>"Enzo", "apellido" => "Diaz", "dni" => "30431514"];
    $p4=["nombre"=>"Maria", "apellido" => "Rojas", "dni" => "22812370"];

    $arregloPasajeros = [$p1, $p2, $p3, $p4];

    //OBJETO VIAJE (EJ: 3682, "Buenos Aires", 10, $arregloPasajeros )
    $objViaje = new Viaje("", "", "", $arregloPasajeros);

    //VARIABLES
    $opcion=0;
    $valorIng="";
    //echo $objViaje."\n";
    
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
    
?>