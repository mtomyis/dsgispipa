<?php include '../../../script_awal.php'; ?>
<?php
    include $doc_root_class.'class_custom.php';
    $cst = new custom(); 
    include $doc_root_class.'class_dropdown.php';
    $dropdown = new dropdown();
?>
<?php
    $page_id = $p_tandon;
    $page_name = 'tandon';
?>
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM tandon WHERE id='$id'";
    $dat_tandon = $db->datasql($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include $doc_template.'bs_meta.php';?>   
    <?php include $doc_template.'bs_css.php';?>     
  </head>

  <body>
    <?php include $doc_template.'menu_top.php';?>
      
      <div class="container-fluid">
          <!-- START JUDUL & TOMBOL TAMBAH-LIHAT -->
          <div class="page-header">
            <h3>TANDON-DETAIL</h3>
          </div>
         <div class="row">
            <div class="col-md-3 col-sm-12">
              <?php $cst->create_top_button($page_id,$page_name);?>
            </div>
          </div>
          <!-- END JUDUL & TOMBOL TAMBAH-LIHAT -->
          <!-- START FORM TAMBAH DATA -->
          <div class="row">
              <div class="col-md-12">
                  <form action="tandon_proc.php" method="POST" name="addForm" id="addForm" class="well form-horizontal">
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">Hippam</label>
                      <div class="col-sm-3">
                        <?php
                          $sql_hippam = 'SELECT * FROM hippam';
                          $attr = array('sql'=>$sql_hippam,'name'=>'hippam_id','id'=>'hippam_id','class'=>'form-control','value'=>$dat_tandon['hippam_id']);
                          $dropdown->create($attr);
                        ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">Nama</label>
                      <div class="col-sm-4">
                        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $dat_tandon['nama'];?>" data-bv-notempty>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">Latitude</label>
                      <div class="col-sm-5">
                        <input type="text" name="latitude" id="latitude" class="form-control" value="<?php echo $dat_tandon['latitude'];?>" data-bv-notempty data-bv-numeric>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">Longitude</label>
                      <div class="col-sm-5">
                        <input type="text" name="longitude" id="longitude" class="form-control" value="<?php echo $dat_tandon['longitude'];?>" data-bv-notempty data-bv-numeric>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">Keterangan</label>
                      <div class="col-sm-5">
                        <textarea name="keterangan" rows="2" id="keterangan" class="form-control"><?php echo $dat_tandon['keterangan'];?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-1 col-sm-5">
                        <div class="btn-group">
                          <?php $cst->create_back_button($page_id); ?>
                          <?php $cst->create_save_button($page_id); ?>
                          <?php $cst->create_delete_button($page_id); ?>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $dat_tandon['id']; ?>">
                      </div>
                    </div>
                  </form>
              </div>
          </div>
          <!-- END FORM TAMBAH DATA -->
      </div>
      <br>
      <?php include $doc_template.'footer.php';?>
      <?php include $doc_template.'bs_js.php';?>
      <?php include $doc_template.'bootstrapvalidator.php';?>
  </body>
</html>

<script type="text/javascript">
$(document).ready(function() {
    $('#addForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        }
    });
    $("#hippam_id").select2();
});

</script>