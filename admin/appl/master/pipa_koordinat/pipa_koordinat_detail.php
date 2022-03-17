<?php include '../../../script_awal.php'; ?>
<?php
    include $doc_root_class.'class_custom.php';
    $cst = new custom(); 
    include $doc_root_class.'class_dropdown.php';
    $dropdown = new dropdown();
?>
<?php
    $page_id = $p_pipa_koordinat;
    $page_name = 'pipa_koordinat';
?>
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM pipa WHERE id='$id'";
    $dat_pipa = $db->datasql($sql);
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
            <h3>KOORDINAT PIPA - DETAIL </h3>
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
                  <form action="pipa_koordinat_proc.php" method="POST" name="addForm" id="addForm" class="well form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">Hippam</label>
                      <div class="col-sm-3">
                        <?php
                          $sql_hippam = 'SELECT * FROM hippam';
                          $attr = array('sql'=>$sql_hippam,'name'=>'hippam_id','id'=>'hippam_id','class'=>'form-control','value'=>$dat_pipa['hippam_id'],'disabled'=>'disabled');
                          $dropdown->create($attr);
                        ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">Pipa</label>
                      <div class="col-sm-2">
                        <?php
                          $sql_pipa = "SELECT * FROM pipa WHERE hippam_id = '".$dat_pipa['hippam_id']."'";
                          $attr = array('sql'=>$sql_pipa,'name'=>'pipa_id','id'=>'pipa_id','class'=>'form-control','value'=>$dat_pipa['id'],'option_select'=>true);
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
                        <input type="hidden" name="id" value="<?php echo $dat_pipa['id']; ?>">
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
    $("#pipa_id").select2();

    $("#hippam_id").change(function(){
        var hippam_id = $('#hippam_id').val();
        var action = 'get_pipa_hippam';
        $.ajax({
            type    : "post",
            url     : "pipa_koordinat_proc.php",
            data    : "hippam_id="+hippam_id+"&action="+action,
            success : function(data){
                $("#pipa_id").html(data);
            }
        });
    });

});

</script>