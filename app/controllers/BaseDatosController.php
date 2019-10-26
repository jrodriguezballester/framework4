<?php

namespace app\controllers;

use core\MVC\Controller as Controller;
use core\database\DB as DB;
use core\MVC\imprimir;
use app\models\JugadorModel as JugadorModel;

class BaseDatosController extends Controller
{
    /**
     * Borra un jugador de la base de datos, pasado por el array $record 
     * te muestra la vista de los jugadores 
     *
     * @return void
     */
    public function BorrarAction()
    {
        $record = array("codigo" => 11112);

        $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->delete($record);
        $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->get();
        $this->renderView('jugadores', ['jugadores' => $jugadores]);
    }


    /**
     * Inserta un jugador de la base de datos, escrito en el array $record 
     * te muestra la vista de los jugadores 
     *
     * @return void
     */
    public function InsertarAction()
    {
        // $record = array( "codigo" => 11112,"Nombre" => "VICENT", "Procedencia" => "MISLATA", "Altura" => "6-4",  "Posicion" => "G-F", "Nombre_equipo" => "Lakers");
        $nombre = "";
        $posicion ="";
        $codigo="";
        $Nombre_equipo='';

        $jugador = new JugadorModel();
        $jugador->$codigo='12222';
        $jugador->$nombre = 'Jugador A';
         $jugador->$posicion = 'P';
         $jugador->$Nombre_equipo='Lakers';
         //$jugador->save()


        $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->insert($jugador);
        $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->get();
        $this->renderView('jugadores', ['jugadores' => $jugadores]);
    }


    /**
     * Actualiza un jugador de la base de datos (codigo=11112), pasado por el array $record 
     * te muestra la vista de los jugadores 
     *
     * @return void
     */
    public function ActualizarAction()
    {
        $record = array("codigo" => 11112, "Nombre" => "PEPE ", "Procedencia" => "MISLATA", "Altura" => "6-4",  "Posicion" => "G-F", "Nombre_equipo" => "Lakers");



        $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->update($record);
        $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->get();
        $this->renderView('jugadores', ['jugadores' => $jugadores]);
    }
}
