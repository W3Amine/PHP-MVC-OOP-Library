<?php
namespace src\DataBase;
use PDO;
use PDOException;
use src\config\config;
//use src\DataBase\DataBaseManager;
// MySql Manager / querybuilder
abstract class Model implements  DataBaseManager {
    public static $conn;
    public static $query;
    public static $dataToBind = [];
static public function get_child_class(){
    return get_called_class()::$ModelName;
}

public static function connect(){
        $DB_DATA = config::get('database');
        try {
            $pdo = new PDO('mysql:host=' . $DB_DATA['DB_HOST'] . ';dbname=' . $DB_DATA['DB_DATABASE'], $DB_DATA['DB_USERNAME'], $DB_DATA['DB_PASSWORD']);
            // set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            self::$conn = $pdo;
            // return $pdo;
          } catch (PDOException $e) {
           // echo "Connection failed: " . $e->getMessage();
          }
    }
    //read 
    public static function select($columns = ['*']){
        self::$query="";
        self::$dataToBind = [];
        $cols = (count($columns) != 1) ? implode(' , '  , $columns) : $columns[0];

        self::$query = "SELECT  ". $cols ." FROM ".self::get_child_class()." WHERE 1 = 1 ";
            return new static();
    }
    public static function get(){

        $stm = self::$conn->prepare(self::$query);
        $stm->execute(self::$dataToBind);
       $data =  $stm->fetchAll(PDO::FETCH_ASSOC);
$data = (count($data) == 1) ? $data[0] : $data ;
        return $data ;
    }
    //create 
    public static function insert($data){
        // use cases
        // User::insert([
        //     'name' => 'London to Paris',
        // ]);
        self::$query="";
        self::$dataToBind = [];
$cols = [];
$val = [];
        foreach ($data as $key => $value) {
            array_push($cols,$key);
            array_push($val,$value);
        }
        $cols = (count($cols) != 1) ? implode(' , '  , $cols) : $cols[0];
$valueAsString = '' ;
$valLength = count($val);
        foreach ($val as $key => $value) {
            if($key == $valLength - 1){
                $valueAsString .= " ?  ";
            } else {
                $valueAsString .= " ? , ";
            }
        }
        self::$query = "INSERT INTO  ". self::get_child_class() . " ( " . $cols ." ) VALUES ( " . $valueAsString . " ) ";
        foreach ($val as $key => $value) {
            array_push(self::$dataToBind , $value );
        }
        return new static();
    }
    //update 
    public static function update($data){
       // use cases
        // User::update([
        //     'name' => 'London to Paris',
        // ]);
        self::$query="";
        self::$dataToBind = [];
        $cols = [];
        $val = [];
                foreach ($data as $key => $value) {
                    array_push($cols,$key);
                    array_push($val,$value);
                }
                foreach ($cols as $key => $value) {
                    $cols[$key] = $value . " =  ? " ;
                }
                $cols = (count($cols) != 1) ? implode(' , '  , $cols) : $cols[0];
                self::$query = "  UPDATE  " . self::get_child_class() . " SET  " . $cols . " WHERE 1 = 1 " ;
                foreach ($val as $key => $value) {
                    array_push(self::$dataToBind , $value );
                }
        return new static();
    }
    //delete 
    public static function delete(){
        self::$query="";
        self::$dataToBind = [];
        self::$query = "DELETE  FROM ".self::get_child_class()." WHERE 1 = 1 ";
        return new static();
        }
    public static function where($col , $val , $operator = "="){
        if(str_contains($val, '.') && !filter_var($val, FILTER_VALIDATE_EMAIL)){
            self::$query .= ' AND  ' . $col . '  '  . $operator  . '  ' . $val   ;
        }else {
            self::$query .= ' AND  `' . $col . '`  '  . $operator  . '  ? ' ;

            array_push(self::$dataToBind , $val );
        }
        return new static();
    }
    public static function orderBy($col , $order = 'DESC' ){
            self::$query .= ' ORDER BY  ' . $col . '  '  . $order ;
        return new static();
    }
    public static function join($table){
        self::$query =  str_replace("WHERE 1 = 1", ' JOIN  ' . $table ." WHERE 1 = 1 ",self::$query);
        return new static();
    }
    public static function run(){

        return self::$conn->prepare(self::$query)->execute(self::$dataToBind);

    }

    public static function All(){
        return self::select()->get();
    }
}