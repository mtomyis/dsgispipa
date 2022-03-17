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
    <h3><i class="fa fa-angle-right"></i> Tambah Pipa</h3>
      <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <script type="text/javascript">
                $(document).ready(function() { 
                    $("#addFormd").submit(function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: '../pipa/pipa_proc.php',
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
                <div id="status"></div>

            <!-- START FORM TAMBAH DATA -->
            <form action="../pipa/pipa_proc.php" method="POST" name="addForm" id="addForm" class="well form-horizontal">
                <div class="form-group">
                <label for="" class="col-sm-1 control-label">Perusahaan</label>
                <div class="col-sm-3">
                    <?php
                    $id = $_GET['id'];
                    $sql_hippam = "SELECT * FROM hippam where id = '$id'";
                    $attr = array('sql'=>$sql_hippam,
                                    'name'=>'hippam_id'
                                    );
                    $dropdown->create($attr);
                    ?>
                </div>
                </div>
                <div class="form-group">
                <label for="" class="col-sm-1 control-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" name="nama" id="nama" class="form-control" data-bv-notempty>
                </div>
                </div>
                <div class="form-group">
                <label for="" class="col-sm-1 control-label">Jenis Pipa</label>
                <div class="col-sm-2">
                <?php
                    $sql_pipa_jenis = 'SELECT * FROM pipa_jenis ORDER BY bahan ASC, ukuran';
                    $attr = array('sql'=>$sql_pipa_jenis,
                                    'name'=>'pipa_jenis_id',
                                    'label'=>array('bahan','ukuran')
                                    );
                    $dropdown->create($attr);
                    ?>
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
    $('#addForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        }
    });
    $("#hippam_id,#pipa_jenis_id").select2();
    $("#tanggal_lahir").datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        yearRange: '1940:2030'
    });
    $('#hippam_id').focus();
});

</script>