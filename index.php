<?php
session_start();
$mod = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($mod) {
    case 'home':
        break;
    case 'touch':
        break;
    case 'account':
        break;
    default:
        break;
}
