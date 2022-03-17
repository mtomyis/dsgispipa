<?php include '../../../script_awal.php'; ?>
<?php
    include $doc_root_class."class_custom.php";
    $cst = new custom();
    include $doc_root_class.'class_dropdown.php';
    $dropdown = new dropdown();
?>
<?php
    $page_id = $p_hippam;
    $page_name = 'hippam';
?>
<?php
    include $doc_root."class/class_pagination.php";
    $pgn = new pagination;
    
    if(isset($_GET['cari'])){
        $nama = $_GET['nama'];
        $kecamatan_id = $_GET['kecamatan_id'];
        $desa_id = $_GET['desa_id'];
    }
    else{
        $nama = '';
        $kecamatan_id = '';
        $desa_id = '';
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
            <h3>HIPPAM-LIHAT</h3>
          </div>
         <div class="row">
            <div class="col-md-3">
              <?php $cst->create_top_button($page_id,$page_name);?>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
              <form name="search_form" act="<?php echo $_SERVER['PHP_SELF'];?>" method="GET" class="form-inline pull-right" role="form">
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value='<?php if(isset($_GET['cari'])) echo $nama;?>'>
                <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">Kecamatan</div>
                  <?php
                    $sql_kecamatan = 'SELECT * FROM kecamatan ORDER BY nama';
                    $attr = array('sql'=>$sql_kecamatan,'name'=>'kecamatan_id','id'=>'kecamatan_id','class'=>'form-control','option_all'=>true);
                    $dropdown->create($attr);
                  ?>
                  </div>
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Desa</div>
                  <select name="desa_id" id="desa_id" class="form-control">
                    <option value="">Pilih Kecamatan Dulu</option>
                  </select>
                  </div>
                <button type="submit" class="btn btn-default btn-sm" name="cari" id="cari">CARI</button>
              </form>
            </div>
         </div>
         <!-- END JUDUL, TOMBOL & FORM CARI -->
         
         <!-- START PAGINATION & PESAN NOTIFIKASI -->
         <div class="row">
            <?php include $doc_template.'msg.php';?>
            <div class="col-md-12 text-center">
            <?php            
                $pgn->sql_all = "SELECT HP.*,DS.nama as ds_nama,KC.nama as kc_nama FROM hippam HP
                                JOIN desa DS ON HP.desa_kode=DS.kode
                                JOIN kecamatan KC ON DS.kecamatan_id=KC.id
                                WHERE HP.nama LIKE '%$nama%'
                                AND DS.id LIKE '%$desa_id%'
                                AND KC.id LIKE '%$kecamatan_id%'";
                $pgn->sql_param = "&nama=$nama&desa_id=$desa_id&kecamatan_id=$kecamatan_id";
                $pgn->render();
            ?>    
            </div>
         </div>
         <!-- END PAGINATION & PESAN NOTIFIKASI -->
             
         <!-- START TABEL DATA -->
         <div class="row">
             <div class="col-md-12">
               <div class="table-responsive">
                  <table class="table table-bordered table-condensed table-heading">
                    <thead>
                      <tr>
                          <th width="4%" style="text-align: center;">Aksi</td>
                          <th width="25%">Nama</td>
                          <th width="25%">Ketua</td>
                          <th width="25%">HP Ketua</td>
                          <th width="25%">Desa</td>
                          <th width="25%">Kecamatan</td>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $sql = $pgn->sql_all." ORDER BY KC.nama,DS.nama,HP.nama LIMIT $pgn->start,$pgn->dataperpage";
                      $data = $db->fetchdata($sql);
                      foreach($data as $dat){
                    ?>
                      <tr>
                        <td class="tooltip-demo" align="center">
                            <a href='<?php echo 'hippam_detail.php?id='.$dat['id'];?>' title="Ubah Data" rel="tooltip">
                                <div><i class="glyphicon glyphicon-pencil"></i></div>
                            </a>
                        </td>
                        <td><a href="<?=$addr_root.'data_teknis.php?id='.$dat['id']?>" title="Lihat Data" target="_blank"><?php echo $dat['nama'];?></a></td>
                        <td><?php echo $dat['ketua_nama'];?></td>
                        <td><?php echo $dat['ketua_telp'];?></td>
                        <td><?php echo $dat['ds_nama'];?></td>
                        <td><?php echo $dat['kc_nama'];?></td>
                      </tr>
                  <?php } ?>
                  </tbody>
                  </table>
                </div>
             </div>
         </div>
         <!-- END TABEL DATA -->
    </div>
    <?php include $doc_template.'footer.php';?>
    
    <?php include $doc_template.'bs_js.php';?>
  </body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $(".tooltip-demo").tooltip({
          selector: "a[rel=tooltip]"
        });
        //$("#nama").focus();
        $("#desa_id,#kecamatan_id").select2();
        //combo box
        $("#kecamatan_id").change(function(){
        var kecamatan_id = $("#kecamatan_id").val();
        var action = "desa";
          $.ajax({
            url: "hippam_proc.php",
            data: "kecamatan_id="+kecamatan_id+"&action="+action,
            success: function(data){
                $("#desa_id").html(data);
            }
          });
        });
        //end combo box
    });
</script>