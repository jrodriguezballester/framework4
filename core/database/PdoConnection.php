<?php
namespace core\database;
//use PDO;
class PdoConnection {
 

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

    private function __construct(){
     
        global $config;
        $driver=$config["DB"]["CONNECTION"];
        $username = $config["DB"]["USERNAME"];
        $password = $config["DB"]["PASSWORD"]; 
        $basededatos = $config["DB"]["NAMEDB"];
        ///poner try catch/////////////////////////////////
        //$this->bbdd=new PdoConnection("$driver:host=host;dbname=$basededatos","$username","$password");
        $this->bbdd=new \PDO("mysql:host=localhost;dbname=nba","root","root");
    }

//patron singlenton
    public static function getInstance() {
      //  echo $instance;
        if(self::$instance==null){
            self::$instance=new PdoConnection();
        }
        return self::$instance;
    }


    public function select($query, $params = null){
    

    }

    public function insert($query, $params){
    }

    public function lastInsertId() {
    }

    public function update($query, $params){
    }


    public function delete($query, $params){
    }
///////////////
    private function execQuery($query, $params) {//prepara sentencia sql, la ejecuta y la devuelve
        $ps->$this->bbdd->prepare($query);
        $ps-execute($params);
        return $ps->fetchAll(\PDO::FETCH_ASSOC);

    }

     private function execQueryNoResult($query, $params) {
    //     $ps->$this->bbdd->prepare($query);
    //     return exe
     }

};