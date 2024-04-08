<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=taller_1_dw2',"admin","admin");


    $valor = $_GET['valor'];

    $sql= "SELECT 
    t1.Campo2 AS Campo2_tabla1,
    t1.Campo3 AS Campo3_tabla1,
    t1.Campo4 AS Campo4_tabla1,
    t2.Campo2 AS Campo2_tabla2,
    t2.Campo3 AS Campo3_tabla2,
    t2.Campo4 AS Campo4_tabla2,
    t3.Campo2 AS Campo2_tabla3,
    t3.Campo3 AS Campo3_tabla3,
    t3.Campo4 AS Campo4_tabla3,
    t4.Campo2 AS Campo2_tabla4,
    t4.Campo3 AS Campo3_tabla4,
    t4.Campo4 AS Campo4_tabla4
FROM tabla2 t2
JOIN tabla1 t1 ON t2.id1 = t1.id
JOIN tabla3 t3 ON t2.id3 = t3.id
JOIN tabla4 t4 ON t2.id4 = t4.id
WHERE t2.id = $valor";


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