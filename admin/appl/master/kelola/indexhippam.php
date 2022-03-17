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
    <h3><i class="fa fa-angle-right"></i> Kelola Hippam</h3>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Data Hippam</h4>
              <h4><a href="indexhippam_add.php" class="btn btn-success">Tambah Hippam</a></h4>
                <section id="unseen">
                    <!--<select class="form-control" id="korsda" name="korsda" style="width:100%;">-->
                    <!--    <option value="1" selected="">KORSDA GLENMORE</option>-->
                    <!--    <option value="2" selected="">KORSDA GENTENG</option>-->
                    <!--</select>-->
                    <br><br>
                <table id="tablehippam" cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kecamatan</th>
                        <th class="numeric">Kode Lokasi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 0;
                        $sql = "SELECT KC.id, KC.kode, KC.nama
                                FROM hippam HP
                                JOIN desa DS ON HP.desa_kode=DS.kode 
                                JOIN kecamatan KC ON DS.kecamatan_id=KC.id 
                                WHERE KC.id IN ('3510020','3510040','3510010') 
                                GROUP BY KC.id
                                ORDER BY KC.kode";
                        $data = $db->fetchdata($sql);
                        foreach($data as $dat){
                            $no++;
                    ?>
                    <tr>
                        <td><?php echo $no; ?>.</td>
                        <td><a href="indexhippam2.php?id=<?php echo $dat['id']; ?>"><?php echo strtoupper($dat['nama']);?></a></td>
                        <td class="numeric"><?php echo $dat['kode'];?></td>
                        
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
<!-- 
<script type="text/javascript">
$(document).ready( function () {
    $('#tablehippam').DataTable();
} );
</script> -->
