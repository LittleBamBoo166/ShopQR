<?php
require_once("model.php");
class User extends model {
    var $db;
    function __construct()
    {
        $dbObj = new database();
        $this->db = $dbObj->db;
    }
    function getUserById($id) {
        $query = 'SELECT * FROM nguoidung
                  WHERE IdNguoiDung = :id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $us = $statement->fetch();
        $statement->closeCursor();
        return $us;
    }
    function checkUser($sdt) {
        $query = 'SELECT * FROM nguoidung
                  WHERE SDT = :s';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':s', $sdt);
        $statement->execute();
        $us = $statement->fetchAll();
        $statement->closeCursor();
        if (count($us) == 0) {
            return 0;
        } else {
            return 1;
        }
    }
}