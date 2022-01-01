<?php
require_once("Models/Login.php");
require_once("Models/Address.php");
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
        $chl = "localhost/shopqr/?scanid =" . $id;
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
        $addressInfo = $addObj->getAddress($_SESSION['login'][0]['IdPhuongXa']);
        $addressInfoId = $addObj->getAddressId($_SESSION['login'][0]['IdPhuongXa']);
        require_once('Views/index.php');
    }
    function updateAccount() {

    }
}