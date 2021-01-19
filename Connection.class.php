<?php
require('Config/config.php');
class Connection
{
    public function __construct(){
        $this->host = CONF_DB_HOST;
        $this->dbname = CONF_DB_NAME;
        $this->user = CONF_DB_USER;
        $this->pass = CONF_DB_PASS;
    }


    public function getConnection(){
        
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("SET CHARSET UTF8MB4");
            return $conn;
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }
}

?>