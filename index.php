<?php
session_start();
$mod = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($mod) {
    case 'home':
        break;
    case 'qrcreate':
        break;
    case 'qrscan':
        break;
    case 'account':
        break;
    default:
        break;
}
// include("Views/home1.html");