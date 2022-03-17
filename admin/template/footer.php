    <!-- <footer> -->
        <div class="container-fluid">
            <div class="row  well well-sm">
                <div class="col-sm-6">
                	<?php
                      if ($_SESSION['login_grp_id']=='SA') {
                          echo 'Lama Eksekusi '.$time_execution->end().' s';
                      }
                	?>
                </div>
                <div class="col-sm-6 text-right"><?php echo  $_SESSION['username'].' | '.$_SESSION['login_grp_id'].' | '.date('d-m-Y');?> | <a href="#">Laporkan Masalah</a></div>
            </div>
        </div>
    <!-- </footer> -->
    <?php
        //print_r($_SESSION);
        
    ?>