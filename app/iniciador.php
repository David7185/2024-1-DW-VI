<?php

require_once 'config/configurar.php';

spl_autoload_register(function($nombreClass){
    require_once 'librerias/'.$nombreClass.'.php';
    require_once '../vendor/autoload.php';
});
$iniciar = new Core;