<?php

namespace core\database;
//use core\database\PDO;
use core\MVC\imprimir;

use PDO;
class PdoConnection
{


    /**
     * Instancia de la clase
     *
     * @var PDOConnection
     */
    private static $instance = null;
    /**
     * conexión con la bbdd
     *
     * @var PDO
     */
    public $bbdd;

    private function __construct()
    {

        global $config;
        $controlador = $config["DB"]["CONNECTION"];
        $host = $config["DB"]["HOST"];

        $username = $config["DB"]["USERNAME"];
        $password = $config["DB"]["PASSWORD"];
        $basededatos = $config["DB"]["NAMEDB"];
        ///poner try catch/////////////////////////////////
        //$this->bbdd=new \PDO("$driver:host=host;dbname=$basededatos","$username","$password");
        $this->bbdd = new \PDO("mysql:host=localhost;dbname=nba", "root", "root");
    }

    //patron singlenton
    public static function getInstance()
    {

        if (self::$instance == null) {
            self::$instance = new PdoConnection();
        }
        return self::$instance;
    }


    public function select($query, $params = null)
    {
        //    $this->bbdd->execQuery($query, $params);

    }

    public function insert($query, $params)
    { }

    public function lastInsertId()
    { }

    public function update($query, $params)
    { }


    public function delete($query, $params)
    { }
    ///////////////
    public function execQuery($query, $params)
    { // cambiar a private prepara sentencia sql, la ejecuta y la devuelve
        echo "<br>entra en execQuery <br>";

        imprimir::imprime("bbdd", $this->bbdd);
        imprimir::imprime("query", $query);

        $ps = $this->bbdd->prepare($query);


        $ps->execute($params);
        imprimir::imprime("ps", $ps);
        return $ps->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function execQueryNoResult($query, $params)
    { //revisar es copia de execuery

        echo "<br>entra en execQueryNoResult <br>";
      
        $ps = $this->bbdd->prepare($query);
        imprimir::imprime("ps", $ps);
      
        imprimir::imprime("params", $params);
    
        $ps->execute($params);

        imprimir::imprime("ps execute()", $ps);
        return $ps->fetchAll(\PDO::FETCH_ASSOC);
     
    }
};
