<?php
require_once('database.php');
function getAllChiTietTiepXuc()
{
    global $db;
    $query = 'SELECT * FROM chitiettiepxuc
              ORDER BY IdChiTietTiepXuc';
    $statement = $db->prepare($query);
    $statement->execute();
    $cts = $statement->fetchAll();
    $statement->closeCursor();
    return $cts;
}
function get_chitiettiepxuc() {
    global $db;
    $query = 'SELECT * FROM chitiettiepxuc
              ORDER BY IdChiTietTiepXuc';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}
function getChiTietTiepXucById($id_chitiettiepxuc)
{
    global $db;
    $query = 'SELECT * FROM chitiettiepxuc
              WHERE IdChiTietTiepXuc = :id_chitiettiepxuc';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_chitiettiepxuc', $id_chitiettiepxuc);
    $statement->execute();
    $ct = $statement->fetch();
    $statement->closeCursor();
    return $ct;
}
function add_chitiettiepxuc( $id_nguoimua, $id_nguoiban, $thoigian) {
    global $db;
    $query = 'INSERT INTO chitiettiepxuc
                 (IdNguoiMua, IdNguoiBan, ThoiGian)
              VALUES
                 (:id_nguoimua, :id_nguoiban, :thoigian)';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_nguoimua', $id_nguoimua);
    $statement->bindValue(':id_nguoiban', $id_nguoiban);
    $statement->bindValue(':thoigian', $thoigian);
    $statement->execute();
    $statement->closeCursor();
}
function update_chitiettiepxuc($id_chitiettiepxuc,$id_nguoimua, $id_nguoiban, $thoigian) {
    global $db;
    $query = '
        UPDATE nguoidung
        SET IdNguoiMua = :id_nguoimua,
            IdNguoiBan = :id_nguoiban,
            ThoiGian = :thoigian
        WHERE IdChiTietTiepXuc = :id_chitiettiepxuc';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_nguoimua', $id_nguoimua);
    $statement->bindValue(':id_nguoiban', $id_nguoiban);
    $statement->bindValue(':thoigian', $thoigian);
    $statement->bindValue(':id_chitiettiepxuc', $id_chitiettiepxuc);
    $statement->execute();
    $statement->closeCursor();
}
function delete_chitiettiepxuc($id_chitiettiepxuc) {
    global $db;
    $query = 'DELETE FROM chitiettiepxuc
              WHERE IdNguoiDung = :id_chitiettiepxuc';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_chitiettiepxuc', $id_chitiettiepxuc);
    $statement->execute();
    $statement->closeCursor();
}
?>