<?php include '../../../script_awal.php'; ?>
<?php
    include $doc_root_class."class_custom.php";
    $cst = new custom();
    include $doc_root_class.'class_dropdown.php';
    $dropdown = new dropdown();
?>
<?php
    $page_id = $p_laporan_ac;
    $page_name = 'laporan_ac';
?>
<?php
    include $doc_root."class/class_pagination.php";
    $pgn = new pagination;
    
    if(isset($_GET['cari'])){
        $nama = $_GET['nama'];
    }
    else{
        $nama = '';
    }
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
         <!-- START JUDUL, TOMBOL & FORM CARI -->
          <div class="page-header">
            <h3>LAPORAN AC</h3>
          </div>
         
         <!-- START TABEL DATA -->
         <div class="row">
             <div class="col-md-12">
               <form action="ac_print.php" method="POST" name="addForm" id="addForm" class="well form-horizontal" target="_blank">
                <div class="form-group">
                  <label for="" class="col-sm-1 control-label">Perusahaan</label>
                  <div class="col-sm-3">
                    <?php
                      $sql_perusahaan = 'SELECT * FROM perusahaan ORDER BY nama';
                      $attr = array('sql'=>$sql_perusahaan,'name'=>'perusahaan_id','id'=>'perusahaan_id','option_select'=>'TRUE','class'=>'form-control');
                      $dropdown->create($attr);
                    ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-1 control-label">Unit</label>
                  <div class="col-sm-3">
                    <select name="unit_id" id="unit_id" class="form-control">
                      <option value="">Pilih</option>
                    </select>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="" class="col-sm-1 control-label">Gedung</label>
                  <div class="col-sm-3">
                    <select name="gedung_id" id="gedung_id" class="form-control">
                      <option value="">Pilih</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-1 control-label">Ruang</label>
                  <div class="col-sm-3">
                    <select name="ruang_id" id="ruang_id" class="form-control">
                      <option value="">Pilih</option>
                    </select>
                  </div>
                </div> -->
                <div class="form-group">
                  <div class="col-sm-offset-1 col-sm-5">
                    <div class="btn-group">
                    <?php $cst->create_back_button($page_id); ?>
                    <?php $cst->create_save_add_button($page_id, $attr=array('value'=>'TAMPILKAN')); ?>  
                    </div>
                  </div>
                </div>
              </form>
             </div>
         </div>
         <!-- START TABEL DATA -->
    </div><br>
    <?php include $doc_template.'footer.php';?>
    <?php include $doc_template.'bs_js.php';?>
  </body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $(".tooltip-demo").tooltip({
          selector: "a[rel=tooltip]"
        });
        $("#unit_id,#perusahaan_id,#gedung_id,#ruang_id").select2();
        $("#perusahaan_id").focus();
        //combo box UNIT
        $("#perusahaan_id").change(function(){
        var perusahaan_id = $("#perusahaan_id").val();
        var action = "unit";
          $.ajax({
            url: "ac_proc.php",
            data: "perusahaan_id="+perusahaan_id+"&action="+action,
            success: function(data){
                $("#unit_id").html(data);
            }
          });
        });
      //end combo box
      //combo box GEDUNG
        $("#unit_id").change(function(){
        var unit_id = $("#unit_id").val();
        var action = "gedung";
          $.ajax({
            url: "ac_proc.php",
            data: "unit_id="+unit_id+"&action="+action,
            success: function(data){
                $("#gedung_id").html(data);
            }
          });
        });
      //end combo box
      //combo box RUANG
        $("#gedung_id").change(function(){
        var gedung_id = $("#gedung_id").val();
        var action = "ruang";
          $.ajax({
            url: "ac_proc.php",
            data: "gedung_id="+gedung_id+"&action="+action,
            success: function(data){
                $("#ruang_id").html(data);
            }
          });
        });
      //end combo box
    });
</script>