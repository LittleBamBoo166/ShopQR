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
            header('Location: ?mod=login&act=account&case=access');
        } else {
            $query2 = "SELECT * FROM admin
                       WHERE MaDangNhap = :mdn AND MatKhau = :mk";
            $statement2 = $this->db->prepare($query2);
            $statement2->bindValue(':mdn', $data['SDT']);
            $statement2->bindValue(':mk', $data['MatKhau']);
            $statement2->execute();
            $admin = $statement2->fetchAll();
            $statement2->closeCursor();
            if (count($admin) != 0 || $admin != null) {
                $_SESSION['isLogin_Admin'] = true;
                $_SESSION['login'] = $login;
                header('Location: ?mod=login&act=account&case=access');
            } else {
                echo "<script>alert('Login failed')</script>";
            }
        }
    }

    function logoutAction()
    {
        if (isset($_SESSION['isLogin_Admin'])) {
            unset($_SESSION['isLogin_Admin']);
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['isLogin_Nguoimua'])) {
            unset($_SESSION['isLogin_Nguoimua']);
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['isLogin_Nguoiban'])) {
            unset($_SESSION['isLogin_Nguoiban']);
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
            if ($st == true) {
                echo '<scrip>alert("Sign up sucess")</scrip>';
            } else {
                echo '<script>alert("Sign up failed")</script>';
            }
        } else {
            echo '<script>alert("Exist account")</script>';
        }
    }

    function updateAccount($data) {
        $query = 'UPDATE nguoidung
                  SET HoTen = :ht, NgaySinh = :ns, CMND = :cm, DiaChi = :dc, IdPhuongXa = :px, Role = :r, SDT = :sdt, MatKhau = :mk
                  WHERE IdNguoiDung = :id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':ht', $data['HoTen']);
        $statement->bindValue(':ns', $data['NgaySinh']);
        $statement->bindValue(':cm', $data['CMND']);
        $statement->bindValue(':dc', $data['DiaChi']);
        $statement->bindValue(':px', $data['IdPhuongXa']);
        $statement->bindValue(':r', $data['Role']);
        $statement->bindValue(':sdt', $data['SDT']);
        $statement->bindValue(':mk', $data['MatKhau']);
        $statement->bindValue(':id', $data['IdNguoiDung']);
        $statement->execute();
        $statement->closeCursor();
    }
}
