<?php 
    include '../../script_awal.php';
    include $doc_root_class."class_custom.php";
    $cst = new custom();
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM menu WHERE id='$id'";
    $dat = $db->datasql($sql);
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
                    <form action="setup_menu_proc.php" method="post" name="editForm" id="editForm" class="well form-horizontal">
                        <!-- <legend>Form Edit Menu</legend> -->
                        <table class="cst_table">                                                
                            <tr>
                                <td width="14%">Level</td><td>:</td>
                                <td width="85%"><div class="col-md-2"><input name="level" type="text" id="level" value="<?php echo $dat['level'];?>" class="form-control" readonly="readonly" /></div></td>
                            </tr>
                            <tr>
                                <td>Upline</td><td>:</td>
                                <td><div class="col-md-2"><input name="upline" type="text" id="upline" value="<?php echo $dat['upline'];?>" class="form-control" readonly="readonly" /></div></td>
                            </tr>
                            <tr>
                                <td>
                                <?php
                                    $sql_up = "SELECT id,nama FROM menu WHERE id='".$dat['upline']."    '";
                                    $dat_up = $db->datasql($sql_up);
                                ?>
                                </td><td>:</td>
                                <td><div class="col-md-5"><input name="textfield" type="text" id="textfield" value="<?php echo $dat_up[1];?>" class="form-control" readonly="readonly" /></div></td>
                            </tr>
                            <tr>
                                <td>Id Menu</td><td>:</td>
                                <td>
                                    <div class="col-md-4">
                                    <input type="text" name="id_menu" id="id_menu" class="form-control" value="<?php echo $id;?>" />
                                    <input type="hidden" name="id_menu_old" id="id_menu_old" class="form-control" value="<?php echo $id;?>" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Urut</td><td>:</td>
                                <td><div class="col-md-2"><input name="urut" type="text" id="urut" class="form-control" value="<?php echo $dat['urut'];?>" /></div></td>
                            </tr>
                            <tr>
                                <td>Nama Menu</td><td>:</td>
                                <td>
                                    <div class="col-md-5"><input type="text" name="nama_menu" id="nama_menu" class="form-control validate[required]" value="<?php echo $dat['nama'];?>" class="validate[required]"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Tipe</td><td>:</td>
                                <td><label>
                                    <select name="tipe" id="tipe" class="form-control">
                                    <div class="col-md-4">
                                        <option value="Header" <?php if($dat["tipe"] == "Header") echo "selected='selected'";?> >Header</option>
                                        <option value="Detail" <?php if($dat["tipe"] == "Detail") echo "selected='selected'";?> >Detail</option>
                                    </div>
                                    </select>
                                </label></td>
                            </tr>
                            <tr>
                                <td>Level</td><td>:</td>
                                <td><div class="col-md-2"><input name="level" type="text" id="level" value="<?php echo $dat["level"];?>" class="form-control" readonly="readonly" /></div></td>
                            </tr>
                            <tr>
                                <td>Link</td><td>:</td>
                                <td><div class="col-md-6"><input name="link" type="text" id="link" value="<?php echo $dat["link"];?>" class="form-control"/></div></td>
                            </tr>
                            <tr>
                                <td>Icon</td><td>:</td>
                                <td><div class="col-md-6"><input type="text" name="icon" id="icon" value="<?php echo $dat['icon'];?>" class="form-control"/></div></td>
                            </tr>
                            <tr>
                                <td>Aktif</td><td>:</td>
                                <td>
                                  <div class="col-md-3"><input name="aktif" type="text" id="aktif" value="<?php echo $dat["aktif"];?>" class="form-control" /></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                                <td>

                                    <div class="btn-group" id="save_back_button">
                                        <?php $cst->create_back_button($page_id); ?>
                                        <?php $cst->create_save_button($page_id); ?>
                                    </div>

                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div><br>
        <?php include $doc_template.'footer.php';?>
        <?php include $doc_template.'bs_js.php';?>
        <?php include $doc_template.'bootstrapvalidator.php';?>
        <!-- 
        <script type="text/javascript" src="<?php //echo $addr_root_validation_engine;?>jquery.validationEngine.js"></script>
        <script type="text/javascript" src="<?php //echo $addr_root_validation_engine;?>jquery.validationEngine-id.js"></script>
        -->
    </body>
</html>

<script type="text/javascript">
    $(function(){
        $('#editForm').validationEngine();
    })
    
</script>


   
