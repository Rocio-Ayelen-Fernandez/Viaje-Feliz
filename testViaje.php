<?php

    include 'Viaje.php';

    //ARREGLOS DE PASAJEROS
    $p1=["nombre"=>"Juan", "apellido" => "Ramos", "dni" => "39517428"];
    $p2=["nombre"=>"Valentina", "apellido" => "Rodriguez", "dni" => "42794801"];
    $p3=["nombre"=>"Enzo", "apellido" => "Diaz", "dni" => "30431514"];
    $p4=["nombre"=>"Maria", "apellido" => "Rojas", "dni" => "22812370"];

    $arregloPasajeros = [$p1, $p2, $p3, $p4];

    //OBJETO VIAJE
    $objViaje = new Viaje(3682, "Buenos Aires", 10, $arregloPasajeros);

    echo $objViaje."\n";
    


?>