<?php

namespace core\MVC;

/**
 * Clase para crear nuestras propias excepciones
 * falta implementar desde la version 1 o 2
 * 
 */
class KernelException extends \Exception
{

    public function __construct($string)
    {
        echo "implementar errores";
    }
}
//render View lanza excepcion;