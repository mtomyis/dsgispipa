<?php include '../../script_awal.php'; ?>
<?php
    include $doc_root_class.'class_custom.php';
    $cst = new custom();
    include $doc_root_class.'class_dropdown.php';
    $dropdown = new dropdown();
    
    $date_now_garing = date('d/m/Y');
?>
<?php
    $page_id = $p_login_usr;
    $page_name = 'login_usr';
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
            <h3>LOGIN USER - TAMBAH</h3>
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
                  <form action="login_usr_proc.php" method="POST" name="myform" id="myform" class="well form-horizontal">
                      <table class="cst_table">
                          <tr>
                              <td width="14%">Jenis</td><td width="1%">:</td>
                              <td colspan="6">
                                  <select name="jenis" id="jenis" class="input-small">
                                      <option value="">Pilih</option>
                                      <option value="guru">guru</option>
                                      <option value="siswa">siswa</option>
                                      <option value="pegawai">pegawai</option>
                                  </select>
                                  <div id="siswa_search">
                                    <input type="hidden" name="siswa_id" id="siswa_id"/>
                                    <input type="text" name="siswa_nis" id="siswa_nis" class="input-medium" placeholder="id" readonly="1" />
                                    <input type="text" name="siswa_nama" id="siswa_nama" class="input-xlarge" placeholder="nama siswa" readonly="1" />
                                    <a href="#" id="cari_siswa" class="btn span2"><i class="icon-search"></i> Cari Siswa</a>
                                  </div>
                                  <div id="guru_search">
                                    <input type="text" name="guru_id" id="guru_id" class="input-small" placeholder="id" readonly="1" />
                                    <input type="text" name="guru_nama" id="guru_nama" class="input-xlarge" placeholder="nama guru" readonly="1" />
                                    <a href="#" id="cari_guru" class="btn span2"><i class="icon-search"></i> Cari Guru</a>
                                  </div>
                                  <div id="pegawai_search">
                                    <input type="text" name="pegawai_id" id="pegawai_id" class="input-small" placeholder="id" readonly="1" />
                                    <input type="text" name="pegawai_nama" id="pegawai_nama" class="input-xlarge" placeholder="nama pegawai" readonly="1" />
                                    <a href="#" id="cari_pegawai" class="btn span2"><i class="icon-search"></i> Cari Pegawai</a>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>username</td><td>:</td>
                              <td colspan="6"><input type="text" name="username" id="username" class="span3 validate[required]"></td>
                          </tr>
                          <tr>
                              <td>Passwd</td><td>:</td>
                              <td colspan="6"><h4>sama dengan username</h4></td>
                          </tr>
                          <tr>
                              <td>Aktif</td><td>:</td>
                              <td colspan="6">
                                 <select name="aktif" class="span2">
                                     <option value='1' >Aktif</option>
                                     <option value='0' >Non-Aktif</option>
                                 </select>
                              </td>
                          </tr>
                          <tr>
                              <td>Masa Aktif</td><td>:</td>
                              <td colspan="6">
                                  <input type="text" name="tgl_1" id="tgl_1" value="<?php echo $date_now_garing;?>" class="input-small align_center"/>
                                  s/d
                                  <input type="text" name="tgl_2" id="tgl_2" value="<?php echo $date_now_garing;?>" class="input-small align_center"/>
                              </td>
                          </tr>
                          <tr>
                                <td>Group</td>
                                <td>:</td>
                                <td colspan="6">
                                    <table width="500" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="50">&nbsp;</th>
                                                <th width="100">Kode Grop</th>
                                                <th>Nama Group</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql_grp = "SELECT id,nama FROM login_grp WHERE id!='SA' ORDER BY nama";
                                                $data_grp = $db->fetchdata($sql_grp);
                                                $i = 0;
                                                foreach($data_grp as $dat_grp){
                                                    $i++;
                                                    $cb = "<input type='checkbox' name='login_grp_id[".$i."]' value='".$dat_grp['id']."' >";
                                                    echo "  <tr>
                                                                <td>".$cb."</td>
                                                                <td>".$dat_grp['id']."</td>
                                                                <td>".$dat_grp['nama']."</td>
                                                            </tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
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
    $("#addForm").bootstrapValidator();
    
    clear_search();
    
    $("#tgl_1").datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        yearRange: '1940:2050'
    })
    $("#tgl_2").datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        yearRange: '1940:2050'
    })
    
    
    $('#jenis').change(function(){
        clear_search();
        var jenis = $('#jenis').val();
        switch(jenis){
            case 'siswa' : $('#siswa_search').show(); break;
            case 'guru' : $('#guru_search').show(); break;
            case 'pegawai' : $('#pegawai_search').show(); break;
        }
    })
    
    function clear_search(){
        $('#siswa_search').hide();
        $('#guru_search').hide();
        $('#pegawai_search').hide();
    }
    
    $('#cari_siswa').click(function(){
        window.open('list_siswa.php', '','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=no,width=600,height=600,left=0,top=0')
    })
    $('#cari_guru').click(function(){
        window.open('list_guru.php', '','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=no,width=600,height=600,left=0,top=0')
    })
    $('#cari_pegawai').click(function(){
        window.open('list_pegawai.php', '','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=no,width=600,height=600,left=0,top=0')
    })
    
});
    
</script>