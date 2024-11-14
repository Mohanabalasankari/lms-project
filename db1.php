<?php
class Database {
    public $conn;

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "mona";
        $dbname = "LMS_DB";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function executeQuery($sql) {
        return $this->conn->query($sql);
    }

    public function fetchAssoc($result) {
        return $result->fetch_assoc();
    }

    public function freeResult($result) {
        $result->free();
    }

    public function getError() {
        return $this->conn->error;
    }

    public function close_connection() {
        $this->conn->close();
    }
}
?>
