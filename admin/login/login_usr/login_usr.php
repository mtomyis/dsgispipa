<?php include '../../script_awal.php'; ?>
<?php
    include $doc_root_class."class_custom.php";
    $cst = new custom();
    include $doc_root_class.'class_dropdown.php';
    $dropdown = new dropdown();
?>
<?php
    $page_id = $p_login_usr;
    $page_name = 'login_usr';
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
        <h3>LOGIN USER - LIHAT</h3>
      </div>
     <div class="row">
        <div class="col-md-3">
          <?php $cst->create_top_button($page_id,$page_name);?>
        </div>
        <div class="col-md-9 col-sm-12 col-xs-12">
          <form name="search_form" act="<?php echo $_SERVER['PHP_SELF'];?>" method="GET" class="form-inline pull-right" role="form">
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value='<?php if(isset($_GET['cari'])) echo $nama;?>'>
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
              $pgn->sql_all = "SELECT LU.id as id, LU.username as username, LU.jenis as jenis, LU.aktif as aktif
                          FROM  login_usr LU 
                              WHERE LU.username LIKE '%$nama%'  
                              AND LU.username!='admin'
                          GROUP BY LU.id";
              $pgn->sql_param = "&nama=$nama";
              $pgn->render();
            ?>    
          </div>
       </div>
       <!-- END PAGINATION & PESAN NOTIFIKASI -->   
         <!-- START TABEL DATA -->
         <div class="row">
           <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-condensed table-heading">
                <thead>
                  <tr>
                      <th width="5%"  style="text-align: center;">Aksi</th>
                      <th>Username</th>
                      <th width="30%" >Group</th>
                      <th width="20%" >Jenis</th>
                      <th width="10%">Aktif</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $sql = $pgn->sql_all." ORDER BY LU.username LIMIT $pgn->start,$pgn->dataperpage";
                  $data = $db->fetchdata($sql);
                  foreach($data as $dat){
                      $sql_grp = "SELECT LG.id, LG.nama 
                                  FROM login_usr_grp LUG 
                                  JOIN login_grp LG ON LUG.login_grp_id=LG.id
                                  WHERE LUG.login_usr_id='".$dat['id']."'";
                      $data_grp = $db->fetchdata($sql_grp);
                ?>
                  <tr>
                    <td class="tooltip-demo" align="center">
                        <a href='<?php echo $page_name.'_detail.php?id='.$dat['id'];?>' title="Ubah Data" rel="tooltip">
                            <i class="icon-pencil"></i>
                        </a>
                    </td>
                    <td><?php echo $dat['username'];?></td>
                    <td>
                        <?php
                          foreach($data_grp as $dat_grp){
                              echo $dat_grp['id'].' ';
                          }
                        ?>
                    </td>
                    <td><?php echo $dat['jenis'];?></td>
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