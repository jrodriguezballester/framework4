<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\JugadorModel;
use core\database\DB as DB;
use core\MVC\imprimir;

class JugadorController extends Controller {


    public function DatosJugadorAction($params) {//no es seguro
        echo "<br><br><br><br><br><br>";
        echo "entra en datosjugadoraction-------------------------------";
        $jugador = DB::table('jugadores')->where("codigo", " = ", $params['idJugador'])->get();
       
        $idJugador=$params['idJugador'];
        imprimir::imprime("params",$params);
     //   $this->renderView(('jugador'),['jugador'=>$idJugador]);
        $this->renderView(('jugador'),['jugador'=>$jugador]);
    }

}