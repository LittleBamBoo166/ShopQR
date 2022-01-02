<?php
require_once("Models/ScanId.php");
require_once("Models/User.php");

class ScanIdController
{
    var $scanIdObj;
    var $userObj;
    public function __construct()
    {
        $this->scanIdObj = new ScanId();
        $this->userObj = new User();
    }
    function scanMe($scanId)
    {
        if ($_SESSION['login'][0]['Role'] == 0) {
            echo '<script>alert("Chỉ khách hàng được sử dụng chức năng này.")</script>';
            // header('Location: ?act=home#scanfailed');
            require_once('Views/index.php');
        } else {
            $data = array(
                'IdNguoiBan' => $scanId,
                'IdNguoiMua' => $_SESSION['login'][0]['IdNguoiDung']
            );
            $this->scanIdObj->scanMe($data);
            echo '<script>alert("Quét mã thành công.")</script>';
            // require_once('Views/index.php');
            header('Location: ?act=home#scansuccess');
        }
    }
}
