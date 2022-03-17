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
    $pipa_id = $frm->input_post('pipa_id');
}

//=========================== ADD ===============================
if(isset($_POST['submit_add'])){
    // $dest = 'pipa_koordinat_add.php';
    // $dest = '../kelola/indexkoordinatpipa.php?id='.$pipa_id.'&idh='.$hippam_id;
    $dest = 'javascript:history.go(-1)';

    $msg = 'Tambah Koordinat Pipa';
    
    $data = simplexml_load_file($_FILES['koordinat']['tmp_name']);
    foreach($data->rte->rtept as $dat_wpt){
        $id = $no_doc->make_id_urut('pipa_koordinat',11);
        $id_urut = $no_doc->make_id_urutt('pipa_koordinat',11);
        
        // vardump($id_urut);
        $sql = "INSERT INTO pipa_koordinat
                    (id,pipa_id,latitude,longitude,crt,id_urut)
                    VALUES (
                    '$id','$pipa_id','".$dat_wpt['lat']."','".$dat_wpt['lon']."','$log','$id_urut'
                    )";
        if(!$res = $db->sqlquery($sql)){
        echo "<script>alert('Data gagal disimpan!');</script>";
        echo "<script>window.history.go(-2);</script>";
        // echo "<div class='col-md-12 alert alert-danger text-center'>Data gagal disimpan!</div>";
        }
    }
    echo "<script>alert('Data berhasil disimpan!');</script>";
    echo "<script>window.history.go(-2);</script>";
    // $cst->notif_success($msg, $dest);
}
//======================== end ADD ===============================

//============================= EDIT =============================
if(isset($_POST['submit_edit'])){
    // $dest = 'pipa_koordinat.php';
    // $dest = '../kelola/indexkoordinatpipa.php?id='.$pipa_id.'&idh='.$hippam_id;
    $dest = 'javascript:history.go(-1)';

    $msg = 'Edit Pipa Koordinat';
    
    $sql = "DELETE FROM pipa_koordinat 
            WHERE pipa_id='$pipa_id'";
    $db->sqlquery($sql);

    $data = simplexml_load_file($_FILES['koordinat']['tmp_name']);
    foreach($data->rte->rtept as $dat_wpt){
        $id = $no_doc->make_id_urut('pipa_koordinat',11);
        $id_urut = $no_doc->make_id_urutt('pipa_koordinat',11);
        $sql = "INSERT INTO pipa_koordinat
                    (id,pipa_id,latitude,longitude,crt,id_urut)
                    VALUES (
                    '$id','$pipa_id','".$dat_wpt['lat']."','".$dat_wpt['lon']."','$log','$id_urut'
                    )";
        if(!$res  = $db->sqlquery($sql)){
            echo "<script>alert('Data gagal disimpan!');</script>";
            echo "<script>window.history.go(-2);</script>";
            // echo "<div class='col-md-12 alert alert-danger text-center'>Data gagal disimpan!</div>";
            // $cst->notif_warning ($msg, $dest);
        }

    }
    echo "<script>alert('Data berhasil disimpan!');</script>";
    echo "<script>window.history.go(-2);</script>";
    // echo "<div class='col-md-12 alert alert-success text-center'>Data berhasil disimpan!</div>";
}
//============================ end EDIT ====================================

//============================ DELETE ======================================
if(isset($_POST['submit_delete'])){
    // $dest = 'pipa_koordinat.php';
    // $dest = '../kelola/indexkoordinatpipa.php?id='.$pipa_id.'&idh='.$hippam_id;
    $dest = 'javascript:history.go(-1)';
    

    $msg = 'Hapus Pipa Koordinat';
    
    $sql = "DELETE FROM pipa_koordinat 
            WHERE pipa_id='$pipa_id'";
    if(!$res  = $db->sqlquery($sql)){
        // $cst->notif_warning ($msg, $dest);
            echo "<script>alert('Data gagal dihapus!');</script>";
            echo "<script>window.history.go(-2);</script>";
        // echo "<div class='col-md-12 alert alert-danger text-center'>Data gagal disimpan!</div>";

    }else{
        echo "<script>alert('Data berhasil dihapus!');</script>";
        echo "<script>window.history.go(-2);</script>";
        // echo "<div class='col-md-12 alert alert-success text-center'>Data berhasil disimpan!</div>";
    }
}
//============================ end DELETE ======================================


if(isset($_POST['action']) AND $_POST['action']=='get_pipa_hippam'){
    $hippam_id = $_POST['hippam_id'];
    $sql = "SELECT * FROM pipa WHERE hippam_id='$hippam_id'";
    $data = $db->fetchdata($sql);
    foreach ($data as $dat) {
        echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";
    }
    
}
?>