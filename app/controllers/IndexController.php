<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\JugadorModel;
use core\database\DB as DB;

class IndexController extends Controller {

    public function IndexAction() {
        $this->renderView('portada');
        
    }

    public function HistoriaAction() {
        $this->renderView('historia');
    }

    public function JugadoresAction() {
        $this->renderView('jugadores');
    }
    

}