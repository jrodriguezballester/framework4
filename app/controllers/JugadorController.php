<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\JugadorModel;
use core\database\DB as DB;
use core\MVC\imprimir;

class JugadorController extends Controller {


    public function DatosJugadorAction($params) {//no es seguro
        echo "<br><br><br><br><br><br><br><br>";
        echo "entra en datosJugadorAction------------------------------------------------";
        imprimir::imprime("params",$params);
        $idJugador=$params['idJugador'];
        $datosJugador = DB::table('jugadores')->where("codigo", " = ", "$idJugador")->get();
       imprimir::imprime("jugadores de DatosJugadorAction",$datosJugador);
        $this->renderView(('jugador'),['jugador'=>$datosJugador]);
      
    }

}