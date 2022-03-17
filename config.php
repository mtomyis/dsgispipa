<?php
session_start();

require_once "admin/class/class_db.php";
$db = new database();

require 'admin/class/class_login_log.php';
$login_log = new login_log();


$root_dir = '/dsgispipa';
$base_url = 'http://'.$_SERVER['SERVER_NAME'].$root_dir.'/';
$base_img = 'http://'.$_SERVER['SERVER_NAME'].$root_dir.'/assets/img/';
$base_pics = 'http://'.$_SERVER['SERVER_NAME'].$root_dir.'/assets/pics/';
$doc_root = __DIR__.'/';
$doc_root_class = __DIR__.'/admin/class/';
//echo "$doc_root";


$aplikasi = "sistem informasi geografis - jaringan perpipaan air bersih";
$tempat = "kabupaten banyuwangi - jawa timur";
?>
