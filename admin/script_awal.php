<?php

session_start();

//untuk penghitungan waktu
require 'class/class_time_execution.php';
$time_execution = new time_execution();
$time_execution->start();

require_once "class/class_db.php";
$db = new database();

require 'class/class_login_log.php';
$login_log = new login_log();

require_once 'page_id.php';

$date_now = date('Y-m-d');


$addr_admin = $_SESSION['base_url_gis_pipa'];//diambil dari index.php
$addr_root = dirname($addr_admin).'/';
$addr_root_class = $addr_root.'class/';
$addr_root_js = $addr_root.'assets/js/';
$addr_root_css = $addr_root.'assets/css/';
$addr_root_pics = $addr_root.'assets/pics/';
$addr_root_bootstrapvalidator = $addr_root.'assets/bootstrapvalidator/';

$server_name = $_SERVER['HTTP_HOST'];
$server_name .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

$doc_root = __DIR__.'/';
$doc_template = __DIR__.'/template/';
$doc_root_class = __DIR__.'/class/';
$doc_root_asset = __DIR__.'/asset/';
$doc_root_js = __DIR__.'/asset/js/';
$doc_root_css = __DIR__.'/asset/css/';
$doc_root_pics = __DIR__.'/asset/pics/';
$doc_root_spry = __DIR__.'/asset/SpryAssets/';
$doc_root_bootstrapvalidator = __DIR__.'/asset/bootstrapvalidator/';


if($_SERVER['HTTP_REFERER']==''){
    $_SESSION['warning'] = 'Silahkan login untuk mengakses halaman ini!';
    header("Location: ".$addr_root."index.php");
    exit();
}

if(!isset($_SESSION['username'])){
    $_SESSION['warning'] = 'Silahkan login!';
    header("Location: ".$addr_root."index.php");
    exit();
}

//for active menu
function active_menu($upline){
    global $page_id;
    if (substr($page_id, 0,2)==$upline)
        return "active";
}

?>