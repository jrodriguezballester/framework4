<?php
namespace core\database;
class DB {

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
       public static function table($table) {
        echo "entra en table \n";

        $instance = new static;
        $instance->setTable($table);
        return $instance;
    }

    private function setTable($table)
    {
        $this->table = $table;
    }

    private function getTable(){
      
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
    public function get() {//montar la sentencia SELECT
        echo "entra en get <br>";
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

    public function insert($record) {
    //     $sql="insert into .$this->getTable()."(";
    //     $params
    // foreach($recor as key =>value)
    // $sql.=$key.',';
    // $values.=":$keys";
    // $params[":".$key]=$value
    
    
    }

    public function lastInsertId()
    {
        $connection = PdoConnection::getInstance();
        return $connection->lastInsertId();
    }

    public function delete()
    { }

    public function update($record)
    { }
}
