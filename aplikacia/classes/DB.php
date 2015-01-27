<?php
  class DB{
    private static $_instance = null;
    private $_pdo, 
            $_query, 
            $_error = false, 
            $_results, 
            $_count = 0;
            
    private function __construct(){
      try{
        $this->_pdo = new PDO('mysql:host='. Config::get('mysql/host') .';dbname=' .Config::get('mysql/db'). ';charset=utf8', Config::get('mysql/username'), Config::get('mysql/password'));
        //echo 'Connected';            
      }catch(PDOException $e){
        die($e->getMessage());
      }
    }
    
    public static function getInstance(){
      if(!isset(self::$_instance)){
        self::$_instance = new DB();
      }
      return self::$_instance;
    }
    
    public function query($sql, $params = array()){
      $this->_error = false;
      if($this->_query = $this->_pdo->prepare($sql)){
        $x = 1;
        if(count($params))
          foreach($params as $param){
            $this->_query->bindValue($x, $param);
            $x++;
          }

        if($this->_query->execute()){
          $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
          $this->_count   = $this->_query->rowCount();           
        }
        else
          $this->_error = true; 
      }
      return $this;
    }
    
    private function action($action, $table, $where = array()){
        $operators = array('=','<','>','<=','>=', 'LIKE');
        $sql = "{$action} FROM {$table}";
        $value = "";
        
        if(count($where) === 3 && in_array($where[1], $operators) ){
          
          if(count($where[0]) > 1){
            $field = '(CONCAT('.implode(',', $where[0]).'))';
          }else
            $field      = $where[0];

          $operator   = $where[1];
          $value      = $where[2];
          
          $sql .= " WHERE {$field} {$operator} ?";
          }        
          if(!$this->query($sql, array($value))->error()){
            return $this;
            }
        return false;
        
    }
    
    public function get($table, $where = array()){
      return $this->action("SELECT *", $table, $where);
    }

    public function getSearchRes($select = array(), $table = "", $where = array()){
      if($table == "") return;

      if(count($select) < 2) 
        $select = $select[0];
      else {
        $where[0] = $select;
        $select = 'CONCAT('.implode(",' ', ", $select).'),' . $table.'.*'; 
      }
      return $this->action("SELECT {$select}", $table, $where);
    }
    
    public function delete($table, $where = array()){
        return $this->action('DELETE', $table, $where);
    }
    
    public function insert($table, $fields = array()) {
      if(count($fields)){
        $keys   = array_keys($fields);
        
        $sql = "INSERT INTO {$table} (`" . implode('`, `',$keys) . "`) VALUES (". str_repeat( "?, " , count($keys)-1 ) . "?)";
        if(!$this->query($sql, $fields)->error()){
          return true;
        } 
      }
      return false;
    }
    
    public function update($table, $id, $fields){
      $set = '';
      $x = 1;
      
      foreach($fields as $key => $val){
        $set .= "{$key} = ?";
        if($x < count($fields)){
          $set .= ', ';
        }
        $x++;
      }
      
      $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
      if(!$this->query($sql, $fields)->error()){
          return true;
        }
      return false;
    }
    
    public function error() {
      return $this->_error;
    }
    public function results(){
      return $this->_results;  
    }
    
    public function count() {
      return $this->_count;
    }
  }
?>