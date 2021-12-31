<?php
require_once("Models/Home.php");
class HomeController {
    var $homeModel;
    public function __construct() {
        $this->homeModel = new Home();
    }
    function getQR() {
        $hoten = $_POST['hoten'];
        $sdt = $_POST['sdt'];
        $chs = $_POST['size'];
        $chl = $_POST['content'];
        $root_url = "http://chart.googleapis.com/chart?cht=qr&chs=" . $chs . "&chl=" . $chl; 
        echo "<h3>Your QR code</h3>";
        echo "<p>Họ tên: <em>$hoten</em></p>";
        echo "<p>Số điện thoại: <em>$sdt</em></p>";
        echo "<p><img src='" . $root_url . "'></p>";
        echo "<input type='button' value='Back' onclick='history.back()'>";
    }
}
