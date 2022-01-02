<?php
session_start();
$mod = isset($_GET['act']) ? $_GET['act'] : "home";
if (strpos($mod, "_") != false) {
    $scanArr = explode('_', $mod);
    $mod = $scanArr[0];
}
switch ($mod) {
    case 'home':
        require_once('Controllers/HomeController.php');
        $controlObj = new HomeController();
        $controlObj->display();
        break;
    case 'touchHis':
        require_once('Controllers/TouchHisController.php');
        $controlObj = new TouchHisController();
        $controlObj->getTouchHis();
        break;
    case 'admin':
        require_once('Admin/index.php');
        break;
    case 'intro':
        require_once('Views/index.php');
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
                    $controlObj->logoutAction();
                    break;
                case 'account-info':
                    $controlObj->accountInfo();
                    break;
                case 'account-update':
                    $controlObj->updateAccount();
                    break;
                default:
                    $controlObj->access();
                    break;
            }
        } else {
            switch ($act) {
                case 'login':
                    $controlObj->loginAction();
                    break;
                case 'signup':
                    $controlObj->signupAction();
                    break;
                default:
                    $controlObj->access();
                    break;
            }
        }
        break;
    case 'scanid':
        $scanId = $scanArr[1];
        if (isset($_SESSION['isLog']) && $_SESSION['isLog'] == true) {
            require_once('Controllers/ScanIdController.php');
            $scanObj = new ScanIdController();
            $scanObj->scanMe($scanId);
        } else {
            echo '<script>"Vui lòng đăng nhập trước khi quét mã."</script>';
            require_once('Controllers/HomeController.php');
            $controlObj = new HomeController();
            $controlObj->display();
        }
        break;
    default:
        header('Location: ?act=home');
        break;
}
// include("Views/home1.html");