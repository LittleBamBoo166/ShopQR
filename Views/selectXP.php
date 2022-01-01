<?php
require_once("../Models/Address.php");
$address = new Address();
$q = $_REQUEST["q"];
$xaphuong = $address->xaphuong($q);
$hint = "";
// $hint = array();
if (count($xaphuong) > 0) {
    foreach ($xaphuong as $xp) {
        $item = $xp['IdPhuongXa'] . "|" . $xp['TenPhuongXa'];
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