<?php
namespace core\MVC;
use core\database\DB;
/**
 * No va para esta parte;
 */
abstract class Model { 

    protected $table;

    protected $key;

    protected static $instance;

    private $sql;

    protected $exists = false;

    protected $new = true;

    protected $attributes = [];

    protected $originals = [];

    private $wheres = [];
    private $operators = [
        '=',
        '<',
        '>',
        '<=',
        '>='
    ];



    public function __get($attribute)
    {
    }

    public function __set($attribute, $value){
    }

    private static function getNewInstance(){
        self::$instance = new static;
        return self::$instance;
    }

    public static function getAll() {
        $instance = self::getNewInstance();
        $results = DB::table($instance->getTable())->get();
        return $instance->toInstances($results);
    }

    private function toInstances($results, $exits=true) {
        $instances = [];
        $i=0;
        foreach ($results as $row) {
            $instance = $this->getNewInstance();
            $j= 0;
            foreach ($row as $key => $value) {
                $instance->attributes[$key] = $value;
                $instance->originals[$key] = $value;
                $j++;
            }
            $instance->exists = $exits;
            $instance->new = false;
            $instances[$i] = $instance;
            $i++;
        }
        return $instances;
    }

    public static function find($id) {


     //   return $instance->toInstances($results)[0];
    }

    protected function getTable() {
        $table = preg_replace('/[^0-9a-zA-Z_]/', '', $this->table);
        return $table;
    }

    protected function getKey() {
        return $this->key;    
    }

    private function setWhere($condition) {
        array_push($this->wheres, $condition);
    }
    private function sanitize($value)
    {
        return preg_replace('/[^0-9a-zA-Z_-]/', '', $value);
    }
    private function sanitizeOperator($operator)
    {
        if (in_array($operator, $this->operators))
            return $operator;
        else return '=';
    }
    protected function where($field, $operator, $value) {
       imprimir::imprime("entra en where","");
        $condition = [
            "field" => $this->sanitize($field),
            "operator" => $this->sanitizeOperator($operator),
            "value" => $this->sanitize($value)
        ];
        $this->setWhere($condition);
        imprimir::imprime("sale where","");
        return $this;

    }

    

    public static function __callStatic($method, $arguments)
    {
        return (new static)->$method(...$arguments);
    }

    public static function __call($method, $arguments)
    {
        return self::$method(...$arguments);
    }

    public function toSql(){
    }

    protected function get($params = null) {
        //llamamos a la conexion
        $instance = self::getNewInstance();
        $results = DB::table($instance->getTable())->get();

       //montar la sentencia SELECT
            echo "entra en get model<br>";
            echo "fields<pre>".print_r($this->fields)."</pre>";
            $sql="";
            $sql="SELECT ";
            if ($this->fields==null){
                $sql.="* ";
            }else{
                foreach ($this->fields as $key => $value){
                    $sql.="$value,";
                }
                $sql.=substr($sql,0,-1);
    
               
            }
            $sql .=" FROM " .$this->getTable()." ";
        ///////      
            $sql.="WHERE ";
            foreach ($this->wheres as $condition) {
                $sql.=$condition['field'].$condition['operator'].'"'.$condition['value'].'"'. " AND ";
                $params[";".$condition['field']]=$condition["value"];
            }
            $sql=substr($sql,0,-5);
            echo "sentencia sql <br>".$sql;
            $condition=PdoConnection::getInstance();
         //  echo "params".print_r($params);
        //    return $condition->select($sql,$params);
            return $condition->execQuery($sql,$params);
        }


    public function save(){
      //  return db::table($this->getTable())->wheres
    }

    public function lastInsertId() {
        return DB::table($this->getTable())->lastInsertId();
    }

    public function delete() {
    }

    /**
     * Devuelve el valor original de la clave primaria
     *
     * @return string
     */
    private function getKeyValue() {
        return $this->originals[$this->getKey()];
    }

}