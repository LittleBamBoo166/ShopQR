<?php
require_once("Models/Home.php");
class HomeController {
    var $homeModel;
    public function __construct() {
        $this->homeModel = new Home();
    }
    function getQR() {
        
    }
}