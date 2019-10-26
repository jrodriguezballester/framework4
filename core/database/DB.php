<?php

namespace core\database;

use core\MVC\imprimir;

class DB
{

    private static $instance;
    private $table;
    private $fields = [];
    private $wheres = [];
    private $operators = [
        '=',
        '<',
        '>',
        '<=',
        '>='
    ];

    /**
     * Método para devolver una instancia de DB con la tabla que toca
     *
     * @param [type] $table
     * @return void
     */
    public static function table($table)
    {
        $instance = new static;
        $instance->setTable($table);
        return $instance;
    }

    private function setTable($table)
    {
        $this->table = $table;
    }

    private function getTable()
    {

        return $this->table;
    }

    /**
     * selecciona los campos de la tabla para el select
     * ...$fields para que el número de los argumentos pueda ser variable (0,1,2...)
     *
     * @param string ...$fields
     * @return void
     */
    public function select(...$fields)
    {
        foreach ($fields as $field) {
            $this->setField($field);
        }
        return $this;
    }

    private function setField($field)
    {
        array_push($this->fields, $this->sanitize($field));
    }

    private function sanitize($value)
    {
        return preg_replace('/[^0-9a-zA-Z_-]/', '', $value);
    }

    public function where($field, $operator, $value)
    {
        $condition = [
            "field" => $this->sanitize($field),
            "operator" => $this->sanitizeOperator($operator),
            "value" => $this->sanitize($value)
        ];
        $this->setWhere($condition);
        return $this;
    }

    private function sanitizeOperator($operator)
    {
        if (in_array($operator, $this->operators))
            return $operator;
        else return '=';
    }

    private function setWhere($condition)
    {
        array_push($this->wheres, $condition);
    }
    ///
    public function get()
    { //montar la sentencia SELECT
     imprimir::frase("entra en get DB");
     imprimir::resalta("aqui");
     $params=[""];    //no entra en conditions
        $sql = "";
        $sql = "SELECT ";
        if ($this->fields == null) {
            $sql .= "* ";
        } else {
            foreach ($this->fields as $key => $value) {
                $sql .= "$value,";
            }
            $sql .= substr($sql, 0, -1);
        }
        $sql .= " FROM " . $this->getTable() . " ";
        $sql .= "WHERE ";
       imprimir::imprime("wheres",$this->wheres);
        foreach ($this->wheres as $condition) {
            $sql .= $condition['field'] . $condition['operator'] . '"' . $condition['value'] . '"' . " AND ";         
            $params=[":" . $condition['field'] => $condition["value"]];
           // imprimir::imprime("condition:-",$conditon);
        }
        $sql = substr($sql, 0, -5);      
        imprimir::imprime("params",$params);
        $condition = PdoConnection::getInstance();
        return $condition->execQuery($sql, $params);
    }

    public function insert($record)
    {   //INSERT INTO nombreTabla (Campo1, Campo2,...) VALUES (:Campo1, :Campo2,...) 
       $params[0]="";
        $sql = "";        
        $sql = "INSERT INTO " . $this->getTable() . " (";      
        $sqlAux = "";
        foreach ($record as $key => $value) {           
            $sql .= $key . ',';
            $values = ":$key";
            $sqlAux .= $values . ",";
          
            $params[":" . $key] = $value;        
        }
        $sql = substr($sql, 0, -1);
        $sql .= ") VALUES (".$sqlAux;
        $sql = substr($sql, 0, -1);
        $sql .= ");";
    
        $condition = PdoConnection::getInstance();
        return $condition->execQueryNoResult($sql, $params);
    }

    public function lastInsertId()
    {
        $connection = PdoConnection::getInstance();
        return $connection->lastInsertId();
    }

    //public function delete()
    public function delete($record)
    {
        //    DELETE FROM nombreTabla WHERE Campo1 = :Campo1
        $sql = "";   
        $sql = "DELETE FROM " . $this->getTable() . " WHERE ";
        $sqlAux = "";
        foreach ($record as $key => $value) {           
            $sql .= $key . '=';
            $values = ":$key";
            $sqlAux .= $values;
            $params[":" . $key] = $value;        
        }
         $sql .= $sqlAux.";";
        $condition = PdoConnection::getInstance();
        return $condition->execQueryNoResult($sql, $params);

    }

    public function update($record)
    {
        //    UPDATE table name SET field name  = some value
        //    WHERE [field Name] = 'valor' 
 
        $sql = "";      
        $sql = "UPDATE " . $this->getTable() . " SET ";
           $sqlAux = "";
        foreach ($record as $key => $value) {           
            $sql .= $key . '=';
            $values = ":$key";
            $sql .= $values . ",";
            $params[":" . $key] = $value; 
          
        }
        $sql = substr($sql, 0, -1);
        $sql .= " WHERE codigo=:codigo;";

        $condition = PdoConnection::getInstance();
        return $condition->execQueryNoResult($sql, $params);
    }
}
