<?php include '../../../script_awal.php'; ?>
<?php
    include $doc_root_class.'class_custom.php';
    $cst = new custom(); 
    include $doc_root_class.'class_dropdown.php';
    $dropdown = new dropdown();
?>
<?php
    $page_id = $p_pipa;
    $page_name = 'pipa';
?>
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM pipa WHERE id='$id'";
    $dat_pipa = $db->datasql($sql);
?>
<?php
    $_SESSION['data_ref'] = '';
?>
<!DOCTYPE html>
<html lang="en">
<?php include $doc_template.'bs_meta.php';?>   
<?php include $doc_template.'bs_css.php';?>     
<?php include('templatefix.php'); ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
    <h3><button onClick="javascript:history.go(-1)" type="button" class="btn btn-theme"><i class="fa fa-arrow-left"></i> Kembali</button></h3>
    
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Data Pipa</h4>
               <script type="text/javascript">
                $(document).ready(function() { 
                    $("#addForm").submit(function(e) {
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
                <section id="unseen">
                <!-- START FORM TAMBAH DATA -->
                <div class="row">
                  <div class="col-md-12">
                      <form method="POST" name="addForm" id="addForm" class="well form-horizontal">
                        <div class="form-group">
                          <label for="" class="col-sm-1 control-label">Hippam</label>
                          <div class="col-sm-3">
                            <?php
                              $sql_hippam = 'SELECT * FROM hippam';
                              $attr = array('sql'=>$sql_hippam,'name'=>'hippam_id','id'=>'hippam_id','class'=>'form-control','value'=>$dat_pipa['hippam_id']);
                              $dropdown->create($attr);
                            ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-sm-1 control-label">Nama</label>
                          <div class="col-sm-5">
                            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $dat_pipa['nama'];?>" data-bv-notempty>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-sm-1 control-label">Jenis Pipa</label>
                          <div class="col-sm-2">
                            <?php
                              $sql_pipa_jenis = 'SELECT * FROM pipa_jenis';
                              $attr = array('sql'=>$sql_pipa_jenis,
                                            'name'=>'pipa_jenis_id',
                                            'label'=>array('bahan','ukuran'),
                                            'value'=>$dat_pipa['pipa_jenis_id'],
                                            'data'=>'data-bv-notempty'
                                            );
                              $dropdown->create($attr);
                            ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-sm-1 control-label">Keterangan</label>
                          <div class="col-sm-5">
                            <textarea name="keterangan" rows="2" id="keterangan" class="form-control"><?php echo $dat_pipa['keterangan'];?></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-1 col-sm-5">
                            <div class="btn-group">
                              <?php $cst->create_back_button($page_id); ?>
                              <?php $cst->create_save_button($page_id); ?>
                              <?php $cst->create_delete_button($page_id); ?>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $dat_pipa['id']; ?>">
                          </div>
                        </div>
                      </form>
                  </div>
                </div>
                <!-- END FORM TAMBAH DATA -->
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
});

</script>
