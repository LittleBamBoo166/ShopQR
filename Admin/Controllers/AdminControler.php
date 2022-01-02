<?php
require_once("Admin\Models\Admin.php");
require_once("Admin/Models/touchHis.php");
require_once("Admin\Models\User.php");
require_once("Admin\Models\Address.php");
class AdminController {
    var $adminModel;
    var $touchHisModel;
    var $userModel;
    var $addressModel;
    public function __construct()
    {
        $this->adminModel = new Admin();
        $this->touchHisModel = new TouchHis();
        $this->userModel = new User();
        $this->addressModel = new Address();
    }
    function adminAccess() {
        $touchHis = $this->touchHisModel->getAllTouchHis();
        $userMd = $this->userModel;
        $addMd = $this->addressModel;
        require_once('Admin\Views\index.php');
    }
}