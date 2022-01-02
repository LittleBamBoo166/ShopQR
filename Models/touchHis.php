<?php
require_once("model.php");
require_once("User.php");
require_once("Address.php");
class TouchHis extends model
{
    var $db;
    function __construct()
    {
        $dbObj = new database();
        $this->db = $dbObj->db;
    }
    function getTouchHis($id) {
        $query = 'SELECT * FROM chitiettiepxuc
                  WHERE IdNguoiMua = :id1 OR IdNguoiBan = :id2';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id1', $id);
        $statement->bindValue(':id2', $id);
        $statement->execute();
        $ct = $statement->fetchAll();
        return $ct;
    }
    // function getTouchHisReturn(&$userMd, &$addMd, &$touchHis) {
    //     $id = $_SESSION['login'][0]['IdNguoiDung'];
    //     $touchHis = $this->touchHisModel->getTouchHis($id);
    //     $userMd = $this->userModel;
    //     $addMd = $this->addModel;
    // }
}
