<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple Polylines</title>
    <style>
      html, body, #map-canvas {
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
    zoom: 15,
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
  flightPath2.setMap(map);
  flightPath3.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>
