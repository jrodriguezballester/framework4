<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\JugadorModel;
use core\database\DB as DB;
use core\MVC\imprimir;

class JugadorController extends Controller {

/**
    * Muestra un jugador de la base de datos (codigo=idJugador)
    * te muestra la vista del Jugador 
    *
    * @param [type] $params array Datos del jugador
    * @return void
    */
    public function DatosJugadorAction($params) {
        $jugador = DB::table('jugadores')->where("codigo", " = ", $params['idJugador'])->get();
       
        $idJugador=$params['idJugador'];
        $this->renderView(('jugador'),['jugador'=>$jugador]);
    }

}