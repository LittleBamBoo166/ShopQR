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
$qdate = $qArr[0];
$qmonth = $qArr[1];
$qyear = $qArr[2];
$touchHis = $touchHisModel->getAllTouchHis();
$result = "";
foreach ($touchHis as $th) {
    $idNguoiMua = $th['IdNguoiMua'];
    $idNguoiBan = $th['IdNguoiBan'];
    $date = strtotime($th['ThoiGian']); // timestamp
    $parts = getdate($date);
    $col1 = $parts['mday'] . "/" . $parts['mon'] . "/" . $parts['year'];
    $col2 = $parts['hours'] . ":" . $parts['minutes'];
    $nguoiMua = $userModel->getUserById($idNguoiMua);
    $nguoiBan = $userModel->getUserById($idNguoiBan);
    $col3 = $nguoiMua['HoTen'];
    $add = $addModel->getAddress($nguoiMua['IdPhuongXa']);
    $col4 = $nguoiMua['DiaChi'] . ", " . $add['TenPhuongXa'] . ", " . $add['TenQuanHuyen'] . ", " . $add['TenTinhThanh'];
    $col5 = $nguoiMua['SDT'];
    $col6 = $nguoiBan['HoTen'];
    $add = $addModel->getAddress($nguoiBan['IdPhuongXa']);
    $col7 = $nguoiBan['DiaChi'] . ", " . $add['TenPhuongXa'] . ", " . $add['TenQuanHuyen'] . ", " . $add['TenTinhThanh'];
    $col8 = $nguoiBan['SDT'];
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
        $result = $result . "|" . $col6;
        $result = $result . "|" . $col7;
        $result = $result . "|" . $col8;
    }
}
echo $result == "" ? "Không có dữ liệu|Không có dữ liệu|Không có dữ liệu|Không có dữ liệu|Không có dữ liệu|Không có dữ liệu|Không có dữ liệu|Không có dữ liệu" : $result;
