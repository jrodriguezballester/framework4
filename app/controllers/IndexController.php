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

    public function JugadoresAction()
    { //llamar a la base de datos, pedir un equipo y te devuelve los jugadores
        echo "entra en jugador Action  <br>";
     //   $record = array("codigo" => "2", "Nombre" => "Greg Buckner", "Procedencia" => "Clemson", "Altura" => "6-4", "Peso" => "210", "Posicion" => "G-F", "Nombre_equipo" => "Lakers");
    //    $record = array( "codigo" => 11112,"Nombre" => "Greg Buckner", "Procedencia" => "Clemson", "Altura" => "6-4",  "Posicion" => "G-F", "Nombre_equipo" => "Lakers");
     
        //     $record = array( "codigo" => 11112);
         $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->get();
      //  $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->insert($record);
      //  $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->delete($record);
      //  $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->update($record);
        //  JugadorModel::where('Nombre_equipo','=','Lakers')->get();

        echo "sale del get--llama a la vista";

        //   imprimir::imprime("jugadores",$jugadores);
        // echo "jugadores <pre>";
        // print_r($jugadores);
        // echo "</pre>";
        $this->renderView('jugadores', ['jugadores' => $jugadores]);
    }
    public function BorrarAction()
    { //llamar a la base de datos, pedir un equipo y te devuelve los jugadores
        echo "entra en Borrar Action  <br>";
     //   $record = array("codigo" => "2", "Nombre" => "Greg Buckner", "Procedencia" => "Clemson", "Altura" => "6-4", "Peso" => "210", "Posicion" => "G-F", "Nombre_equipo" => "Lakers");
     //   $record = array( "codigo" => 11112,"Nombre" => "Greg Buckner", "Procedencia" => "Clemson", "Altura" => "6-4",  "Posicion" => "G-F", "Nombre_equipo" => "Lakers");
     
             $record = array( "codigo" => 11112);
      //   $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->get();
      //  $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->insert($record);
        $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->delete($record);
      //  $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->update($record);
        //  JugadorModel::where('Nombre_equipo','=','Lakers')->get();

        echo "sale de BorrarAction------------------------------";

        //   imprimir::imprime("jugadores",$jugadores);
        // echo "jugadores <pre>";
        // print_r($jugadores);
        // echo "</pre>";
        $this->renderView('jugadores', ['jugadores' => $jugadores]);
    }
    public function InsertarAction()
    { //llamar a la base de datos, pedir un equipo y te devuelve los jugadores
        echo "entra en Insertar Action  <br>";
     //   $record = array("codigo" => "2", "Nombre" => "Greg Buckner", "Procedencia" => "Clemson", "Altura" => "6-4", "Peso" => "210", "Posicion" => "G-F", "Nombre_equipo" => "Lakers");
        $record = array( "codigo" => 11112,"Nombre" => "Greg Buckner", "Procedencia" => "Clemson", "Altura" => "6-4",  "Posicion" => "G-F", "Nombre_equipo" => "Lakers");
     
        //     $record = array( "codigo" => 11112);
      //   $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->get();
        $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->insert($record);
      //  $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->delete($record);
      //  $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->update($record);
        //  JugadorModel::where('Nombre_equipo','=','Lakers')->get();

        echo "sale del insert------------------------------";

        //   imprimir::imprime("jugadores",$jugadores);
        // echo "jugadores <pre>";
        // print_r($jugadores);
        // echo "</pre>";
        $this->renderView('jugadores', ['jugadores' => $jugadores]);
    }
    public function ActualizarAction()
    { //llamar a la base de datos, pedir un equipo y te devuelve los jugadores
        echo "entra en jugador Action  <br>";
     //   $record = array("codigo" => "2", "Nombre" => "Greg Buckner", "Procedencia" => "Clemson", "Altura" => "6-4", "Peso" => "210", "Posicion" => "G-F", "Nombre_equipo" => "Lakers");
        $record = array( "codigo" => 11112,"Nombre" => "Greg Buckner", "Procedencia" => "Clemson", "Altura" => "6-4",  "Posicion" => "G-F", "Nombre_equipo" => "Lakers");
     
        //     $record = array( "codigo" => 11112);
      //   $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->get();
      //  $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->insert($record);
      //  $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->delete($record);
        $jugadores = DB::table('jugadores')->where("Nombre_equipo", " = ", "Lakers")->update($record);
        //  JugadorModel::where('Nombre_equipo','=','Lakers')->get();

        echo "sale del insert------------------------------";

        //   imprimir::imprime("jugadores",$jugadores);
        // echo "jugadores <pre>";
        // print_r($jugadores);
        // echo "</pre>";
        $this->renderView('jugadores', ['jugadores' => $jugadores]);
    }


}
