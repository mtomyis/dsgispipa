<?php include '../../script_awal.php'?>
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>IVORY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="tguh" >
    <?php include $doc_root.'bs_linkrel.php';?>  
    
    
  <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>

  <body>
    <?php include $doc_root.'header.php';?>
      <!-- 
      Put Your Content Here
      -->
      <?php include $doc_root.'menu_top.php';?> 
      <div class="row-fluid">
          <div class="span12" id="div_page_title">
              SETUP MENU - TAMBAH
          </div>
      </div>
      <div class="row-fluid">
          <div class="span12" id="div_top_btn">
              <?php echo $cst->create_top_button('10101','setup_menu');?>
          </div>
      </div>

<?php if($step==0){ ?>        
      <div class="align_center" style="padding: 5px 5px 5px 5px"><span class="label label-info">Pilih Upline dibawah ini, Klik Nama Menu</span></div>
      <table width="750"  border="0" align="center" cellpadding="2" cellspacing="1" class="table table-striped table-bordered table-condensed">
          <thead>
        <tr valign="middle" align="center">
            <th width="1%" ><strong>&nbsp;</strong></th>
            <th width="10%" ><strong>Id</strong></th>
            <th ><strong>Nama Menu</strong></th>
            <th width="10%" ><strong>Tipe</strong></th>
            <th width="1%" ><strong>Level</strong></th>
            <th ><strong>Link</strong></th>
            <th width="1%" ><strong>Aktif</strong></th>
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
        <tr valig1" n="top">
            <td>
                <?php 
                    echo "<a href='".$_SERVER['PHP_SELF']."?step=1&upline=".$dat['id']."&level=".$dat['level']."'>[PILIH]</a>";
                ?>
            </td>
            <td><?php echo $dat['id'];?></td>
            <td nowrap="1" >
                <?php 
                    for($k=1;$k<$dat['level'];$k++)
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo "<a href='".$_SERVER['PHP_SELF']."?step=1&upline=".$dat['id']."&level=".$dat['level']."'>".$icon.$dat['nama']."</a>";
                ?>
            </td>
            <td><?php echo $dat['tipe'];?></td>
            <td align="center"><?php echo $dat['level'];?></td>
            <td nowrap="1" ><?php echo $dat['link'];?></td>
            <td align="center"><?php echo $dat['aktif'];?></td>
        </tr>
        <?php
            }
        ?>
        </tbody>
      </table>
<?php }//if($step==0){ ?>     
<?php 
    if($step==1){ 
        $upline = $_GET['upline'];
        $level = $_GET['level'];
        $level++;
?>  
      
      <form action="setup_menu_proc.php" method="post" name="form1" id="form1" class="form-horizontal">
        <fieldset>
            <legend>Form Tambah Menu</legend>
            <table width="75%" border="0" cellpadding="2" cellspacing="1" class="table table-striped">                                                
                        <tr valign="middle">
                          <td width="20%" align="right">Level
                          </td>
                          <td width="80%" align="left"><input name="level" type="text" id="level" value="<? echo $level;?>" size="3" readonly="readonly" /></td>
                        </tr>
                        <tr valign="middle">
                          <td align="right">Upline</td>
                          <td align="left"><input name="upline" type="text" id="upline" value="<? echo $upline;?>" size="10" readonly="readonly" /></td>
                        </tr>
                        <tr valign="middle">
                          <td align="right"><?
						  	$sql_up = "SELECT id,nama FROM menu WHERE id='$upline'";
							$dat_up = $db->datasql($sql_up);
							
						  ?></td>
                          <td align="left"><input name="textfield" type="text" id="textfield" value="<? echo $dat_up[1];?>" size="35" readonly="readonly" /></td>
                        </tr>
                        <tr valign="middle">
                          <td align="right">Id Menu
                          <?
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
						  ?>                          </td>
                          <td align="left"><input type="text" name="id_menu" id="id_menu" value="<? echo $id_menu;?>" />
                            </td>
                        </tr>
                        <tr valign="middle">
                            <td>Urut</td>
                            <td><input name="urut" type="text" id="urut" value="<? echo $urut;?>" /></td>
                        </tr>
                        <tr valign="middle">
                          <td align="right">Nama Menu</td>
                          <td align="left">
                              <input type="text" name="nama_menu" id="nama_menu" class="validate[required]">
                          </td>
                        </tr>
                        <tr valign="middle">
                          <td align="right">Tipe</td>
                          <td align="left"><label>
                            <select name="tipe" id="tipe">
                              <option value="Header">Header</option>
                              <option value="Detail">Detail</option>
                            </select>
                          </label></td>
                        </tr>
                        <tr valign="middle">
                          <td align="right">Link</td>
                          <td align="left"><input name="link" type="text" id="link" size="50" class="input-xxlarge" /></td>
                        </tr>
                        <tr valign="middle">
                          <td align="right">Icon                                                  </td>
                          <td align="left"><input type="text" name="icon" id="icon" />
                            </td>
                        </tr>
                        <tr valign="middle">
                          <td align="right">&nbsp;</td>
                          <td align="left"><input type="submit" name="Submit" id="Submit" value="Simpan" class="btn"  />
                              <input type="hidden" name="act" value="add">
                            <input name="jenis" type="hidden" id="jenis" value="<? echo $dat_up[2];?>" /></td>
                        </tr>
                        
                      </table>
        </fieldset>
    </form>
<?php }//if($step==1){ ?>        
<br>
<?php 
    include $doc_root.'footer.php';
    include $doc_root.'bs_js.php';
    include $doc_root.'js_validation.php';
?>
    </body>
</html>

<script type="text/javascript">
$(function() {
    $('#form1').validationEngine();
    
    $('input:text:first').focus();
    
    $('input:text').bind("keydown", function(e) {
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
    });

  

    
});

</script>


   
