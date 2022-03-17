<?php include '../../../script_awal.php'; ?>
<?php
    include $doc_root_class.'class_custom.php';
    $cst = new custom(); 
    include $doc_root_class.'class_dropdown.php';
    $dropdown = new dropdown();
?>
<?php
    $page_id = $p_hippam;
    $page_name = 'hippam';
?>
<?php
    $id = $_GET['id'];
    $sql = "SELECT HP.*,DS.kecamatan_id as kecamatan_id FROM hippam HP
            JOIN desa DS ON DS.kode=HP.desa_kode
            WHERE HP.id='$id'";
    $dat_hippam = $db->datasql($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="<?php echo $addr_root_js;?>jquery.min.js"></script>
    <script src="<?php echo $addr_root_js;?>bootstrap.min.js"></script>
    <?php include $doc_template.'bs_meta.php';?>   
    <?php include $doc_template.'bs_css.php';?>     
  </head>

  <body>
    <?php include $doc_template.'menu_top.php';?>
      
      <div class="container-fluid">
          <!-- START JUDUL & TOMBOL TAMBAH-LIHAT -->
          <div class="page-header">
            <h3>HIPPAM-DETAIL</h3>
          </div>
         <div class="row">
            <div class="col-md-3 col-sm-12">
              <?php $cst->create_top_button($page_id,$page_name);?>
            </div>
          </div>
          <!-- END JUDUL & TOMBOL TAMBAH-LIHAT -->
          <!-- START FORM TAMBAH DATA -->
          <div class="row">
              <div class="col-md-12">
                
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist" style="margin-top:5px;">
                    <li class="active"><a href="#data_umum" role="tab" data-toggle="tab">Data Umum <?=$dat_hippam['nama'];?></a></li>
                    <li><a href="#data_wilayah" role="tab" data-toggle="tab">Data Pelayanan Hippam Berdasarkan Wilayah</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- mulai data umum -->
                    <div class="tab-pane fade in active" id="data_umum">
                      <!-- mulai panel isian-->
                      <form action="hippam_proc.php" method="POST" name="addForm" id="addForm" class="form-horizontal">
                      <div class="panel-group" id="accordion">
                        <!-- mulai panel data hippam -->
                        <div class="panel panel-info">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion"span href="#isian_data">
                                FORM ISIAN DATA <span id="judul_nama_hippam"><?=$dat_hippam['nama'];?></span>
                              </a>
                            </h4>
                          </div>
                          <div id="isian_data" class="panel-collapse collapse">
                            <div class="panel-body">
                              <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Kecamatan</label>
                                <div class="col-sm-2">
                                  <?php
                                    $sql_kecamatan = 'SELECT * FROM kecamatan ORDER BY nama';
                                    $attr = array('sql'=>$sql_kecamatan,'name'=>'kecamatan_id','id'=>'kecamatan_id','class'=>'form-control','data'=>'data-bv-notempty','option_all'=>true,'value'=>$dat_hippam['kecamatan_id']);
                                    $dropdown->create($attr);
                                  ?>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Desa</label>
                                <div class="col-sm-2">
                                  <?php
                                    $sql_desa = "SELECT * FROM desa WHERE kecamatan_id=".$dat_hippam['kecamatan_id']."  ORDER BY nama";
                                    $attr = array('sql'=>$sql_desa,'name'=>'desa_kode','id'=>'desa_kode','class'=>'form-control','data'=>'data-bv-notempty','option_all'=>true,'value'=>$dat_hippam['desa_kode'],'val'=>'kode');
                                    $dropdown->create($attr);
                                  ?>
                                </div>
                              </div>                            
                              <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-3">
                                  <input type="text" name="nama" id="nama" class="form-control" value='<?=$dat_hippam['nama']?>' data-bv-notempty>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-4">
                                  <textarea name="alamat" rows="2" id="alamat" class="form-control"><?=$dat_hippam['alamat']?></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-2 control-label">SK Penetapan</label>
                                <div class="col-sm-3">
                                  <input type="text" name="no_sk" id="no_sk" class="form-control" value='<?=$dat_hippam['no_sk']?>'>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Yang Menetapkan</label>
                                <div class="col-sm-2">
                                  <input type="text" name="menetapkan" id="menetapkan" class="form-control" value="<?=$dat_hippam['menetapkan']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Jml Pengurus</label>
                                <div class="col-sm-1">
                                  <input type="text" name="jml_pengurus" id="jml_pengurus" class="form-control" value="<?=$dat_hippam['jml_pengurus']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Tahun Berdiri</label>
                                <div class="col-sm-2">
                                  <input type="text" name="thn_berdiri" id="thn_berdiri" class="form-control" value="<?=$dat_hippam['thn_berdiri']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Nama Ketua</label>
                                <div class="col-sm-3">
                                  <input type="text" name="ketua_nama" id="ketua_nama" class="form-control" value="<?=$dat_hippam['ketua_nama']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-3">
                                  <textarea name="ketua_alamat" rows="2" id="ketua_alamat" class="form-control"><?=$dat_hippam['ketua_alamat']?></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-2 control-label">No. Telp / HP</label>
                                <div class="col-sm-2">
                                  <input type="text" name="ketua_telp" id="ketua_telp" class="form-control" value="<?=$dat_hippam['ketua_telp']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-3">
                                  <input type="text" name="ketua_email" id="ketua_email" class="form-control" value="<?=$dat_hippam['ketua_email']?>" data-bv-emailaddress>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- akhir panel data hippam -->
                        <!-- mulai panel data teknis -->
                        <div class="panel panel-info">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#data_teknis">
                                DATA TEKNIS
                              </a>
                            </h4>
                          </div>
                          <div id="data_teknis" class="panel-collapse collapse">
                            <div class="panel-body">
                              <div class="form-group">
                                <label for="" class="col-xs-1 control-label">1. Mata Air</label>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Kapasitas sumber air (Lt/det)</label>
                                <div class="col-xs-2">
                                  <input type="text" class="form-control" id="ma_kap_sumber" name="ma_kap_sumber" value="<?=$dat_hippam['ma_kap_sumber']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Kapasitas terpasang (Lt/det)</label>
                                <div class="col-xs-2">
                                  <input type="text" class="form-control" id="ma_kap_terpasang" name="ma_kap_terpasang" value="<?=$dat_hippam['ma_kap_terpasang']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Bangunan Broncaptering</label>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-offset-1 col-xs-2 control-label">Jumlah</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="ma_broncap_jml" name="ma_broncap_jml" value="<?=$dat_hippam['ma_broncap_jml']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-offset-1 col-xs-2 control-label">Ukuran</label>
                                <div class="col-xs-2">
                                  <input type="text" class="form-control" id="ma_broncap_ukuran" name="ma_broncap_ukuran" value="<?=$dat_hippam['ma_broncap_ukuran']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Bangunan Tandon</label>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-offset-1 col-xs-2 control-label">Jumlah</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="ma_tandon_jml" name="ma_tandon_jml" value="<?=$dat_hippam['ma_tandon_jml']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-offset-1 col-xs-2 control-label">Ukuran</label>
                                <div class="col-xs-2">
                                  <input type="text" class="form-control" id="ma_tandon_ukuran" name="ma_tandon_ukuran" value="<?=$dat_hippam['ma_tandon_ukuran']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Tahun Pembangunan</label>
                                <div class="col-xs-2">
                                  <input type="text" class="form-control" id="ma_thn_buat" name="ma_thn_buat" value="<?=$dat_hippam['ma_thn_buat']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Sumber Dana</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" id="ma_sumber_dana" name="ma_sumber_dana" value="<?=$dat_hippam['ma_sumber_dana']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-2 control-label"><p class="text-left">2. Sumur Bor</p></label>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Kapasitas sumber air (Lt/det)</label>
                                <div class="col-xs-2">
                                  <input type="text" class="form-control" id="sb_kap_sumber" name="sb_kap_sumber" value="<?=$dat_hippam['sb_kap_sumber']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Kapasitas terpasang (Lt/det)</label>
                                <div class="col-xs-2">
                                  <input type="text" class="form-control" id="sb_kap_terpasang" name="sb_kap_terpasang" value="<?=$dat_hippam['sb_kap_terpasang']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Bangunan Tandon</label>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-offset-1 col-xs-2 control-label">Jumlah</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="sb_tandon_jml" name="sb_tandon_jml" value="<?=$dat_hippam['sb_tandon_jml']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-offset-1 col-xs-2 control-label">Ukuran</label>
                                <div class="col-xs-2">
                                  <input type="text" class="form-control" id="sb_tandon_ukuran" name="sb_tandon_ukuran" value="<?=$dat_hippam['sb_tandon_ukuran']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Sumber Tenaga Pompa (Genset)</label>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-offset-1 col-xs-2 control-label">Jumlah</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="sb_genset_jml" name="sb_genset_jml" value="<?=$dat_hippam['sb_genset_jml']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-offset-1 col-xs-2 control-label">Ukuran</label>
                                <div class="col-xs-2">
                                  <input type="text" class="form-control" id="sb_genset_ukuran" name="sb_genset_ukuran" value="<?=$dat_hippam['sb_genset_ukuran']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Sumber Tenaga Pompa (PLN)</label>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-offset-1 col-xs-2 control-label">Jumlah</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="sb_pln_jml" name="sb_pln_jml" value="<?=$dat_hippam['sb_pln_jml']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-offset-1 col-xs-2 control-label">Ukuran</label>
                                <div class="col-xs-2">
                                  <input type="text" class="form-control" id="sb_pln_ukuran" name="sb_pln_ukuran" value="<?=$dat_hippam['sb_pln_ukuran']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Jumlah Panel Pompa</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="sb_jml_panel_pompa" name="sb_jml_panel_pompa" value="<?=$dat_hippam['sb_jml_panel_pompa']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Tahun Pembangunan</label>
                                <div class="col-xs-2">
                                  <input type="text" class="form-control" id="sb_thn_buat" name="sb_thn_buat" value="<?=$dat_hippam['sb_thn_buat']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Sumber Dana</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" id="sb_sumber_dana" name="sb_sumber_dana" value="<?=$dat_hippam['sb_sumber_dana']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label"><p class="text-left">3. Kapasitas Produksi Total (Liter/Detik)</p></label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control" id="kap_produksi" name="kap_produksi" value="<?=$dat_hippam['kap_produksi']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label"><p class="text-left">4. Jumlah Air yang Didistribusikan Perhari(M<sup>3</sup>)</p></label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control" id="jml_air" name="jml_air" value="<?=$dat_hippam['jml_air']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label"><p class="text-left">5. Sistem Pengaliran/Pelayanan</label>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Sumber Air ke Reservoar</label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control" id="sistem_reservoir" name="sistem_reservoir" value="<?=$dat_hippam['sistem_reservoir']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Reservoar ke Pelanggan</label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control" id="sistem_pelanggan" name="sistem_pelanggan" value="<?=$dat_hippam['sistem_pelanggan']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label"><p class="text-left">6. Sarana Tranmisi/Distribusi</label>
                              </div>
                              <!-- mulai di bagi dua -->
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="" class="col-xs-3 control-label">Pipa Gl &Oslash; 6" (m)</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" id="pipa_gl_6" name="pipa_gl_6" value="<?=$dat_hippam['pipa_gl_6']?>" data-bv-numeric>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-xs-3 control-label">Pipa Gl &Oslash; 4" (m)</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" id="pipa_gl_4" name="pipa_gl_4" value="<?=$dat_hippam['pipa_gl_4']?>" data-bv-numeric>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-xs-3 control-label">Pipa Gl &Oslash; 3" (m)</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" id="pipa_gl_3" name="pipa_gl_3" value="<?=$dat_hippam['pipa_gl_3']?>" data-bv-numeric>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-xs-3 control-label">Pipa Gl &Oslash; 2" (m)</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" id="pipa_gl_2" name="pipa_gl_2" value="<?=$dat_hippam['pipa_gl_2']?>" data-bv-numeric>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-xs-3 control-label">Pipa Gl &Oslash; 1,5" (m)</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" id="pipa_gl_15" name="pipa_gl_15" value="<?=$dat_hippam['pipa_gl_15']?>" data-bv-numeric>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-xs-3 control-label">Pipa Gl &Oslash; 1" (m)</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" id="pipa_gl_1" name="pipa_gl_1" value="<?=$dat_hippam['pipa_gl_1']?>" data-bv-numeric>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-xs-3 control-label">Pipa Gl &Oslash; 3/4" (m)</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" id="pipa_gl_34" name="pipa_gl_34" value="<?=$dat_hippam['pipa_gl_34']?>" data-bv-numeric>
                                  </div>
                                </div>
                              </div><!-- abis col pertama -->
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="" class="col-xs-4 control-label">Pipa PVC &Oslash; 6" (m)</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" id="pipa_pvc_6" name="pipa_pvc_6" value="<?=$dat_hippam['pipa_pvc_6']?>" data-bv-numeric>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-xs-4 control-label">Pipa PVC &Oslash; 4" (m)</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" id="pipa_pvc_4" name="pipa_pvc_4" value="<?=$dat_hippam['pipa_pvc_4']?>" data-bv-numeric>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-xs-4 control-label">Pipa PVC &Oslash; 3" (m)</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" id="pipa_pvc_3" name="pipa_pvc_3" value="<?=$dat_hippam['pipa_pvc_3']?>" data-bv-numeric>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-xs-4 control-label">Pipa PVC &Oslash; 2" (m)</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" id="pipa_pvc_2" name="pipa_pvc_2" value="<?=$dat_hippam['pipa_pvc_2']?>" data-bv-numeric>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-xs-4 control-label">Pipa PVC &Oslash; 1,5" (m)</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" id="pipa_pvc_15" name="pipa_pvc_15" value="<?=$dat_hippam['pipa_pvc_15']?>" data-bv-numeric>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-xs-4 control-label">Pipa PVC &Oslash; 1" (m)</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" id="pipa_pvc_1" name="pipa_pvc_1" value="<?=$dat_hippam['pipa_pvc_1']?>" data-bv-numeric>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-xs-4 control-label">Pipa PVC &Oslash; 3/4" (m)</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" id="pipa_pvc_34" name="pipa_pvc_34" value="<?=$dat_hippam['pipa_pvc_34']?>" data-bv-numeric>
                                  </div>
                                </div>
                              </div>
                              <!-- akhir dibagi dua -->

                            </div>
                          </div>
                        </div>
                        <!-- akhir panel data teknis -->
                        <!-- mulai panel data pelayanan -->
                        <div class="panel panel-info">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#data_pelayanan">
                                DATA PELAYANAN
                              </a>
                            </h4>
                          </div>
                          <div id="data_pelayanan" class="panel-collapse collapse">
                            <div class="panel-body">
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label"><p class="text-left">1. Jumlah Sambungan/Pelanggan</p></label>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Sambungan Rumah</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="sbg_rumah" name="sbg_rumah" value="<?=$dat_hippam['sbg_rumah']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Sambungan Masjid</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="sbg_masjid" name="sbg_masjid" value="<?=$dat_hippam['sbg_masjid']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Sambungan Gereja</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="sbg_gereja" name="sbg_gereja" value="<?=$dat_hippam['sbg_gereja']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Sambungan Pura</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="sbg_pura" name="sbg_pura" value="<?=$dat_hippam['sbg_pura']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Sambungan Wihara</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="sbg_wihara" name="sbg_wihara" value="<?=$dat_hippam['sbg_wihara']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Sambungan Sekolah</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="sbg_sekolah" name="sbg_sekolah" value="<?=$dat_hippam['sbg_sekolah']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Kran Umum</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="sbg_umum" name="sbg_umum" value="<?=$dat_hippam['sbg_umum']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label"><p class="text-left">2. Jumlah Jiwa Terlayani</p></label>
                                <div class="col-xs-2">
                                  <input type="text" class="form-control" id="terlayani" name="terlayani" value="<?=$dat_hippam['terlayani']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label"><p class="text-left">3. Jumlah Jiwa Belum Terlayani</p></label>
                                <div class="col-xs-2">
                                  <input type="text" class="form-control" id="belum_terlayani" name="belum_terlayani" value="<?=$dat_hippam['belum_terlayani']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label"><p class="text-left">4. Sistem Pembayaran yang Ditetapkan</p></label>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Tarif per m<sup>3</sup></label>
                                <div class="col-xs-3">
                                  <input type="text" class="form-control" id="tarif" name="tarif" value="<?=$dat_hippam['tarif']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Iuran Tetap/Bulan</label>
                                <div class="col-xs-3">
                                  <input type="text" class="form-control" id="iuran" name="iuran" value="<?=$dat_hippam['iuran']?>" data-bv-numeric>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                        <!-- akhir panel data pelayanan -->
                        <!-- mulai panel data potensi sumber daya air -->
                        <div class="panel panel-info">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#data_potensi_sda">
                                DATA POTENSI SUMBER DAYA AIR
                              </a>
                            </h4>
                          </div>
                          <div id="data_potensi_sda" class="panel-collapse collapse">
                            <div class="panel-body">
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Jumlah Sumber Mata Air</label>
                                <div class="col-xs-3">
                                  <input type="text" class="form-control" id="jml_sma" name="jml_sma" value="<?=$dat_hippam['jml_sma']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Total Debit Mata Air(Liter/Detik)</label>
                                <div class="col-xs-3">
                                  <input type="text" class="form-control" id="total_debit_sma" name="total_debit_sma" value="<?=$dat_hippam['total_debit_sma']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Jarak Terdekat  Sumber Mata Air ke Desa</label>
                                <div class="col-xs-2">
                                  <input type="text" class="form-control" id="jarak_sma" name="jarak_sma" value="<?=$dat_hippam['jarak_sma']?>">
                                </div>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        <!-- akhir panel data potensi sumber daya air -->
                        <!-- mulai panel data fasilitas sosial -->
                        <div class="panel panel-info">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#data_fasilitas_sosial">
                                DATA FASILITAS SOSIAL
                              </a>
                            </h4>
                          </div>
                          <div id="data_fasilitas_sosial" class="panel-collapse collapse">
                            <div class="panel-body">
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Jumlah Sekolah</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="jml_sekolah" name="jml_sekolah" value="<?=$dat_hippam['jml_sekolah']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Jumlah Tempat Ibadah</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="jml_t_ibadah" name="jml_t_ibadah" value="<?=$dat_hippam['jml_t_ibadah']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Jumlah Rumah Sakit/Puskesmas</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="jml_rs_puskesmas" name="jml_rs_puskesmas" value="<?=$dat_hippam['jml_rs_puskesmas']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Jumlah Kantor Pemerintah</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="jml_kantor_pemda" name="jml_kantor_pemda" value="<?=$dat_hippam['jml_kantor_pemda']?>" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-xs-3 control-label">Jumlah Fasilitas Sosial Lainnya</label>
                                <div class="col-xs-1">
                                  <input type="text" class="form-control" id="jml_fasos_lain" name="jml_fasos_lain" value="<?=$dat_hippam['jml_fasos_lain']?>" data-bv-numeric>
                                </div>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        <!-- akhir panel fasilitas sosial -->
                      </div>
                      <!-- akhir panel isian -->
                      <div class="form-group">
                          <div class="col-sm-5">
                            <div class="btn-group">
                              <?php $cst->create_back_button($page_id); ?>
                              <?php $cst->create_save_button($page_id); ?>
                              <?php $cst->create_delete_button($page_id); ?>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $dat_hippam['id']; ?>">
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- akhir data umum -->
                    <div class="tab-pane fade" id="data_wilayah">
                      <!-- mulai panel data pelayanan berdasarkan wilayah -->
                        <div class="panel panel-info">
                          <div class="panel-heading">
                            <h4 class="panel-title" id="desa_hippam">
                              <a data-toggle="collapse" data-parent="#accordion" href="#data_pel_ber_wil">
                                DATA KEPENDUDUKAN DAN PELAYANAN HIPPAM BERDASARKAN WILAYAH
                              </a>
                            </h4>
                          </div>
                          <div id="data_pel_ber_wil" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <div class="row" style="border-bottom: 1px solid #428bca;margin-bottom:15px;padding-bottom:15px;">
                                <!-- mulai desa bersangkutan -->
                                <form name="add_bersangkutan" id="add_bersangkutan" class="form-horizontal">
                                  <div class="col-sm-5">
                                    <div class="form-group">
                                      <label for="" class="col-sm-12 control-label"><p class="text-left">A. Desa Hippam Yang Bersangkutan</p></label>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="col-sm-6 control-label">Uraian</label>
                                      <div class="col-sm-6">
                                        <input type="text" class="form-control" name="uraian_bersangkutan[]" id="uraian_bersangkutan" placeholder="nama dusun">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="col-sm-6 control-label">Jumlah RW</label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="rw_bersangkutan[]" id="rw_bersangkutan" data-bv-numeric>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="col-sm-6 control-label">Jumlah RT</label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="rt_bersangkutan[]" id="rt_bersangkutan" data-bv-numeric>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="col-sm-6 control-label">Jumlah KK Terlayani</label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="terlayani_kk_bersangkutan[]" id="terlayani_kk_bersangkutan" data-bv-numeric>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="col-sm-6 control-label">Jumlah Jiwa Terlayani</label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="terlayani_jiwa_bersangkutan[]" id="terlayani_jiwa_bersangkutan" data-bv-numeric>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="col-sm-6 control-label">Jumlah KK Belum Terlayani</label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="belum_terlayani_kk_bersangkutan[]" id="belum_terlayani_kk_bersangkutan" data-bv-numeric>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="col-sm-6 control-label">Jumlah Jiwa Belum Terlayani</label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="belum_terlayani_jiwa_bersangkutan[]" id="belum_terlayani_jiwa_bersangkutan" data-bv-numeric>
                                      </div>
                                    </div>
                                    <div class="form-group" id="desa_sekitar">
                                      <div class="col-sm-offset-5 col-sm-6">
                                        <a href="#desa_hippam" id="add_data" class="btn btn-primary">Tambah Data Hippam Desa<i class="glyphicon glyphicon-send"></i></a>
                                      </div>
                                    </div>
                                  </div><!-- akhir kolom satu bersangkutan -->
                                </form>
                                <div class="col-sm-7">
                                  <div class="table-responsive">
                                    <div id="msg_bersangkutan" class="alert alert-info" style="border:0px;padding:0px;"></div>
                                    <table class="table table-condensed table-heading table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width="30%">Uraian</th>
                                                <th rowspan="2" width="10%">Jml RW</th>
                                                <th rowspan="2">Jml RT</th>
                                                <th colspan="2">Sudah Terlayani</th>
                                                <th colspan="2">Belum Terlayani</th>
                                                <th colspan="2">Act</th>
                                            </tr>
                                            <tr>
                                                <th>Jml KK</th>
                                                <th>Jml Jiwa</th>
                                                <th>Jml KK</th>
                                                <th>Jml Jiwa</th>
                                                <th>Edit</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody id='list_data_bersangkutan'>
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                  </div>
                                </div><!-- akhir desa bersangkutan -->
                              </div>
                              <div class="row">
                                <!-- mulai desa tidak bersangkutan -->
                                <form name="add_sekitar" id="add_sekitar" class="form-horizontal">
                                  <div class="col-sm-5">
                                    <div class="form-group">
                                      <label for="" class="col-sm-12 control-label"><p class="text-left">B. Desa Sekitar Yang Dilayani Hippam Bersangkutan</p></label>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="col-sm-6 control-label">Uraian</label>
                                      <div class="col-sm-6">
                                        <input type="text" class="form-control" name="uraian_sekitar" id="uraian_sekitar" placeholder="nama dusun">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="col-sm-6 control-label">Jumlah RW</label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="rw_sekitar" id="rw_sekitar" data-bv-numeric>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="col-sm-6 control-label">Jumlah RT</label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="rt_sekitar" id="rt_sekitar" data-bv-numeric>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="col-sm-6 control-label">Jumlah KK Terlayani</label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="terlayani_kk_sekitar" id="terlayani_kk_sekitar" data-bv-numeric>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="col-sm-6 control-label">Jumlah Jiwa Terlayani</label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="terlayani_jiwa_sekitar" id="terlayani_jiwa_sekitar" data-bv-numeric>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="col-sm-6 control-label">Jumlah KK Belum Terlayani</label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="belum_terlayani_kk_sekitar" id="belum_terlayani_kk_sekitar" data-bv-numeric>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="col-sm-6 control-label">Jumlah Jiwa Belum Terlayani</label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="belum_terlayani_jiwa_sekitar" id="belum_terlayani_jiwa_sekitar" data-bv-numeric>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-sm-offset-5 col-sm-6">
                                        <a href="#desa_sekitar" id="add_data_sekitar" class="btn btn-primary">Tambah Hippam Desa Sekitar <i class="glyphicon glyphicon-send"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </form><!-- akhir kolom satu tidak  bersangkutan -->
                                <div class="col-sm-7">
                                  <div class="table-responsive">
                                    <div id="msg_sekitar" class="alert alert-info" style="border:0px;padding:0px;"></div>
                                    <table class="table table-condensed table-heading table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width="30%">Uraian</th>
                                                <th rowspan="2" width="10%">Jml RW</th>
                                                <th rowspan="2">Jml RT</th>
                                                <th colspan="2">Sudah Terlayani</th>
                                                <th colspan="2">Belum Terlayani</th>
                                                <th colspan="2">Act</th>
                                            </tr>
                                            <tr>
                                                <th>Jml KK</th>
                                                <th>Jml Jiwa</th>
                                                <th>Jml KK</th>
                                                <th>Jml Jiwa</th>
                                                <th>Edit</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody id='list_data_sekitar'>
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                  </div>
                                </div><!-- akhir desa tidak bersangkutan -->
                              </div>     

                            </div>
                          </div>
                        </div>
                        <!-- akhir panel pelayanan berdasarkan wilayah -->
                    </div>
                  </div>
                  <!-- akhir tab pane -->    
                  
              </div>
              
          </div>
          <!-- END FORM TAMBAH DATA -->
      </div>
      <br>
      <?php include $doc_template.'footer.php';?>
      <?php include $doc_template.'bs_js.php';?>
      <?php include $doc_template.'bootstrapvalidator.php';?>
      <!-- pesan kalo gagal hapus hippam karena masih ada data hippam desa dan desa sekitar -->
      <div class="modal fade" id="msg-error-on-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Hapus Tidak Berhasil</h4>
            </div>
            <div class="modal-body">
              Masih Ada Data Desa yang Dilayani Oleh HIPPAM ini. Hapus Dulu Data Desa Hippam Tersebut!!!.
            </div>
          </div>
        </div>
      </div>
      <!-- akhir pesan -->
  </body>
</html>

<script type="text/javascript">
$(document).ready(function() {
    $('#addForm,#add_bersangkutan,#add_sekitar')
      .bootstrapValidator({
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          }
      })
      .on('click', '#add_data', function() {
            $("#add_bersangkutan").data('bootstrapValidator').resetForm(true);
      })
      .on('click', '#add_data_sekitar', function() {
            $("#add_sekitar").data('bootstrapValidator').resetForm(true);
      });
    //untuk menampilkan data desa in table
    show_data("list_data_bersangkutan");
    show_data("list_data_sekitar");

    <?php
      if (isset($_SESSION['error_delete']) AND $_SESSION['error_delete']==true) {
        echo "$('#msg-error-on-delete').modal({
                keyboard: false
              });";
        $_SESSION['error_delete']=false;
      };
    ?>
    $("#kecamatan_id,#desa_kode").select2();
    $('#perusahaan_id').focus();

    $("#nama").blur(function(){
        var judul_nama_hippam = $('#nama').val();
        var judul_nama_hippam = judul_nama_hippam.toUpperCase()
        $("#judul_nama_hippam").html(judul_nama_hippam);
    });
    //combo box
        $("#kecamatan_id").change(function(){
        var kecamatan_id = $("#kecamatan_id").val();
        var action = "desa";
          $.ajax({
            url: "hippam_proc.php",
            data: "kecamatan_id="+kecamatan_id+"&action="+action,
            success: function(data){
                $("#desa_kode").html(data);
            }
          });
        });
    //end combo box
    //mulai tambah data bersangkutan
    $('#add_data').click(function(){
        add_list_data("bersangkutan");
    });
    $('#add_data_sekitar').click(function(){
        add_list_data("sekitar");
    });
    
    
    function add_list_data(place){
        var hippam_id = "<?=$dat_hippam['id'];?>";
        var uraian = $('#uraian_'+place).val();
        var rw = $('#rw_'+place).val();
        var rt = $('#rt_'+place).val();
        var terlayani_kk = $('#terlayani_kk_'+place).val();
        var terlayani_jiwa = $('#terlayani_jiwa_'+place).val();
        var belum_terlayani_kk = $('#belum_terlayani_kk_'+place).val();
        var belum_terlayani_jiwa = $('#belum_terlayani_jiwa_'+place).val();
        var place = place;
        if(uraian!=''){
            var action = "tambah_desa_hippam";
            $.ajax({
            url: "hippam_proc.php",
            type:"POST",
            cache:false,
            data: "uraian="+uraian+"&rw="+rw+"&rt="+rt+"&terlayani_kk="+terlayani_kk+"&terlayani_jiwa="+terlayani_jiwa+"&belum_terlayani_kk="+belum_terlayani_kk+"&belum_terlayani_jiwa="+belum_terlayani_jiwa+"&action="+action+"&hippam_id="+hippam_id+"&place="+place,
            success: function(data){
                //$("#msg_"+place).html(data);
                show_data("list_data_"+place);
                $("#msg_"+place).html("Tambah Desa Terlayani Berhasil");
            }
          });

            $('#uraian_'+place).val('');
            $('#rw_'+place).val('');
            $('#rt_'+place).val('');
            $('#terlayani_kk_'+place).val('');
            $('#terlayani_jiwa_'+place).val('');
            $('#belum_terlayani_kk_'+place).val('');
            $('#belum_terlayani_jiwa_'+place).val('');
        }
    }

    //akhir tambah data
  
});

function remove_elemen(id,tabel){
    var action = "delete_hippam";
    var id = id;
    var tabel = tabel;
    $.ajax({
    url: "hippam_proc.php",
    type:"POST",
    cache:false,
    data: "id="+id+"&tabel="+tabel+"&action="+action,
    success: function(data){
        if (tabel=="hippam_desa") {
          var place = "bersangkutan";
        } else 
          var place = "sekitar";
        show_data("list_data_"+place);
        //$("#msg_"+place).html(data);
        $("#msg_"+place).html("Hapus Desa Berhasil");
    }
  });
}

/*mulai edit data hippam desa*/
  function edit_elemen(id,tabel){
    var hippam_id = "<?=$dat_hippam['id'];?>";
    var id = id;
    var tabel = tabel;
    var uraian = $('#uraian_'+hippam_id+id).val();
    var rw = $('#rw_'+hippam_id+id).val();
    var rt = $('#rt_'+hippam_id+id).val();
    var terlayani_kk = $('#terlayani_kk_'+hippam_id+id).val();
    var terlayani_jiwa = $('#terlayani_jiwa_'+hippam_id+id).val();
    var belum_terlayani_kk = $('#belum_terlayani_kk_'+hippam_id+id).val();
    var belum_terlayani_jiwa = $('#belum_terlayani_jiwa_'+hippam_id+id).val();
    if(uraian!=''){
        var action = "edit_desa_hippam";
        $.ajax({
        url: "hippam_proc.php",
        type:"POST",
        cache:false,
        data: "uraian="+uraian+"&rw="+rw+"&rt="+rt+"&terlayani_kk="+terlayani_kk+"&terlayani_jiwa="+terlayani_jiwa+"&belum_terlayani_kk="+belum_terlayani_kk+"&belum_terlayani_jiwa="+belum_terlayani_jiwa+"&action="+action+"&id="+id+"&tabel="+tabel,
        success: function(data){
          if (tabel=="hippam_desa") {
            var place = "bersangkutan";
          } else 
            var place = "sekitar";
            //$("#msg_"+place).html(data);
            show_data("list_data_"+place);
            $("#msg_"+place).html("Edit Desa Terlayani Berhasil");
        }
      });
    }
  }


/*akhir edit data hippam desa*/

function show_data(id){//alert(id);
  $("#"+id).load("hippam_proc.php", { hippam_id: "<?=$dat_hippam['id'];?>", place: id ,action:"show_data"} );
}
</script>