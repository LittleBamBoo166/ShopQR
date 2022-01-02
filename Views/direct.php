<?php
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case "home":
        if (isset($_SESSION['isLog']) && $_SESSION['isLog'] == true) {
            require_once("access/loginSucess.php");
        } else {
            require_once("home/home.php");
        }
        break;
    case 'touchHis':
        require_once('touchhis/touchHis.php');
        break;
    case "account":
        $act = isset($_GET["case"]) ? $_GET["case"] : "login";
        if (isset($_SESSION['isLog']) && $_SESSION['isLog'] == true) {
            switch ($act) {
                case 'access':
                    $url = "ahihi";
                    require_once("access/loginSucess.php");
                    break;
                case "account-info":
                    require_once("access/accountInfo.php");
                    break;
                case "account-update":
                    break;
                default:
                    require_once("access/loginSucess.php");
                    break;
            }
        } else {
            switch ($act) {
                case "login":
                    require_once("access/loginSucess.php.php");
                    break;
                case 'signup':
                    require_once("home/home.php");
                    break;
                default:
                    require_once("home/home.php");
                    break;
            }
        }
        break;
    default:
        if (isset($_SESSION['isLog']) && $_SESSION['isLog'] == true) {
            require_once("access/loginSucess.php");
        } else {
            require_once("home/home.php");
        }
        break;
}
