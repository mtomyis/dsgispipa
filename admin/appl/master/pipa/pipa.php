<?php include '../../../script_awal.php'; ?>
<?php
    include $doc_root_class."class_custom.php";
    $cst = new custom();
    include $doc_root_class.'class_dropdown.php';
    $dropdown = new dropdown();
?>
<?php
    $page_id = $p_pipa;
    $page_name = 'pipa';
?>
<?php
    include $doc_root."class/class_pagination.php";
    $pgn = new pagination;
    
    if(isset($_GET['cari'])){
        $nama = $_GET['nama'];
        $hippam_id = $_GET['hippam_id'];
    }
    else{
        $nama = '';
        $hippam_id = '';
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
            <h3>PIPA-LIHAT</h3>
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
                    <div class="input-group-addon">Hippam</div>
                    <?php
                      $sql_hippam = 'SELECT * FROM hippam';
                      $attr = array('sql'=>$sql_hippam,
                                'name'=>'hippam_id',
                                'id'=>'hippam_id',
                                'option_all'=>true,
                                'value'=>$hippam_id);
                      $dropdown->create($attr);
                    ?>
                  </div>
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
                $pgn->sql_all = "SELECT PP.*,HP.nama as hp_nama, PJ.bahan as pj_bahan, PJ.ukuran as pj_ukuran FROM pipa PP
                                JOIN hippam HP ON PP.hippam_id=HP.id
                                JOIN pipa_jenis PJ ON PJ.id=PP.pipa_jenis_id
                                WHERE PP.nama LIKE '%$nama%'
                                AND HP.id LIKE '%$hippam_id%'";
                $pgn->sql_param = "&nama=$nama&hippam_id=$hippam_id";
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
                          <th width="25%">Hippam</td>
                          <th width="25%">Nama</td>
                          <th width="25%">Jenis Pipa</td>
                          <th width="25%">Keterangan</td>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $sql = $pgn->sql_all." ORDER BY PJ.id,HP.nama LIMIT $pgn->start,$pgn->dataperpage";
                      $data = $db->fetchdata($sql);
                      foreach($data as $dat){
                    ?>
                      <tr>
                        <td class="tooltip-demo" align="center">
                            <a href='<?php echo 'pipa_detail.php?id='.$dat['id'];?>' title="Ubah Data" rel="tooltip">
                                <div><i class="glyphicon glyphicon-pencil"></i></div>
                            </a>
                        </td>
                        <td><?php echo $dat['hp_nama'];?></td>
                        <td><?php echo $dat['nama'];?></td>
                        <td><?php echo $dat['pj_bahan']."&Oslash;".$dat['pj_ukuran']."\"";?></td>
                        <td><?php echo $dat['keterangan'];?></td>
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
         $("#hippam_id").select2({
          placeholder: "Hippam",
          allowClear: true
         });
    });
</script>