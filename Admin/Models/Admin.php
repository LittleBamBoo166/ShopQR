<?php
require_once('model.php');
class Admin extends model {
    var $db;
    function __construct()
    {
        $dbObj = new database();
        $this->db = $dbObj->db;
    }
    function deleteNguoidung($id_nguoidung) {
        global $db;
        $query = 'DELETE FROM nguoidung
                  WHERE IdNguoiDung = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id_nguoidung);
        $statement->execute();
        $statement->closeCursor();
    }
}
