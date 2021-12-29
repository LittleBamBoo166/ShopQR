<?php
require_once("connection.php");
class model {
    var $db;
    function __construct()
    {
        $conn_obj = new connection();
        $this->db = $conn_obj->db;
    }
}