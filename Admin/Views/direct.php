<?php
$act = isset($_GET['case']) ? $_GET['case'] : "adminAccess";
switch ($act) {
    case 'adminAccess':
        require_once('Admin/Views/adminaccess/touchHis.php');
        break;
    default:
        if (isset($_SESSION['isLog']) && $_SESSION['isLog'] == true) {
            require_once("Admin/Views/adminaccess/touchHis.php");
        } else {
            require_once("Admin/Views/adminaccess/touchHis.php");
        }
        break;
}
