<?php

include 'Viaje.php';
include 'Pasajero_Estandar.php';
include 'Pasajero_Especial.php';
include 'Pasajero_VIP.php';
include 'ResponsableV.php';

/*
    //ARREGLOS DE PASAJEROS (Test)
    $objP1= new Pasajero("Juan", "Ramos", 2991822372, 39517428);
    $objP2= new Pasajero("Valentina", "Rodriguez", 2993773249, 42794801);
    $objP3= new Pasajero("Enzo", "Diaz", 2991260841, 30431514);
    $objP4= new Pasajero("Maria", "Rojas", 2998218402, 22812370);

    */
//$arregloPasajeros = [$objP1, $objP2, $objP3, $objP4];
$arregloPasajeros = [];

//OBJETO VIAJE (EJ: 3682, "Buenos Aires", 10, $arregloPasajeros, $objResponsable )
$objViaje = null;
//OBJ RESPONSABLE (EJ: "Jorge", "Alba", 2516, 19753410)
$objResponsable = null;

//VARIABLES
$opcion = 0;
$valorIng = '';
$opcionMod = 0;
$codigo = '';
$destino = '';
$limite = '';
$nombre = '';
$apellido = '';
$nEmpleado = '';
$nLicencia = '';
$telefono = '';

//FUNCIONES
/**
 * Agrega pasajeros dependiendo el tipo ingresado por parametro
 */
function agregarPasajeroA_Viaje($tipo)
{
    echo "Ingrese los datos del pasajero\n";
    echo 'Ingrese el nombre: ';
    $nombre = trim(fgets(STDIN));

    echo 'Ingrese el apellido: ';
    $apellido = trim(fgets(STDIN));

    echo 'Ingrese el telefono del pasajero: ';
    $telefono = trim(fgets(STDIN));

    echo 'Ingrese el DNI del pasajero: ';
    $dni = trim(fgets(STDIN));

    switch ($tipo) {
        case 1:
            //ESTANDAR

            $nuevoPasajero = new Pasajero_Estandar(
                $nombre,
                $apellido,
                $telefono,
                $dni,
                null,
                null
            );
            break;
        case 2:
            //ESPECIAL

            // $servicio,
            // $asistencia,
            // $comidaEspecial

            $nuevoPasajero = new Pasajero_Especial(
                $nombre,
                $apellido,
                $telefono,
                $dni,
                null,
                null,
                false,
                false,
                false
            );

            echo "¿Va a necesitar Silla de Ruedas? S/N\n";
            $valorIng = trim(fgets(STDIN));
            if ($valorIng == 'S' || $valorIng == 's') {
                $nuevoPasajero->setServicio(true);
            }

            echo "¿Va a necesitar Asistencia al Embarcar o Desembarcar? S/N\n";
            $valorIng = trim(fgets(STDIN));
            if ($valorIng == 'S' || $valorIng == 's') {
                $nuevoPasajero->setAsistencia(true);
            }

            echo "¿Va a necesitar Comida Especial (Restricciones dieteticas/Alergias) ? S/N\n";
            $valorIng = trim(fgets(STDIN));
            if ($valorIng == 'S' || $valorIng == 's') {
                $nuevoPasajero->setComidaEspecial(true);
            }

            break;
        case 3:
            //VIP

            // $numViajero,
            // $cantidadMillas
            $nuevoPasajero = new Pasajero_VIP(
                $nombre,
                $apellido,
                $telefono,
                $dni,
                null,
                null,
                null,
                null
            );

            echo 'Ingrese el numero de Viajero Frecuente: ';
            $valorIng = trim(fgets(STDIN));
            $nuevoPasajero->setNumViajero($valorIng);

            echo 'Ingrese la cantidad de millas del Pasajero: ';
            $valorIng = trim(fgets(STDIN));
            $nuevoPasajero->setCantidadMillas($valorIng);

            break;

        default:
            echo 'Opcion no disponible';
            break;
    }

    return $nuevoPasajero;
}

echo "**********************\nBienvenido al sistema\n**********************\n";
echo "Elija una opcion\n";
echo "1. Cargar un viaje\n2. Modificar o agregar datos de viaje\n3. Salir\n";
$opcion = trim(fgets(STDIN));

while ($opcion != 3) {
    switch ($opcion) {
        case 1:
            echo "***************\nCargar un viaje\n***************\n";
            echo 'Ingrese el codigo de viaje: ';
            $codigo = trim(fgets(STDIN));

            echo 'Ingrese el destino: ';
            $destino = trim(fgets(STDIN));

            echo 'Ingrese el limite de pasajeros: ';
            $limite = trim(fgets(STDIN));

            echo 'Ingrese el costo de los tickets del viaje: ';
            $costo = trim(fgets(STDIN));

            echo "Ingrese los datos del responsable del viaje\n";
            echo 'Ingrese el nombre: ';
            $nombre = trim(fgets(STDIN));

            echo 'Ingrese el apellido: ';
            $apellido = trim(fgets(STDIN));

            echo 'Ingrese el numero de empleado: ';
            $nEmpleado = trim(fgets(STDIN));

            echo 'Ingrese el numero de licencia: ';
            $nLicencia = trim(fgets(STDIN));

            //OBJETO RESPONSABLE
            $objResponsable = new ResponsableV(
                $nombre,
                $apellido,
                $nEmpleado,
                $nLicencia
            );

            //echo "Se cargaran pasajeros por defecto\n";
            echo "Se deberan cargar los pasajeros\n";
            echo "*********************************\n";

            //OBJETO VIAJE

            $objViaje = new Viaje(
                $codigo,
                $destino,
                $limite,
                $arregloPasajeros,
                $objResponsable,
                $costo,
                0
            );

            break;
        case 2:
            if ($objViaje === null) {
                echo "****************************************\n";
                echo "No existe una clase Viaje para modificar\n";
                echo "****************************************\n";
            } else {
                echo "\n**************************\nModificar o Agregar datos\n**************************\n";
                echo "1. Modificar datos del viaje\n2. Comprar Nuevo Pasaje\n3. Modificar Pasajero\n4. Modificar Responsable de Viaje\n5. Ver datos\n6. Volver al menu anterior\n";
                $opcionMod = trim(fgets(STDIN));

                while ($opcionMod != 6) {
                    switch ($opcionMod) {
                        case 1:
                            echo "*************************\n";
                            echo "Modificar datos del viaje\n";
                            echo "*************************\n";

                            echo 'Ingrese el codigo de viaje: ';
                            $codigo = trim(fgets(STDIN));

                            echo 'Ingrese el destino: ';
                            $destino = trim(fgets(STDIN));

                            echo 'Ingrese el limite de pasajeros: ';
                            $cantMax = trim(fgets(STDIN));

                            echo 'Ingrese el costo del viaje: ';
                            $costo = trim(fgets(STDIN));

                            $objViaje->modificarViaje(
                                $codigo,
                                $destino,
                                $cantMax,
                                $costo
                            );

                            break;
                        case 2:
                            echo "*********************\n";
                            echo "Comprar nuevo pasaje\n";
                            echo "*********************\n";

                            echo "Ingrese el DNI del pasajero: \n";
                            $dni = trim(fgets(STDIN));

                            if (
                                $objViaje->verificarPasajero($dni) === null &&
                                $objViaje->hayPasajesDisponible()
                            ) {
                                echo "¿Que tipo de pasajero es?\n";
                                echo "1. Estandar\n2. Con Necesidades Especiales\n3. VIP\n";
                                $valorIng = trim(fgets(STDIN));

                                $nuevoPasajero = agregarPasajeroA_Viaje(
                                    $valorIng
                                );

                                echo "Pasajero ingresado a la lista\n";

                                echo 'El precio a pagar es de $' .
                                    $objViaje->venderPasaje($nuevoPasajero) .
                                    "\n";
                            } else {
                                echo "El pasajero no se ha podido ingresar (Ya esta en la lista o limite alcanzado)\n";
                            }

                            break;
                        case 3:
                            echo "******************\n";
                            echo "Modificar Pasajero\n";
                            echo "******************\n";

                            echo "Ingrese el DNI del pasajero que desee modificar\n";
                            $dni = trim(fgets(STDIN));
                            $verificacion = $objViaje->verificarPasajero($dni);
                            if ($verificacion !== null) {
                                echo "Se ha encontrado el pasajero.\n";
                                echo "Proceda a ingresar los datos a modificar\n";
                                echo 'Ingrese el nombre: ';
                                $nombre = trim(fgets(STDIN));

                                echo 'Ingrese el apellido: ';
                                $apellido = trim(fgets(STDIN));

                                echo 'Ingrese el telefono del pasajero: ';
                                $telefono = trim(fgets(STDIN));

                                $objViaje->modificarPasajero(
                                    $verificacion,
                                    $nombre,
                                    $apellido,
                                    $telefono
                                );
                            } else {
                                echo "El pasajero no fue encontrado en la lista\n";
                            }

                            break;
                        case 4:
                            echo "******************************\n";
                            echo "Modificar Responsable de Viaje\n";
                            echo "******************************\n";

                            echo 'Ingrese el numero de empleado del responsable a modificar: ';
                            $nEmpleado = trim(fgets(STDIN));

                            if (
                                $objViaje->getResponsable()->getEmpleado() ==
                                $nEmpleado
                            ) {
                                echo "Empleado encontrado\n";
                                echo "Ingrese los datos a modificar\n";

                                echo 'Ingrese el nombre: ';
                                $nombre = trim(fgets(STDIN));

                                echo 'Ingrese el apellido: ';
                                $apellido = trim(fgets(STDIN));

                                echo 'Ingrese la licencia: ';
                                $nLicencia = trim(fgets(STDIN));

                                $objViaje->modificarResponsable(
                                    $nombre,
                                    $apellido,
                                    $nLicencia
                                );
                            } else {
                                echo "No se ha encontrado el empleado\n";
                            }

                            break;
                        case 5:
                            echo "*********\n";
                            echo "Ver datos\n";
                            echo "*********\n";

                            echo $objViaje . "\n";
                            break;
                        default:
                            echo "\nLa opcion elegida no se encuentra disponible\n";
                            break;
                    }
                    echo "*****************************************************\n";

                    echo "1. Modificar datos del viaje\n2. Comprar Nuevo Pasaje\n3. Modificar Pasajero\n4. Modificar Responsable de Viaje\n5. Ver datos\n6. Volver al menu anterior\n";
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
