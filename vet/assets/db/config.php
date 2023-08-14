<?php
session_start();

// Define database
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'vetdog');

// Function to establish database connection using mysqli
function connectDB() {
    $mysqli = new mysqli(dbhost, dbuser, dbpass, dbname);
    if ($mysqli->connect_error) {
        die('Connection failed: ' . $mysqli->connect_error);
    }
    return $mysqli;
}

Class Connection{
 
    private $server = "mysql:host=localhost;dbname=vetdog";
    private $username = "root";
    private $password = "";
    private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $conn;
    
    public function open(){
        try{
            $this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
            return $this->conn;
        }
        catch (PDOException $e){
            echo "Hubo un problema con la conexión: " . $e->getMessage();
        } 
    }
 
    public function close(){
        $this->conn = null;
    } 
}
?>