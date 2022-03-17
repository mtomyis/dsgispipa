<?php include '../../../script_awal.php'; ?>
<?php
    $_SESSION['data_ref'] = '';
?>
<!DOCTYPE html>
<html lang="en">
<?php include('templatefix.php'); ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
    <h3><button onClick="javascript:history.go(-1)" type="button" class="btn btn-theme"><i class="fa fa-arrow-left"></i> Kembali</button></h3>
    
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Data Pipa</h4>
              <h4><a href="indexpipa_add.php?id=<?= $_GET['id'] ?>" class="btn btn-success">Tambah Pipa</a></h4>
                <section id="unseen">
                <table id="tablehippam" cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pipa</th>
                        <th>Jenis</th>
                        <th>Jarak</th>
                        <th>Kelola Koordinat</td>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $id = $_GET['id'];
                        $sql_hp = "SELECT PP.*,HP.nama as hp_nama, PJ.bahan as pj_bahan, PJ.ukuran as pj_ukuran FROM    pipa PP
                                JOIN hippam HP ON PP.hippam_id=HP.id
                                JOIN pipa_jenis PJ ON PJ.id=PP.pipa_jenis_id
                                WHERE HP.id='".$id."' ";
                        $data_hp = $db->fetchdata($sql_hp);

                        $i = 0;
                        foreach($data_hp as $dat_hp){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?>.</td>
                        <td><?php echo strtoupper($dat_hp['nama']);?></td>
                        <td class="numeric"><?php echo $dat_hp['pj_bahan']."&Oslash;".$dat_hp['pj_ukuran']."\"";?></td>
                        <td><?php if ($dat_hp['jarak'] == "") {echo "Jarak belum disimpan";} else {echo "".number_format($dat_hp['jarak'], 2)." Meter";}  ?></td>
                        <td style="text-align: center;">
                            <a href="indexkoordinatpipa.php?id=<?php echo $dat_hp['id']; ?>&idh=<?php echo $id; ?>"><i class="fa fa-map-marker"></i> Koordinat Pipa</a>
                        </td>
                        <td class="tooltip-demo" align="center">
                            <a href='<?php echo 'indexpipa_edit.php?id='.$dat_hp['id'];?>' title="Ubah Data" rel="tooltip">
                                <div><i class="glyphicon glyphicon-pencil"></i></div>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-4 -->
        </div>
    <!-- /row -->
    </section>
    <!-- /wrapper -->
</section>
<!--main content end-->
<?php include('templatefoot.php'); ?>