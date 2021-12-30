<?php
require_once('database.php');
function getAllAdmin()
{
    global $db;
    $query = 'SELECT * FROM admin
              ORDER BY IdAdmin';
    $statement = $db->prepare($query);
    $statement->execute();
    $ads = $statement->fetchAll();
    $statement->closeCursor();
    return $ads;
}
function get_admin() {
    global $db;
    $query = 'SELECT * FROM admin
              ORDER BY IdAdmin';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}
function getAdminById($id_admin)
{
    global $db;
    $query = 'SELECT * FROM admin
              WHERE IdAdmin = :id_admin';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_admin', $id_admin);
    $statement->execute();
    $ad = $statement->fetch();
    $statement->closeCursor();
    return $ad;
}
function add_admin( $madangnhap, $matkhau) {
    global $db;
    $query = 'INSERT INTO admin
                 (MaDangNhap, MatKhau)
              VALUES
                 (:madangnhap, :matkhau)';
    $statement = $db->prepare($query);
    $statement->bindValue(':madangnhap', $madangnhap);
    $statement->bindValue(':matkhau', $matkhau);
    $statement->execute();
    $statement->closeCursor();
}
function update_admin($id_admin, $madangnhap, $matkhau) {
    global $db;
    $query = '
        UPDATE admin
        SET MaDangNhap = :madangnhap,
            MatKhau = :matkhau
        WHERE IdAdmin = :id_admin';
    $statement = $db->prepare($query);
    $statement->bindValue(':madangnhap', $madangnhap);
    $statement->bindValue(':matkhau', $matkhau);
    $statement->bindValue(':id_admin', $id_admin);
    $statement->execute();
    $statement->closeCursor();
}
function delete_nguoidung($id_admin) {
    global $db;
    $query = 'DELETE FROM admin
              WHERE IdAdmin = :id_admin';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_admin', $id_admin);
    $statement->execute();
    $statement->closeCursor();
}
?>