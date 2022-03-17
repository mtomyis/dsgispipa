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
    $desa_kode = $frm->input_post('desa_kode');
    $nama = $frm->input_post('nama');
    $alamat = $frm->input_post('alamat');
    $no_sk = $frm->input_post('no_sk');
    $menetapkan = $frm->input_post('menetapkan');
    $jml_pengurus = $frm->input_post('jml_pengurus');
    $thn_berdiri = $frm->input_post('thn_berdiri');
    $ketua_nama = $frm->input_post('ketua_nama');
    $ketua_alamat = $frm->input_post('ketua_alamat');
    $ketua_telp = $frm->input_post('ketua_telp');
    $ketua_email = $frm->input_post('ketua_email');
    $ma_kap_sumber = $frm->input_post('ma_kap_sumber');
    $ma_kap_terpasang = $frm->input_post('ma_kap_terpasang');
    $ma_broncap_jml = $frm->input_post('ma_broncap_jml');
    $ma_broncap_ukuran = $frm->input_post('ma_broncap_ukuran');
    $ma_tandon_jml = $frm->input_post('ma_tandon_jml');
    $ma_tandon_ukuran = $frm->input_post('ma_tandon_ukuran');
    $ma_thn_buat = $frm->input_post('ma_thn_buat');
    $ma_sumber_dana = $frm->input_post('ma_sumber_dana');
    $sb_kap_sumber = $frm->input_post('sb_kap_sumber');
    $sb_kap_terpasang = $frm->input_post('sb_kap_terpasang');
    $sb_tandon_jml = $frm->input_post('sb_tandon_jml');
    $sb_tandon_ukuran = $frm->input_post('sb_tandon_ukuran');
    $sb_genset_jml = $frm->input_post('sb_genset_jml');
    $sb_genset_ukuran = $frm->input_post('sb_genset_ukuran');
    $sb_pln_jml = $frm->input_post('sb_pln_jml');
    $sb_pln_ukuran = $frm->input_post('sb_pln_ukuran');
    $sb_jml_panel_pompa = $frm->input_post('sb_jml_panel_pompa');
    $sb_thn_buat = $frm->input_post('sb_thn_buat');
    $sb_sumber_dana = $frm->input_post('sb_sumber_dana');
    $kap_produksi = $frm->input_post('kap_produksi');
    $jml_air = $frm->input_post('jml_air');
    $sistem_reservoir = $frm->input_post('sistem_reservoir');
    $sistem_pelanggan = $frm->input_post('sistem_pelanggan');
    $pipa_gl_6 = $frm->input_post('pipa_gl_6');
    $pipa_gl_4 = $frm->input_post('pipa_gl_4');
    $pipa_gl_3 = $frm->input_post('pipa_gl_3');
    $pipa_gl_2 = $frm->input_post('pipa_gl_2');
    $pipa_gl_15 = $frm->input_post('pipa_gl_15');
    $pipa_gl_1 = $frm->input_post('pipa_gl_1');
    $pipa_gl_34 = $frm->input_post('pipa_gl_34');
    $pipa_pvc_6 = $frm->input_post('pipa_pvc_6');
    $pipa_pvc_4 = $frm->input_post('pipa_pvc_4');
    $pipa_pvc_3 = $frm->input_post('pipa_pvc_3');
    $pipa_pvc_2 = $frm->input_post('pipa_pvc_2');
    $pipa_pvc_15 = $frm->input_post('pipa_pvc_15');
    $pipa_pvc_1 = $frm->input_post('pipa_pvc_1');
    $pipa_pvc_34 = $frm->input_post('pipa_pvc_34');
    $sbg_rumah = $frm->input_post('sbg_rumah');
    $sbg_masjid = $frm->input_post('sbg_masjid');
    $sbg_gereja = $frm->input_post('sbg_gereja');
    $sbg_pura = $frm->input_post('sbg_pura');
    $sbg_wihara = $frm->input_post('sbg_wihara');
    $sbg_sekolah = $frm->input_post('sbg_sekolah');
    $sbg_umum = $frm->input_post('sbg_umum');
    $terlayani = $frm->input_post('terlayani');
    $belum_terlayani = $frm->input_post('belum_terlayani');
    $tarif = $frm->input_post('tarif');
    $iuran = $frm->input_post('iuran');
    $jml_sma = $frm->input_post('jml_sma');
    $total_debit_sma = $frm->input_post('total_debit_sma');
    $jarak_sma = $frm->input_post('jarak_sma');
    $jml_sekolah = $frm->input_post('jml_sekolah');
    $jml_t_ibadah = $frm->input_post('jml_t_ibadah');
    $jml_rs_puskesmas = $frm->input_post('jml_rs_puskesmas');
    $jml_kantor_pemda = $frm->input_post('jml_kantor_pemda');
    $jml_fasos_lain = $frm->input_post('jml_fasos_lain');
    if(isset($_POST['id']))
        $id = $frm->input_post('id');
    /*variable hippam desa*/
    if(isset($_POST['uraian_bersangkutan']))
        $uraian_bersangkutan = $_POST['uraian_bersangkutan'];
    if(isset($_POST['rw_bersangkutan']))
        $rw_bersangkutan = $_POST['rw_bersangkutan'];
    if(isset($_POST['rt_bersangkutan']))
        $rt_bersangkutan = $_POST['rt_bersangkutan'];
    if(isset($_POST['terlayani_kk_bersangkutan']))
        $terlayani_kk_bersangkutan = $_POST['terlayani_kk_bersangkutan'];
    if(isset($_POST['terlayani_jiwa_bersangkutan']))
        $terlayani_jiwa_bersangkutan = $_POST['terlayani_jiwa_bersangkutan'];
    if(isset($_POST['belum_terlayani_kk_bersangkutan']))
        $belum_terlayani_kk_bersangkutan = $_POST['belum_terlayani_kk_bersangkutan'];
    if(isset($_POST['belum_terlayani_jiwa_bersangkutan']))
        $belum_terlayani_jiwa_bersangkutan = $_POST['belum_terlayani_jiwa_bersangkutan'];
    /*variable hippam desa sekitar*/
    if(isset($_POST['uraian_sekitar']))
        $uraian_sekitar = $_POST['uraian_sekitar'];
    if(isset($_POST['rw_sekitar']))
        $rw_sekitar = $_POST['rw_sekitar'];
    if(isset($_POST['rt_sekitar']))
        $rt_sekitar = $_POST['rt_sekitar'];
    if(isset($_POST['terlayani_kk_sekitar']))
        $terlayani_kk_sekitar = $_POST['terlayani_kk_sekitar'];
    if(isset($_POST['terlayani_jiwa_sekitar']))
        $terlayani_jiwa_sekitar = $_POST['terlayani_jiwa_sekitar'];
    if(isset($_POST['belum_terlayani_kk_sekitar']))
        $belum_terlayani_kk_sekitar = $_POST['belum_terlayani_kk_sekitar'];
    if(isset($_POST['belum_terlayani_jiwa_sekitar']))
        $belum_terlayani_jiwa_sekitar = $_POST['belum_terlayani_jiwa_sekitar'];
}

//=========================== ADD ===============================
if(isset($_POST['submit_add'])){
    $dest = 'javascript:history.go(-1)';
    $msg = 'Tambah Hippam';
    $id = $no_doc->make_id_urut('hippam',11);
    $sql = "INSERT INTO hippam 
                    (id,desa_kode,nama,alamat,no_sk,menetapkan,jml_pengurus,thn_berdiri,ketua_nama,
                     ketua_alamat,ketua_telp,ketua_email,ma_kap_sumber,ma_kap_terpasang,ma_broncap_jml,
                     ma_broncap_ukuran,ma_tandon_jml,ma_tandon_ukuran,ma_thn_buat,
                     ma_sumber_dana,sb_kap_sumber,sb_kap_terpasang,sb_tandon_jml,sb_tandon_ukuran,
                     sb_genset_jml,sb_genset_ukuran,sb_pln_jml,sb_pln_ukuran,sb_jml_panel_pompa,
                     sb_thn_buat,sb_sumber_dana,kap_produksi,jml_air,sistem_reservoir,sistem_pelanggan,
                     pipa_gl_6,pipa_gl_4,pipa_gl_3,pipa_gl_2,pipa_gl_15,pipa_gl_34,pipa_pvc_6,
                     pipa_pvc_4,pipa_pvc_3,pipa_pvc_2,pipa_pvc_15,pipa_pvc_34,sbg_rumah,sbg_masjid,
                     sbg_gereja,sbg_pura,sbg_wihara,sbg_sekolah,sbg_umum,terlayani,belum_terlayani,tarif,
                     iuran,jml_sma,total_debit_sma,jarak_sma,jml_sekolah,jml_t_ibadah,jml_rs_puskesmas,
                     jml_kantor_pemda,jml_fasos_lain,crt)
                    VALUES (
                    '$id','$desa_kode','$nama','$alamat','$no_sk','$menetapkan','$jml_pengurus','$thn_berdiri','$ketua_nama',
                     '$ketua_alamat','$ketua_telp','$ketua_email','$ma_kap_sumber','$ma_kap_terpasang','$ma_broncap_jml',
                     '$ma_broncap_ukuran','$ma_tandon_jml','$ma_tandon_ukuran','$ma_thn_buat',
                     '$ma_sumber_dana','$sb_kap_sumber','$sb_kap_terpasang','$sb_tandon_jml','$sb_tandon_ukuran',
                     '$sb_genset_jml','$sb_genset_ukuran','$sb_pln_jml','$sb_pln_ukuran','$sb_jml_panel_pompa',
                     '$sb_thn_buat','$sb_sumber_dana','$kap_produksi','$jml_air','$sistem_reservoir','$sistem_pelanggan',
                     '$pipa_gl_6','$pipa_gl_4','$pipa_gl_3','$pipa_gl_2','$pipa_gl_15','$pipa_gl_34','$pipa_pvc_6',
                     '$pipa_pvc_4','$pipa_pvc_3','$pipa_pvc_2','$pipa_pvc_15','$pipa_pvc_34','$sbg_rumah','$sbg_masjid',
                     '$sbg_gereja','$sbg_pura','$sbg_wihara','$sbg_sekolah','$sbg_umum','$terlayani','$belum_terlayani','$tarif',
                     '$iuran','$jml_sma','$total_debit_sma','$jarak_sma','$jml_sekolah','$jml_t_ibadah','$jml_rs_puskesmas',
                     '$jml_kantor_pemda','$jml_fasos_lain','$log'
                    )";
    if(!$res  = $db->sqlquery($sql))
        // $cst->notif_warning ($msg, $dest);
        echo "<div class='col-md-12 alert alert-danger text-center'>Data gagal disimpan!</div>";

    /*mulai input hipppam desa*/
    if(isset($_POST['uraian_bersangkutan'])){
        foreach ($uraian_bersangkutan as $key => $value_uraian) {
            $id_hippam_desa = $no_doc->make_id_urut('hippam_desa',11);
            if ($value_uraian!='') {
            $sql_hippam_desa = "INSERT INTO hippam_desa
                (id,uraian,rw,rt,terlayani_kk,terlayani_jiwa,belum_terlayani_kk,belum_terlayani_jiwa,hippam_id,crt)
                VALUES
                ('$id_hippam_desa','$value_uraian','".$rw_bersangkutan[$key]."','".$rt_bersangkutan[$key]."','".$terlayani_kk_bersangkutan[$key]."','".$terlayani_jiwa_bersangkutan[$key]."','".$belum_terlayani_kk_bersangkutan[$key]."','".$belum_terlayani_jiwa_bersangkutan[$key]."','$id','$log')";
            if(!$res  = $db->sqlquery($sql_hippam_desa))
                // $cst->notif_warning ('Tambah Data Hippam Desa'.mysql_error(), $dest);
                echo "<div class='col-md-12 alert alert-danger text-center'>Data gagal disimpan!</div>";
            }
            
        }
    }
    /*akhir input hippam desa*/
    /*mulai input hippam desa sekitar*/
    if(isset($_POST['uraian_sekitar'])){
        foreach ($uraian_sekitar as $key => $value_uraian) {
            $id_hippam_desa_sekitar = $no_doc->make_id_urut('hippam_desa_sekitar',11);
            $sql_hippam_desa_sekitar = "INSERT INTO hippam_desa_sekitar
                        (id,uraian,rw,rt,terlayani_kk,terlayani_jiwa,belum_terlayani_kk,belum_terlayani_jiwa,hippam_id,crt)
                        VALUES
                        ('$id_hippam_desa_sekitar','$value_uraian','".$rw_sekitar[$key]."','".$rt_sekitar[$key]."','".$terlayani_kk_sekitar[$key]."','".$terlayani_jiwa_sekitar[$key]."','".$belum_terlayani_kk_sekitar[$key]."','".$belum_terlayani_jiwa_sekitar[$key]."','$id','$log')";

           if(!$res  = $db->sqlquery($sql_hippam_desa_sekitar))
                    // $cst->notif_warning ('Tambah Data Hippam Desa Sekitar'.mysql_error(), $dest);
            echo "<div class='col-md-12 alert alert-danger text-center'>Data gagal disimpan!</div>";
        }
    }
    /*akhir input hippam desa sekitar*/
    
    // $cst->notif_success($msg, $dest);
    echo "<div class='col-md-12 alert alert-success text-center'>Data berhasil disimpan!</div>";
        
}
//======================== end ADD ===============================

//============================= EDIT =============================
if(isset($_POST['submit_edit'])){
    $dest = 'javascript:history.go(-1)';
    $msg = 'Edit Hippam';
    
    $sql = "UPDATE hippam SET 
                 desa_kode='$desa_kode',nama='$nama',alamat='$alamat',no_sk='$no_sk',menetapkan='$menetapkan',jml_pengurus='$jml_pengurus',thn_berdiri='$thn_berdiri',ketua_nama='$ketua_nama',
                 ketua_alamat='$ketua_alamat',ketua_telp='$ketua_telp',ketua_email='$ketua_email',ma_kap_sumber='$ma_kap_sumber',ma_kap_terpasang='$ma_kap_terpasang',ma_broncap_jml='$ma_broncap_jml',
                 ma_broncap_ukuran='$ma_broncap_ukuran',ma_tandon_jml='$ma_tandon_jml',ma_tandon_ukuran='$ma_tandon_ukuran',ma_thn_buat='$ma_thn_buat',
                 ma_sumber_dana='$ma_sumber_dana',sb_kap_sumber='$sb_kap_sumber',sb_kap_terpasang='$sb_kap_terpasang',sb_tandon_jml='$sb_tandon_jml',sb_tandon_ukuran='$sb_tandon_ukuran',
                 sb_genset_jml='$sb_genset_jml',sb_genset_ukuran='$sb_genset_ukuran',sb_pln_jml='$sb_pln_jml',sb_pln_ukuran='$sb_pln_ukuran',sb_jml_panel_pompa='$sb_jml_panel_pompa',
                 sb_thn_buat='$sb_thn_buat',sb_sumber_dana='$sb_sumber_dana',kap_produksi='$kap_produksi',jml_air='$jml_air',sistem_reservoir='$sistem_reservoir',sistem_pelanggan='$sistem_pelanggan',
                 pipa_gl_6='$pipa_gl_6',pipa_gl_4='$pipa_gl_4',pipa_gl_3='$pipa_gl_3',pipa_gl_2='$pipa_gl_2',pipa_gl_15='$pipa_gl_15',pipa_gl_34='$pipa_gl_34',pipa_pvc_6='$pipa_pvc_6',
                 pipa_pvc_4='$pipa_pvc_4',pipa_pvc_3='$pipa_pvc_3',pipa_pvc_2='$pipa_pvc_2',pipa_pvc_15='$pipa_pvc_15',pipa_pvc_34='$pipa_pvc_34',sbg_rumah='$sbg_rumah',sbg_masjid='$sbg_masjid',
                 sbg_gereja='$sbg_gereja',sbg_pura='$sbg_pura',sbg_wihara='$sbg_wihara',sbg_sekolah='$sbg_sekolah',sbg_umum='$sbg_umum',terlayani='$terlayani',belum_terlayani='$belum_terlayani',tarif='$tarif',
                 iuran='$iuran',jml_sma='$jml_sma',total_debit_sma='$total_debit_sma',jarak_sma='$jarak_sma',jml_sekolah='$jml_sekolah',jml_t_ibadah='$jml_t_ibadah',jml_rs_puskesmas='$jml_rs_puskesmas',
                 jml_kantor_pemda='$jml_kantor_pemda',jml_fasos_lain='$jml_fasos_lain',upd='$log' 
            WHERE id='$id'";
    if(!$res  = $db->sqlquery($sql)){
        // $cst->notif_warning ($msg, $dest);
        echo "<div class='col-md-12 alert alert-danger text-center'>Data gagal diedit!</div>";

    }else{
        echo "<div class='col-md-12 alert alert-success text-center'>Data berhasil diedit!</div>";        

    }
    // $cst->notif_success($msg, $dest);
}
//============================ end EDIT ====================================

//============================ DELETE ======================================
if(isset($_POST['submit_delete'])){
    $dest = 'javascript:history.go(-1)';
    $msg = 'Hapus Hippam';

    $hippam_desa = "SELECT id FROM hippam_desa WHERE hippam_id='$id'";
    $hippam_desa_sekitar = "SELECT id FROM hippam_desa_sekitar WHERE hippam_id='$id'";

    if ($db->jumrec($hippam_desa)!=0 OR $db->jumrec($hippam_desa_sekitar)!=0) {
        $_SESSION['error_delete'] = true;
        header("Location: hippam_detail.php?id=$id");
        exit();
    }

    $sql = "DELETE FROM hippam 
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

//============================ CHAIN COMBOBOX ======================================
if($_REQUEST['action'] == "desa" && isset($_REQUEST['action'])){
    $kecamatan_id = $_REQUEST['kecamatan_id'];
        
    $sql = "SELECT * FROM desa WHERE kecamatan_id='".$kecamatan_id."' ORDER BY nama";
    $data = $db->fetchdata($sql);
    echo "<option value=''>Pilih</option>";
    foreach ($data as $dat) {
        echo "<option value='".$dat['kode']."'>".$dat['nama']."</option>";
    }
}
//============================ AJAX REQUEST ======================================
if($_POST['action'] == "show_data" && isset($_POST['action'])){
    $hippam_id = $_POST['hippam_id'];
    $place = $frm->input_post('place');

    if ($place == "list_data_bersangkutan")
        $tabel = "hippam_desa";
    else
        $tabel = "hippam_desa_sekitar";

    $sql = "SELECT * FROM $tabel WHERE hippam_id='".$hippam_id."' ORDER BY uraian";
    $data = $db->fetchdata($sql);
    foreach ($data as $dat) { ?>
        <tr>
          <td><input type="text" id="uraian_<?=$hippam_id.$dat['id']?>" class="form-control" value="<?=$dat['uraian']?>" data-bv-notempty></td>
          <td><input type="text" id="rw_<?=$hippam_id.$dat['id']?>" class="form-control" value="<?=$dat['rw']?>" data-bv-numeric></td>
          <td><input type="text" id="rt_<?=$hippam_id.$dat['id']?>" class="form-control" value="<?=$dat['rt']?>" data-bv-numeric></td>
          <td><input type="text" id="terlayani_kk_<?=$hippam_id.$dat['id']?>" class="form-control" value="<?=$dat['terlayani_kk']?>" data-bv-numeric></td>
          <td><input type="text" id="terlayani_jiwa_<?=$hippam_id.$dat['id']?>" class="form-control" value="<?=$dat['terlayani_jiwa']?>" data-bv-numeric></td>
          <td><input type="text" id="belum_terlayani_kk_<?=$hippam_id.$dat['id']?>" class="form-control" value="<?=$dat['belum_terlayani_kk']?>" data-bv-numeric></td>
          <td><input type="text" id="belum_terlayani_jiwa_<?=$hippam_id.$dat['id']?>" class="form-control" value="<?=$dat['belum_terlayani_jiwa']?>" data-bv-numeric></td>
          <td><button class="btn btn-success btn-sm" onclick="edit_elemen('<?=$dat['id']?>','<?=$tabel?>');">Simpan <i class="glyphicon glyphicon-floppy-disk"></i></button></td>
          <td><button class="btn btn-danger btn-sm" onclick="remove_elemen('<?=$dat['id']?>','<?=$tabel?>');">Hapus <i class="glyphicon glyphicon-trash"></i></button></td>
        </tr>
    <?php }
}
if($_POST['action'] == "tambah_desa_hippam" && isset($_POST['action'])){
    $hippam_id = $frm->input_post('hippam_id');
    $uraian = $frm->input_post('uraian');
    $rw = $frm->input_post('rw');
    $rt = $frm->input_post('rt');
    $terlayani_kk = $frm->input_post('terlayani_kk');
    $terlayani_jiwa = $frm->input_post('terlayani_jiwa');
    $belum_terlayani_kk = $frm->input_post('belum_terlayani_kk');
    $belum_terlayani_jiwa = $frm->input_post('belum_terlayani_jiwa');
    $place = $frm->input_post('place');

    if ($place=="bersangkutan") {
        $id_hippam_desa = $no_doc->make_id_urut('hippam_desa',11);
        $tabel = "hippam_desa";
    } else {
        $id_hippam_desa = $no_doc->make_id_urut('hippam_desa_sekitar`',11);
        $tabel = "hippam_desa_sekitar";
    }
    
    $sql_hippam_desa = "INSERT INTO $tabel
                (id,uraian,rw,rt,terlayani_kk,terlayani_jiwa,belum_terlayani_kk,belum_terlayani_jiwa,hippam_id,crt)
                VALUES
                ('$id_hippam_desa','$uraian','".$rw."','".$rt."','".$terlayani_kk."','".$terlayani_jiwa."','".$belum_terlayani_kk."','".$belum_terlayani_jiwa."','$hippam_id','$log')";
    $db->sqlquery($sql_hippam_desa);
}

if($_POST['action'] == "edit_desa_hippam" && isset($_POST['action'])){
    $id = $frm->input_post('id');
    $tabel = $frm->input_post('tabel');
    $uraian = $frm->input_post('uraian');
    $rw = $frm->input_post('rw');
    $rt = $frm->input_post('rt');
    $terlayani_kk = $frm->input_post('terlayani_kk');
    $terlayani_jiwa = $frm->input_post('terlayani_jiwa');
    $belum_terlayani_kk = $frm->input_post('belum_terlayani_kk');
    $belum_terlayani_jiwa = $frm->input_post('belum_terlayani_jiwa');
        
    $sql_hippam_desa = "UPDATE $tabel SET
                uraian='$uraian',rw='$rw',rt='$rt',terlayani_kk='$terlayani_kk',terlayani_jiwa='$terlayani_jiwa',belum_terlayani_kk='$belum_terlayani_kk',belum_terlayani_jiwa='$belum_terlayani_jiwa',upd='$log'
                WHERE id='$id'";
    $db->sqlquery($sql_hippam_desa);
}

if($_POST['action'] == "delete_hippam" && isset($_POST['action'])){
    $id = $frm->input_post('id');
    $tabel = $frm->input_post('tabel');
    
    $sql = "DELETE FROM $tabel 
            WHERE id='$id'";  
    $db->sqlquery($sql);
}


?>
