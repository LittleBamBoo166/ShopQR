<?php
require_once("model.php");
class Login extends model
{
    var $db;
    function __construct()
    {
        $dbObj = new database();
        $this->db = $dbObj->db;
    }

    function loginAction($data)
    {
        $query = "SELECT * FROM nguoidung 
                  WHERE SDT = :sdt AND MatKhau = :mk";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':sdt', $data['SDT']);
        $statement->bindValue(':mk', $data['MatKhau']);
        $statement->execute();
        $login = $statement->fetchAll();
        $statement->closeCursor();
        if (count($login) != 0 || $login != null) {
            $_SESSION['isLog'] = true;
            $_SESSION['login'] = $login;
            if ($_SESSION['login'][0]['Role'] == 2) {
                header('Location: ?mod=login&act=admin&case=adminaccess');
            } else {
                header('Location: ?mod=login&act=account&case=access');
            }            
        } else {
            header('Location: ?act=home#loginFailed');
        }
    }

    function logoutAction()
    {
        if (isset($_SESSION['isLog'])) {
            unset($_SESSION['isLog']);
            unset($_SESSION['login']);
        }
        header('Location: ?act=home');
    }

    function signupAction($data, $check)
    {
        if ($check == 0) {
            $query = 'INSERT INTO `nguoidung` (`HoTen`, `NgaySinh`, `CMND`, `DiaChi`, `IdPhuongXa`, `Role`, `SDT`, `MatKhau`)
                      VALUES
                      (:ht, :ns, :cm, :dc, :px, :r, :sdt, :mk)';
            $statement = $this->db->prepare($query);
            $statement->bindValue(':ht', $data['HoTen']);
            $statement->bindValue(':ns', $data['NgaySinh']);
            $statement->bindValue(':cm', $data['CMND']);
            $statement->bindValue(':dc', $data['DiaChi']);
            $statement->bindValue(':px', $data['IdPhuongXa']);
            $statement->bindValue(':r', $data['Role']);
            $statement->bindValue(':sdt', $data['SDT']);
            $statement->bindValue(':mk', $data['MatKhau']);
            $st = $statement->execute();
            $statement->closeCursor();
            if ($st == true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function updateAccount($data) {
        $query = 'UPDATE nguoidung
                  SET CMND = :cm, DiaChi = :dc, IdPhuongXa = :px, Role = :r, SDT = :sdt
                  WHERE IdNguoiDung = :id';
        $statement = $this->db->prepare($query);
        // $statement->bindValue(':ht', $data['HoTen']);
        // $statement->bindValue(':ns', $data['NgaySinh']);
        $statement->bindValue(':cm', $data['CMND']);
        $statement->bindValue(':dc', $data['DiaChi']);
        $statement->bindValue(':px', $data['IdPhuongXa']);
        $statement->bindValue(':r', $data['Role']);
        $statement->bindValue(':sdt', $data['SDT']);
        // $statement->bindValue(':mk', $data['MatKhau']);
        $statement->bindValue(':id', $data['IdNguoiDung']);
        $rs = $statement->execute();
        $statement->closeCursor();
        if ($rs == true) {
            header('Location: ?mod=login&act=account&case=account-info#updated');
        } else {
            header('Location: ?mod=login&act=account&case=account-info#updatefailed');
        }
    }
}
