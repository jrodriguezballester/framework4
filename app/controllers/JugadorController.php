<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\JugadorModel;
use core\database\DB as DB;
use core\MVC\imprimir;

class JugadorController extends Controller {


    public function DatosJugadorAction($params) {//no es seguro
       echo "console.log('entra aqui')";
       
        $idJugador=$params['idJugador'];
        imprimir::imprime("params",$params);
        $this->renderView(('jugador'),['jugador'=>$idJugador]);
      
    }

}