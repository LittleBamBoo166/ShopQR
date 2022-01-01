<?php
session_start();
$mod = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($mod) {
    case 'home':
        require_once('Controllers/HomeController.php');
        $controlObj = new HomeController();
        $controlObj->display();
        break;
    case 'touchHis':
        require_once('Controllers/TouchHisController.php');
        break;
    case 'account':
        $act = isset($_GET['case']) ? $_GET['case'] : "login";
        require_once("Controllers\LoginController.php");
        $controlObj = new LoginController();
        if (isset($_SESSION['isLog']) && $_SESSION['isLog'] == true) {
            switch ($act) {
                case 'access':
                    $controlObj->access();
                    break;
                case 'logout':
                    echo '<scrip>Under construction 3</scrip>';
                    break;
                case 'account-info':
                    $controlObj->accountInfo();
                    break;
                case 'account-update':
                    echo '<scrip>Under construction 5</scrip>';
                    break;
                default:
                    $controlObj->access();
                    break;
            }
        } else {
            if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) {
                switch ($act) {
                    case 'logout':
                        echo '<scrip>Under construction 7</scrip>';
                        break;
                    default:
                        echo '<scrip>Error 2</scrip>';
                        break;
                }
            } else {
                switch ($act) {
                    case 'login':
                        $controlObj->loginAction();
                        break;
                    case 'signup':
                        echo '<scrip>Under construction 9</scrip>';
                        break;
                    default:
                        $controlObj->access();
                        break;
                }
            }
        }
        break;
    default:
        if (isset($_REQUEST['scanid'])) {
            $scanid = $_REQUEST['scanid'];
            require_once('Controllers/ScanIdController.php');
        } else {
            require_once('Controllers/HomeController.php');
            $controlObj = new HomeController();
            $controlObj->display();
        }
        break;
}
// include("Views/home1.html");