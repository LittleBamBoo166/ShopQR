<?php
require_once("Models/touchHis.php");
class TouchHisController {
    var $touchHisModel;
    var $userModel;
    var $addModel;
    public function __construct()
    {
        $this->touchHisModel = new TouchHis();
        $this->userModel = new User();
        $this->addModel = new Address();
    }
    function getTouchHis() {
        $id = $_SESSION['login'][0]['IdNguoiDung'];
        $touchHis = $this->touchHisModel->getTouchHis($id);
        $userMd = $this->userModel;
        $addMd = $this->addModel;
        require_once('Views/index.php');
    }
}