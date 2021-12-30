<?php
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case "home":
        require_once("home/home.php");
        break;
    case "qrcreate":
        require_once("qrcode/qrgenerator.php");
        break;
    case "account":
        $act = isset($_GET["case"]) ? $_GET["case"] : "login";
        if (isset($_SESSION['isLog']) && $_SESSION['isLog'] == true) {
            switch ($act) {
                case "login":
                    require_once("login/login.php");
                    break;
                case "account-info":
                    require_once("login/accountInfo.php");
                    break;
                default:
                    require_once("login/login.php");
                    break;
            }
        } else {
            if (isset($_SESSION['isLog_Admin']) && $_SESSION['isLog_Admin'] == true) {
                switch ($act) {
                    case "login":
                        require_once("login/login.php");
                        break;
                    case "account-info":
                        require_once("login/accountInfo.php");
                        break;
                    default:
                        require_once("login/login.php");
                        break;
                }
            } else {
                switch ($act) {
                    case "login":
                        require_once("login/login.php");
                        break;
                    default:
                        require_once("login/login.php");
                        break;
                }
            }
        }
    default:
        require_once("");
        break;
}
