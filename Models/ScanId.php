<?php
require_once("model.php");
class ScanId extends model {
    var $db;
    function __construct()
    {
        $dbObj = new database();
        $this->db = $dbObj->db;
    }
    function scanMe($data) {
        $query = 'INSERT INTO chitiettiepxuc (IdNguoiMua, IdNguoiBan)
                  VALUES (:m, :b)';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':m', $data['IdNguoiMua']);
        $statement->bindValue(':b', $data['IdNguoiBan']);
        $statement->execute();
        $statement->closeCursor();
    }
}