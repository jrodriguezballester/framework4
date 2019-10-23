<?php
namespace core\MVC;

/**
 * Clase base para los controladores
 */
 class imprimir {

public static function imprime($tring,$var)
{
    echo "<br>$tring <pre>";
        print_r($var);
        echo "</pre>";
    
    echo "<br> ";

} 
}  