<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=taller_1_dw2',"admin","admin");


    $valor = $_GET['valor'];
    $tabla = $_GET['tabla'];

    $sql= "SELECT * FROM tabla$tabla WHERE id = $valor";
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