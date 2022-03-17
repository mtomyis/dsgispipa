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
            <h3>KOORDINAT PIPA - TAMBAH</h3>
          </div>
         <div class="row">
            <div class="col-md-3 col-sm-12">
              <?php $cst->create_top_button($page_id,$page_name);?>
            </div>
          </div>
          <!-- END JUDUL & TOMBOL TAMBAH-LIHAT -->
          <!-- START PESAN NOTIFIKASI -->
         <div class="row text-center">
            <?php include $doc_template.'msg.php';?>
         </div>
          <!-- END PESAN NOTIFIKASI -->
          
          <!-- START FORM TAMBAH DATA -->
          <div class="row">
              <div class="col-md-12">
                  <form action="pipa_koordinat_proc.php" method="POST" name="addForm" id="addForm" enctype="multipart/form-data" class="well form-horizontal">
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">Perusahaan</label>
                      <div class="col-sm-3">
                        <?php
                          $sql_hippam = 'SELECT * FROM hippam';
                          $attr = array('sql'=>$sql_hippam,'name'=>'hippam_id','id'=>'hippam_id','class'=>'form-control','option_select'=>'TRUE');
                          $dropdown->create($attr);
                        ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-1 control-label">Pipa</label>
                      <div class="col-sm-2">
                        <select name="pipa_id" id="pipa_id" class="form-control">
                          <option value="">Pilih</option>
                        </select>
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
                          <?php $cst->create_save_add_button($page_id); ?>
                        </div>
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

    
     /*$('input:text').bind("keydown", function(e) {
        var n = $("input:text").length;
        if (e.which == 13) 
        { //Enter key
          e.preventDefault(); //Skip default behavior of the enter key
          var nextIndex = $('input:text').index(this) + 1;
          if(nextIndex < n)
            $('input:text')[nextIndex].focus();
          else
          {
            $('input:text')[nextIndex-1].blur();
            $('#btnSubmit').click();
          }
        }
      });*/

      /*$('#btnSubmit').click(function() {
         alert('Form Submitted');
      });*/

    
});

</script>