<!DOCTYPE html>
<html lang="en">
<head>
<?php include('config.php');?>
<?php include('template/head.php');?>
<?php 
  include($doc_root_class.'class_custom.php');
  $cst = new custom;
?>
<?php
    $id = $_GET['id'];
    $sql = "SELECT * 
            FROM hippam 
            WHERE id='$id'";
    $dat = $db->datasql($sql);
?>
<style>
    #content_left{
        position: absolute;
        left: 0px;
        width: 60%;
        margin-left: 120px;
    }
    #content_center{
        position: absolute;
        left: 450px;
        width: 70%;
        margin-left: 0px;
    }
    #content_right{
        position: absolute;
        left: 500px;
        width: 80%;
        margin-left: 0px;
        margin-right: 0px;
        text-align: right;
    }
</style>
</head>
<body>

    <!-- Services Section -->
    <section id="data-hippam">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center well well-">
                    <h2 class="section-heading"><div class="logo"><img src="<?=$base_url?>/assets/img/logo.png" class="img-responsive"/></div><div><?=ucwords($aplikasi)?></div><div><?=ucwords($tempat)?></div></h2>
                </div>
                <div class="col-md-12">
                    <ul class="nav nav-tabs" role="tablist">
                      <li ><a href="<?=$base_url?>">Home</a></li>
                      <li ><a onclick='history.go(-1)'>Kembali</a></li>
                    </ul>
                </div>                
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="well well-sm">
                        <div class="box">
                        <h4 class='section-subheading'><?= $dat['nama'];?></h4>
                            <table class="table text-left table-condensed">
                                <tr>
                                    <td>Nama Pengelola</td>
                                    <td>: </td><td><?= $dat['nama']?></td>
                                </tr>
                                <tr>
                                    <td>Bentuk Usaha</td>
                                    <td>: </td><td>HIPPAM</td>
                                </tr>
                                <tr>
                                    <td>Alamat Lengkap</td>
                                    <td>: </td><td><?= $dat['alamat'];?></td>
                                </tr>
                                <tr>
                                    <td>SK Penetapan</td>
                                    <td>: </td><td><?= $dat['no_sk'];?></td>
                                </tr>
                                <tr>
                                    <td>Yang Menetapkan</td>
                                    <td>: </td><td><?= $dat['menetapkan'];?></td>
                                </tr>
                                <tr>
                                    <td>Jml Pengurus</td>
                                    <td>: </td><td><?= $dat['jml_pengurus'];?> orang</td>
                                </tr>
                                <tr>
                                    <td>Tahun Berdiri</td>
                                    <td>: </td><td><?= $dat['thn_berdiri'];?></td>
                                </tr>
                                <tr>
                                    <td><b>KETUA</b></td>
                                    <td></td><td></td>
                                </tr>
                                <tr>
                                    <td>Nama Ketua</td>
                                    <td>: </td><td><?= $dat['ketua_nama'];?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td><td><?= $dat['ketua_alamat'];?></td>
                                </tr>
                                <tr>
                                    <td>No.Telp/HP</td>
                                    <td>: </td><td><?= $dat['ketua_telp'];?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>: </td><td><?= $dat['ketua_email'];?></td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="well text-left well-sm">
                        <div class="">
                            <div class="panel-group" id="accordion">
                                <!-- start panel data teknis -->
                                <div class="panel panel-gis">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#data_teknis">
                                          DATA TEKNIS
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="data_teknis" class="panel-collapse collapse">
                                      <div class="panel-body">
                                        <ol type='1'>
                                            <li>Mata Air</li>
                                                <ol type='a'>
                                                    <div class="col-xs-8"><li>Kapasitas sumber air </li></div><div class="col-xs-4">: <?= $dat['ma_kap_sumber']?> Lt/det</div>
                                                    <div class="col-xs-8"><li>Kapasitas terpasang </li></div><div class="col-xs-4">: <?= $dat['ma_kap_terpasang']?> Lt/det</div>
                                                    <div class="col-xs-12"><li>Bangunan broncaptering</li></div>
                                                        <ol type='1'>
                                                            <div class="col-xs-offset-4 col-xs-4"><li>Jumlah</li></div><div class="col-xs-4 padding-rata">: <?= $dat['ma_broncap_jml'];?></div>
                                                            <div class="col-xs-offset-4 col-xs-4"><li>Ukuran</li></div><div class="col-xs-4 padding-rata">: <?= $dat['ma_broncap_ukuran'];?></div>
                                                        </ol>
                                                    
                                                    <div class="col-xs-12"><li>Bangunan tandon</li></div>
                                                        <ol type='1'>
                                                            <div class="col-xs-offset-4 col-xs-4"><li>Jumlah</li></div><div class="col-xs-4 padding-rata">: <?= $dat['ma_tandon_jml'];?></div>
                                                            <div class="col-xs-offset-4 col-xs-4"><li>Ukuran</li></div><div class="col-xs-4 padding-rata">: <?= $dat['ma_tandon_ukuran'];?></div>
                                                        </ol>
                                                    <div class="col-xs-8"><li>Tahun pembangunan </li></div><div class="col-xs-4">: <?= $dat['ma_thn_buat'];?></div>
                                                    <div class="col-xs-8"><li>Sumber dana </li></div><div class="col-xs-4">: <?= $dat['ma_sumber_dana'];?></div>
                                                </ol>
                                            <div class="col-xs-12"><li>Sumur Bor</li></div>
                                                <ol type='a'>
                                                    <div class="col-xs-8"><li>Kapasitas sumber air (Lt/det) </li></div><div class="col-xs-4">: <?= $dat['sb_kap_sumber'];?></div>
                                                    <div class="col-xs-8"><li>Kapasitas terpasang (Lt/det) </li></div><div class="col-xs-4">: <?= $dat['sb_kap_terpasang'];?></div>
                                                    <div class="col-xs-12"><li>Bangunan tandon</li></div>
                                                        <ol type='1'>
                                                            <div class="col-xs-offset-4 col-xs-4"><li>Jumlah</li></div><div class="col-xs-4 padding-rata">: <?= $dat['sb_tandon_jml'];?></div>
                                                            <div class="col-xs-offset-4 col-xs-4"><li>Ukuran</li></div><div class="col-xs-4 padding-rata">: <?= $dat['sb_tandon_ukuran'];?></div>
                                                        </ol>
                                                    <div class="col-xs-12"><li>Sumber tenaga pompa</li></div>
                                                        
                                                            <div class="col-xs-11">1. Genset</div>
                                                            <ol type='1'>
                                                                <div class="col-xs-offset-4 col-xs-4"><li>Jumlah</li></div><div class="col-xs-4 padding-rata">: <?= $dat['sb_genset_jml'];?></div>
                                                                <div class="col-xs-offset-4 col-xs-4"><li>Ukuran</li></div><div class="col-xs-4 padding-rata">: <?= $dat['sb_genset_ukuran'];?></div>
                                                            </ol>
                                                            <div class="col-xs-11">2. PLN</div>
                                                            <ol type='1'>
                                                                <div class="col-xs-offset-4 col-xs-4"><li>Jumlah</li></div><div class="col-xs-4 padding-rata">: <?= $dat['sb_pln_jml'];?></div>
                                                                <div class="col-xs-offset-4 col-xs-4"><li>Ukuran</li></div><div class="col-xs-4 padding-rata">: <?= $dat['sb_pln_ukuran'];?></div>
                                                            </ol>
                                                        
                                                    <div class="col-xs-8"><li>Jumlah panel pompa </li></div><div class="col-xs-4">: <?= $dat['sb_jml_panel_pompa'];?></div>
                                                    <div class="col-xs-8"><li>Tahun pembangunan </li></div><div class="col-xs-4">: <?= $dat['sb_thn_buat'];?></div>
                                                    <div class="col-xs-8"><li>Sumber dana </li></div><div class="col-xs-4">: <?= $dat['sb_sumber_dana'];?></div>
                                                </ol>

                                            <div class="col-xs-8"><li>Kapasitas Produksi Total (liter/detik) </li></div><div class="col-xs-3 padding-tambah">: <?= $dat['kap_produksi'];?></div>
                                            <div class="col-xs-8"><li>Jumlah air yang didistribusikan perhari (M3) </li></div><div class="col-xs-3 padding-tambah">: <?= $dat['jml_air'];?></div>
                                            <div class="col-xs-12"><li>Sistem pengaliran/pelayanan</li></div>
                                                <ol type="a">
                                                    <div class="col-xs-8"><li>Sumber air ke reservoar </li></div><div class="col-xs-4">: <?= $dat['sistem_reservoir'];?></div>
                                                    <div class="col-xs-8"><li>Produksi/reservoar ke pelanggan </li></div><div class="col-xs-4">: <?= $dat['sistem_pelanggan'];?></div>
                                                </ol>
                                            <div class="col-xs-12"><li>Sarana Tranmisi/Distribusi</li></div>
                                                <ol type="a">
                                                    <div class="col-sm-6">
                                                        <div class="col-xs-8"><li>Pipa Gl &Oslash; 6" (m)</li></div><div class="col-xs-4">: </div>
                                                        <div class="col-xs-8">Pipa Gl &Oslash; 4" (m)</div><div class="col-xs-4">: </div>
                                                        <div class="col-xs-8">Pipa Gl &Oslash; 3" (m)</div><div class="col-xs-4">: </div>
                                                        <div class="col-xs-8">Pipa Gl &Oslash; 2" (m)</div><div class="col-xs-4">: </div>
                                                        <div class="col-xs-8">Pipa Gl &Oslash; 1,5" (m)</div><div class="col-xs-4">: </div>
                                                        <div class="col-xs-8">Pipa Gl &Oslash; 1" (m)</div><div class="col-xs-4">: </div>
                                                        <div class="col-xs-8">Pipa Gl &Oslash; 3/4" (m)</div><div class="col-xs-4">: </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="col-xs-9"><li>Pipa PVC &Oslash; 6" (m)</li></div><div class="col-xs-3">: </div>
                                                        <div class="col-xs-9">Pipa PVC &Oslash; 4" (m)</div><div class="col-xs-3">: </div>
                                                        <div class="col-xs-9">Pipa PVC &Oslash; 3" (m)</div><div class="col-xs-3">: </div>
                                                        <div class="col-xs-9">Pipa PVC &Oslash; 2" (m)</div><div class="col-xs-3">: </div>
                                                        <div class="col-xs-9">Pipa PVC &Oslash; 1,5" (m)</div><div class="col-xs-3">: </div>
                                                        <div class="col-xs-9">Pipa PVC &Oslash; 1" (m)</div><div class="col-xs-3">: </div>
                                                        <div class="col-xs-9">Pipa PVC &Oslash; 3/4" (m)</div><div class="col-xs-3">: </div>
                                                    </div>
                                                </ol>
                                        </ol>
                                      </div>
                                    </div>
                                </div>
                                <!-- end panel data teknis -->
                                <!-- start panel data pelayanan -->
                                <div class="panel panel-gis">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#data_pelayanan">
                                          DATA PELAYANAN
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="data_pelayanan" class="panel-collapse collapse">
                                      <div class="panel-body">
                                        <ol type="1">
                                            <li>Jumlah Sambungan/Pelanggan
                                                <ol type="a">
                                                    <div class="col-xs-7"><li>Sambungan Rumah (SR) </li></div><div class="col-xs-4">: <?= $dat['sbg_rumah'];?></div>
                                                    <div class="col-xs-12"><li>Sambungan Sosial :</li></div>
                                                        <ul type="square">
                                                            <div class="col-xs-7"><li>Sambungan Masjid/Musholla </li></div><div class="col-xs-4 padding-rata2">: <?= $dat['sbg_masjid'];?></div>
                                                            <div class="col-xs-7"><li>Sambungan Gereja </li></div><div class="col-xs-4 padding-rata2">: <?= $dat['sbg_gereja'];?></div>
                                                            <div class="col-xs-7"><li>Sambungan Pura </li></div><div class="col-xs-4 padding-rata2">: <?= $dat['sbg_pura'];?></div>
                                                            <div class="col-xs-7"><li>Sambungan Wihara </li></div><div class="col-xs-4 padding-rata2">: <?= $dat['sbg_wihara'];?></div>
                                                            <div class="col-xs-7"><li>Sambungan Sekolah </li></div><div class="col-xs-4 padding-rata2">: <?= $dat['sbg_sekolah'];?></div>
                                                        </ul>
                                                    <div class="col-xs-7"><li>Kran Umum </li></div><div class="col-xs-4">: <?= $dat['sbg_umum'];?></div>
                                                </ol>
                                            </li>
                                            <div class="col-xs-7"><li>Jumlah Jiwa Terlayani </li></div><div class="col-xs-3 padding-tambah2">: <?= $dat['terlayani'];?></div>
                                            <div class="col-xs-7"><li>Jumlah Jiwa Belum Terlayani </li></div><div class="col-xs-3 padding-tambah2">: <?= $dat['belum_terlayani'];?></div>
                                            <div class="col-xs-12"><li>Sistem Pembayaran yang Ditetapkan</li></div>
                                                <ol type="a">
                                                    <div class="col-xs-7"><li>Tarif Per M<sup>3</sup> </li></div><div class="col-xs-4">: <?= $dat['tarif'];?></div>
                                                    <div class="col-xs-7"><li>Iuran Tetap/Bulan </li></div><div class="col-xs-4">: <?= $dat['iuran'];?></div>
                                                </ol>
                                        </ol>
                                      </div>
                                    </div>
                                </div>
                                <!-- end panel data pelayanan -->
                                <!-- start panel data potensi SDA -->
                                <div class="panel panel-gis">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#data_potensi_sda">
                                          DATA POTENSI SUMBER DAYA AIR
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="data_potensi_sda" class="panel-collapse collapse">
                                      <div class="panel-body">
                                        <ol type="1">
                                            <div class="col-xs-7"><li>Jumlah Sumber Mata Air </li></div><div class="col-xs-4">: <?= $dat['jml_sma'];?></div>
                                            <div class="col-xs-7"><li>Total Debit Mata Air (Liter/Detik) </li></div><div class="col-xs-4">: <?= $dat['total_debit_sma'];?></div>
                                            <div class="col-xs-7"><li>Jarak Terdekat Sumber Mata Air ke Desa </li></div><div class="col-xs-4">: <?= $dat['jarak_sma'];?></div>
                                        </ol>
                                      </div>
                                    </div>
                                </div>
                                <!-- end panel data potensi SDA -->
                                <!-- start panel data fasilitas sosial -->
                                <div class="panel panel-gis">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#data_fasilitas_sos">
                                          DATA FASILITAS SOSIAL
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="data_fasilitas_sos" class="panel-collapse collapse">
                                      <div class="panel-body">
                                        <ol type="1">
                                            <div class="col-xs-7"><li>Jumlah Sekolah </li></div><div class="col-xs-4">: <?= $dat['jml_sekolah'];?></div>
                                            <div class="col-xs-7"><li>Jumlah Tempat Ibadah </li></div><div class="col-xs-4">: <?= $dat['jml_t_ibadah'];?></div>
                                            <div class="col-xs-7"><li>Jumlah Rumah Sakit / Puskesmas </li></div><div class="col-xs-4">: <?= $dat['jml_rs_puskesmas'];?></div>
                                            <div class="col-xs-7"><li>Jumlah Kantor Pemerintah </li></div><div class="col-xs-4">: <?= $dat['jml_kantor_pemda'];?></div>
                                            <div class="col-xs-7"><li>Jumlah Fasilitas Sosial Lainnya </li></div><div class="col-xs-4">: <?= $dat['jml_fasos_lain'];?></div>
                                        </ol>
                                      </div>
                                    </div>
                                </div>
                                <!-- end panel data fasilitas sosial -->
                                <!-- start panel data kependudukan berdasarkan wilayah -->
                                <div class="panel panel-gis">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#data_kep_n_pelayanan">
                                          DATA KEPENDUDUKAN DAN PELAYANAN HIPPAM BERDASARKAN WILAYAH
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="data_kep_n_pelayanan" class="panel-collapse collapse">
                                      <div class="panel-body">
                                        <ol type="A">
                                            <li>DESA HIPPAM YANG BERSANGKUTAN
                                                <div class="table-responsive">
                                                    <table class="table table-condensed table-heading table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="3">No</th>
                                                                <th rowspan="3">Uraian</th>
                                                                <th rowspan="3">Jml RW</th>
                                                                <th rowspan="3">Jml RT</th>
                                                                <th colspan="4">Pelayanan Air Minum HIPPAM</th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan=2"">Sudah Terlayani</th>
                                                                <th colspan=2"">Sudah Terlayani</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Jml KK</th>
                                                                <th>Jml Jiwa</th>
                                                                <th>Jml KK</th>
                                                                <th>Jml Jiwa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $sql_hd = "SELECT * 
                                                                        FROM hippam_desa HD
                                                                        WHERE hippam_id='".$dat['id']."'";
                                                            $data_hd = $db->fetchdata($sql_hd);

                                                            $i = 0;
                                                            $tot_rw = 0;
                                                            $tot_rt = 0;
                                                            $tot_terlayani_kk = 0;
                                                            $tot_terlayani_jiwa = 0;
                                                            $tot_belum_terlayani_kk = 0;
                                                            $tot_belum_terlayani_jiwa = 0;
                                                            foreach($data_hd as $dat_hd){
                                                                $i++;
                                                                $tot_rw+= $dat_hd['rw'];
                                                                $tot_rt+= $dat_hd['rt'];
                                                                $tot_terlayani_kk+= $dat_hd['terlayani_kk'];
                                                                $tot_terlayani_jiwa+= $dat_hd['terlayani_jiwa'];
                                                                $tot_belum_terlayani_kk+= $dat_hd['belum_terlayani_kk'];
                                                                $tot_belum_terlayani_jiwa+= $dat_hd['belum_terlayani_jiwa'];
                                                        ?>
                                                            <tr>
                                                                <td><?= $i;?>.</td>
                                                                <td><?= $dat_hd['uraian'];?></td>
                                                                <td class="align_right"><?= $cst->currency($dat_hd['rw'],0);?></td>
                                                                <td class="align_right"><?= $cst->currency($dat_hd['rt'],0);?></td>
                                                                <td class="align_right"><?= $cst->currency($dat_hd['terlayani_kk'],0);?></td>
                                                                <td class="align_right"><?= $cst->currency($dat_hd['terlayani_jiwa'],0);?></td>
                                                                <td class="align_right"><?= $cst->currency($dat_hd['belum_terlayani_kk'],0);?></td>
                                                                <td class="align_right"><?= $cst->currency($dat_hd['belum_terlayani_jiwa'],0);?></td>
                                                            </tr>
                                                        <?php
                                                            }
                                                        ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="2" class="text-center">JUMLAH TOTAL</td>
                                                                <td class="align_right"><?= $cst->currency($tot_rw,0);?></td>
                                                                <td class="align_right"><?= $cst->currency($tot_rt,0);?></td>
                                                                <td class="align_right"><?= $cst->currency($tot_terlayani_kk,0);?></td>
                                                                <td class="align_right"><?= $cst->currency($tot_terlayani_jiwa,0);?></td>
                                                                <td class="align_right"><?= $cst->currency($tot_belum_terlayani_kk,0);?></td>
                                                                <td class="align_right"><?= $cst->currency($tot_belum_terlayani_jiwa,0);?></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>DESA SEKITAR YANG DILAYANI HIPPAM YANG BERSANGKUTAN
                                                <div class="table-responsive">
                                                    <table class="table table-condensed table-heading table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="3">No</th>
                                                                <th rowspan="3">Uraian</th>
                                                                <th rowspan="3">Jml RW</th>
                                                                <th rowspan="3">Jml RT</th>
                                                                <th colspan="4">Pelayanan Air Minum HIPPAM</th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan=2"">Sudah Terlayani</th>
                                                                <th colspan=2"">Belum Terlayani</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Jml KK</th>
                                                                <th>Jml Jiwa</th>
                                                                <th>Jml KK</th>
                                                                <th>Jml Jiwa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $sql_hd = "SELECT * 
                                                                        FROM hippam_desa_sekitar HD
                                                                        WHERE hippam_id='".$dat['id']."'";
                                                            $data_hd = $db->fetchdata($sql_hd);

                                                            $i = 0;
                                                            $tot_rw = 0;
                                                            $tot_rt = 0;
                                                            $tot_terlayani_kk = 0;
                                                            $tot_terlayani_jiwa = 0;
                                                            $tot_belum_terlayani_kk = 0;
                                                            $tot_belum_terlayani_jiwa = 0;
                                                            foreach($data_hd as $dat_hd){
                                                                $i++;
                                                                $tot_rw+= $dat_hd['rw'];
                                                                $tot_rt+= $dat_hd['rt'];
                                                                $tot_terlayani_kk+= $dat_hd['terlayani_kk'];
                                                                $tot_terlayani_jiwa+= $dat_hd['terlayani_jiwa'];
                                                                $tot_belum_terlayani_kk+= $dat_hd['belum_terlayani_kk'];
                                                                $tot_belum_terlayani_jiwa+= $dat_hd['belum_terlayani_jiwa'];
                                                        ?>
                                                            <tr>
                                                                <td class="align_right"><?= $i;?>.</td>
                                                                <td class="align_right"><?= $dat_hd['uraian'];?></td>
                                                                <td class="align_right"><?= $cst->currency($dat_hd['rw'],0);?></td>
                                                                <td class="align_right"><?= $cst->currency($dat_hd['rt'],0);?></td>
                                                                <td class="align_right"><?= $cst->currency($dat_hd['terlayani_kk'],0);?></td>
                                                                <td class="align_right"><?= $cst->currency($dat_hd['terlayani_jiwa'],0);?></td>
                                                                <td class="align_right"><?= $cst->currency($dat_hd['belum_terlayani_kk'],0);?></td>
                                                                <td class="align_right"><?= $cst->currency($dat_hd['belum_terlayani_jiwa'],0);?></td>
                                                            </tr>
                                                        <?php
                                                            }
                                                        ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="2" class="text-center">JUMLAH TOTAL</td>
                                                                <td class="align_right"><?= $cst->currency($tot_rw,0);?></td>
                                                                <td class="align_right"><?= $cst->currency($tot_rt,0);?></td>
                                                                <td class="align_right"><?= $cst->currency($tot_terlayani_kk,0);?></td>
                                                                <td class="align_right"><?= $cst->currency($tot_terlayani_jiwa,0);?></td>
                                                                <td class="align_right"><?= $cst->currency($tot_belum_terlayani_kk,0);?></td>
                                                                <td class="align_right"><?= $cst->currency($tot_belum_terlayani_jiwa,0);?></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </li>
                                        </ol>
                                      </div>
                                    </div>
                                </div>
                                <!-- end panel data kependudukan berdasarkan wilayah -->
                            </div>
                            <!-- end collapse panel -->
                            <h2 class="text-center box"><a href="jalur_dist.php?id=<?= $dat['id'];?>">Jalur Distribusi Air Bersih</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php include('template/footer.php');?>
    <?php include('template/js.php');?>
</body>

</html>
