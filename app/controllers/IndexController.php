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
 * te devuelve los jugadores y llama a la vista
 *
 * @return void
 */
    public function JugadoresAction()
    {
         $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->get();
          $this->renderView('jugadores', ['jugadores' => $jugadores]);
    }
   /**
    * Borra un jugador de la base de datos, pasado por el array $record 
    * te muestra la vista de los jugadores 
    *
    * @return void
    */
    public function BorrarAction()
    { $record = array( "codigo" => 11112);
     
      $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->delete($record);
      $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->get();
      $this->renderView('jugadores', ['jugadores' => $jugadores]);
    }
    /**
    * Borra un jugador de la base de datos, pasado por el array $record 
    * te muestra la vista de los jugadores 
    *
    * @return void
    */
    public function InsertarAction()
    { 
        $record = array( "codigo" => 11112,"Nombre" => "Greg Buckner", "Procedencia" => "Clemson", "Altura" => "6-4",  "Posicion" => "G-F", "Nombre_equipo" => "Lakers");
        
        $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->insert($record);
        $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->get();
        $this->renderView('jugadores', ['jugadores' => $jugadores]);
    }
 /**
    * Actualiza un jugador de la base de datos, pasado por el array $record 
    * te muestra la vista de los jugadores 
    *
    * @return void
    */
    public function ActualizarAction()
    { 
        $record = array( "codigo" => 11112,"Nombre" => "pepe Buckner", "Procedencia" => "Clemson", "Altura" => "6-4",  "Posicion" => "G-F", "Nombre_equipo" => "Lakers");
      
        $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->update($record);
        imprimir::imprime("Accion:-----",$jugadores);
        $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->get();
        $this->renderView('jugadores', ['jugadores' => $jugadores]);
    }

    // // public function ProbadorAction()
    // // { //llamar a la base de datos, pedir un equipo y te devuelve los jugadores
    // //     echo "entra en jugador Action  <br>";
    // //  //   $record = array("codigo" => "2", "Nombre" => "Greg Buckner", "Procedencia" => "Clemson", "Altura" => "6-4", "Peso" => "210", "Posicion" => "G-F", "Nombre_equipo" => "Lakers");
    // // //    $record = array( "codigo" => 11112,"Nombre" => "Greg Buckner", "Procedencia" => "Clemson", "Altura" => "6-4",  "Posicion" => "G-F", "Nombre_equipo" => "Lakers");
     
    // //     //     $record = array( "codigo" => 11112);
    // //      $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->get();
    // //   //  $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->insert($record);
    // //   //  $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->delete($record);
    // //   //  $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->update($record);
    // //     //  JugadorModel::where('Nombre_equipo','=','Lakers')->get();

    // //     echo "sale del get--llama a la vista";

    // //     //   imprimir::imprime("jugadores",$jugadores);
    // //     // echo "jugadores <pre>";
    // //     // print_r($jugadores);
    // //     // echo "</pre>";
    // //     $this->renderView('jugadores', ['jugadores' => $jugadores]);
    // // }
}
