<?php
class connection
{
    var $db;
    function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=shopqr';
        $username = 'root';
        $password = '';
        try {
            $this->db = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
?>