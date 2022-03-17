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
            <!-- START FORM TAMBAH DATA -->
            <div class="row">
                <div class="col-md-12">
                    <form action="../pipa_koordinat/pipa_koordinat_proc.php" method="POST" name="addForm" id="addForm" enctype="multipart/form-data" class="well form-horizontal">
                        <div class="form-group">
                        <label for="" class="col-sm-1 control-label">Perusahaan g</label>
                        <div class="col-sm-3">
                            <?php
                            $idh = $_GET['idh'];
                            $sql_hippam = "SELECT * FROM hippam where id = '$idh'";
                            $attr = array('sql'=>$sql_hippam,'name'=>'hippam_id','id'=>'hippam_id','class'=>'form-control');
                            $dropdown->create($attr);
                            ?>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="" class="col-sm-1 control-label">Pipa</label>
                        <div class="col-sm-3">
                            <?php
                            $id = $_GET['id'];
                            $sql_hippam = "SELECT * FROM pipa where id = '$id'";
                            $attr = array('sql'=>$sql_hippam,'name'=>'pipa_id','id'=>'pipa_id','class'=>'form-control');
                            $dropdown->create($attr);
                            ?>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="" class="col-sm-1 control-label">Upload File</label>
                        <div class="col-sm-5">
                            <input type="file" name="koordinat" id="koordinat" />
                            <p class="help-block">Silakan pilih File XML yang akan di Upload.</p>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-5">
                            <div class="btn-group">
                            <?php $cst->create_back_button($page_id); ?>
                            <?php $cst->create_save_button($page_id); ?>
                            <?php $cst->create_delete_button($page_id); ?>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
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