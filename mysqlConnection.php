<?php
class MysqlConnection
{
    public $hostname="localhost";
    public $username="root";
    public $password;
    
    public $database;
    
    public $query;
    public $result;
    public $num_row;
    
    public function __construct($hn,$u,$p,$db) {
        $this->setHostname($hn);
        $this->setUsername($u);
        $this->setPassword($p);
        $this->setDatabase($db);
        $this->connect(
                $this->hostname,
                $this->username,
                $this->password,
                $this->database
            );
    }
    
    public function connect($hn,$u,$p,$db){
        $this->cnx=mysql_connect($hn,$u,$p) or
                die("Falha ao conectar com o banco de dados");
        mysql_select_db($db,$this->cnx)or
                die("Falha ao selecionar banco de dados $db");
    }
    
    public function setHostname($hn){
        $this->hostname=$hn;
    }
    
    public function setUsername($u){
        $this->username=$u;
    }
    
    public function setPassword($p){
        $this->password=$p;
    }
    
    public function setDatabase($db){
        $this->database=$db;
    }
    
    public function query($qry){
        $this->query=$qry;
        $this->result=mysql_query($this->query,$this->cnx);
    }
    
    public function showResult(){
        if(!is_resource($this->result)){
            die("Nenhuma consulta foi realizada aidna");
        }
        while($reg=mysql_fetch_assoc($this->result)){
            echo "<p>";
            foreach($reg as $column => $value){
                echo "<b>$column</b> $value<br>";
            }
            echo "</p>";
        }
    }
    
    public function __destruct() {
        mysql_free_result($this->result);
        mysql_close($this->cnx);
    }
}

$cnx= new MysqlConnection('localhost','root','milenium','sistema');
$cnx->query("SELECT id,login,email FROM users");
$cnx->showResult();
?>
