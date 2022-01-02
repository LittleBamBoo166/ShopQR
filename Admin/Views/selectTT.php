<?php
require_once("../Models/Address.php");
$address = new Address();
$tinhthanh = $address->tinhThanh();
$hint = "";
// $hint = array();
if (count($tinhthanh) > 0) {
    foreach ($tinhthanh as $tt) {
        $item = $tt['IdTinhThanh'] . "|" . $tt['TenTinhThanh'];
        if ($hint === "") {
            $hint = $item;
        } else {
            $hint .= "|";
            $hint .= $item;
        }
        // $hint[] = $tt;
    }
}
// $hint = "<option>DDm</option>";
echo $hint === "" ? "Chưa có dữ liệu" : $hint;