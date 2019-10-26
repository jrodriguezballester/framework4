<?php
namespace app\models;

use core\MVC\imprimir;
use core\MVC\Model;

/**
 * No se pide para esta parte
 */
class JugadorModel extends Model
{
 //   protected $table ;
    public function __construct()
    {
        imprimir::frase("entra en jugador model");
        $this->table="jugadores";
    }
   
    
}
