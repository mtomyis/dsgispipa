<?php include '../../script_awal.php'; ?>
<?php
    include $doc_root_class."class_custom.php";
    $cst = new custom();
    include $doc_root_class.'class_dropdown.php';
    $dropdown = new dropdown();
?>
<?php
    $page_id = $p_login_grp;
    $page_name = 'login_grp';
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
            <h3>LOGIN GROUP - LIHAT</h3>
          </div>
         <div class="row">
            <div class="col-md-3 col-sm-12 text-center">
              <?php $cst->create_top_button($page_id,$page_name);?>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
              <form name="search_form" act="<?php echo $_SERVER['PHP_SELF'];?>" method="GET" class="form-inline" role="form">
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value='<?php if(isset($_GET['cari'])) echo $nama;?>'>
                <button type="submit" class="btn btn-default" name="cari" id="cari">CARI</button>
              </form>
            </div>
         </div>
         <!-- END JUDUL, TOMBOL & FORM CARI -->
         
         <!-- START PAGINATION & PESAN NOTIFIKASI -->
         <div class="row">
            <?php include $doc_template.'msg.php';?>
            <div class="col-md-12 text-center">
            <?php            
                $pgn->sql_all = "SELECT LG.*
                                FROM login_grp LG
                                WHERE LG.nama LIKE '%$nama%' 
                                ORDER BY LG.nama";
                $pgn->sql_param = "&nama=$nama";
                $pgn->dataperpage = 15;
                $pgn->render();
            ?>    
            </div>
         </div>
         <!-- END PAGINATION & PESAN NOTIFIKASI -->
         <!-- START TABEL DATA -->
         <div class="row">
             <div class="col-md-12">
                <table class="table table-striped table-bordered table-condensed table-heading table-responsive">
                  <thead>
                    <tr>
                        <th width="5%"  style="text-align: center;">Aksi</th>
                        <th width="5%" >Kode</th>
                        <th>Nama Group</th>
                        <th width="10%">Aktif</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $sql = $pgn->sql_all." LIMIT $pgn->start,$pgn->dataperpage";
                    $data = $db->fetchdata($sql);
                    foreach($data as $dat){
                  ?>
                    <tr>
                      <td class="tooltip-demo" align="center">
                          <a href='<?php echo $page_name.'_detail.php?id='.$dat['id'];?>' title="Ubah Data" rel="tooltip">
                              <i class="glyphicon glyphicon-pencil"></i>
                          </a>
                      </td>
                      <td><?php echo $dat['id'];?></td>
                      <td><?php echo $dat['nama'];?></td>
                      <td>
                          <?php 
                            if($dat['aktif']==1)
                                echo "<div class='align_left'><i class='icon-ok-sign'></i></div>";
                            else
                                echo "<div class='align_right'><i class='icon-minus-sign'></i></div>";
                          ?>
                      </td>
                    </tr>
                <?php } ?>
                </tbody>
              </table>
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
        //$("#nama").focus();
    });
</script>