<?php
require_once("../../Models/touchHis.php");
require_once("../../Models/User.php");
require_once("../../Models/Address.php");
$q = $_REQUEST["q"];
$touchHisModel = new TouchHis();
$userModel = new User();
$addModel = new Address();
$q = $_REQUEST["q"];
$qArr = explode('_', $q);
$id = $qArr[0];
$qdate = $qArr[1];
$qmonth = $qArr[2];
$qyear = $qArr[3];
$touchHis = $touchHisModel->getTouchHis($id);
$result = "";
foreach ($touchHis as $th) {
    $idNguoiMua = $th['IdNguoiMua'];
    $idNguoiBan = $th['IdNguoiBan'];
    $date = strtotime($th['ThoiGian']); // timestamp
    $parts = getdate($date);
    $col1 = $parts['mday'] . "/" . $parts['mon'] . "/" . $parts['year'];
    $col2 = $parts['hours'] . ":" . $parts['minutes'];
    if (strcmp($id, $idNguoiBan) == 0) {
        $nguoiTiepXuc = $userModel->getUserById($idNguoiMua);
    } else {
        $nguoiTiepXuc = $userModel->getUserById($idNguoiBan);
    }
    $col3 = $nguoiTiepXuc['HoTen'];
    $add = $addModel->getAddress($nguoiTiepXuc['IdPhuongXa']);
    $col4 = $nguoiTiepXuc['DiaChi'] . ", " . $add['TenPhuongXa'] . ", " . $add['TenQuanHuyen'] . ", " . $add['TenTinhThanh'];
    $col5 = $nguoiTiepXuc['SDT'];
    if ($qdate == $parts['mday'] && $qmonth == $parts['mon'] && $qyear == $parts['year']) {
        if ($result == "") {
            $result .= $col1;
        } else {
            $result = $result . "|" . $col1;
        }
        $result = $result . "|" . $col2;
        $result = $result . "|" . $col3;
        $result = $result . "|" . $col4;
        $result = $result . "|" . $col5;
    }
}
echo $result == "" ? "Không có dữ liệu|Không có dữ liệu|Không có dữ liệu|Không có dữ liệu|Không có dữ liệu" : $result;
