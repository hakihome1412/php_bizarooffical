<?php
class Database
{
    public $conn;
    public $servername = "localhost:3306";
    public $username = "root";
    public $password = "Hakihome1412";
    public $dbname = "bizaro";

    function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->conn, $this->dbname);
        mysqli_query($this->conn, "SET NAMES 'utf8'");
    }
}

$database = new Database;
