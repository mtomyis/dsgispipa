<?php
    include '../class/class_db.php';
    $db = new database();
?>
<html>
    <head>
        <title>Upload Data Hippam</title>
    </head>
    <body>
        <h2><a href="<?php echo $_SERVER['PHP_SELF'];?>">Upload Data Hippam</a></h2>
        <hr>
        <form name="myform" id="myform" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
            <input size="50" type="file" name="file" id="file" />
            <input type="Submit" name="proses" id="proses" value="IMPORT"/>
        </form>
        <hr>
        <?php
            if(isset($_POST['proses'])){
                echo '<h3>Proses Upload Data - Start</h3>';
                include('excel_reader.php');	
                $data = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name']);
                $baris = $data->rowcount($sheet_index=0);
                for($i=7;$i<=$baris;$i++){
                    $id             = str_replace("'", "", $data->val($i,1));
                    $nama           = addslashes($data->val($i,6));
                    $alamat         = addslashes($data->val($i,7));
                    $no_sk          = addslashes($data->val($i,8));
                    $menetapkan     = addslashes($data->val($i,9));
                    $jml_pengurus   = addslashes($data->val($i,10));
                    $thn_berdiri    = addslashes($data->val($i,11));
                    $ketua_nama     = addslashes($data->val($i,12));
                    $ketua_alamat   = addslashes($data->val($i,13));
                    $ketua_telp     = addslashes($data->val($i,14));
                    $ketua_email    = addslashes($data->val($i,15));

                    $ma_kap_sumber = addslashes($data->val($i,16));
                    $ma_kap_terpasang = addslashes($data->val($i,17));
                    $ma_broncap_jml = addslashes($data->val($i,18));
                    $ma_broncap_ukuran = addslashes($data->val($i,19));
                    $ma_tandon_jml = addslashes($data->val($i,20));
                    $ma_tandon_ukuran = addslashes($data->val($i,21));
                    $ma_sumber_dana = addslashes($data->val($i,22));

                    $sb_kap_sumber = addslashes($data->val($i,23));
                    $sb_kap_terpasang = addslashes($data->val($i,24));
                    $sb_tandon_jml = addslashes($data->val($i,25));
                    $sb_tandon_ukuran = addslashes($data->val($i,26));
                    $sb_genset_jml = addslashes($data->val($i,27));
                    $sb_genset_ukuransb_pln_jml = addslashes($data->val($i,28));
                    $sb_pln_jml = addslashes($data->val($i,29));
                    $sb_pln_ukuran = addslashes($data->val($i,30));
                    $sb_jml_panel_pompa = addslashes($data->val($i,31));
                    $sb_thn_buat = addslashes($data->val($i,32));
                    $sb_sumber_dana = addslashes($data->val($i,33));
                  
                    $kap_produksi = addslashes($data->val($i,34));
                    $jml_air = addslashes($data->val($i,35));
                    $sistem_reservoir = addslashes($data->val($i,36));
                    $sistem_pelanggan = addslashes($data->val($i,37));

                    $pipa_gl_6 = addslashes($data->val($i,38));
                    $pipa_gl_4 = addslashes($data->val($i,39));
                    $pipa_gl_3 = addslashes($data->val($i,40));
                    $pipa_gl_2 = addslashes($data->val($i,41));
                    $pipa_gl_15 = addslashes($data->val($i,42));
                    $pipa_gl_1 = addslashes($data->val($i,43));
                    $pipa_gl_34 = addslashes($data->val($i,44));

                    $pipa_pvc_6 = addslashes($data->val($i,45));
                    $pipa_pvc_4 = addslashes($data->val($i,46));
                    $pipa_pvc_3 = addslashes($data->val($i,47));
                    $pipa_pvc_2 = addslashes($data->val($i,48));
                    $pipa_pvc_15 = addslashes($data->val($i,49));
                    $pipa_pvc_1 = addslashes($data->val($i,50));
                    $pipa_pvc_34 = addslashes($data->val($i,51));

                    $sbg_rumah = addslashes($data->val($i,52));
                    $sbg_masjid = addslashes($data->val($i,53));
                    $sbg_gereja = addslashes($data->val($i,54));
                    $sbg_pura = addslashes($data->val($i,55));
                    $sbg_wihara = addslashes($data->val($i,56));
                    $sbg_sekolah = addslashes($data->val($i,57));
                    $sbg_umum = addslashes($data->val($i,58));
                    $terlayani = addslashes($data->val($i,59));
                    $belum_terlayani = addslashes($data->val($i,60));
                    $tarif = addslashes($data->val($i,61));
                    $iuran = addslashes($data->val($i,62));

                    $jml_sma = addslashes($data->val($i,63));
                    $total_debit_sma = addslashes($data->val($i,64));
                    $jarak_sma = addslashes($data->val($i,65));

                    $jml_sekolah = addslashes($data->val($i,66));
                    $jml_t_ibadah = addslashes($data->val($i,67));
                    $jml_rs_puskesmas = addslashes($data->val($i,68));
                    $jml_kantor_pemda = addslashes($data->val($i,69));
                    $jml_fasos_lain = addslashes($data->val($i,70));

                    //$ = addslashes($data->val($i,));
                    
                    //echo '<br>'.$i.' - '.$id_hippam.' - '.$hippam_nama.' - '.$hippam_alamat;
                    if($id!=''){
                        $sql = "UPDATE hippam SET
                                nama='$nama', alamat='$alamat', no_sk='$no_sk', menetapkan='$menetapkan',
                                jml_pengurus='$jml_pengurus', thn_berdiri='$th', ketua_nama='$ketua_nama',
                                ketua_alamat='$ketua_alamat', ketua_telp='$ketua_telp', ketua_email='$ketua_email',
                                ma_kap_sumber='$ma_kap_sumber', ma_kap_terpasang='$ma_kap_terpasang',ma_broncap_jml='$ma_broncap_jml',
                                ma_tandon_ukuran='$ma_tandon_ukuran', ma_sumber_dana='$ma_sumber_dana',
                                sb_kap_sumber='$sb_kap_sumber', sb_kap_terpasang='$sb_kap_terpasang', 
                                sb_tandon_jml='$sb_tandon_jml', sb_tandon_ukuran='$sb_tandon_ukuran', 
                                sb_genset_jml='$sb_genset_jml', sb_genset_ukuran='$sb_genset_ukuran', 
                                sb_pln_jml='$sb_pln_jml', sb_pln_ukuran='$sb_pln_ukuran', sb_jml_panel_pompa='$sb_jml_panel_pompa',
                                sb_thn_buat='$sb_thn_buat', sb_sumber_dana='$sb_sumber_dana',
                                sb_kap_sumber='$sb_kap_sumber',sb_kap_terpasang='$sb_kap_terpasang',
                                sb_tandon_jml='$sb_tandon_jml', sb_tandon_ukuran='$sb_tandon_ukuran',
                                sb_genset_jml='$sb_genset_jml', sb_genset_ukuran='$sb_genset_ukuran',
                                sb_pln_jml='$sb_pln_jml', sb_pln_ukuran='$sb_pln_ukuransb_pln_ukuran',
                                sb_jml_panel_pompa='$sb_jml_panel_pompa',sb_thn_buat ='$sb_thn_buat',
                                sb_sumber_dana='$sb_sumber_dana',
                                kap_produksi='$kap_produksi',jml_air='$jml_air',
                                sistem_reservoir='$sistem_reservoir',sistem_pelanggan='$sistem_pelanggan',
                                pipa_gl_6='$pipa_gl_6', pipa_gl_4='$pipa_gl_4', pipa_gl_3='$pipa_gl_3',
                                pipa_gl_2='$pipa_gl_2', pipa_gl_15='$pipa_gl_15', pipa_gl_1='$pipa_gl_1', 
                                pipa_gl_34='$pipa_gl_34',
                                pipa_pvc_6='$pipa_pvc_6', pipa_pvc_4='$pipa_pvc_4', pipa_pvc_3='$pipa_pvc_3', 
                                pipa_pvc_2='$pipa_pvc_2', pipa_pvc_15='$pipa_pvc_15', pipa_pvc_1='$pipa_pvc_1', 
                                pipa_pvc_34='$pipa_pvc_34',
                                sbg_rumah='$sbg_rumah', sbg_masjid='$sbg_masjid', sbg_gereja='$sbg_gereja', 
                                sbg_pura='$sbg_pura', sbg_wihara='$sbg_wihara', sbg_sekolah='$sbg_sekolah', sbg_umum='$sbg_umum',
                                terlayani='$terlayani', belum_terlayani='$belum_terlayani', 
                                tarif='$tarif', iuran='$iuran',
                                jml_sma='$jml_sma', total_debit_sma='$total_debit_sma', jarak_sma='$jarak_sma', 
                                jml_sekolah='$jml_sekolah', jml_t_ibadah='$jml_t_ibadah', jml_rs_puskesmas='$jml_rs_puskesmas',
                                jml_kantor_pemda='$jml_kantor_pemda', jml_fasos_lain='$jml_fasos_lain'
                                WHERE id='$id'";
                        if(!$res = $db->sqlquery($sql))
                             echo '<br><br>'.$sql.' ERROR<br>';
                     }
                }
                echo '<h3>Proses Upload Data - Finish</h3>';
            }
        ?>
