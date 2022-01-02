<?php
require_once("../Models/Address.php");
$address = new Address();
$q = $_REQUEST["q"];
$quanhuyen = $address->quanhuyen($q);
$hint = "";
// $hint = array();
if (count($quanhuyen) > 0) {
    foreach ($quanhuyen as $qh) {
        $item = $qh['IdQuanHuyen'] . "|" . $qh['TenQuanHuyen'];
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