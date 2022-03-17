<?php include '../../../script_awal.php'; ?>
<?php
    $_SESSION['data_ref'] = '';
?>
<!DOCTYPE html>
<html lang="en">

<?php include('templatefix.php'); ?>

<!-- <div class="container-fluid"> -->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <h3><button onClick="javascript:history.go(-1)" type="button" class="btn btn-theme"><i class="fa fa-arrow-left"></i> Kembali</button></h3>
            <div class="row mt">
                <!--button-->
                <div class="col-lg-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Data Broncap</h4>
                        <h4><a href="indexbroncap_add.php?idh=<?php echo $_GET['id'] ?>" class="btn btn-success">Tambah Broncap</a></h4>
                        <section id="unseen">
                            <table id="tablehippam" class="display table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="25%">Nama Broncap</td>
                                        <th width="15%">Latitude</td>
                                        <th width="15%">Longitude</td>
                                        <th width="5%" style="text-align: center;">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once "../../../class/class_db.php";
                                    $db = new database();
                                    $id = $_GET['id'];
                                    $no = 0;
                                    $sql = "SELECT BP.*,HP.nama as hp_nama FROM broncap BP
                                    JOIN hippam HP ON BP.hippam_id=HP.id
                                    WHERE HP.id = '$id'";
                                    $data = $db->fetchdata($sql);
                                    foreach ($data as $dat) {
                                    ?>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo $dat['nama']; ?></td>
                                            <td><?php echo $dat['latitude']; ?></td>
                                            <td><?php echo $dat['longitude']; ?></td>
                                            <td class="tooltip-demo" align="center">
                                                <a href='<?php echo 'indexbroncap_edit.php?id=' . $dat['id']; ?>' title="Ubah Data" rel="tooltip">
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
<!-- </div> -->
<!--main content end-->
<?php include('templatefoot.php'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        /*
         * Initialse DataTables, with no sorting on the 'details' column
         */
        var oTable = $('#hidden-table-info').dataTable({
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [0]
            }],
            "aaSorting": [
                [1, 'asc']
            ]
        });
    });
</script>