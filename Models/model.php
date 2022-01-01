<?php
require_once("database.php");
class model {
    var $db;
    function __construct()
    {
        $db_obj = new database();
        $this->db = $db_obj->db;
    }
}