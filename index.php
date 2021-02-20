<?php

require 'config.php';

// funcao que carrega as classes automaticamente
function myAutoload($class) {
    require_once(LIBS . $class .".php");
}

spl_autoload_register("myAutoload");
// carrega o bootstrap - inicializador
$bootstrap = new Bootstrap();
// caminhos opcionais
//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile();
//$bootstrap->setErrorFile();
$bootstrap->init();