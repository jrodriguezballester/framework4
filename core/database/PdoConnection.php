<?php
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
        $this->bbdd=new PdoConnection("$driver:host=host;dbname=$basededatos","$username","$password");

    }
//patron singlenton
    public static function getInstance() {
        if($this->instance==null){
            $this->instance=new PdoConnection();
        }
        return $this->instance
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
    private function execQuery($query, $params) {
        $ps=tisbbdd-prepare($query)
        $ps-execu($params)
        return $record

    }

    private function execQueryNoResult($query, $params) {
    }

};