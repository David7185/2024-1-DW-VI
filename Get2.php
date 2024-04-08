<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=taller_1_dw2',"admin","admin");


    $valor = $_GET['valor'];

    $sql= "SELECT 
    t2.id,
    t2.Campo2,
    t2.Campo3,
    t2.Campo4
FROM tabla2 t2
JOIN tabla3 t3 ON t2.id3 = t3.id
WHERE t3.id = $valor";


    $res = $mbd->query($sql);

    $resultado = [];
    foreach ($res as $fila) { 
        $respuesta[] = $fila;
    }

    header('Content-type:application/json;charset=utf-8');
    echo json_encode($respuesta);

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}