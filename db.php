<?php
class db {
    protected $connection;

    function setconnection() {
        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=library_managment_system", "root", "");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>
