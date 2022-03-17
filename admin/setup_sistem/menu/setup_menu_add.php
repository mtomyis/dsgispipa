<?php include '../../script_awal.php'; ?>
<?php
include $doc_root_class."class_custom.php";
$cst = new custom();
?>
<?php
    if(isset($_GET['step']))
        $step = $_GET['step'];
    else
        $step = 0;
?>
<?php
    $page_id = $p_setup_menu;
    $page_name = 'setup_menu';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include $doc_template.'bs_meta.php';?>  
        <?php include $doc_template.'bs_css.php';?>  
    
        <!-- 
        <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
        <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css"> 
        -->
    </head>

    <body>
        <?php include $doc_template.'menu_top.php';?> 

         <div class="container-fluid">
            <div class="page-header">
            <h3>SETUP MENU - EDIT</h3>
          </div>
         <div class="row">
            <div class="col-md-3 col-sm-12 text-center">
              <?php $cst->create_top_button('10101','setup_menu');?>
            </div>
         </div>

            <!-- START PESAN NOTIFIKASI -->
         <div class="row text-center">
            <?php include $doc_template.'msg.php';?>
         </div>
            <!-- END & PESAN NOTIFIKASI -->         
            <div class="row">
                <div class="col-md-12">
                    <?php if($step==0){ ?> 
                    <table class="table table-striped table-bordered table-condensed table-heading table-responsive">
                    <thead>
                        <tr>
                            <th width="5%" style="text-align: center;">&nbsp;</th>
                            <th width="10%">Id</th>
                            <th width="20%">Nama Menu</th>
                            <th width="10%">Tipe</th>
                            <th width="5%">Level</th>
                            <th width="40%">Link</th>
                            <th width="5%">Aktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql =  "SELECT * FROM menu WHERE tipe='header' ORDER BY id";
                            $data = $db->fetchdata($sql);
                            foreach($data as $dat){
                                if($dat['icon'])
                                    $icon = "<i class='".$dat['icon']."'></i>";
                                else
                                    $icon = '';
                        ?>
                        <tr>
                            <td class="tooltip-demo" align="center">
                                <a href='<?php echo $_SERVER['PHP_SELF'].'?step=1&upline='.$dat['id'].'&level='.$dat['level'];?>' title="Pilih Data" rel="tooltip">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                <?php 
                                    // echo "<a href='".$_SERVER['PHP_SELF']."?step=1&upline=".$dat['id']."&level=".$dat['level']."'>[PILIH]</a>";
                                ?>
                            </td>
                            <td><?php echo $dat['id'];?></td>
                            <td>
                                <?php 
                                    for($k=1;$k<$dat['level'];$k++)
                                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo "<a href='".$_SERVER['PHP_SELF']."?step=1&upline=".$dat['id']."&level=".$dat['level']."'>".$icon.$dat['nama']."</a>";
                                ?>
                            </td>
                            <td><?php echo $dat['tipe'];?></td>
                            <td align="center"><?php echo $dat['level'];?></td>
                            <td><?php echo $dat['link'];?></td>
                            <td align="center"><?php echo $dat['aktif'];?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                    <?php }//if($step==0){ ?>     
                    <?php 
                        if($step==1){ 
                            $upline = $_GET['upline'];
                            $level = $_GET['level'];
                            $level++;
                    ?>  
                    <form action="setup_menu_proc.php" method="post" name="addForm" id="addForm" class=" well form-horizontal">
                        <!-- <legend>Form Tambah Menu</legend> -->
                            <table class="table table-condensed table-responsive">                                                
                                <tr>
                                    <td width="14%">Level</td><td>:</td>
                                    <td width="85%"><input name="level" type="text" id="level" value="<?php echo $level;?>" class="form-control" readonly="readonly" /></td>
                                </tr>
                                <tr>
                                    <td>Upline</td><td>:</td>
                                    <td><input name="upline" type="text" id="upline" value="<?php echo $upline;?>" class="form-control" readonly="readonly" /></td>
                                </tr>
                                <tr>
                                    <td>
                                    <?php
                                        $sql_up = "SELECT id,nama FROM menu WHERE id='$upline'";
                                        $dat_up = $db->datasql($sql_up);              
                                    ?>
                                    </td><td>:</td>
                                    <td><input name="textfield" type="text" id="textfield" value="<?php echo $dat_up[1];?>" class="form-control" readonly="readonly" /></td>
                                </tr>
                                <tr>
                                    <td>Id Menu
                                    <?php
                                        $sql_kode = "SELECT MAX(urut) FROM menu WHERE upline='$upline'";
                                        $dat_kode = $db->datasql($sql_kode);
                                        $urut = $dat_kode[0];
                                        if($urut == "")
                                            $urut = 0;
                                        $urut++;
                                        if($urut < 10)
                                            $kode_urut = "0".$urut;
                                        else
                                            $kode_urut = $urut;
                                        $id_menu = $upline.$kode_urut;
                                    ?>                          
                                    </td><td>:</td>
                                    <td><input type="text" name="id_menu" id="id_menu" value="<?php echo $id_menu;?>" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <td>Urut</td><td>:</td>
                                    <td><input name="urut" type="text" id="urut" value="<?php echo $urut;?>" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <td>Nama Menu</td><td>:</td>
                                    <td>
                                        <input type="text" name="nama_menu" id="nama_menu" class="form-control validate[required]">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tipe</td><td>:</td>
                                    <td><label>
                                        <select name="tipe" id="tipe" class="form-control">
                                            <option value="Header">Header</option>
                                            <option value="Detail">Detail</option>
                                        </select>
                                    </label></td>
                                </tr>
                                <tr>
                                    <td>Link</td><td>:</td>
                                    <td><input name="link" type="text" id="link" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <td>Icon</td><td>:</td>
                                    <td><input type="text" name="icon" id="icon" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td>

                                        <div class="btn-group" id="save_back_button">
                                            <?php $cst->create_back_button($page_id); ?>
                                            <?php $cst->create_save_add_button($page_id); ?>
                                            <input name="jenis" type="hidden" id="jenis" value="<?php echo $dat_up[2];?>" />
                                        </div>

                                    </td>
                                </tr>
                            </table>
                    </form>
                    <?php }//if($step==1){ ?>
                </div>
            </div><br>
        </div>
        <?php 
            include $doc_template.'footer.php';
            include $doc_template.'bs_js.php';
            include $doc_template.'bootstrapvalidator.php';
        ?>
    </body>
</html>

<script type="text/javascript">
$(function() {
    $('#addForm').validationEngine();
    $('#nama_menu').focus();
    $(".tooltip-demo").tooltip({
      selector: "a[rel=tooltip]"
    });
    // $('input:text:first').focus();
    
    /*$('input:text').bind("keydown", function(e) {
       var n = $("input:text").length;
       if (e.which == 13) 
       { //Enter key
         e.preventDefault(); //Skip default behavior of the enter key
         var nextIndex = $('input:text').index(this) + 1;
         if(nextIndex < n)
           $('input:text')[nextIndex].focus();
         else
         {
           $('input:text')[nextIndex-1].blur();
           $('#btnSubmit').click();
         }
       }
     });
  
    $("#tanggal_lahir").datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        yearRange: '1940:2030'
    }); */
});

</script>