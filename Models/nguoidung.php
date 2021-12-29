<?php
require_once('database.php');
function getAllnguoidung()
{
    global $db;
    $query = 'SELECT * FROM nguoidung
              ORDER BY IdNguoiDung';
    $statement = $db->prepare($query);
    $statement->execute();
    $nds = $statement->fetchAll();
    $statement->closeCursor();
    return $nds;
}
function get_nguoidung() {
    global $db;
    $query = 'SELECT * FROM nguoidung
              ORDER BY IdNguoiDung';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}
function getNguoiDungById($id_nguoidung)
{
    global $db;
    $query = 'SELECT * FROM nguoidung
              WHERE IdNguoiDung = :id_nguoidung';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_nguoidung', $IdNguoiDung);
    $statement->execute();
    $nd = $statement->fetch();
    $statement->closeCursor();
    return $nd;
}
function add_nguoidung( $hoten, $ngaysinh, $diachi,$id_phuongxa,$phanquyen,$maQR) {
    global $db;
    $query = 'INSERT INTO nguoidung
                 (HoTen, NgaySinh, DiaChi, IdPhuongXa,Role,MaQR)
              VALUES
                 (:hoten, :ngaysinh, :diachi,:id_phuongxa,:phanquyen,:maQR)';
    $statement = $db->prepare($query);
    $statement->bindValue(':hoten', $HoTen);
    $statement->bindValue(':ngaysinh', $NgaySinh);
    $statement->bindValue(':diachi', $DiaChi);
    $statement->bindValue(':id_phuongxa', $IdPhuongXa);
    $statement->bindValue(':phanquyen', $Role);
    $statement->bindValue(':maQR', $MaQR);
    $statement->execute();
    $statement->closeCursor();
}

function delete_nguoidung($id_nguoidung) {
    global $db;
    $query = 'DELETE FROM nguoidung
              WHERE IdNguoiDung = :id_nguoidung';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_nguoidung', $IdNguoiDung);
    $statement->execute();
    $statement->closeCursor();
}
?>