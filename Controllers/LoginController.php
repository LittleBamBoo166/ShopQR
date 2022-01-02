<?php
require_once("Models/Login.php");
require_once("Models/Address.php");
require_once("Models/User.php");
class LoginController {
    var $loginModel;
    public function __construct()
    {
        $this->loginModel = new Login();
    }
    function access() {
        // Này là id người dùng bị quét
        $id = $_SESSION['login'][0]['IdNguoiDung'];
        $chs = "300x300";
        $chl = "localhost/shopqr/?act=scanid_" . $id;
        $root_url = "http://chart.googleapis.com/chart?cht=qr&chs=" . $chs . "&chl=" . $chl;
        $_SESSION['qr'] = $root_url;
        require_once('Views/index.php');
    }
    function loginAction() {
        $sdt = $_POST['logTel'];
        $mk = $_POST['logPass'];
        $data = array (
            'SDT' => $sdt,
            'MatKhau' => $mk
        );
        $this->loginModel->loginAction($data);
    }
    function accountInfo() {
        $addObj = new Address();
        $userObj = new User();
        $userInfo = $userObj->getUserById($_SESSION['login'][0]['IdNguoiDung']);
        $addressInfo = $addObj->getAddress($userInfo['IdPhuongXa']);
        $addressInfoId = $addObj->getAddressId($userInfo['IdPhuongXa']);
        require_once('Views/index.php');
    }
    function updateAccount() {
        // SET  CMND = :cm, DiaChi = :dc, IdPhuongXa = :px, Role = :r, SDT = :sdt 
        // WHERE IdNguoiDung = :id';
        $cm = $_POST['idNumber'];
        $dc = $_POST['address'];
        $px = $_POST['town'];
        $r = $_POST['role'];
        $sdt = $_POST['tel'];
        $id = $_SESSION['login'][0]['IdNguoiDung'];
        $data = array(
            'CMND' => $cm,
            'DiaChi' => $dc,
            'IdPhuongXa' => $px,
            'Role' => $r,
            'SDT' => $sdt,
            'IdNguoiDung' => $id
        );
        $this->loginModel->updateAccount($data);
    }
    function logoutAction() {
        $this->loginModel->logoutAction();
        header('Location: ?act=home');
    }
    function signupAction() {
        $ht = $_POST['nameLog'];
        $r = $_POST['role'];
        $ns = $_POST['dob'];
        $sdt = $_POST['logTel'];
        $cmnd = $_POST['idNumber'];
        $dc = $_POST['address'];
        $px = $_POST['town'];
        $mk = $_POST['logPass'];
        $userObj = new User();
        $data = array(
            'CMND' => $cmnd,
            'DiaChi' => $dc,
            'IdPhuongXa' => $px,
            'Role' => $r,
            'SDT' => $sdt,
            'HoTen' => $ht,
            'NgaySinh' => $ns, 
            'MatKhau' =>$mk
        );
        $check = $userObj->checkUser($sdt);
        $rs = $this->loginModel->signupAction($data, $check);
        if ($rs == true) {
            echo "<script>alert('Đăng ký thành công. Vui lòng đăng nhập.')</script>";
            // header('Location: ?act=home');
            require_once('Views/index.php');
        } else {
            echo "<script>alert('Đăng ký không thành công. Vui lòng kiểm tra lại.')</script>";
            // header('Location: ?act=home');
            require_once('Views/index.php');
        }
    }
}