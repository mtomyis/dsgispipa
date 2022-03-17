<!DOCTYPE html>
<html lang="en">
<head>

<?php include('config.php');?>
<?php include('template/head.php');?>
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
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXBLaqWSYNMi2hJFeHZZcaotrPlveGL20"></script>
<!-- <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXBLaqWSYNMi2hJFeHZZcaotrPlveGL20&callback=initialize"></script> -->
    <style>
      #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script> -->
    <script>
// This example creates a 2-pixel-wide red polyline showing
// the path of William Kingsford Smith's first trans-Pacific flight between
// Oakland, CA, and Brisbane, Australia.

function initialize() {
  

  var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

  <?php
      
      require_once "admin/class/class_db.php";
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

            // buat markernya
            
            // foreach ($data_koor as $dat_koor) {
            // if($k<$jml_koor)
            // if($k<$jml_koor)
            // echo ",";
            // echo 
            // "var myLatlngg = {
            //     lat: ".$dat_koor['latitude'].",
            //     lng: ".$dat_koor['longitude']."
            // };";

            // echo "addMarker(myLatlngg, map);";
            
            // $k++;
            // }

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
                    icon: 'assets/pics/broncap.png'
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
                    icon: 'assets/pics/tandon.png'
                });";
      }
  ?>
    google.maps.event.addListener(marker, 'click', function() {               
        window.location = "www.cickstart.com/" + marker.id;
    });

  
}

// tambah markernya cuy
const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
let labelIndex = 0;
var marker;

function addMarker(location, map) {
    // Add the marker at the clicked location, and add the next-available label
    // from the array of alphabetical characters.
    marker = new google.maps.Marker({
    position: location,
    draggable: true,
    label: labels[labelIndex++ % labels.length],
    map: map,
    });
}


var mapOptions = {
    zoom: 10,
    center: new google.maps.LatLng(<?= $center_lat ?>, <?= $center_long ?>),
    //mapTypeId: google.maps.MapTypeId.TERRAIN
  };

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>
<body>
<!-- 
        <div class="col-12 container">
            <div class="row">
            <script>
            google.maps.event.addListener(map, 'mousemove', function (event) {
              displayCoordinates(event.latLng);               
                    });
            
            function displayCoordinates(pnt) {
                    var coordsLabel = document.getElementById("tdCursor");
                    var lat = pnt.lat();
                    lat = lat.toFixed(4);
                    var lng = pnt.lng();
                    lng = lng.toFixed(4);
                    coordsLabel.innerHTML = "Latitude: " + lat + "  Longitude: " + lng;
                }
            </script>
            
            </div>
        </div> -->
    
    <!-- Services Section -->
    <section id="data-hippam">
        <div class="container">
            <div class="row">
                <div class="well col-lg-12 text-center well-sm">
                    <h2 class="section-heading"><div class="logo"><img src="<?=$base_url?>/assets/img/logo.png" class="img-responsive"/></div><div><?=ucwords($aplikasi)?></div><div><?=ucwords($tempat)?></div></h2>
                </div>
                <div class="col-md-12">
                    <ul class="nav nav-tabs" role="tablist">
                      <li ><a href="<?=$base_url?>">Home</a></li>
                      <li ><a onclick='history.go(-1)'>Kembali</a></li>
                    </ul>
                </div>                
            </div>
            <div class="row text-center well well-sm">
                <div class="col-md-12">
                    <h4 class='section-subheading'><?=$dat['nama']?> - Jalur Distribusi Air Bersih</h4>
                </div>
                <div class="col-md-12">
                    <div class="row  box">
                        <div class="col-md-9" style="height:400px;border:0px solid black">
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
                                <!--
                                <tr valign="middle" align="left">
                                    <td><div style="background-color: #000000; height: 5px">&nbsp;</div></td>
                                    <td>&nbsp;&nbsp;Pipa PVC &Oslash; 6"</td>
                                    <td>:</td>
                                    <td align="right"><?= $cst->currency($dat['pipa_pvc_6'],0);?> m</td>
                                </tr>
                                <tr valign="middle" align="left">
                                    <td><div style="background-color: #0000FF; height: 5px">&nbsp;</div></td>
                                    <td>&nbsp;&nbsp;Pipa PVC &Oslash; 4"</td>
                                    <td>:</td>
                                    <td align="right"><?= $cst->currency($dat['pipa_pvc_4'],0);?> m</td>
                                </tr>
                                <tr valign="middle" align="left">
                                    <td><div style="background-color: #FFFF00; height: 5px">&nbsp;</div></td>
                                    <td>&nbsp;&nbsp;Pipa PVC &Oslash; 3"</td>
                                    <td>:</td>
                                    <td align="right"><?= $cst->currency($dat['pipa_pvc_3'],0);?> m</td>
                                </tr>
                                <tr valign="middle" align="left">
                                    <td><div style="background-color: #FF00FF; height: 5px">&nbsp;</div></td>
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
                                    <td><div style="background-color: #00FF00; height: 5px">&nbsp;</div></td>
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
                                -->
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
                                <tr valign="middle" align="left">
                                    <td><a href="edit_map.php?id=<?= $id;?>">Edit</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php include('template/footer.php');?>
    <?php include('template/js.php');?>
</body>

</html>
