<?php
require_once("model.php");
class Address extends model
{
    var $db;
    function __construct()
    {
        $dbObj = new database();
        $this->db = $dbObj->db;
    }

    function tinhThanh()
    {
        $query = "SELECT * FROM tinhthanh";
        $statement = $this->db->prepare($query);
        $statement->execute();
        $tinhthanh = $statement->fetchAll();
        $statement->closeCursor();
        return $tinhthanh;
    }

    function quanhuyen($idtinhthanh)
    {
        $query = "SELECT * FROM quanhuyen
                  WHERE IdTinhThanh = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $idtinhthanh);
        $statement->execute();
        $quanhuyen = $statement->fetchAll();
        $statement->closeCursor();
        return $quanhuyen;
    }

    function xaphuong($idquanhuyen) {
        $query = "SELECT * FROM phuongxa
                  WHERE IdQuanHuyen = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $idquanhuyen);
        $statement->execute();
        $xaphuong = $statement->fetchAll();
        $statement->closeCursor();
        return $xaphuong;
    }
    function getAddress($idxaphuong) {
        $query = 'SELECT phuongxa.TenPhuongXa, quanhuyen.TenQuanHuyen, tinhthanh.TenTinhThanh FROM phuongxa, quanhuyen, tinhthanh
        WHERE tinhthanh.IdTinhThanh = phuongxa.IdTinhThanh AND quanhuyen.IdQuanHuyen = phuongxa.IdQuanHuyen AND phuongxa.IdPhuongXa = :id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $idxaphuong);
        $statement->execute();
        $xp = $statement->fetch();
        return $xp;
    }
    function getAddressId($idxaphuong) {
        $query = 'SELECT IdPhuongXa, IdQuanHuyen, IdTinhThanh FROM phuongxa
                  WHERE IdPhuongXa = :id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $idxaphuong);
        $statement->execute();
        $xp = $statement->fetch();
        return $xp;
    }
}
