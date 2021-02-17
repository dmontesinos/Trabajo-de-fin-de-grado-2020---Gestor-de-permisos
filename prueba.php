<?php

$json = '[
    {
        "Permiso": "Centros",
        "Nivel": "total"
    },
    {
        "Permiso": "Estudios",
        "Nivel": "total"
    },
    {
        "Permiso": "Asignaturas",
        "Nivel": "total"
    },
    {
        "Permiso": "Departamentos",
        "Nivel": "total"
    },
    {
        "Permiso": "Grupo",
        "Nivel": "total"
    },
    {
        "Permiso": "Profesores",
        "Nivel": "total"
    },
    {
        "Permiso": "Universidad",
        "Nivel": "total"
    },
    {
        "Permiso": "Estudiante",
        "Nivel": "basico"
    }
]';

$arrayJson = json_decode($json, true);

$resultado = array();

foreach($arrayJson as $elemento => $algo){
    if($algo['Permiso'] == "Estudiante" || $algo['Permiso'] == "Profesores"){
        //echo "Ambito: ".$algo["Permiso"]."<br>";
        //echo "Permiso: ".$algo["Nivel"]."<br>";
        
        array_push($resultado, $algo);
    }
}

$jsonGenerado = json_encode($resultado);
print_r($jsonGenerado);
//print_r($json);

?>