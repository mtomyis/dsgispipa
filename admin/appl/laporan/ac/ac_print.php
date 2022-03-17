<?php
    include '../../../script_awal.php';
    include $doc_root."log.php";
    include $doc_root_class.'class_custom.php';
    $cst = new custom();
    include $doc_root_class.'class_date.php';
    $date = new date();
    include $doc_root_class.'class_input_form.php';
    $frm = new input_form();
?>
<?php
    $page_id = $p_laporan_ac;
    $page_name = 'laporan_ac';
?>
<?php
    /*$ruang_id = $frm->input_post('ruang_id');
    $gedung_id = $frm->input_post('gedung_id');*/
    $unit_id = $frm->input_post('unit_id');
    $perusahaan_id = $frm->input_post('perusahaan_id');

    $sql = "SELECT AC.*,AJ.id as ac_jenis_id, AJ.nama as ac_jenis_nama, AK.id as ac_merk_id, AK.nama as ac_merk_nama,
            RG.nama as ruang_nama, GD.nama as gedung_nama, UN.nama as unit_nama, PR.nama as perusahaan_nama,PR.kota as kota
            FROM ac AC
            JOIN ac_jenis AJ ON AJ.id=AC.ac_jenis_id
            JOIN ac_merk AK ON AK.id=AC.ac_merk_id
            JOIN ruang RG ON RG.id=AC.ruang_id
            JOIN gedung GD ON GD.id=RG.gedung_id
            JOIN unit UN ON UN.id=GD.unit_id
            JOIN perusahaan PR ON PR.id=UN.perusahaan_id 
            WHERE PR.id LIKE '%$perusahaan_id%'
            AND UN.id LIKE '%$unit_id%'
            ORDER BY PR.nama,UN.nama,GD.nama,RG.nama";
    $data = $db->datasql($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include $doc_template.'bs_meta.php';?>   
    <?php include $doc_template.'bs_css.php';?>     
      <style>
          body{
              background-color: white;
              padding: 2px 2px 2px 2px;
          }
      </style>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-10">
            <p class="lead">DAFTAR DATA UNIT AC<br>PERAWATAN DAN PEMELIHARAAN AC (NON SPLIT DUCT)<br>
                <?=$data['perusahaan_nama']." ".strtoupper($data['kota'])." ".$data['unit_nama'];?>
            </p>
          </div>
          <div class="col-sm-2"><img src="<?php echo $addr_root_pics.'logo.jpg';?>" width="85"/></div>
        </div>
          
             
         <!-- START TABEL DATA -->
         <div class="row">
             <div class="col-md-12">
               <div class="table-responsive">
                  <table class="table table-bordered table-condensed">
                    <thead>
                      <tr>
                          <th width="4%" style="text-align: center;" rowspan="2">No</td>
                          <th width="8%" rowspan="2">Unit ID</td>
                          <th width="8%" rowspan="2">Service ID</td>
                          <th width="8%" rowspan="2">Gedung</td>
                          <th rowspan="2">Ruang</td>
                          <th width="13%" rowspan="2">Jenis</td>
                          <th width="6%" rowspan="2">Merk</td>
                          <th colspan="2">Type</td>
                          <th colspan="4">Cooling Capacity</td>
                          <th colspan="2">Power Supply</td>
                      </tr>
                      <tr>
                        <th>Indoor</th>
                        <th>Outdoor</th>
                        <th>KCAL/H</th>
                        <th>PK</th>
                        <th>BTuH</th>
                        <th>KW</th>
                        <th>Voltase</th>
                        <th>Phase</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $no = 1;
                      $data = $db->fetchdata($sql);
                      foreach($data as $dat){
                    ?>
                      <tr>
                        <td class="tooltip-demo" align="center"><?=$no?></td>
                        <td><?php echo $dat['unit_idp'];?></td>
                        <td><?php echo $dat['service_id'];?></td>
                        <td><?php echo $dat['gedung_nama'];?></td>
                        <td><?php echo $dat['ruang_nama'];?></td>
                        <td><?php echo $dat['ac_jenis_nama'];?></td>
                        <td><?php echo $dat['ac_merk_nama'];?></td>
                        <td><?php echo $dat['indoor'];?></td>
                        <td><?php echo $dat['outdoor'];?></td>
                        <td class="text-right"><?php echo $cst->currency($dat['kcal'],0);?></td>
                        <td class="text-right"><?php echo $cst->currency($dat['pk'],1);?></td>
                        <td class="text-right"><?php echo $cst->currency($dat['btuh'],1);?></td>
                        <td class="text-center"><?php echo $cst->currency($dat['kw'],2);?></td>
                        <td class="text-center"><?php echo $dat['voltase'];?></td>
                        <td class="text-center"><?php echo $dat['phase'];?></td>
                      </tr>
                  <?php $no++;} ?>
                  </tbody>
                  </table>
                </div>
             </div>
         </div>
         <!-- START TABEL DATA -->
    </div><br>
    <?php //include $doc_template.'footer.php';?>
    <?php //include $doc_template.'bs_js.php';?>
  </body>
</html>