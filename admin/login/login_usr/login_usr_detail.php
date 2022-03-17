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
<?php
    $id = $_GET['id'];
    $sql_usr = "SELECT * FROM login_usr WHERE id='".$id."'";
    $dat_usr = $db->datasql($sql_usr);
    
    $sw_id = '';
    $sw_nama = '';
    $sw_nis = '';
    $gr_id = '';
    $gr_nama = '';
    $pg_id = '';
    $pg_nama = '';
    
    switch($dat_usr['jenis']){
        case 'guru' :   $sql_gr = "SELECT id,nama FROM guru WHERE id='".$dat_usr['id_relasi']."'";
                        $dat_gr = $db->datasql($sql_gr);
                        $gr_id = $dat_gr['id'];$gr_nama = $dat_gr['nama'];
                        break;
        case 'siswa' :  $sql_sw = "SELECT id,nama,nis FROM siswa WHERE id='".$dat_usr['id_relasi']."'";
                        $dat_sw = $db->datasql($sql_sw);
                        $sw_id = $dat_sw['id'];$sw_nis = $dat_sw['nis'];$sw_nama = $dat_sw['nama'];
                        break;
        case 'pegawai' : $sql_pg = "SELECT id,nama FROM pegawai WHERE id='".$dat_usr['id_relasi']."'";
                        $dat_pg = $db->datasql($sql_pg);
                        $pg_id = $dat_pg['id'];$pg_nama = $dat_pg['nama'];
                        break;
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
          <!-- START JUDUL & TOMBOL TAMBAH-LIHAT -->
          <div class="row-fluid">
              <div class="span12">
                  <legend>
                      <?php $cst->create_top_button($page_id,$page_name);?>
                      LOGIN USER - DETIL
                  </legend>
              </div>
          </div>
          <!-- END JUDUL & TOMBOL TAMBAH-LIHAT -->
          
          <!-- START PESAN NOTIFIKASI -->
          <div class="row-fluid">
              <div class="span4">&nbsp;</div>
              <div class="span4" style="margin-top: 10px; margin-bottom: 15px;"><?php include $doc_template.'msg.php';?></div>
              <div class="span4">&nbsp;</div>
          </div>
          <!-- END PESAN NOTIFIKASI -->
          
          <!-- START FORM TAMBAH DATA -->
          <div class="row-fluid">
              <div class="span12">
                  <form action="login_usr_proc.php" method="POST" name="myform" id="myform" class="well form-horizontal">
                      <table class="cst_table">
                          <tr>
                              <td width="14%">Jenis</td><td width="1%">:</td>
                              <td colspan="6">
                                  <select name="jenis" id="jenis" class="input-small">
                                      <option value="">Pilih</option>
                                      <option value="guru" <?php if($dat_usr['jenis']=='guru') echo "selected='selected'";?>>guru</option>
                                      <option value="siswa" <?php if($dat_usr['jenis']=='siswa') echo "selected='selected'";?>>siswa</option>
                                      <option value="pegawai" <?php if($dat_usr['jenis']=='pegawai') echo "selected='selected'";?>>pegawai</option>
                                  </select>
                                  <div id="siswa_search">
                                    <input type="hidden" name="siswa_id" id="siswa_id" value="<?php echo $sw_id;?>"/>
                                    <input type="text" name="siswa_nis" id="siswa_nis" value="<?php echo $sw_nis;?>" class="input-medium" placeholder="nis" readonly="1" />
                                    <input type="text" name="siswa_nama" id="siswa_nama" value="<?php echo $sw_nama;?>" class="input-xlarge" placeholder="nama siswa" readonly="1" />
                                    <a href="#" id="cari_siswa" class="btn span2"><i class="icon-search"></i> Cari Siswa</a>
                                  </div>
                                  <div id="guru_search">
                                    <input type="text" name="guru_id" id="guru_id" value="<?php echo $gr_id;?>" class="input-medium" placeholder="id guru" readonly="1" />
                                    <input type="text" name="guru_nama" id="guru_nama" value="<?php echo $gr_nama;?>" class="input-xlarge" placeholder="nama guru" readonly="1" />
                                    <a href="#" id="cari_guru" class="btn span2"><i class="icon-search"></i> Cari Guru</a>
                                  </div>
                                  <div id="pegawai_search">
                                    <input type="text" name="pegawai_id" id="pegawai_id" value="<?php echo $pg_id;?>" class="input-medium" placeholder="id pegawai" readonly="1" />
                                    <input type="text" name="pegawai_nama" id="pegawai_nama" value="<?php echo $pg_nama;?>" class="input-xlarge" placeholder="nama pegawai" readonly="1" />
                                    <a href="#" id="cari_pegawai" class="btn span2"><i class="icon-search"></i> Cari Pegawai</a>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>Username</td><td>:</td>
                              <td colspan="6"><input type="text" name="username" id="username" value="<?php echo $dat_usr['username'];?>" class="span3 validate[required]"></td>
                          </tr>
                          <tr>
                              <td>Password</td><td>:</td>
                              <td colspan="6"><h4>**********</h4></td>
                          </tr>
                          <tr>
                              <td>Aktif</td><td>:</td>
                              <td colspan="6">
                                 <select name="aktif" class="span2">
                                     <option value='1' <?php if($dat_usr['aktif']=='1'){echo "selected='selected'";} ?>>Aktif</option>
                                     <option value='0' <?php if($dat_usr['aktif']=='0'){echo "selected='selected'";} ?>>Non-Aktif</option>
                                 </select>
                              </td>
                          </tr>
                          <tr>
                              <td>Masa Aktif</td><td>:</td>
                              <td colspan="6">
                                  <input type="text" name="tgl_1" id="tgl_1" value="<?php echo $cst->tanggal_angka_indo_garing($dat_usr['tgl_1']);?>" class="input-small align_center"/>
                                  s/d
                                  <input type="text" name="tgl_2" id="tgl_2" value="<?php echo $cst->tanggal_angka_indo_garing($dat_usr['tgl_2']);?>" class="input-small align_center"/>
                              </td>
                          </tr>
                          <tr>
                              <td>Reset Password</td><td>:</td>
                              <td colspan="6">
                                  <input type="checkbox" name="is_reset_passwd" id="is_reset_passwd" value="1"/> 
                                  ubah password sesuai dengan username
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
                                                    $sql_lug = "SELECT id FROM login_usr_grp 
                                                                WHERE login_usr_id='".$dat_usr['id']."' 
                                                                AND login_grp_id='".$dat_grp['id']."'";
                                                    if($db->jumrec($sql_lug)>0)
                                                        $cb = "<input type='checkbox' name='login_grp_id[".$i."]' value='".$dat_grp['id']."' checked='1'> ";
                                                    else
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
                                      <?php $cst->create_save_button($page_id); ?>  
                                  </div>
                                  <input type="hidden" name="id_usr" value="<?php echo $dat_usr['id'];?>">
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
    
    clear_search();
    //$("#guru_search").show();
    <?php
        switch($dat_usr['jenis']){
            case 'guru' : echo "$('#guru_search').show();"; break;
            case 'siswa' : echo "$('#siswa_search').show();"; break;
            case 'pegawai' : echo "$('#pegawai_search').show();"; break;
        }
    ?>
    
    
    
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
    
});
    
</script>