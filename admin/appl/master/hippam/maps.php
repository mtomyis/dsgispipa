<?php require '../../../../config.php' ;?>

<?php 
  include($doc_root_class.'class_custom.php');
  $cst = new custom;
?>
<?php
  $id = $_GET['id'];
  $sql = "SELECT * 
          FROM hippam 
          WHERE id='$id'";
  $dat = $db->datasql($sql);
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXBLaqWSYNMi2hJFeHZZcaotrPlveGL20"></script>

<style>
  #map-canvas {
    height: 100%;
    margin: 0px;
    padding: 0px
  }
</style>
<script>
  function initialize() {
  
  var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

  <?php
      
      require_once "../../../class/class_db.php";
      $db = new database();
      
      $hippam_id = $_GET['id'];

      //DRAW PIPA
      $sql_pipa = "SELECT * 
              FROM pipa 
              WHERE hippam_id='$hippam_id'";
      $data_pipa = $db->fetchdata($sql_pipa);
      $i = 0;
      foreach($data_pipa as $dat_pipa){

          echo "var flightPlanCoordinates_".$i." = [";

          $sql_koor = "SELECT * FROM pipa_koordinat
                      WHERE pipa_id='".$dat_pipa['id']."' ORDER BY `id_urut` ";
          $jml_koor = $db->jumrec($sql_koor);
          $data_koor = $db->fetchdata($sql_koor);
          $j = 0;
          $k = 0;
          
          foreach ($data_koor as $dat_koor) {
            echo "new google.maps.LatLng(".$dat_koor['latitude'].",".$dat_koor['longitude'].")";
            if($j<$jml_koor)
                echo ",";
            $center_lat = $dat_koor['latitude'];
            $center_long = $dat_koor['longitude'];
            $j++;
            }

          switch($dat_pipa['pipa_jenis_id']){
              //pvc

              case '1300' : $color = '#FF00FF'; break;
              case '0600' : $color = '#0000FF'; break;
              case '0400' : $color = '#00FF00'; break;
              case '0300' : $color = '#FF00FF'; break;
              case '0200' : $color = '#FFFF00'; break;
              case '0150' : $color = '#FF0000'; break;
              case '0100' : $color = '#000000'; break;
              case '0075' : $color = '#8A8A8A'; break;
          }

          echo "];
  
                var flightPath_".$i." = new google.maps.Polyline({
                  path: flightPlanCoordinates_".$i.",
                  geodesic: true,
                  strokeColor: '$color',
                  strokeOpacity: 1.0,
                  strokeWeight: 2
                }); 
              flightPath_".$i.".setMap(map);
              ";

            $i++;
      }

      //DRAW BRONCAP
      $sql_broncap = "SELECT nama, latitude, longitude 
                      FROM broncap 
                      WHERE hippam_id='$hippam_id'";
      $data_broncap = $db->fetchdata($sql_broncap);
      foreach($data_broncap as $dat_broncap){
          echo "marker = new google.maps.Marker({
                    position: new google.maps.LatLng(".$dat_broncap['latitude'].", ".$dat_broncap['longitude']."),
                    title: '".$dat_broncap['nama']."',
                    map: map,
                    icon: '../../../../assets/pics/broncap.png'
                });";
      }

      //DRAW TANDON
      $sql_tandon = "SELECT nama, latitude, longitude 
                      FROM tandon 
                      WHERE hippam_id='$hippam_id'";
      $data_tandon = $db->fetchdata($sql_tandon);
      foreach($data_tandon as $dat_tandon){
          echo "marker = new google.maps.Marker({
                    position: new google.maps.LatLng(".$dat_tandon['latitude'].", ".$dat_tandon['longitude']."),
                    title: '".$dat_tandon['nama']."',
                    map: map,
                    icon: '../../../../assets/pics/tandon.png'
                });";
      }
  ?>
    // google.maps.event.addListener(marker, 'click', function() {               
    //     window.location = "www.cickstart.com/" + marker.id;
    // });

  
}

var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(<?= $center_lat ?>, <?= $center_long ?>),
    //mapTypeId: google.maps.MapTypeId.TERRAIN
  };

google.maps.event.addDomListener(window, 'load', initialize);
</script>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading">
                  <div class="col-md-9"><h4 class='section-subheading'><?=$dat['nama']?> - Jalur Distribusi Air Bersih</h4></div>
                  <div class="col-md-3">
                    <input type="hidden" name="idhippam" id="idhippam" value="<?= $id;?>">
                    <button id="btnedit" onclick="editMap()" type="button" class="btn-primary btn btn-xs"><i class="fa fa-cog"></i> Edit Koordinat</button>
                    <button style="display:none" id="btnselesai" onclick="selesai()" type="button" class="btn-success btn btn-xs"><i class="fa fa-check"></i> Selesai</button>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script type='text/javascript'>
                      function selesai() {
                        var x = document.getElementById("map-canvas");
                        var y = document.getElementById("btnselesai");
                        var z = document.getElementById("btnedit");
                        if (window.getComputedStyle(z).display === "none") {
                          // x.style.display = "block";
                          y.style.display = "none";
                          z.style.display = "block";

                          var id_hippam = document.getElementById('idhippam').value;
                          $.ajax({
                              url: '<?=$base_url?>ambil_data.php?showmap',
                              type: 'post',
                              data: {id:id_hippam},             
                              success: function(data) {               
                              $('#mapview').html(data);
                              console.log(data);
                              }
                          });

                        }
                      }

                      function editMap() {
                        var x = document.getElementById("map-canvas");
                        var y = document.getElementById("btnedit");
                        var z = document.getElementById("btnselesai");
                        if (window.getComputedStyle(z).display === "none") {
                          // x.style.display = "none";
                          y.style.display = "none";
                          z.style.display = "block";

                          var id_hippam = document.getElementById('idhippam').value;
                          $.ajax({
                              url: '<?=$base_url?>ambil_data.php?editmap',
                              type: 'post',
                              data: {id:id_hippam},             
                              success: function(data) {               
                              $('#mapview').html(data);
                              console.log(data);
                              }
                          });

                        }
                      }
                      </script>
                  </div>
              </header>
              <!-- <script> 
              $(document).ready(function(){
              setInterval(function(){
                    $("#h").load(window.location.href + " #h" );
              }, 3000);
              });
              </script> -->
              <!-- <div id="s"></div> -->
              <div class="panel-body">
                  <div id="mapview" class="col-md-9" style="height:600px;border:0px solid black">
                      <div id="map-canvas"></div>
                  </div>
                  <div class="col-md-3" style="margin-bottom:-10px">
                      <h3>LEGENDA</h3>
                      <table width="95%" cellspacing="2" cellpadding="2" border="0" >
                          <tr valign="middle" align="left">
                              <td width="50"><div style="background-color: #0000FF; height: 5px">&nbsp;</div></td>
                              <td width="110">&nbsp;&nbsp;Pipa PVC &Oslash; 6"</td>
                              <td width="5">:</td>
                              <td align="right"><?= $cst->currency($dat['pipa_pvc_6'],0);?> m</td>
                          </tr>
                          <tr valign="middle" align="left">
                              <td><div style="background-color: #00FF00; height: 5px">&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa PVC &Oslash; 4"</td>
                              <td>:</td>
                              <td align="right"><?= $cst->currency($dat['pipa_pvc_4'],0);?> m</td>
                          </tr>
                          <tr valign="middle" align="left">
                              <td><div style="background-color: #FF00FF; height: 5px">&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa PVC &Oslash; 3"</td>
                              <td>:</td>
                              <td align="right"><?= $cst->currency($dat['pipa_pvc_3'],0);?> m</td>
                          </tr>
                          <tr valign="middle" align="left">
                              <td><div style="background-color: #FFFF00; height: 5px">&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa PVC &Oslash; 2"</td>
                              <td>:</td>
                              <td align="right"><?= $cst->currency($dat['pipa_pvc_2'],0);?> m</td>
                          </tr>
                          <tr valign="middle" align="left">
                              <td><div style="background-color: #FF0000; height: 5px">&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa PVC &Oslash; 1.5"</td>
                              <td>:</td>
                              <td align="right"><?= $cst->currency($dat['pipa_pvc_15'],0);?> m</td>
                          </tr>
                          <tr valign="middle" align="left">
                              <td><div style="background-color: #000000; height: 5px">&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa PVC &Oslash; 1"</td>
                              <td>:</td>
                              <td align="right"><?= $cst->currency($dat['pipa_pvc_1'],0);?> m</td>
                          </tr>
                          <tr valign="middle" align="left">
                              <td><div style="background-color: #8A8A8A; height: 5px">&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa PVC &Oslash; 3/4"</td>
                              <td>:</td>
                              <td align="right"><?= $cst->currency($dat['pipa_pvc_34'],0);?> m</td>
                          </tr>
                          <tr valign="middle" align="left">
                              <td><img src="<?=$base_pics?>broncap.png"  width="15px"></td>
                              <td>&nbsp;&nbsp;Broncaptering</td>
                              <td></td>
                              <td></td>
                          </tr>
                          <tr valign="middle" align="left">
                              <td><img src="<?=$base_pics?>tandon.png" width="15px"></td>
                              <td>&nbsp;&nbsp;Tandon</td>
                              <td></td>
                              <td></td>
                          </tr>
                      </table>
                  </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->