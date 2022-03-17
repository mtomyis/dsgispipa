<?php include '../../script_awal.php'; ?>
<?php
    include $doc_root_class."class_custom.php";
    $cst = new custom();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include $doc_template.'bs_meta.php';?>
        <?php include $doc_template.'bs_css.php';?>     
        
        <!-- TREE VIEW -->
    	<!--
    	<link rel="stylesheet" href="js/treeview/jquery.treeview.css" />
    	<link rel="stylesheet" href="js/treeview/screen.css" />
    	<script src="js/treeview/lib/jquery.js" type="text/javascript"></script>
    	<script src="js/treeview/lib/jquery.cookie.js" type="text/javascript"></script>
    	<script src="js/treeview/jquery.treeview.js" type="text/javascript"></script>
    	<script type="text/javascript" src="js/treeview/demo.js"></script>
    	-->
        <!-- END TREE VIEW -->

    </head>

    <body>
        <?php include $doc_template.'menu_top.php';?> 

        <div class="container-fluid well">
            <!-- START JUDUL & TOMBOL -->
            <div class="page-header">
            <h3>SETUP MENU - LIHAT</h3>
          </div>
         <div class="row">
            <div class="col-md-3 col-sm-12 text-center">
              <?php $cst->create_top_button('10101','setup_menu');?>
            </div>
         </div>
            <!-- END JUDUL & TOMBOL -->

            <!-- START PESAN NOTIFIKASI -->
         <div class="row text-center">
            <?php include $doc_template.'msg.php';?>
         </div>
            <!-- END & PESAN NOTIFIKASI -->
                
            <!-- START TABEL DATA -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-condensed table-heading table-responsive">
                        <thead>
                        <tr>
                            <th width="5%" style="text-align: center;">&nbsp;</th>
                            <th width="10%">Id</th>
                            <th width="5%">Urut</th>
                            <th width="20%">Nama Menu</th>
                            <th width="10%">Tipe</th>
                            <th width="5%">Level</th>
                            <th width="40%">Link</th>
                            <th width="5%">Aktif</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql =  "SELECT * FROM menu WHERE level=1 ORDER BY upline,urut,id";
                                $data = $db->fetchdata($sql);
                                foreach($data as $dat){
                                    if($dat['icon'])
                                        $icon = "<i class='".$dat['icon']."'></i>";
                                    else
                                        $icon = '';
                            ?>
                            <tr>
                                <td class="tooltip-demo" align="center">
                                    <a href='<?php echo 'setup_menu_detail.php?id='.$dat['id'];?>' title="Ubah Data" rel="tooltip">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                                <td><?php echo $dat['id'];?></td>
                                <td><?php echo $dat['urut'];?></td>
                                <td nowrap="1" >
                                    <?php 
                                        for($k=1;$k<$dat['level'];$k++)
                                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                        echo "<a href='setup_menu_detail.php?id=".$dat['id']."'>".$icon.$dat['nama']."</a>";
                                    ?>
                                </td>
                                <td><?php echo $dat['tipe'];?></td>
                                <td align="center"><?php echo $dat['level'];?></td>
                                <td nowrap="1" ><?php echo $dat['link'];?></td>
                                <td align="center"><?php echo $dat['aktif'];?></td>
                            </tr>
                            <?php
                                $sql =  "SELECT * FROM menu WHERE upline=".$dat['id']." ORDER BY upline,urut,id";
                                $data2 = $db->fetchdata($sql);
                                foreach($data2 as $dat2){
                                    if($dat2['icon'])
                                        $icon = "<i class='".$dat2['icon']."'></i>";
                                    else
                                        $icon = '';
                            ?>
                            <tr>
                                <td class="tooltip-demo" align="center">
                                    <a href='<?php echo 'setup_menu_detail.php?id='.$dat2['id'];?>' title="Ubah Data" rel="tooltip">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                                <td><?php echo $dat2['id'];?></td>
                                <td><?php echo $dat2['urut'];?></td>
                                <td nowrap="1" >
                                    <?php 
                                        for($k=1;$k<$dat2['level'];$k++)
                                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                        echo "<a href='setup_menu_detail.php?id=".$dat2['id']."'>".$icon.$dat2['nama']."</a>";
                                    ?>
                                </td>
                                <td><?php echo $dat2['tipe'];?></td>
                                <td align="center"><?php echo $dat2['level'];?></td>
                                <td nowrap="1" ><?php echo $dat2['link'];?></td>
                                <td align="center"><?php echo $dat2['aktif'];?></td>
                            </tr>
                            <?php
                                $sql =  "SELECT * FROM menu WHERE upline=".$dat2['id']." ORDER BY upline,urut,id";
                                $data3 = $db->fetchdata($sql);
                                foreach($data3 as $dat3){
                                    if($dat3['icon'])
                                        $icon = "<i class='".$dat3['icon']."'></i>";
                                    else
                                        $icon = '';
                            ?>
                            <tr>
                                <td class="tooltip-demo" align="center">
                                    <a href='<?php echo 'setup_menu_detail.php?id='.$dat3['id'];?>' title="Ubah Data" rel="tooltip">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                                <td><?php echo $dat3['id'];?></td>
                                <td><?php echo $dat3['urut'];?></td>
                                <td nowrap="1" >
                                    <?php 
                                        for($k=1;$k<$dat3['level'];$k++)
                                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                        echo "<a href='setup_menu_detail.php?id=".$dat3['id']."'>".$icon.$dat3['nama']."</a>";
                                    ?>
                                </td>
                                <td><?php echo $dat3['tipe'];?></td>
                                <td align="center"><?php echo $dat3['level'];?></td>
                                <td nowrap="1" ><?php echo $dat3['link'];?></td>
                                <td align="center"><?php echo $dat3['aktif'];?></td>
                            </tr>
                            <?php
                                $sql =  "SELECT * FROM menu WHERE upline=".$dat3['id']." ORDER BY upline,urut,id";
                                $data4 = $db->fetchdata($sql);
                                foreach($data4 as $dat4){
                                    if($dat4['icon'])
                                        $icon = "<i class='".$dat4['icon']."'></i>";
                                    else
                                        $icon = '';
                            ?>
                            <tr>
                                <td class="tooltip-demo" align="center">
                                    <a href='<?php echo 'setup_menu_detail.php?id='.$dat4['id'];?>' title="Ubah Data" rel="tooltip">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                                <td><?php echo $dat4['id'];?></td>
                                <td><?php echo $dat4['urut'];?></td>
                                <td nowrap="1" >
                                    <?php 
                                        for($k=1;$k<$dat4['level'];$k++)
                                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                        echo "<a href='setup_menu_detail.php?id=".$dat4['id']."'>".$icon.$dat4['nama']."</a>";
                                    ?>
                                </td>
                                <td><?php echo $dat4['tipe'];?></td>
                                <td align="center"><?php echo $dat4['level'];?></td>
                                <td nowrap="1" ><?php echo $dat4['link'];?></td>
                                <td align="center"><?php echo $dat4['aktif'];?></td>
                            </tr>
                            <?php
                                $sql =  "SELECT * FROM menu WHERE upline=".$dat4['id']." ORDER BY upline,urut,id";
                                $data5 = $db->fetchdata($sql);
                                foreach($data5 as $dat5){
                                    if($dat5['icon'])
                                        $icon = "<i class='".$dat5['icon']."'></i>";
                                    else
                                        $icon = '';
                            ?>
                            <tr>
                                <td class="tooltip-demo" align="center">
                                    <a href='<?php echo 'setup_menu_detail.php?id='.$dat5['id'];?>' title="Ubah Data" rel="tooltip">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                                <td><?php echo $dat5['id'];?></td>
                                <td><?php echo $dat5['urut'];?></td>
                                <td nowrap="1" >
                                    <?php 
                                        for($k=1;$k<$dat5['level'];$k++)
                                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                        echo "<a href='setup_menu_detail.php?id=".$dat5['id']."'>".$icon.$dat5['nama']."</a>";
                                    ?>
                                </td>
                                <td><?php echo $dat5['tipe'];?></td>
                                <td align="center"><?php echo $dat5['level'];?></td>
                                <td nowrap="1" ><?php echo $dat5['link'];?></td>
                                <td align="center"><?php echo $dat5['aktif'];?></td>
                            </tr>
                            <?php
                                }
                            ?>
                            <?php
                                }
                            ?>
                            <?php
                                }
                            ?>
                            <?php
                                }
                            ?>
                            <?php
                                }
                            ?>
                    </tbody>
                    </table>
                </div>
            </div>
            <!-- END TABEL DATA -->
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


   
