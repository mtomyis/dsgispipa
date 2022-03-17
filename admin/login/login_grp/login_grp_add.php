<?php include '../../script_awal.php'; ?>
<?php
    include $doc_root_class.'class_custom.php';
    $cst = new custom();
    include $doc_root_class.'class_dropdown.php';
    $dropdown = new dropdown();
?>
<?php
    $page_id = $p_login_grp;
    $page_name = 'login_grp';
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
            <h3>LOGIN GROUP - TAMBAH</h3>
          </div>
         <div class="row">
            <div class="col-md-2 col-sm-12 text-center">
              <?php $cst->create_top_button($page_id,$page_name);?>
            </div>
         </div>
         <!-- START PESAN NOTIFIKASI -->
         <div class="row">
            <?php include $doc_template.'msg.php';?>
         </div>
         <!-- END & PESAN NOTIFIKASI -->
          <!-- START FORM TAMBAH DATA -->
          <div class="row">
              <div class="col-md-12">
                  <form action="login_grp_proc.php" method="POST" name="addForm" id="addForm" class="well form-horizontal">
                      <table class="cst_table">
                          <tr>
                              <td width="14%">Kode</td><td width="1%">:</td>
                              <td colspan="6"><div class="col-md-2"><input type="text" name="kode" id="kode" class="col-md-2 validate[required] form-control"></div></td>
                          </tr>
                          <tr>
                              <td>Nama</td><td>:</td>
                              <td colspan="6"><div class="col-md-3"><input type="text" name="nama" id="nama" class="col-md-3 form-control validate[required]"></div></td>
                          </tr>
                          
                          <tr>
                               <td>Keterangan</td><td>:</td>
                               <td colspan="6"><div class="col-md-5"><textarea name="keterangan" class="col-md-5 form-control" rows="2"></textarea></div></td>
                          </tr>
                          <tr>
                              <td>Aktif</td><td>:</td>
                              <td colspan="6">
                                <div class="col-md-2">
                                 <select name="aktif" class="col-md-2 form-control">
                                     <option value='1' <?php if($dat_guru['aktif']=='1'){echo "selected='selected'";} ?>>Aktif</option>
                                     <option value='0' <?php if($dat_guru['aktif']=='0'){echo "selected='selected'";} ?>>Non-Aktif</option>
                                 </select>
                                </div>
                              </td>
                          </tr>
                          <tr>
                                <td>Hak Akses</td>
                                <td>:</td>
                                <td colspan="6">
                                    <div style="width: 700px">
                                        <table class="table-striped table-bordered table-condensed table-heading">
                                            <thead>
                                                <tr>
                                                    <td>Menu</td>
                                                    <td width="15%" id="head">Enable</td>
                                                    <td width="50" id="head">Tambah</td>
                                                    <td width="50" id="head">Lihat</td>
                                                    <td width="50" id="head">Edit</td>
                                                    <td width="50" id="head"></td>
                                                </tr>
                                            </thead>
                                            <tbody>


                        <?php
                            $sql = "SELECT * FROM menu WHERE aktif=1 ORDER BY id";
                            $data = $db->fetchdata($sql);
                            $j = 0;
                            foreach($data as $dat){
                                $j++;
                                $char = '';
                                $char2 = '';
                                for($i=1;$i<$dat['level'];$i++){
                                    $char.= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    $char2.= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                }
                                if(($dat['id']=='01')||($dat['id']=='0190')||($dat['id']=='0191'))
                                    $is_checked = "checked='1' ";
                                else
                                    $is_checked = '';
                                $cb = "<input type='checkbox' name='enable_".$dat['id']."' value='1' ".$is_checked." >";
                                $cb2 = "<input type='hidden' name='menu_".$dat['id']."' value='".$dat['id']."'>";
                                $cb_c = '';
                                $cb_r = '';
                                $cb_u = '';
                                $cb_d = '';
                                if($dat['tipe']=='Detail'){
                                    $cb_c = "<input type='checkbox' name='level_c_".$dat['id']."' value='1' checked='1'>";
                                    $cb_r = "<input type='checkbox' name='level_r_".$dat['id']."' value='1' checked='1'>";
                                    $cb_u = "<input type='checkbox' name='level_u_".$dat['id']."' value='1' checked='1'>";
                                    $cb_d = "<input type='checkbox' name='level_d_".$dat['id']."' value='1' disabled='disabled'>";
                                }
                                echo "
                                                <tr>
                                                    <td nowrap='1'>$char ".$dat['nama']."</td>
                                                    <td nowrap='1'><div class='align_left'>$char2 $cb $cb2</div></td>
                                                    <td><div class='align_center'>$cb_c</div></td>
                                                    <td><div class='align_center'>$cb_r</div></td>
                                                    <td><div class='align_center'>$cb_u</div></td>
                                                    <td><div class='align_center'>$cb_d</div></td>
                                                </tr>
                                    ";
                            }
                        ?>            
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                          <tr>
                              <td colspan="2">&nbsp;</td>
                              <td colspan="6">
                                  <div class="btn-group">
                                      <?php $cst->create_back_button($page_id); ?>
                                      <?php $cst->create_save_add_button($page_id); ?>  
                                  </div>
                                  <input type="hidden" name="jml_menu" value="<?php echo $j;?>">
                              </td>
                          </tr>
                      </table>
                  </form>
              </div>
          </div>
          <!-- END FORM TAMBAH DATA -->
      </div>
     
      <?php include $doc_template.'footer.php';?>
      <?php include $doc_template.'bs_js.php';?>
      <?php include $doc_template.'bootstrapvalidator.php';?>
  </body>
</html>

<script type="text/javascript">
$(document).ready(function() {
    $("#addForm").validationEngine();
    $("#tanggal_lahir").datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        yearRange: '1940:2030'
    });
    $('#kode').focus();
    
    
    
});

</script>