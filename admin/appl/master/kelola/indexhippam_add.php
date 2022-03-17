<?php include '../../../script_awal.php'; ?>
<?php
    include '../../../class/class_custom.php';
    $cst = new custom();
    include '../../../class/class_dropdown.php';
    $dropdown = new dropdown();
?>
<?php
    $page_id = $p_hippam;
    $page_name = 'hippam';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('templatefix.php'); ?>
    <?php include $doc_template.'bs_meta.php';?>   
    <?php include $doc_template.'bs_css.php';?>
      
  <section id="main-content">
    <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Tambah Hippam</h3>
    <div id="status">
        
      </div>
      <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
              <!-- START FORM TAMBAH DATA -->
                <script type="text/javascript">
                $(document).ready(function() { 
                    $("#addForms").submit(function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: '../hippam/hippam_proc.php',
                            type: 'post',
                            data: $(this).serialize(),             
                            success: function(data) {               
                            $('#status').html(data);
                            var elmnt = document.getElementById("main-content");
                            elmnt.scrollIntoView();  
                            }
                        });
                    });
                })
                </script>
                
                <form action="../hippam/hippam_proc.php" method="POST" name="addForm" id="addForm" class="well form-horizontal" enctype="multipart/form-data">
                  <!-- mulai panel isian-->
                  <div class="panel-group" id="accordion">
                    <!-- mulai panel data hippam -->
                    <div class="panel panel-info">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion"span href="#isian_data">
                            FORM ISIAN DATA <span id="judul_nama_hippam"></span>
                          </a>
                        </h4>
                      </div>
                      <div id="isian_data" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Kecamatan</label>
                            <div class="col-sm-2">
                              <?php
                                $sql_kecamatan = "SELECT * FROM kecamatan where id IN ('3510020','3510040','3510010') ORDER BY nama";
                                $attr = array('sql'=>$sql_kecamatan,'name'=>'kecamatan_id','id'=>'kecamatan_id','class'=>'form-control','data'=>'data-bv-notempty','option_all'=>true);
                                $dropdown->create($attr);
                              ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Desa</label>
                            <div class="col-sm-2">
                              <select name="desa_kode" id="desa_kode" class="form-control" data-bv-notempty>
                                <option value="">Pilih</option>
                              </select>
                            </div>
                          </div>                            
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-3">
                              <input type="text" name="nama" id="nama" class="form-control" data-bv-notempty>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-4">
                              <textarea name="alamat" rows="2" id="alamat" class="form-control"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">SK Penetapan</label>
                            <div class="col-sm-3">
                              <input type="text" name="no_sk" id="no_sk" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Yang Menetapkan</label>
                            <div class="col-sm-2">
                              <input type="text" name="menetapkan" id="menetapkan" class="form-control" value="Kepala Desa">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Jml Pengurus</label>
                            <div class="col-sm-1">
                              <input type="text" name="jml_pengurus" id="jml_pengurus" class="form-control" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Tahun Berdiri</label>
                            <div class="col-sm-2">
                              <input type="text" name="thn_berdiri" id="thn_berdiri" class="form-control" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Nama Ketua</label>
                            <div class="col-sm-3">
                              <input type="text" name="ketua_nama" id="ketua_nama" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-3">
                              <textarea name="ketua_alamat" rows="2" id="ketua_alamat" class="form-control"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">No. Telp / HP</label>
                            <div class="col-sm-2">
                              <input type="text" name="ketua_telp" id="ketua_telp" class="form-control" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-3">
                              <input type="text" name="ketua_email" id="ketua_email" class="form-control" data-bv-emailaddress>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="file" class="col-sm-2 control-label">Gambar</label>
                            <div class="col-sm-3">
                              <input type="file" name="gambar" id="file" class="form-control" accept="image/*">
                              <br>
                              <div class='col-md-12 alert alert-success text-center'>Pilih ukuran gambar 1920 x 1080</div>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="" class="col-sm-1 control-label">Latitude</label>
                            <div class="col-sm-5">
                              <input type="text" name="latitude" id="latitude" class="form-control" data-bv-notempty data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-1 control-label">Longitude</label>
                            <div class="col-sm-5">
                              <input type="text" name="longitude" id="longitude" class="form-control" data-bv-notempty data-bv-numeric>
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
                              <input type="text" class="form-control" id="ma_kap_sumber" name="ma_kap_sumber" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Kapasitas terpasang (Lt/det)</label>
                            <div class="col-xs-2">
                              <input type="text" class="form-control" id="ma_kap_terpasang" name="ma_kap_terpasang" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Bangunan Broncaptering</label>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-offset-1 col-xs-2 control-label">Jumlah</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="ma_broncap_jml" name="ma_broncap_jml" >
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-offset-1 col-xs-2 control-label">Ukuran</label>
                            <div class="col-xs-2">
                              <input type="text" class="form-control" id="ma_broncap_ukuran" name="ma_broncap_ukuran">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Bangunan Tandon</label>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-offset-1 col-xs-2 control-label">Jumlah</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="ma_tandon_jml" name="ma_tandon_jml">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-offset-1 col-xs-2 control-label">Ukuran</label>
                            <div class="col-xs-2">
                              <input type="text" class="form-control" id="ma_tandon_ukuran" name="ma_tandon_ukuran">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Tahun Pembangunan</label>
                            <div class="col-xs-2">
                              <input type="text" class="form-control" id="ma_thn_buat" name="ma_thn_buat" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Sumber Dana</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="ma_sumber_dana" name="ma_sumber_dana">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-2 control-label"><p class="text-left">2. Sumur Bor</p></label>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Kapasitas sumber air (Lt/det)</label>
                            <div class="col-xs-2">
                              <input type="text" class="form-control" id="sb_kap_sumber" name="sb_kap_sumber" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Kapasitas terpasang (Lt/det)</label>
                            <div class="col-xs-2">
                              <input type="text" class="form-control" id="sb_kap_terpasang" name="sb_kap_terpasang" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Bangunan Tandon</label>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-offset-1 col-xs-2 control-label">Jumlah</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="sb_tandon_jml" name="sb_tandon_jml">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-offset-1 col-xs-2 control-label">Ukuran</label>
                            <div class="col-xs-2">
                              <input type="text" class="form-control" id="sb_tandon_ukuran" name="sb_tandon_ukuran">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Sumber Tenaga Pompa (Genset)</label>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-offset-1 col-xs-2 control-label">Jumlah</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="sb_genset_jml" name="sb_genset_jml">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-offset-1 col-xs-2 control-label">Ukuran</label>
                            <div class="col-xs-2">
                              <input type="text" class="form-control" id="sb_genset_ukuran" name="sb_genset_ukuran">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Sumber Tenaga Pompa (PLN)</label>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-offset-1 col-xs-2 control-label">Jumlah</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="sb_pln_jml" name="sb_pln_jml">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-offset-1 col-xs-2 control-label">Ukuran</label>
                            <div class="col-xs-2">
                              <input type="text" class="form-control" id="sb_pln_ukuran" name="sb_pln_ukuran">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Jumlah Panel Pompa</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="sb_jml_panel_pompa" name="sb_jml_panel_pompa">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Tahun Pembangunan</label>
                            <div class="col-xs-2">
                              <input type="text" class="form-control" id="sb_thn_buat" name="sb_thn_buat" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Sumber Dana</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="sb_sumber_dana" name="sb_sumber_dana">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label"><p class="text-left">3. Kapasitas Produksi Total (Liter/Detik)</p></label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="kap_produksi" name="kap_produksi" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label"><p class="text-left">4. Jumlah Air yang Didistribusikan Perhari(M<sup>3</sup>)</p></label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="jml_air" name="jml_air" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label"><p class="text-left">5. Sistem Pengaliran/Pelayanan</label>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Sumber Air ke Reservoar</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="sistem_reservoir" name="sistem_reservoir">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Reservoar ke Pelanggan</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="sistem_pelanggan" name="sistem_pelanggan">
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
                                <input type="text" class="form-control" id="pipa_gl_6" name="pipa_gl_6" data-bv-numeric>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-xs-3 control-label">Pipa Gl &Oslash; 4" (m)</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="pipa_gl_4" name="pipa_gl_4" data-bv-numeric>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-xs-3 control-label">Pipa Gl &Oslash; 3" (m)</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="pipa_gl_3" name="pipa_gl_3" data-bv-numeric>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-xs-3 control-label">Pipa Gl &Oslash; 2" (m)</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="pipa_gl_2" name="pipa_gl_2" data-bv-numeric>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-xs-3 control-label">Pipa Gl &Oslash; 1,5" (m)</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="pipa_gl_15" name="pipa_gl_15" data-bv-numeric>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-xs-3 control-label">Pipa Gl &Oslash; 1" (m)</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="pipa_gl_1" name="pipa_gl_1" data-bv-numeric>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-xs-3 control-label">Pipa Gl &Oslash; 3/4" (m)</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="pipa_gl_34" name="pipa_gl_34" data-bv-numeric>
                              </div>
                            </div>
                          </div><!-- abis col pertama -->
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="" class="col-xs-4 control-label">Pipa PVC &Oslash; 6" (m)</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="pipa_pvc_6" name="pipa_pvc_6" data-bv-numeric>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-xs-4 control-label">Pipa PVC &Oslash; 4" (m)</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="pipa_pvc_4" name="pipa_pvc_4" data-bv-numeric>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-xs-4 control-label">Pipa PVC &Oslash; 3" (m)</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="pipa_pvc_3" name="pipa_pvc_3" data-bv-numeric>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-xs-4 control-label">Pipa PVC &Oslash; 2" (m)</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="pipa_pvc_2" name="pipa_pvc_2" data-bv-numeric>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-xs-4 control-label">Pipa PVC &Oslash; 1,5" (m)</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="pipa_pvc_15" name="pipa_pvc_15" data-bv-numeric>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-xs-4 control-label">Pipa PVC &Oslash; 1" (m)</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="pipa_pvc_1" name="pipa_pvc_1" data-bv-numeric>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-xs-4 control-label">Pipa PVC &Oslash; 3/4" (m)</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="pipa_pvc_34" name="pipa_pvc_34" data-bv-numeric>
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
                              <input type="text" class="form-control" id="sbg_rumah" name="sbg_rumah" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Sambungan Masjid</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="sbg_masjid" name="sbg_masjid" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Sambungan Gereja</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="sbg_gereja" name="sbg_gereja" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Sambungan Pura</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="sbg_pura" name="sbg_pura" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Sambungan Wihara</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="sbg_wihara" name="sbg_wihara" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Sambungan Sekolah</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="sbg_sekolah" name="sbg_sekolah" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Kran Umum</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="sbg_umum" name="sbg_umum" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label"><p class="text-left">2. Jumlah Jiwa Terlayani</p></label>
                            <div class="col-xs-2">
                              <input type="text" class="form-control" id="terlayani" name="terlayani" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label"><p class="text-left">3. Jumlah Jiwa Belum Terlayani</p></label>
                            <div class="col-xs-2">
                              <input type="text" class="form-control" id="belum_terlayani" name="belum_terlayani" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label"><p class="text-left">4. Sistem Pembayaran yang Ditetapkan</p></label>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Tarif per m<sup>3</sup></label>
                            <div class="col-xs-3">
                              <input type="text" class="form-control" id="tarif" name="tarif" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Iuran Tetap/Bulan</label>
                            <div class="col-xs-3">
                              <input type="text" class="form-control" id="iuran" name="iuran" data-bv-numeric>
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
                              <input type="text" class="form-control" id="jml_sma" name="jml_sma" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Total Debit Mata Air(Liter/Detik)</label>
                            <div class="col-xs-3">
                              <input type="text" class="form-control" id="total_debit_sma" name="total_debit_sma" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Jarak Terdekat  Sumber Mata Air ke Desa</label>
                            <div class="col-xs-2">
                              <input type="text" class="form-control" id="jarak_sma" name="jarak_sma">
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
                              <input type="text" class="form-control" id="jml_sekolah" name="jml_sekolah" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Jumlah Tempat Ibadah</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="jml_t_ibadah" name="jml_t_ibadah" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Jumlah Rumah Sakit/Puskesmas</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="jml_rs_puskesmas" name="jml_rs_puskesmas" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Jumlah Kantor Pemerintah</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="jml_kantor_pemda" name="jml_kantor_pemda" data-bv-numeric>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-xs-3 control-label">Jumlah Fasilitas Sosial Lainnya</label>
                            <div class="col-xs-1">
                              <input type="text" class="form-control" id="jml_fasos_lain" name="jml_fasos_lain" data-bv-numeric>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <!-- akhir panel fasilitas sosial -->
                    <!-- mulai panel data pelayanan berdasarkan wilayah -->
                    <div class="panel panel-info">
                      <div class="panel-heading">
                        <h4 class="panel-title" id="desa_hippam">
                          <a data-toggle="collapse" data-parent="#accordion" href="#data_pel_ber_wil">
                            DATA KEPENDUDUKAN DAN PELAYANAN HIPPAM BERDASARKAN WILAYAH
                          </a>
                        </h4>
                      </div>
                      <div id="data_pel_ber_wil" class="panel-collapse collapse ">
                        <div class="panel-body">
                          <div class="row" style="border-bottom: 1px solid #428bca;margin-bottom:15px;padding-bottom:15px;">
                            <!-- mulai desa bersangkutan -->
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="" class="col-sm-12 control-label"><p class="text-left">A. Desa Hippam Yang Bersangkutan</p></label>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-5 control-label">Uraian</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="uraian_bersangkutan[]" id="uraian_bersangkutan" placeholder="nama dusun">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-5 control-label">Jumlah RW</label>
                                <div class="col-sm-2">
                                  <input type="text" class="form-control" name="rw_bersangkutan[]" id="rw_bersangkutan" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-5 control-label">Jumlah RT</label>
                                <div class="col-sm-2">
                                  <input type="text" class="form-control" name="rt_bersangkutan[]" id="rt_bersangkutan" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-5 control-label">Jumlah KK Terlayani</label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control" name="terlayani_kk_bersangkutan[]" id="terlayani_kk_bersangkutan" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-5 control-label">Jumlah Jiwa Terlayani</label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control" name="terlayani_jiwa_bersangkutan[]" id="terlayani_jiwa_bersangkutan" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-5 control-label">Jumlah KK Belum Terlayani</label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control" name="belum_terlayani_kk_bersangkutan[]" id="belum_terlayani_kk_bersangkutan" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-5 control-label">Jumlah Jiwa Belum Terlayani</label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control" name="belum_terlayani_jiwa_bersangkutan[]" id="belum_terlayani_jiwa_bersangkutan" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group" id="desa_sekitar">
                                <div class="col-sm-offset-5 col-sm-5">
                                  <a href="#desa_hippam" id="add_data" class="btn btn-primary">Tambahkan Ke Daftar <i class="glyphicon glyphicon-send"></i></a>
                                </div>
                              </div>
                            </div><!-- akhir kolom satu bersangkutan -->
                            <div class="col-sm-6">
                              <div class="table-responsive">
                                <table class="table table-condensed table-heading table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" width="30%">Uraian</th>
                                            <th rowspan="2" width="10%">Jml RW</th>
                                            <th rowspan="2">Jml RT</th>
                                            <th colspan=2"">Sudah Terlayani</th>
                                            <th colspan=2"">Belum Terlayani</th>
                                            <th rowspan="2">Hapus</th>
                                        </tr>
                                        <tr>
                                            <th>Jml KK</th>
                                            <th>Jml Jiwa</th>
                                            <th>Jml KK</th>
                                            <th>Jml Jiwa</th>
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
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="" class="col-sm-12 control-label"><p class="text-left">B. Desa Sekitar Yang Dilayani Hippam Bersangkutan</p></label>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-5 control-label">Uraian</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="uraian_sekitar" id="uraian_sekitar" placeholder="nama dusun">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-5 control-label">Jumlah RW</label>
                                <div class="col-sm-2">
                                  <input type="text" class="form-control" name="rw_sekitar" id="rw_sekitar" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-5 control-label">Jumlah RT</label>
                                <div class="col-sm-2">
                                  <input type="text" class="form-control" name="rt_sekitar" id="rt_sekitar" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-5 control-label">Jumlah KK Terlayani</label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control" name="terlayani_kk_sekitar" id="terlayani_kk_sekitar" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-5 control-label">Jumlah Jiwa Terlayani</label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control" name="terlayani_jiwa_sekitar" id="terlayani_jiwa_sekitar" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-5 control-label">Jumlah KK Belum Terlayani</label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control" name="belum_terlayani_kk_sekitar" id="belum_terlayani_kk_sekitar" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-5 control-label">Jumlah Jiwa Belum Terlayani</label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control" name="belum_terlayani_jiwa_sekitar" id="belum_terlayani_jiwa_sekitar" data-bv-numeric>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-offset-5 col-sm-5">
                                  <a href="#desa_sekitar" id="add_data_sekitar" class="btn btn-primary">Tambahkan Ke Daftar <i class="glyphicon glyphicon-send"></i></a>
                                </div>
                              </div>

                            </div><!-- akhir kolom satu tidak  bersangkutan -->
                            <div class="col-sm-6">
                              <div class="table-responsive">
                                <table class="table table-condensed table-heading table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" width="30%">Uraian</th>
                                            <th rowspan="2" width="10%">Jml RW</th>
                                            <th rowspan="2">Jml RT</th>
                                            <th colspan=2"">Sudah Terlayani</th>
                                            <th colspan=2"">Belum Terlayani</th>
                                            <th rowspan="2">Hapus</th>
                                        </tr>
                                        <tr>
                                            <th>Jml KK</th>
                                            <th>Jml Jiwa</th>
                                            <th>Jml KK</th>
                                            <th>Jml Jiwa</th>
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
                  <!-- akhir panel isian -->
                  
                  <div class="form-group">
                    <div class="col-sm-5">
                      <div class="btn-group">
                        <?php $cst->create_back_button($page_id); ?>
                        <?php $cst->create_save_add_button($page_id); ?>
                      </div>
                    </div>
                  </div>
                </form>
              <!-- END FORM TAMBAH DATA -->
        </div>
      </div>
      </div>
    </section>
  </section>

<?php include $doc_template.'bs_js.php';?>
<?php include $doc_template.'bootstrapvalidator.php';?>

<script type="text/javascript">
$(document).ready(function() {
    $('#addForm')
      .bootstrapValidator({
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          }
      });

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
            url: "../hippam/hippam_proc.php",
            data: "kecamatan_id="+kecamatan_id+"&action="+action,
            success: function(data){
                $("#desa_kode").html(data);
            }
          });
        });
    //end combo box
    //mulai pindah data bersangkutan
    $('#add_data').click(function(){
        add_list_data();
    });
    
    function random_id(){
        var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
        var string_length = 8;
        var id_elm = '<?php echo date('ymdHis');?>';
        for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                id_elm += chars.substring(rnum,rnum+1);
        }
        return id_elm;
    }
    
    function add_list_data(){
        var id_elm = random_id();
        var uraian_bersangkutan = $('#uraian_bersangkutan').val();
        var rw_bersangkutan = $('#rw_bersangkutan').val();
        var rt_bersangkutan = $('#rt_bersangkutan').val();
        var terlayani_kk_bersangkutan = $('#terlayani_kk_bersangkutan').val();
        var terlayani_jiwa_bersangkutan = $('#terlayani_jiwa_bersangkutan').val();
        var belum_terlayani_kk_bersangkutan = $('#belum_terlayani_kk_bersangkutan').val();
        var belum_terlayani_jiwa_bersangkutan = $('#belum_terlayani_jiwa_bersangkutan').val();
        if(uraian_bersangkutan!=''){
            $('#list_data_bersangkutan').append("<tr id='"+id_elm+"'><td><input type='text' name='uraian_bersangkutan[]' id='uraian_bersangkutan_"+id_elm+"' value='"+uraian_bersangkutan+"' class='form-control' readonly='1'></td><td nowrap='1'><input type='text' name='rw_bersangkutan[]' id='rw_bersangkutan_"+id_elm+"' value='"+rw_bersangkutan+"' class='form-control' readonly='1'></td><td nowrap='1'><input type='text' name='rt_bersangkutan[]' id='rt_bersangkutan_"+id_elm+"' value='"+rt_bersangkutan+"' class='form-control' readonly='1'></td><td nowrap='1'><input type='text' name='terlayani_kk_bersangkutan[]' id='terlayani_kk_bersangkutan_"+id_elm+"' value='"+terlayani_kk_bersangkutan+"' class='form-control' readonly='1'></td><td nowrap='1'><input type='text' name='terlayani_jiwa_bersangkutan[]' id='terlayani_jiwa_bersangkutan_"+id_elm+"' value='"+terlayani_jiwa_bersangkutan+"' class='form-control' readonly='1'></td><td nowrap='1'><input type='text' name='belum_terlayani_kk_bersangkutan[]' id='belum_terlayani_kk_bersangkutan_"+id_elm+"' value='"+belum_terlayani_kk_bersangkutan+"' class='form-control' readonly='1'></td><td nowrap='1'><input type='text' name='belum_terlayani_jiwa_bersangkutan[]' id='belum_terlayani_jiwa_bersangkutan_"+id_elm+"' value='"+belum_terlayani_jiwa_bersangkutan+"' class='form-control' readonly='1'></td><td><a href='#desa_hippam' onclick='remove_elemen(\"#"+id_elm+"\",\"#sub_total_"+id_elm+"\")' title='Hapus' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-remove'></i></a></td></tr>");
            $('#uraian_bersangkutan').val('');
            $('#rw_bersangkutan').val('');
            $('#rt_bersangkutan').val('');
            $('#terlayani_kk_bersangkutan').val('');
            $('#terlayani_jiwa_bersangkutan').val('');
            $('#belum_terlayani_kk_bersangkutan').val('');
            $('#belum_terlayani_jiwa_bersangkutan').val('');
            $('#loading').html('');
        }
    }

    //akhir pindah data bersangkutan
    //mulai pindah data sekitar
    $('#add_data_sekitar').click(function(){
        add_list_data_sekitar();
    });
    
    function random_id(){
        var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
        var string_length = 8;
        var id_elm = '<?php echo date('ymdHis');?>';
        for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                id_elm += chars.substring(rnum,rnum+1);
        }
        return id_elm;
    }
    
    function add_list_data_sekitar(){
        var id_elm = random_id();
        var uraian_sekitar = $('#uraian_sekitar').val();
        var rw_sekitar = $('#rw_sekitar').val();
        var rt_sekitar = $('#rt_sekitar').val();
        var terlayani_kk_sekitar = $('#terlayani_kk_sekitar').val();
        var terlayani_jiwa_sekitar = $('#terlayani_jiwa_sekitar').val();
        var belum_terlayani_kk_sekitar = $('#belum_terlayani_kk_sekitar').val();
        var belum_terlayani_jiwa_sekitar = $('#belum_terlayani_jiwa_sekitar').val();
        if(uraian_sekitar!=''){
            $('#list_data_sekitar').append("<tr id='"+id_elm+"'><td><input type='text' name='uraian_sekitar[]' id='uraian_sekitar_"+id_elm+"' value='"+uraian_sekitar+"' class='form-control' readonly='1'></td><td nowrap='1'><input type='text' name='rw_sekitar[]' id='rw_sekitar_"+id_elm+"' value='"+rw_sekitar+"' class='form-control' readonly='1'></td><td nowrap='1'><input type='text' name='rt_sekitar[]' id='rt_sekitar_"+id_elm+"' value='"+rt_sekitar+"' class='form-control' readonly='1'></td><td nowrap='1'><input type='text' name='terlayani_kk_sekitar[]' id='terlayani_kk_sekitar_"+id_elm+"' value='"+terlayani_kk_sekitar+"' class='form-control' readonly='1'></td><td nowrap='1'><input type='text' name='terlayani_jiwa_sekitar[]' id='terlayani_jiwa_sekitar_"+id_elm+"' value='"+terlayani_jiwa_sekitar+"' class='form-control' readonly='1'></td><td nowrap='1'><input type='text' name='belum_terlayani_kk_sekitar[]' id='belum_terlayani_kk_sekitar_"+id_elm+"' value='"+belum_terlayani_kk_sekitar+"' class='form-control' readonly='1'></td><td nowrap='1'><input type='text' name='belum_terlayani_jiwa_sekitar[]' id='belum_terlayani_jiwa_sekitar_"+id_elm+"' value='"+belum_terlayani_jiwa_sekitar+"' class='form-control' readonly='1'></td><td><a href='#desa_sekitar' onclick='remove_elemen(\"#"+id_elm+"\",\"#sub_total_"+id_elm+"\")' title='Hapus' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-remove'></i></a></td></tr>");
            $('#uraian_sekitar').val('');
            $('#rw_sekitar').val('');
            $('#rt_sekitar').val('');
            $('#terlayani_kk_sekitar').val('');
            $('#terlayani_jiwa_sekitar').val('');
            $('#belum_terlayani_kk_sekitar').val('');
            $('#belum_terlayani_jiwa_sekitar').val('');
            $('#loading').html('');
        }
    }

    //akhir pindah data bersangkutan
});

function remove_elemen(id,id_jumlah){
    $(id).remove();
}

</script>
