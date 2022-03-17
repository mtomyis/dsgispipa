<?php
include 'script_awal.php';
include "log.php";

$password_lama = $_POST['password_lama'];
$password_baru_1 = $_POST['password_baru_1'];
$password_baru_2 = $_POST['password_baru_2'];

$sql = "SELECT * FROM login_usr WHERE id='".$_SESSION['login_id']."' AND passwd=PASSWORD('$password_lama')";
if($db->jumrec($sql)==0){
    $_SESSION['warning'] = 'Edit Data User Account GAGAL. Password Lama Salah';
    header('Location: appl/master/kelola/indexuser_account.php');
    exit();
}
//cek password baru
if($password_baru_1 != $password_baru_2){
    $_SESSION['warning'] = 'Edit Data User Account GAGAL. Password Baru Tidak Sama';
    // header('Location: user_account.php');
    header('Location: appl/master/kelola/indexuser_account.php');

    exit();
}
$sql = "UPDATE login_usr SET passwd=PASSWORD('$password_baru_1') WHERE id='".$_SESSION['login_id']."'";
if($res = $db->sqlquery($sql)){
    $_SESSION['notif'] = 'Edit Data User Account  Berhasil';
    // header('Location: user_account.php');
    header('Location: appl/master/kelola/indexuser_account.php');
    
    exit();
}

// if(($_POST['submit_add'])||($_POST['submit_edit'])){
//     $submit = $_POST['submit'];
//     $act = $_POST['act'];
//     $password_lama = $_POST['password_lama'];
//     $password_baru_1 = $_POST['password_baru_1'];
//     $password_baru_2 = $_POST['password_baru_2'];    
    
    //=========================== ADD ===============================
    // if($_POST['submit_add']){        
    // }
    //======================== end ADD ===============================

    //============================= EDIT =============================
    // if($_POST['submit_edit']){
    //     //cek password lama
    //     $sql = "SELECT * FROM login_usr WHERE id='".$_SESSION['login_id']."' AND passwd=PASSWORD('$password_lama')";
    //     if($db->jumrec($sql)==0){
    //         $_SESSION['warning'] = 'Edit Data User Account GAGAL. Password Lama Salah';
    //         header('Location: user_account.php');
    //         exit();
    //     }
    //     //cek password baru
    //     if($password_baru_1 != $password_baru_2){
    //         $_SESSION['warning'] = 'Edit Data User Account GAGAL. Password Baru Tidak Sama';
    //         header('Location: user_account.php');
    //         exit();
    //     }
        
    //     $sql = "UPDATE login_usr SET passwd=PASSWORD('$password_baru_1') WHERE id='".$_SESSION['login_id']."'";
    //     if($res = $db->sqlquery($sql)){
    //         $_SESSION['notif'] = 'Edit Data User Account  Berhasil';
    //         header('Location: user_account.php');
    //         exit();
    //     }
    // }
    //============================ end EDIT ====================================

    //============================ DELETE ======================================
    // if($_POST['submit_delete']){
    // }
    //============================ end DELETE ======================================
    
// }    
?>