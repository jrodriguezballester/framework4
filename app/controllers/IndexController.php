<?php

namespace app\controllers;

use core\MVC\Controller as Controller;
use core\database\DB as DB;
use core\MVC\imprimir;
use app\models\JugadorModel as JugadorModel;

class IndexController extends Controller
{

    public function IndexAction()
    {
        $this->renderView('portada');
    }

    public function HistoriaAction()
    {
        $this->renderView('historia');
    }
/**
 *  llamar a la base de datos, pedir un equipo 
 * se guarda los jugadores y llama a la vista
 *
 * @return void
 */
    public function JugadoresAction()
    {
         $jugadores=JugadorModel::where('Nombre_equipo', '=', 'Lakers')->get();
          $this->renderView('jugadores', ['jugadores' => $jugadores]);
    }
 
}
