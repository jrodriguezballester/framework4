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
        echo "entra en table \n";
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
        echo "entra en get <br>";
        echo "fields<pre>" . print_r($this->fields) . "</pre>";
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
        ///////      
        $sql .= "WHERE ";
        foreach ($this->wheres as $condition) {
            $sql .= $condition['field'] . $condition['operator'] . '"' . $condition['value'] . '"' . " AND ";
            $params[";" . $condition['field']] = $condition["value"];
        }
        $sql = substr($sql, 0, -5);
        echo "sentencia sql <br>" . $sql;
        $condition = PdoConnection::getInstance();
        //  echo "params".print_r($params);
        //    return $condition->select($sql,$params);
        return $condition->execQuery($sql, $params);
    }

    public function insert($record)
    {
        // echo "<br><br><br><br><br><br>";
        // echo "entra en insert";
        $sql = "";
        //INSERT INTO nombreTabla (Campo1, Campo2,...) VALUES (:Campo1, :Campo2,...) 
        $sql = "INSERT INTO " . $this->getTable() . " (";
        //     $params
        //  imprimir::imprime("sql ",$sql);
        $sqlAux = "";
        foreach ($record as $key => $value) {           
            $sql .= $key . ',';
            $values = ":$key";
            $sqlAux .= $values . ",";
            // echo "keys".$key."<br>";
            // echo "values".$sqlAux."<br>";
            $params[":" . $key] = $value;        
        }
        $sql = substr($sql, 0, -1);
        $sql .= ") VALUES (".$sqlAux;
        $sql = substr($sql, 0, -1);
        $sql .= ");";
        imprimir::imprime("la expresion sql ", $sql);
        imprimir::imprime("params ", $params);
        $condition = PdoConnection::getInstance();
        return $condition->execQueryNoResult($sql, $params);
    }

    public function lastInsertId()
    {
        $connection = PdoConnection::getInstance();
        return $connection->lastInsertId();
    }

    public function delete()
    {
        //    DELETE FROM tblInvoices WHERE InvoiceID = 3 

    }

    public function update($record)
    {
        //    UPDATE table name 
        //  SET field name  = some value
        // WHERE [Last Name] = 'Smith' 

    }
}
