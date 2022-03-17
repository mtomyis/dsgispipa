<?php
include '../../script_awal.php';
include $doc_root."log.php";
include $doc_root_class."class_custom.php";
$cst = new custom();
include $doc_root_class.'class_input_form.php';
$frm = new input_form();
include $doc_root_class.'class_no_doc.php';
$no_doc  = new no_document();
include $doc_root_class.'class_date.php';
$date  = new date();

if(($_POST['submit_add'])||($_POST['submit_edit'])){
    $submit = $_POST['submit'];
    $act = $_POST['act'];
    $jenis = $frm->input_post('jenis');
    $siswa_id = $frm->input_post('siswa_id');
    $guru_id = $frm->input_post('guru_id');
    $pegawai_id = $frm->input_post('pegawai_id');
    $username = $frm->input_post('username');
    $aktif = $frm->input_post('aktif');
    $login_grp_id = $_POST['login_grp_id'];
    $tgl_1 = $frm->input_post('tgl_1');
    $tgl_1_ = $cst->konversi_tanggal_english_short($tgl_1);
    $tgl_2 = $frm->input_post('tgl_2');
    $tgl_2_ = $cst->konversi_tanggal_english_short($tgl_2);
    if(isset($_POST['id_usr']))
        $id_usr = $frm->input_post ('id_usr');
    else
        $id_usr = $no_doc->make_id_urut('login_usr', 3);
    
    //=========================== ADD ===============================
    if($_POST['submit_add']){
        $dest = 'login_usr_add.php';
        switch($jenis){
            case 'siswa'    : $id_relasi = $siswa_id; break;
            case 'guru'     : $id_relasi = $guru_id; break;
            case 'pegawai'  : $id_relasi = $pegawai_id; break;
        }
        
        $sql = "INSERT INTO login_usr 
                    (id,jenis,id_relasi,tabel_relasi,username,passwd,tgl_1,tgl_2) 
                    VALUES
                    ('$id_usr','$jenis','$id_relasi','$jenis','$username',PASSWORD('$username'),'$tgl_1_','$tgl_2_')";
        if(!$res = $db->sqlquery($sql))
                $cst->notif_warning ('Tambah Login GAGAL', $dest);
        
        foreach($login_grp_id as $login_grp_ids){
            $sql = "INSERT INTO login_usr_grp 
                    (login_usr_id,login_grp_id) 
                    VALUES
                    ('$id_usr','$login_grp_ids')";
            if(!$res = $db->sqlquery($sql))
                $cst->notif_warning ('Tambah Login - group GAGAL', $dest);
        }
        
        $cst->notif_success('Tambah Data Login BERHASIL', $dest);
    }
    //======================== end ADD ===============================

    //============================= EDIT =============================
    if($_POST['submit_edit']){
        $dest = 'login_usr.php';
        switch($jenis){
            case 'siswa'    : $id_relasi = $siswa_id; break;
            case 'guru'     : $id_relasi = $guru_id; break;
            case 'pegawai'  : $id_relasi = $pegawai_id; break;
        }
        $sql = "UPDATE login_usr 
                SET jenis='$jenis',id_relasi='$id_relasi',tabel_relasi='$jenis',
                    username='$username',tgl_1='$tgl_1_',tgl_2='$tgl_2_', aktif='$aktif' ";
        if(isset($_POST['is_reset_passwd']))
            $sql.= ",passwd=PASSWORD('$username') ";
        $sql.= "WHERE id='$id_usr'";
        if(!$res = $db->sqlquery($sql))
                $cst->notif_warning ($sql.'Edit Login GAGAL [1]', $dest);
        
        $sql = "DELETE FROM login_usr_grp WHERE login_usr_id='$id_usr'";
        if(!$res = $db->sqlquery($sql))
                $cst->notif_warning ('Edit Login GAGAL [2]', $dest);
        //die();
        foreach($login_grp_id as $login_grp_ids){
            $sql = "INSERT INTO login_usr_grp 
                    (login_usr_id,login_grp_id) 
                    VALUES
                    ('$id_usr','$login_grp_ids')";
            if(!$res = $db->sqlquery($sql))
                $cst->notif_warning ($sql.'Edit Login - group GAGAL [3]', $dest);
        }
        
        $cst->notif_success('Edit Data Login BERHASIL', $dest);
    }
    //============================ end EDIT ====================================

    //============================ DELETE ======================================
    if($act=='delete'){
    }
    //============================ end DELETE ======================================  
}  
  

?>