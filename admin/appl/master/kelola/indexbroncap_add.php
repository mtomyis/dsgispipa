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
<?php include $doc_template . 'bs_meta.php'; ?>
<?php include $doc_template . 'bs_css.php'; ?>

<div class="container-fluid">

    <!--main content start-->
    <section id="main-content">
        <!-- <script type="text/javascript">
        $(document).ready(function() { 
            $("#addForm").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '../broncap/broncap_proc.php',
                    type: 'post',
                    data: $(this).serialize(),             
                    success: function(data) {
                        console.log('apa '+data);
                        var elmnt = document.getElementById("main-content");
                        elmnt.scrollIntoView();          
                        $('#status').html(data);
                    }
                });
            });
        })
        </script> -->
        <script type="text/javascript">
        $(document).ready(function() { 
            $("#addForms").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '../broncap/broncap_proc.php',
                    type: 'post',
                    data: $(this).serialize(),             
                    success: function(data) {        
                    console.log('apa '+data);
                    $('#status').html(data);
                    var elmnt = document.getElementById("main-content");
                    elmnt.scrollIntoView();  
                    }
                });
            });
        })
        </script>
        <section class="wrapper">
        <h3><button onClick="javascript:history.go(-1)" type="button" class="btn btn-theme"><i class="fa fa-arrow-left"></i> Kembali</button></h3>
            <div class="row mt">
                <!--button-->
                <div class="row">
                    <div id="status"></div>
                    <div class="col-md-12">
                        <form action="../broncap/broncap_proc.php" method="POST" name="addForm" id="addForm" class="well form-horizontal">
                            <div class="form-group">
                                <label for="" class="col-sm-1 control-label">Perusahaan</label>
                                <div class="col-sm-3">
                                    <?php
                                    $id = $_GET['idh'];
                                    $sql_hippam = "SELECT * FROM hippam where id = '$id'";
                                    $attr = array('sql' => $sql_hippam, 'name' => 'hippam_id', 'id' => 'hippam_id', 'class' => 'form-control');
                                    $dropdown->create($attr);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-1 control-label">Nama</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nama" id="nama" class="form-control" data-bv-notempty>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-1 control-label">Latitude</label>
                                <div class="col-sm-5">
                                    <input type="text" name="latitude" id="latitude" class="form-control" data-bv-notempty>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-1 control-label">Longitude</label>
                                <div class="col-sm-5">
                                    <input type="text" name="longitude" id="longitude" class="form-control" data-bv-notempty>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-1 control-label">Keterangan</label>
                                <div class="col-sm-5">
                                    <textarea name="keterangan" rows="2" id="keterangan" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-1 col-sm-5">
                                    <div class="btn-group">
                                        <?php $cst->create_save_add_button($page_id); ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /col-lg-4 -->
            </div>
            <!-- /row -->
</div>
</section>
<!-- /wrapper -->
</section>
<!--main content end-->

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