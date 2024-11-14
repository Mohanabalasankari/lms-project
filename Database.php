<?php
class Database {
    public $conn;

    public function __construct() {
        $this->open_connection();
    }

    public function open_connection() {
        $servername = "localhost";
        $username = "root";
        $password = "mona";
        $dbname = "LMS_DB";
        $this->conn = mysqli_connect("localhost", "username", "password", "database");
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    // Other methods for executing queries, fetching results, etc. go here
}
$mydb = new Database();
?>

