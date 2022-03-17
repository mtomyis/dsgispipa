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

if(isset($_POST['submit_add']) || isset($_POST['submit_edit']) || isset($_POST['submit_delete'])){
    /*$submit = $_POST['submit'];
    $act = $_POST['act'];*/
    if(isset($_POST['id']))
        $id = $frm->input_post ('id');
    $kode = $frm->input_post('kode');
    $nama = $frm->input_post('nama');
    $keterangan = $frm->input_post('keterangan');
    $jml_menu = $frm->input_post('jml_menu');
    $aktif = $frm->input_post('aktif');

    //die($kode.$nama.$keterangan.$jml_menu);
    //=========================== ADD ===============================
    if(isset($_POST['submit_add'])){
        $sql = "INSERT INTO login_grp 
                (id,nama,keterangan) VALUES 
                ('$kode','$nama','$keterangan')";
        if(!$res  = $db->sqlquery($sql)){
            $_SESSION['warning'] = 'Tambah Login Group  Gagal';
        }
        else{            
            
            /*$sql_lg = "SELECT id FROM login_grp where nama='$nama'";
            $dat_lg = $db->datasql($sql_lg);
            $lg_id = $dat_lg['id'];*/
            
            $sql_menu = "SELECT * FROM menu ORDER BY id";
            $data_menu = $db->fetchdata($sql_menu);
            foreach($data_menu as $dat_menu){
                    $menu__ = "menu_".$dat_menu['id']; 
                    if(isset($_POST[$menu__])){
                        $menu = $_POST[$menu__];
                        $enable__ = "enable_".$dat_menu['id'];
                        $level_c__ = "level_c_".$dat_menu['id'];
                        $level_r__ = "level_r_".$dat_menu['id'];
                        $level_u__ = "level_u_".$dat_menu['id'];
                        $level_d__ = "level_d_".$dat_menu['id'];
                        
                        if(isset($_POST[$enable__]))
                            $enable = $_POST[$enable__];
                        else
                            $enable = 0;
                        if(isset($_POST[$level_c__]))
                            $level_c = $_POST[$level_c__];
                        else
                            $level_c = 0;
                        if(isset($_POST[$level_r__]))
                            $level_r = $_POST[$level_r__];
                        else
                            $level_r = 0;
                        if(isset($_POST[$level_u__]))
                            $level_u = $_POST[$level_u__];
                        else
                            $level_u = 0;
                        if(isset($_POST[$level_d__]))
                            $level_d = $_POST[$level_d__];
                        else
                            $level_d = 0;
                        

                        if($menu != ""){
                            $level = $level_c.$level_r.$level_u.$level_d;
                            $sql = "INSERT INTO login_grp_acl (login_grp_id,menu_id,enable,level) VALUES 
                                ('$kode','$menu','$enable','$level')";
                            if(!$res_enable = $db->sqlquery($sql))
                                    $cst->proses_fail($enable);
                        }
                    }
            }
            
            $_SESSION['notif'] = 'Tambah Login Group Berhasil';
        }
        
        header('Location: login_grp_add.php');
        exit();

 

    }
    //======================== end ADD ===============================

    //============================= EDIT =============================
    if(isset($_POST['submit_edit'])){
        $sql = "UPDATE login_grp SET 
                id='$kode',nama='$nama',keterangan='$keterangan',aktif='$aktif'
                WHERE id='$id'";
        if(!$res  = $db->sqlquery($sql)){
                //$alert = $db->err_alert("$sql");
            $_SESSION['warning'] = 'Edit Login Group Gagal';
        }
        else{
            /*
            $sql_lg = "SELECT id FROM login_grp where username='$username'";
            $dat_lg = $db->datasql($sql_lg);
            $lg_id = $dat_lg['id'];
            */
            
            $sql_menu = "SELECT * FROM menu ORDER BY id";
            $data_menu = $db->fetchdata($sql_menu);
            foreach($data_menu as $dat_menu){
                    $menu__ = "menu_".$dat_menu['id']; 
                    if(isset($_POST[$menu__])){
                        $menu = $_POST[$menu__];
                        $enable__ = "enable_".$dat_menu['id'];
                        $level_c__ = "level_c_".$dat_menu['id'];
                        $level_r__ = "level_r_".$dat_menu['id'];
                        $level_u__ = "level_u_".$dat_menu['id'];
                        $level_d__ = "level_d_".$dat_menu['id'];
                        
                        if(isset($_POST[$enable__]))
                            $enable = $_POST[$enable__];
                        else
                            $enable = 0;
                        if(isset($_POST[$level_c__]))
                            $level_c = $_POST[$level_c__];
                        else
                            $level_c = 0;
                        if(isset($_POST[$level_r__]))
                            $level_r = $_POST[$level_r__];
                        else
                            $level_r = 0;
                        if(isset($_POST[$level_u__]))
                            $level_u = $_POST[$level_u__];
                        else
                            $level_u = 0;
                        if(isset($_POST[$level_d__]))
                            $level_d = $_POST[$level_d__];
                        else
                            $level_d = 0;

                        if($menu != ""){
                            $level = $level_c.$level_r.$level_u.$level_d;
                            $sql_cek = "SELECT * FROM login_grp_acl WHERE login_grp_id='$id' AND menu_id='$menu'";
                            if($db->jumrec($sql_cek)==0){
                                $sql = "INSERT INTO login_grp_acl (login_grp_id,menu_id,enable,level) VALUES 
                                    ('$kode','$menu','$enable','$level')";
                                if(!$res_enable = $db->sqlquery($sql))
                                        $_SESSION['warning'] = $sql.'Edit Login Group Gagal[INSERT INTO login_grp_acl]';
                            }
                            else{
                                $sql = "UPDATE login_grp_acl 
                                        SET enable='$enable', level='$level' 
                                        WHERE login_grp_id='$kode' AND menu_id='$menu'";
                                if(!$res_enable = $db->sqlquery($sql))
                                        $_SESSION['warning'] = 'Edit Login Group Gagal [UPDATE login_grp_acl]';
                            }
                        }
                    }
            }
            $_SESSION['notif'] = 'Edit Login Group Berhasil';
        }
        
        header('Location: login_grp.php');
        exit();
    }
    //============================ end EDIT ====================================

    //============================ DELETE ======================================
    if($act=='delete'){
    }
    //============================ end DELETE ======================================  
}  
  

?>