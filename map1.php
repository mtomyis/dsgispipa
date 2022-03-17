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
  
  
  var flightPlanCoordinates = [
    new google.maps.LatLng(-8.438733,114.084154),
    new google.maps.LatLng(-8.436050,114.084216),
    new google.maps.LatLng(-8.434362,114.085626),
    new google.maps.LatLng(-8.430914,114.085604),
    new google.maps.LatLng(-8.426448,114.080837),
    new google.maps.LatLng(-8.418662,114.069439),
    new google.maps.LatLng(-8.410058,114.056791)
  ];
  
  var flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: '#FF0000',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });

  flightPath.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>
