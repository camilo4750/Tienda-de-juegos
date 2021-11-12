<?php
// remplazar el cache del motor y crear la funcion de auto carga
function controllerAutoload($classname)
{
    include 'controllers/' . $classname . '.php';
}
spl_autoload_register('controllerAutoload');
