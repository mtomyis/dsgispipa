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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<style>
      #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
// This example creates a 2-pixel-wide red polyline showing
// the path of William Kingsford Smith's first trans-Pacific flight between
// Oakland, CA, and Brisbane, Australia.

function initialize() {
  var mapOptions = {
    zoom: 14,
    center: new google.maps.LatLng(-8.438733, 114.084154),
    //mapTypeId: google.maps.MapTypeId.TERRAIN
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
  //var map2 = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

  var flightPlanCoordinates = [
    new google.maps.LatLng(-8.438733,114.084154),
    new google.maps.LatLng(-8.436050,114.084216),
    new google.maps.LatLng(-8.434362,114.085626),
    new google.maps.LatLng(-8.430914,114.085604),
    new google.maps.LatLng(-8.426448,114.080837),
    new google.maps.LatLng(-8.418662,114.069439),
    new google.maps.LatLng(-8.410058,114.056791)
  ];
  
  var flightPlanCoordinates2 = [
    new google.maps.LatLng(-8.448833,114.084154),
    new google.maps.LatLng(-8.446150,114.084216),
    new google.maps.LatLng(-8.444462,114.085626),
    new google.maps.LatLng(-8.441014,114.085604),
    new google.maps.LatLng(-8.436548,114.080837),
    new google.maps.LatLng(-8.428762,114.069439),
    new google.maps.LatLng(-8.420158,114.056791)
  ];
  
  var flightPlanCoordinates3 = [
    new google.maps.LatLng(-8.458833,114.084154),
    new google.maps.LatLng(-8.456150,114.084216),
    new google.maps.LatLng(-8.454462,114.085626),
    new google.maps.LatLng(-8.451014,114.085604),
    new google.maps.LatLng(-8.446548,114.080837),
    new google.maps.LatLng(-8.438762,114.069439),
    new google.maps.LatLng(-8.430158,114.056791)
  ];
  
  var flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: '#FF0000',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });
  
  var flightPath2 = new google.maps.Polyline({
    path: flightPlanCoordinates2,
    geodesic: true,
    strokeColor: '#0000FF',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });
  
  var flightPath3 = new google.maps.Polyline({
    path: flightPlanCoordinates3,
    geodesic: true,
    strokeColor: '#00FF00',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });

  flightPath.setMap(map);
  //flightPath2.setMap(map);
  //flightPath3.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>
<body>
    
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
                    <h4 class='section-subheading'>SUMBER SEHAT - Jalur Distribusi Air Bersih</h4>
                </div>
                <div class="col-md-12">
                    <div class="row  box">
                        <div class="col-md-9" style="height:400px;border:0px solid black">
                            <div id="map-canvas"></div>
                        </div>
                        <div class="col-md-3" style="margin-bottom:-10px">
                            <h3>LEGENDA</h3>
                            <div class="garis-legenda"><img src="<?=$base_img?>merah.png" class="img-responsive legenda">Pipa Gl &Oslash; 6" : <?= $cst->currency($dat['pipa_gl_6'],0);?> m</div>
                            <div class="garis-legenda"><img src="<?=$base_img?>kuning.png" class="img-responsive legenda"> Pipa Gl &Oslash; 4" : <?= $cst->currency($dat['pipa_gl_4'],0);?> m</div>
                            <div class="garis-legenda"><img src="<?=$base_img?>hijau.png" class="img-responsive legenda"> Pipa Gl &Oslash; 3" : <?= $cst->currency($dat['pipa_gl_3'],0);?> m</div>
                            <div class="garis-legenda"><img src="<?=$base_img?>hijau.png" class="img-responsive legenda"> Pipa Gl &Oslash; 2" : <?= $cst->currency($dat['pipa_gl_2'],0);?> m</div>
                            <div class="garis-legenda"><img src="<?=$base_img?>hijau.png" class="img-responsive legenda"> Pipa Gl &Oslash; 1.5" : <?= $cst->currency($dat['pipa_gl_1'],0);?> m</div>
                            <div class="garis-legenda"><img src="<?=$base_img?>hijau.png" class="img-responsive legenda"> Pipa Gl &Oslash; 1" : <?= $cst->currency($dat['pipa_gl_15'],0);?> m</div>
                            <div class="garis-legenda"><img src="<?=$base_img?>hijau.png" class="img-responsive legenda"> Pipa Gl &Oslash; 3/4" : <?= $cst->currency($dat['pipa_gl_34'],0);?> m</div>
                            <div class="garis-legenda"><img src="<?=$base_img?>merah.png" class="img-responsive legenda">Pipa PVC &Oslash; 6" : <?= $cst->currency($dat['pipa_pvc_6'],0);?> m</div>
                            <div class="garis-legenda"><img src="<?=$base_img?>kuning.png" class="img-responsive legenda"> Pipa PVC &Oslash; 4" : <?= $cst->currency($dat['pipa_pvc_4'],0);?> m</div>
                            <div class="garis-legenda"><img src="<?=$base_img?>hijau.png" class="img-responsive legenda"> Pipa PVC &Oslash; 3" : <?= $cst->currency($dat['pipa_pvc_3'],0);?> m</div>
                            <div class="garis-legenda"><img src="<?=$base_img?>hijau.png" class="img-responsive legenda"> Pipa PVC &Oslash; 2" : <?= $cst->currency($dat['pipa_pvc_2'],0);?> m</div>
                            <div class="garis-legenda"><img src="<?=$base_img?>hijau.png" class="img-responsive legenda"> Pipa PVC &Oslash; 1.5" : <?= $cst->currency($dat['pipa_pvc_15'],0);?> m</div>
                            <div class="garis-legenda"><img src="<?=$base_img?>hijau.png" class="img-responsive legenda"> Pipa PVC &Oslash; 1" : <?= $cst->currency($dat['pipa_pvc_1'],0);?> m</div>
                            <div class="garis-legenda"><img src="<?=$base_img?>hijau.png" class="img-responsive legenda"> Pipa PVC &Oslash; 3/4" : <?= $cst->currency($dat['pipa_pvc_34'],0);?> m</div>
                            <div class="col-xs-2"><img src="<?=$base_img?>broncaptering.png"  width="15px"></div>
                            <div class="col-xs-10">Broncaptering</div>
                            <div class="col-xs-2"><img src="asset/img/tandon.png" width="15px"></div>
                            <div class="col-xs-10">Tandon</div>
                            
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
