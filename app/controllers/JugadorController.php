<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\JugadorModel;
use core\database\DB as DB;


class JugadorController extends Controller {


    public function DatosJugadorAction($params) {//no es seguro
        $idJugador=$params['idJugador'];
        $this->renderView(('jugador'),['jugador'=>$idJugador])
    }

}