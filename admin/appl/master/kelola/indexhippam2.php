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
              <h4><i class="fa fa-angle-right"></i> Data Hippam</h4>
                <section id="unseen">
                <table id="tablehippam" cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Nama Hippam</th>
                        <th>Ketua</th>
                        <th>Desa</th>
                        <th>Kelola Pipa</td>
                        <th>Jalur Distribusi</td>
                        <th>Kelola Tandon</td>
                        <th>Kelola Broncap</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $id = $_GET['id'];
                        $sql_hp = "SELECT HP.*,DS.nama as ds_nama,KC.nama as kc_nama FROM hippam HP
                                JOIN desa DS ON HP.desa_kode=DS.kode
                                JOIN kecamatan KC ON DS.kecamatan_id=KC.id
                                WHERE DS.kecamatan_id='".$id."' ORDER BY DS.kode, HP.nama";
                        $data_hp = $db->fetchdata($sql_hp);

                        $i = 0;
                        foreach($data_hp as $dat_hp){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?>.</td>
                        <td class="tooltip-demo" align="center">
                            <a href='<?php echo 'indexhippam_edit.php?id='.$dat_hp['id'];?>' title="Ubah Data" rel="tooltip">
                                <div><i class="glyphicon glyphicon-pencil"></i></div>
                            </a>
                        </td>
                        <td><a href="indexhippam3.php?id=<?php echo $dat_hp['id']; ?>"><?php echo strtoupper($dat_hp['nama']);?></a></td>
                        <td class="numeric"><?php echo $dat_hp['ketua_nama'];?></td>
                        <td class="numeric"><?php echo $dat_hp['ds_nama'];?></td>
                        <td style="text-align: center;">
                            <a href="indexpipa.php?id=<?php echo $dat_hp['id']; ?>"><i class="fa fa-map-marker"></i> Kelola Pipa</a>
                        </td>
                        <td style="text-align: center;">
                            <a href="indexjalurdist.php?id=<?php echo $dat_hp['id']; ?>"><i class="fa fa-map-marker"></i> Lihat Jalur</a>
                        </td>
                        <td style="text-align: center;">
                            <a href="indextandon.php?id=<?php echo $dat_hp['id']; ?>"><i class="fa fa-map-marker"></i> Kelola Tandon</a>
                        </td>
                        <td style="text-align: center;">
                            <a href="indexbroncap.php?id=<?php echo $dat_hp['id']; ?>"><i class="fa fa-map-marker"></i> Kelola Broncap</a>
                        </td>
                        <!-- <td class="numeric">
                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                        </td> -->
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

