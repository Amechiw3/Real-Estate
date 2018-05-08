<?php

class Conexion {

    public $dbc = NULL;

    public function __construct() {
        $this->getPDOConnection();
    }

    public function __destruct() {
		$this->dbc = NULL;
    }

    private function getPDOConnection() {
        // Check if the connection is already established
        if ($this->dbc == NULL) {
            // Create the connection
            $dsn = DB_DRIVER . ":host=". DB_HOST .";dbname=" . DB_NAME;
            try {
                $this->dbc = new PDO($dsn, DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                
            } catch( PDOException $e ) {
                echo $e->getMessage();
            }
        }
    }

    public function rows($query) {
        $stmt = $this->dbc->prepare($query);
        
        $stmt->execute();
        return $stmt->rowCount();
        $stmt->close();
    }

    public function liberar($query) {
        
        $stmt = $this->dbc->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
        //$stmt->close();
    }

    public function recorrer($query) {
        $stmt = $this->dbc->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

}

?>