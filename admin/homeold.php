<?php include 'script_awal.php'; ?>
<?php
    $_SESSION['data_ref'] = '';
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include $doc_template.'bs_meta.php'; ?>
    <?php include $doc_template.'bs_css.php'; ?> 
    <style type="text/css">
      #title{
            background-color: lightgrey;
            color: black;
            padding: 0px 0px 0px 10px ;
        }
    </style>
  </head>

  <body>
      <?php include $doc_template.'menu_top.php'; ?>

      <!-- Begin page content -->
    <div class="container-fluid">
      <div class="row well">
          <div class="col-md-6 text-center">
            <h2>Sistem Informasi Geografis</h2>
              <h3>Jaringan Perpipaan Air Bersih</h3>
            <p>&nbsp;</p>
            <img src="<?php echo $addr_root_pics.'logo.jpg';?>" width="200" />
            <?php
              echo '<h3>'.$_SESSION['sekolah_nama'].'</h3>';
              // echo '<h3>'.$_SESSION['sekolah_alamat'].'</h3>';
            ?>
          </div>
          <div class="col-md-6">
            <div id="title">
                <h2>Selamat Datang</h2>
            </div>
            <div>
               
                
            </div>
          </div>
      </div>
    </div> 
      
      <?php include $doc_template.'footer.php'; ?>     
      <?php include $doc_template.'bs_js.php'; ?>
      <?php //print_r($_SESSION);?>
  </body>
</html>


   
