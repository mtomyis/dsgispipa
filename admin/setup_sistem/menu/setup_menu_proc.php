<?php
include '../../script_awal.php';
include $doc_root."log.php";

include $doc_root_class."class_custom.php";
$cst = new custom();
include $doc_root_class.'class_input_form.php';
$frm = new input_form();

if(isset($_POST['submit_add']) || isset($_POST['submit_edit']) || isset($_POST['submit_delete'])){
    /*$submit = $_POST['submit'];
    $act = $_POST['act'];*/
    $upline = $_POST['upline'];
    $level = $_POST['level'];
    $id_menu = $_POST['id_menu'];
    $nama_menu = $_POST['nama_menu'];
    $tipe = $_POST['tipe'];
    $link = $_POST['link'];
    $icon = $_POST['icon'];
    $urut = $_POST['urut'];
    

    $err = 0;
    //=========================== ADD ===============================
    if(isset($_POST['submit_add'])){
        
            $sql = "INSERT INTO menu VALUES (
                            '$id_menu','$upline','$urut','$nama_menu','$tipe','$level','$link','$icon','1'
                            )";
            if(!$res  = $db->sqlquery($sql))
                    $alert = $db->err_alert("$sql");
            else
                    $_SESSION['notif'] = 'Tambah Data Menu Berhasil';
       
            header('Location: setup_menu_add.php');
            exit();
            
            /*print("
            <script languange=\"javascript\">
                    alert(\"Tambah Data menu BERHASIL\");
                    window.location = 'setup_menu_add.php';
            </script>
            ");*/
 

    }
    //======================== end ADD ===============================

    //============================= EDIT =============================
    if(isset($_POST['submit_edit'])){      
        $aktif = $_POST['aktif'];
            $id_menu_old = $_POST['id_menu_old'];
            $sql = "UPDATE menu SET 
                    id='$id_menu',nama='$nama_menu', urut='$urut',tipe='$tipe',icon='$icon', link='$link', aktif='$aktif' ";
            $sql.= " WHERE id='$id_menu_old'";
            if(!$res  = $db->sqlquery($sql))
                    $alert = $db->err_alert("$sql");
            else
                    $_SESSION['notif'] = 'Edit Data Menu Berhasil';
       
            header('Location: setup_menu.php');
            exit();

            /*print("
            <script languange=\"javascript\">
                    alert(\"EDIT Data Menu BERHASIL\");
                    window.location = 'setup_menu.php';
            </script>
            ");*/
    }
    //============================ end EDIT ====================================

    //============================ DELETE ======================================
    if($act=='delete'){
    }
    //============================ end DELETE ======================================
    
}    
?>