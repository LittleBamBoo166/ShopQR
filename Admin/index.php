<?php
$act = isset($_GET['case']) ? $_GET['case'] : "adminaccess";
require_once('Admin\Controllers\AdminControler.php');
$controlObj = new AdminController();
if (isset($_SESSION['isLog']) && $_SESSION['isLog'] == true) {
    switch ($act) {
        case 'adminaccess':
            $controlObj->adminAccess();
            break;
        default:
            $controlObj->adminAccess();
            break;
    }
}
    
// include("Views/home1.html");