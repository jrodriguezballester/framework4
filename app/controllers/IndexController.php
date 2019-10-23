<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\JugadorModel;
use core\database\DB as DB;
use core\MVC\imprimir;

class IndexController extends Controller {

    public function IndexAction() {
        $this->renderView('portada');
        
    }

    public function HistoriaAction() {
        $this->renderView('historia');
    }

    public function JugadoresAction() {
     //   echo "entra en jugador Action <br>";
      
      //  $jugadores = DB::table('jugadores')->where("Nombre_equipo ","=","Lakers")->get();
        $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->get();
    //    echo "sale del get";
       
     //   imprimir::imprime("jugadores",$jugadores);
        // echo "jugadores <pre>";
        // print_r($jugadores);
        // echo "</pre>";
        $this->renderView('jugadores', ['jugadores' => $jugadores]);
    }
    

}