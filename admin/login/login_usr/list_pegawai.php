<?php 
    include '../../script_awal.php';
    include $doc_root_class."class_custom.php";
    $cst = new custom();
    include $doc_root_class."class_variable.php";
    $var = new variable;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include $doc_root.'bs_meta.php';?>   
    <?php include $doc_root.'bs_css.php';?>     
</head>

<body>
<script language="javascript">
if (opener && opener.document && opener.document.myform) {		
		opener.document.value = 'myform';
	}
</script>
<div align="center">
  <table width="100%" border="0" cellpadding="0" cellspacing="3" bgcolor="#F5F5F5" >
    <tr>
      <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
        
        <tr>
          <td bgcolor="#FFFFFF" class="JudulVerdana4"><div align="left">
            <table width="100%" border="0" cellpadding="2" cellspacing="1" >
              <tr>
                <td width="63%"><div align="left" class="popup_title">DAFTAR PEGAWAI</div></td>
                </tr>
            </table>
          </div></td>
        </tr>
        
        <tr>
          <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="2" cellspacing="0" >
            <tr>
              <td width="20%" valign="top"><div align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="2">
				
                  <tr>
                    <td valign="middle" align="left" class="JudulVer2">
                        <?php
                                
                                if(isset($_POST['act'])){
                                    $act = $_POST['act'];
                                    $nama = $_POST['nama'];

                                }
                                else{
                                    $act = '';
                                    $nama = '';
                                }
                                if(isset($_GET['nama'])){
                                    $nama = $_GET['nama'];
                                }
                                if(isset($_POST['page']))
                                    $page = $_POST['page'];
                                else
                                    $page = '';
                                if(isset($_POST['Prev']))
                                        $page--;
                                if(isset($_POST['Next']))
                                        $page++;
                        ?>
                      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="form1" id="form1">
                        Nama 
                        <input name="nama" type="text" id="nama" value="<?php echo $nama;?>" class="input-medium"/>
                        <input type="submit" name="Submit" id="button" value="Search" />
                        <input name="act" type="hidden" id="act" value="cari" />
                    </form>
                    </td>
                  </tr>
				  
                  <tr>
                    <td height="2" valign="top" bgcolor="#EBEBEB"></td>
                  </tr>
                  <tr>
                    <td height="111" valign="top">
                        <?php

                            $act = "cari";
                            if($act == "cari"){
                                $dataperpage=15;
                                if($page<1)
                                        $page=1;
                                $i=0;
                                $sql_all="SELECT * FROM pegawai WHERE aktif='1' AND nama LIKE '%$nama%' ";
                                //$res_all=$db->sqlquery($sql_all);
                                $jml_all=$db->jumrec($sql_all);
                                $jml_page=ceil($jml_all/$dataperpage);
                                if($page>$jml_page)
                                        $page=$page-1;
                                $start=($page-1)*$dataperpage;
                                $next=$page+1;
                                $prev=$page-1;
                                if ($jml_page > 1){
                      ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="1">
                          <tr valign="top">
                            <td align="center"><form action="#" method="post" name="form" id="form">
                              Page
                              <input type="submit" name="Prev" id="Prev" value="Prev" />
              <select name="page" id="page" onchange="form.submit()" class="input-mini" >
                    <?php for ($n=1;$n<=$jml_page;$n++){
                        if($page == $n)
                                echo "<option value='$n' selected='selected'>$n</option>";
                        else
                            echo "<option value='$n'>$n</option>";
                        } 
                    ?>
              </select>
              <input type="submit" name="Next" id="Next" value="Next" />
              <input name="act" type="hidden" id="act" value="<?php echo $act;?>" />
              <input name="nama" type="hidden" id="nama" value="<?php echo $nama;?>" />
                            </form></td>
                          </tr>
                        </table>
                      <?php	}//if ($jml_page > 1) ?>
                      <table class="table table-striped table-bordered table-condensed">
                          <thead>
                              <tr>
                                  <td width='5%'>No</td>
                                  <td width='5%'>No. Induk</td>
                                  <td>Nama</td>
                              </tr>
                            </thead>
                          <tbody>
                          <?php
                                $sql = $sql_all." ORDER BY nama LIMIT $start,$dataperpage";
                                $data = $db->fetchdata($sql);
                                $jml_data = $db->jumrec($sql);
                                foreach($data as $dat){
                                    $i++;
								
                            ?>
                          
                          <tr valign="top" style="cursor: pointer;" 
                              onclick="
                                    opener.document.myform.pegawai_id.value='<?php echo $dat['id'];?>'; 
                                    opener.document.myform.pegawai_nama.value='<?php echo $dat['nama'];?>'; 
                                    self.close()"" >
                            <td align="right"><?php echo $no = $start + $i;?>.&nbsp;</td>
                            <td><div align="left">  <?php echo $dat['id']; ?></div></td>
                            <td><div align="left">  <?php echo $dat['nama']; ?></div></td>
                            </tr>
                          <?php 
						  	
                                } 
                                if($i == 0){
                                ?>
                        <tr>
                            <td colspan="4" align="center" valign="middle" class="JudulVerdana3"><span class="style32">DATA KOSONG </span></td>
                          </tr>
                                <?php
                                }
                                ?>
                              </tbody>
                        </table>
                        <?php  } ?></td>
                  </tr>
                  
                </table>
              </div></td>
              </tr>
          </table></td>
        </tr>

      </table></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php include $doc_root.'bs_js.php';?>
<script type="text/javascript">
    $(function(){
        $('#nama').focus();
    })

</script>
