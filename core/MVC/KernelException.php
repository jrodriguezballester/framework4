<?php

namespace core\MVC;

/**
 * Clase para crear nuestras propias excepciones
 */
class KernelException extends \Exception
{

    public function __construct($string)
    {
        echo "implementar";
    }
}
