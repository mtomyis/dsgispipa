<?php include '../../../script_awal.php'; ?>
<?php
    $_SESSION['data_ref'] = '';
?>
<!DOCTYPE html>
<html lang="en">
<?php include('templatefix.php'); ?>

<?php 
  include($doc_root_class.'class_custom.php');
  $cst = new custom;
?>
<?php
  $id = $_GET['id'];
  $idh = $_GET['idh'];
  // $sql = "SELECT * 
  //         FROM hippam 
  //         WHERE id='$id'";
  // $dat = $db->datasql($sql);
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXBLaqWSYNMi2hJFeHZZcaotrPlveGL20"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXBLaqWSYNMi2hJFeHZZcaotrPlveGL20&libraries=geometry"></script>

<style>
  #map-canvas {
    height: 100%;
    margin: 0px;
    padding: 0px
  }
</style>
<input type="hidden" name="jarakku" id="jarakku">
<input type="hidden" name="id_pipa" id="id_pipa" value="<?= $_GET['id'] ?>">
<input type="hidden" name="id_hippam" id="id_hippam" value="<?= $_GET['idh'] ?>">
<script>

  function initialize() {
  
  var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

  <?php
      
      require_once "../../../class/class_db.php";
      $db = new database();
      
      $id_pipa = $_GET['id'];

      //DRAW PIPA
      $sql_pipa = "SELECT * 
              FROM pipa 
              WHERE id='$id_pipa'";
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
              case '0900' : $color = '#663300'; break; //coklat
              case '0800' : $color = '#ff9900'; break; //oren
              case '0600' : $color = '#0000FF'; break; //biru
              case '0400' : $color = '#00FF00'; break; //ijo
              case '0300' : $color = '#6600cc'; break; //ungu
              case '0200' : $color = '#FFFF00'; break; //kuning
              case '0150' : $color = '#FF0000'; break; //merah
              case '0100' : $color = '#000000'; break; //hitam
              case '0075' : $color = '#8A8A8A'; break; //abu
              case '0050' : $color = '#669999'; break; //cyan tua
              
              //gl
              case '1900' : $color = '#cc9900'; break; //coklat muda
              case '1800' : $color = '#66ffff'; break; //cyan
              case '1600' : $color = '#66ccff'; break; //biru muda
              case '1400' : $color = '#99ffcc'; break; //ijo muda
              case '1300' : $color = '#9999ff'; break; //ungu muda
              case '1200' : $color = '#FF00FF'; break; //purple
              case '1150' : $color = '#ff3399'; break; //merah muda
              case '1100' : $color = '#999966'; break; //butek
              case '1075' : $color = '#993333'; break; //merah hitam
              case '1050' : $color = '#006600'; break; //ijo hitam
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

      //       $i++;
      // }

      //DRAW BRONCAP
      $sql_broncap = "SELECT nama, latitude, longitude 
                      FROM broncap 
                      WHERE hippam_id='".$dat_pipa['hippam_id']."'";
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
                      WHERE hippam_id='".$dat_pipa['hippam_id']."'";
      $data_tandon = $db->fetchdata($sql_tandon);
      foreach($data_tandon as $dat_tandon){
          echo "marker = new google.maps.Marker({
                    position: new google.maps.LatLng(".$dat_tandon['latitude'].", ".$dat_tandon['longitude']."),
                    title: '".$dat_tandon['nama']."',
                    map: map,
                    icon: '../../../../assets/pics/tandon.png'
                });";
      }
      
      $i++;
      // perulangan foreach id pipa
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

    <?php
        $pipa_idd = $_GET['id'];    
        $sql_koordi = "SELECT * FROM pipa_koordinat WHERE pipa_id='".$pipa_idd."' ORDER BY `id_urut` ";
        $data_koordi = $db->fetchdata($sql_koordi);
        
        // Using array_keys() function 
        $key = array_keys($data_koordi);
        
        $size = sizeof($key);
        echo "var total = 0;";
        for( $i = 0; $i < $size; $i++) {
            $ii=$i+1;
            if ($ii<$size) {
              echo "var pos1 = new google.maps.LatLng(".$data_koordi[$i]['latitude'].", ".$data_koordi[$i]['longitude'].");";
              echo "var pos2 = new google.maps.LatLng(".$data_koordi[$ii]['latitude'].", ".$data_koordi[$ii]['longitude'].");";
              echo "total += google.maps.geometry.spherical.computeDistanceBetween(pos1, pos2);";
            }
        }
        echo "console.log(total);";
        echo "document.getElementById('jarakku').value = total;";
    
    ?>
</script>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
    <h3><button onClick="javascript:history.go(-1)" type="button" class="btn btn-theme"><i class="fa fa-arrow-left"></i> Kembali</button></h3>

        <div class="row mt">
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading">
                  <div class="col-md-12">
                    <div class="col-md-2">
                      <input type="hidden" name="idhippam" id="idhippam" value="<?= $id;?>">
                      <a href="indexkoordinatpipa_add.php?id=<?= $id; ?>&idh=<?= $idh; ?>" class="btn btn-primary btn btn-xs"><i class="fa fa-cog"></i> Edit Koordinat</a>
                    </div>
                    <div class="col-md-1">
                      <button id="btnedit" onclick="editMap()" type="button" class="btn-info btn btn-xs"><i class="fa fa-cog"></i> Edit Koordinat di Map</button>
                      <button style="display:none" id="btnselesai" onclick="selesai()" type="button" class="btn-success btn btn-xs"><i class="fa fa-check"></i> Selesai</button>
                    </div>
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
                              url: '../../../../ambil_data.php?showmapdetail',
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
                              url: '../../../../ambil_data.php?editmapdetail',
                              type: 'post',
                              data: {id:id_hippam},             
                              success: function(data) {               
                              $('#mapview').html(data);
                              console.log(data);
                              }
                          });

                        }
                      }
                      
                      function saveJarak() {
                        var jarak_ku = document.getElementById("jarakku").value;
                        var id_pipa = document.getElementById("id_pipa").value;
                        var id_hippam = document.getElementById('id_hippam').value;
                        console.log(id_pipa);
                        $.ajax({
                            url: '../../../../ambil_data.php?savejarak',
                            type: 'post',
                            data: {idh:id_hippam, idp:id_pipa, jarak_ku:jarak_ku},             
                            success: function(data) {               
                            $('#jar').html(data);
                            console.log(data);
                            }
                        });
                      }
                      
                      </script>
                  </div>

                <?php
                    $sql_hp = "SELECT PP.*,HP.nama as hp_nama, PJ.bahan as pj_bahan, PJ.ukuran as pj_ukuran FROM pipa PP
                            JOIN hippam HP ON PP.hippam_id=HP.id
                            JOIN pipa_jenis PJ ON PJ.id=PP.pipa_jenis_id
                            WHERE PP.id='".$id."' ";
                    $data_pi = $db->fetchdata($sql_hp);
                    foreach($data_pi as $dat_p){
                ?>
                <?php
                    if ($dat_p['jarak'] == "") { ?>
                      <div id="jaraknya" class="col-md-12" style="text-align: center;"><h4 class='section-subheading'><?php echo $dat_p['nama']; ?> <?php echo $dat_p['pj_bahan']."&Oslash;".$dat_p['pj_ukuran']."\" " ;?><span id='jar'>Jarak belum disimpan</span></h4><button id="savejarak" onclick="saveJarak()" type="button" class="btn-success btn btn-xs">Simpan Jarak</button></div>
                    <?php } else { ?>
                      <div id="jaraknya" class="col-md-12" style="text-align: center;"><h4 class='section-subheading'><?php echo $dat_p['nama']; ?> <?php echo $dat_p['pj_bahan']."&Oslash;".$dat_p['pj_ukuran']."\" " ;?><span id='jar'><?= "".number_format($dat_p['jarak'], 2)." Meter" ?></span></h4><button id="savejarak" onclick="saveJarak()" type="button" class="btn-success btn btn-xs">Simpan Jarak</button></div>
                    <?php } ?>
                
                <?php } ?>
                
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
                  <div id="mapview" class="col-md-12" style="height:600px;border:0px solid black">
                      <div id="map-canvas"></div>
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
<?php include('templatefoot.php'); ?>