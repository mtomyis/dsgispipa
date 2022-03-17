<?php
// error_reporting(0);

include '../../../script_awal.php';
include $doc_root."log.php";
include $doc_root_class.'class_input_form.php';
$frm = new input_form();
include $doc_root_class.'class_no_doc.php';
$no_doc  = new no_document();
include $doc_root_class.'class_custom.php';
$cst = new custom(); 
include $doc_root_class.'class_date.php';
$date  = new date();

if(isset($_POST['submit_add']) || isset($_POST['submit_edit']) || isset($_POST['submit_delete'])){
    // echo "<script>alert('hehe');</script>";
    $hippam_id = $frm->input_post('hippam_id');
    $nama = $frm->input_post('nama');
    $latitude = $frm->input_post('latitude');
    $longitude = $frm->input_post('longitude');
    $keterangan = $frm->input_post('keterangan');
    if(isset($_POST['id']))
        $id = $frm->input_post('id');
}

//=========================== ADD ===============================
if(isset($_POST['submit_add'])){
    // $dest = 'broncap_add.php';
    // $dest = '../kelola/indexbroncap.php';
    // $dest = 'javascript:history.go(-1)';

    // $msg = 'Tambah Broncap';
    $id = $no_doc->make_id_urut('broncap',5);
    $sql = "INSERT INTO broncap 
                    (id,hippam_id,nama,latitude,longitude,keterangan,crt)
                    VALUES (
                    '$id','$hippam_id','$nama','$latitude','$longitude','$keterangan','$log'
                    )";
    if(!$res = $db->sqlquery($sql)){
        echo "<script>alert('Data gagal disimpan!');</script>";
        echo "<script>window.history.go(-2);</script>";
        // echo "<div class='col-md-12 alert alert-danger text-center'>Data gagal disimpan!</div>";
    }else{
        echo "<script>alert('Data berhasil disimpan!');</script>";
        echo "<script>window.history.go(-2);</script>";
        // echo "<div class='col-md-12 alert alert-success text-center'>Data berhasil disimpan!</div>";
    }
    // $cst->notif_success($msg, $dest);
}
//======================== end ADD ===============================

//============================= EDIT =============================
if(isset($_POST['submit_edit'])){
    // $dest = 'broncap.php';
    // $dest = '../kelola/indexbroncap.php';
    $dest = 'javascript:history.go(-1)';

    $msg = 'Edit Broncap';
    
    $sql = "UPDATE broncap SET 
                hippam_id='$hippam_id',nama='$nama',latitude='$latitude',longitude='$longitude',keterangan='$keterangan',upd='$log' 
            WHERE id='$id'";
    if(!$res  = $db->sqlquery($sql)){
        echo "<div class='col-md-12 alert alert-danger text-center'>Data gagal disimpan!</div>";
        // $cst->notif_warning ($msg, $dest);
    }else{
        echo "<div class='col-md-12 alert alert-success text-center'>Data berhasil disimpan!</div>";
    }
    // $cst->notif_success($msg, $dest);
}
//============================ end EDIT ====================================

//============================ DELETE ======================================
if(isset($_POST['submit_delete'])){
    // $dest = '../kelola/indexbroncap.php';
    $dest = 'javascript:history.go(-1)';
    
    // $dest = 'broncap.php';
    $msg = 'Hapus Broncap';
    
    $sql = "DELETE FROM broncap 
            WHERE id='$id'";
    if(!$res  = $db->sqlquery($sql)){
        // $cst->notif_warning ($msg, $dest);
        echo "<div class='col-md-12 alert alert-danger text-center'>Data gagal dihapus!</div>";

    }else{
        echo "<div class='col-md-12 alert alert-success text-center'>Data berhasil dihapus!</div>";
    }
    // $cst->notif_success($msg, $dest);
}
//============================ end DELETE ======================================



?>