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
    $statement->bindValue(':id_nguoidung', $id_nguoidung);
    $statement->execute();
    $nd = $statement->fetch();
    $statement->closeCursor();
    return $nd;
}
function add_nguoidung( $hoten, $ngaysinh, $diachi,$id_phuongxa,$phanquyen,$sdt,$matkhau) {
    global $db;
    $query = 'INSERT INTO nguoidung
                 (HoTen, NgaySinh, DiaChi, IdPhuongXa,Role,SDT,MatKhau)
              VALUES
                 (:hoten, :ngaysinh, :diachi,:id_phuongxa,:phanquyen,:sdt,:matkhau)';
    $statement = $db->prepare($query);
    $statement->bindValue(':hoten', $hoten);
    $statement->bindValue(':ngaysinh', $ngaysinh);
    $statement->bindValue(':diachi', $diachi);
    $statement->bindValue(':id_phuongxa', $id_phuongxa);
    $statement->bindValue(':phanquyen', $phanquyen);
    $statement->bindValue(':sdt', $sdt);
    $statement->bindValue(':matkhau', $matkhau);
    $statement->execute();
    $statement->closeCursor();
}
function update_nguoidung($id_nguoidung, $hoten, $ngaysinh, $diachi,$id_phuongxa,$phanquyen,:sdt,:matkhau) {
    global $db;
    $query = '
        UPDATE nguoidung
        SET HoTen = :hoten,
            NgaySinh = :ngaysinh,
            DiaChi = :diachi,
	    IdPhuongXa = :id_phuongxa,
            Role = :phanquyen,
	    SDT = :sdt,
	    MatKhau = :matkhau
        WHERE IdNguoiDung = :id_nguoidung';
    $statement = $db->prepare($query);
    $statement->bindValue(':hoten', $hoten);
    $statement->bindValue(':ngaysinh', $ngaysinh);
    $statement->bindValue(':diachi', $diachi);
    $statement->bindValue(':id_phuongxa', $id_phuongxa);
    $statement->bindValue(':phanquyen', $phanquyen);
    $statement->bindValue(':sdt', $sdt);
    $statement->bindValue(':matkhau', $matkhau);
    $statement->bindValue(':id_nguoidung', $id_nguoidung);
    $statement->execute();
    $statement->closeCursor();
}
function delete_nguoidung($id_nguoidung) {
    global $db;
    $query = 'DELETE FROM nguoidung
              WHERE IdNguoiDung = :id_nguoidung';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_nguoidung', $id_nguoidung);
    $statement->execute();
    $statement->closeCursor();
}
?>