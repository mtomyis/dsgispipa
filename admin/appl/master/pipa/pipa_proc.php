<?php
error_reporting(0);

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
    $hippam_id = $frm->input_post('hippam_id');
    $nama = $frm->input_post('nama');
    $pipa_jenis_id = $frm->input_post('pipa_jenis_id');
    $keterangan = $frm->input_post('keterangan');
    if(isset($_POST['id']))
        $id = $frm->input_post('id');
}

//=========================== ADD ===============================
if(isset($_POST['submit_add'])){
    // $dest = 'pipa_add.php';
    $dest = 'javascript:history.go(-1)';
    $msg = 'Tambah Pipa';
    $id = $no_doc->make_id_urut('pipa',5);
    $sql = "INSERT INTO pipa 
                    (id,hippam_id,nama,pipa_jenis_id,keterangan,crt)
                    VALUES (
                    '$id','$hippam_id','$nama','$pipa_jenis_id','$keterangan','$log'
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
}
//======================== end ADD ===============================

//============================= EDIT =============================
if(isset($_POST['submit_edit'])){
    // $dest = 'pipa.php';
    $dest = 'javascript:history.go(-1)';
    $msg = 'Edit Pipa';
    
    $sql = "UPDATE pipa SET 
                nama='$nama',pipa_jenis_id='$pipa_jenis_id',hippam_id='$hippam_id',keterangan='$keterangan',upd='$log' 
            WHERE id='$id'";
    if(!$res  = $db->sqlquery($sql)){
        // $cst->notif_warning ($msg, $dest);
        echo "<div class='col-md-12 alert alert-danger text-center'>Data gagal disimpan!</div>";

    }else{
        echo "<div class='col-md-12 alert alert-success text-center'>Data berhasil disimpan!</div>";
    }
}
//============================ end EDIT ====================================

//============================ DELETE ======================================
if(isset($_POST['submit_delete'])){
    // $dest = 'pipa.php';
    $dest = 'javascript:history.go(-1)';
    $msg = 'Hapus Pipa';
    
    $sql = "DELETE FROM pipa 
            WHERE id='$id'";
    if(!$res  = $db->sqlquery($sql)){
        // $cst->notif_warning ($msg, $dest);
        echo "<div class='col-md-12 alert alert-danger text-center'>Data gagal dihapus!</div>";

    }else{
        echo "<div class='col-md-12 alert alert-success text-center'>Data berhasil dihapus!</div>";
    }
}
//============================ end DELETE ======================================

?>