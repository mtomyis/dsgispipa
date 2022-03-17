<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

<html>
  <body>
    <div id="map"></div>

    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-8.094601, 114.363469),
            zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

        // buat jembatan ke db
        <?php
        require_once "admin/class/class_db.php";
        $db = new database();
        
        $hippam_id = $_GET['id'];

        $sql_pipa = "SELECT * 
                FROM pipa 
                WHERE hippam_id='$hippam_id'";
        $data_pipa = $db->fetchdata($sql_pipa);
        $i = 0;
        ?>

        <?php foreach($data_pipa as $dat_pipa){
            $i++;
            $sql_koor = "SELECT * FROM pipa_koordinat
            WHERE pipa_id='".$dat_pipa['id']."'";
            $jml_koor = $db->jumrec($sql_koor);
            $data_koor = $db->fetchdata($sql_koor);
            $j = 0;

            foreach ($data_koor as $dat_koor) {
                $j++;
        ?>
          // Change this depending on the name of your PHP or XML file
          downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = <?= $dat_koor['id'] ?> ;
              var name = <?= $dat_koor['latitude'] ?>;
              var address = <?= $dat_koor['longitude'] ?>;
              var point = new google.maps.LatLng(
                  parseFloat(<?= $dat_koor['latitude'] ?>),
                  parseFloat(<?= $dat_koor['longitude'] ?>));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
            //   var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                // label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });

          <?php } ?>
        <?php } ?>

        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXBLaqWSYNMi2hJFeHZZcaotrPlveGL20&callback=initMap">
    </script>
  </body>
</html>