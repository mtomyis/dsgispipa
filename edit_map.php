
<?php
include_once 'header.php';
include_once 'locations_model.php';
include_once 'template/js.php';
?>


<div id="map"></div>

<!------ Include the above in your HEAD tag ---------->
<script>
    var map;
    var marker;
    var infowindow;
    var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
    var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;

    //penambahan variable dan funsi marker
    var markers = {};
    var getMarkerUniqueId= function(lat, lng) {
        return lat + '_' + lng;
    };
    var getLatLng = function(lat, lng) {
        return new google.maps.LatLng(lat, lng);
    };
    //penambahan variable dan funsi marker

    function initMap() {
        
        var koordinat_terakhir = {lat: -8.094601, lng: 114.363472};
        
        infowindow = new google.maps.InfoWindow();
        map = new google.maps.Map(document.getElementById('map'), {
            center : koordinat_terakhir,
            zoom: 15
        });

        // ambil lat lng terakhir
        <?php
        require_once "admin/class/class_db.php";
        $db = new database();
        
        $hippam_id = $_GET['id'];

        $sql_pipa = "SELECT * 
        FROM pipa 
        WHERE hippam_id='$hippam_id'";
        $data_pipa = $db->fetchdata($sql_pipa);
        $i = 0;

        // ambil semua pipa untuk mendapatkan koordinat pipa
        foreach ($data_pipa as $dat_pipa) {
            
            // buat path line nya
            echo "var flightPlanCoordinates_".$i." = [";

            $sql_koor = "SELECT * FROM pipa_koordinat 
                        WHERE pipa_id='".$dat_pipa['id']."' ORDER BY `id_urut`";
            $jml_koor = $db->jumrec($sql_koor);
            $data_koor = $db->fetchdata($sql_koor);
            $j = 0;
            $k = 0;
            foreach ($data_koor as $dat_koor) {
                echo "new google.maps.LatLng(".$dat_koor['latitude'].",".$dat_koor['longitude'].")";
                if ($j<$jml_koor)
                    echo ",";
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

            foreach ($data_koor as $dat_koor) {
                if($k<$jml_koor)
                echo "
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(".$dat_koor['latitude'].",".$dat_koor['longitude']."),
                    map: map,
                    html: document.getElementById('form2')
                });
    
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        $('#idd').val('".$dat_koor['id']."');
                        $('#pipa_id').val('".$dat_koor['pipa_id']."');
                        $('#form2').show();
                        infowindow.setContent(marker.html);
                        infowindow.open(map, marker);
                    }
                })(marker, ".$k."));
                ";

                $k++;
            }

            $i++;
        }
        ?>
    }
    //penambahan funsi setelah klik edit
    function editData() {
        // infowindow.close();
        var id_old = document.getElementById('idd').value;

        google.maps.event.addListener(map, 'click', function(e) {
            console.log(id_old);

            var lat = e.latLng.lat(); // lat of clicked point
            var lng = e.latLng.lng(); // lng of clicked point
            var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
            var marker = new google.maps.Marker({
                position: getLatLng(lat, lng),
                map: map,
                animation: google.maps.Animation.DROP,
                id: 'marker_' + markerId,
                html: "    <div id='info_"+markerId+"'>" +
                "        <table class='map1'>" +
                "<tr><input value="+id_old+" name='idd' type='text' id='idd'/></tr>"+
                "            <tr><td></td><td><input type='button' value='Save' onclick='saveEditData("+lat+","+lng+")'/></td></tr>" +
                "        </table>" +
                "    </div>"
            });
            markers[markerId] = marker; // cache marker in markers object
            bindMarkerEvents(marker); // bind right click event to marker
            bindMarkerinfo(marker); // bind infowindow with click event to marker
        });
        // remove markernya
        
    }
    //penambahan funsi setelah klik edit

    //penambahan funsi insert marker
    function insertData() {
        // infowindow.close();
        var id = document.getElementById('idd').value;

        google.maps.event.addListener(map, 'click', function(e) {

            var lat = e.latLng.lat(); // lat of clicked point
            var lng = e.latLng.lng(); // lng of clicked point
            var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
            var marker = new google.maps.Marker({
                position: getLatLng(lat, lng),
                map: map,
                animation: google.maps.Animation.DROP,
                id: 'marker_' + markerId,
                html: "    <div id='info_"+markerId+"'>" +
                "        <table class='map1'>" +
                "<tr><input value="+id+" name='idd' type='text' id='idd'/></tr>"+
                "            <tr><td></td><td><input type='button' value='Save' onclick='saveInsertData("+lat+","+lng+")'/></td></tr>" +
                "        </table>" +
                "    </div>"
            });
            markers[markerId] = marker; // cache marker in markers object
            bindMarkerEvents(marker); // bind right click event to marker
            bindMarkerinfo(marker); // bind infowindow with click event to marker
        });
        // remove markernya
    }
    //penambahan funsi insert marker

    //penambahan funsi setelah klik new
    function newData() {
        // infowindow.close();
        var pipa_id = document.getElementById('pipa_id').value;

        google.maps.event.addListener(map, 'click', function(e) {

            var lat = e.latLng.lat(); // lat of clicked point
            var lng = e.latLng.lng(); // lng of clicked point
            var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
            var marker = new google.maps.Marker({
                position: getLatLng(lat, lng),
                map: map,
                animation: google.maps.Animation.DROP,
                id: 'marker_' + markerId,
                html: "    <div id='info_"+markerId+"'>" +
                "        <table class='map1'>" +
                "<tr><input value="+pipa_id+" name='pipa_id' type='text' id='pipa_id'/></tr>"+
                "            <tr><td></td><td><input type='button' value='Save' onclick='saveNewData("+lat+","+lng+")'/></td></tr>" +
                "        </table>" +
                "    </div>"
            });
            markers[markerId] = marker; // cache marker in markers object
            bindMarkerEvents(marker); // bind right click event to marker
            bindMarkerinfo(marker); // bind infowindow with click event to marker
        });
        // remove markernya
        
    }
    //penambahan funsi setelah klik new

    // penambahan fun editLine
    function editLine() {
        var id = document.getElementById('idd').value;
        var pipa_id = document.getElementById('pipa_id').value;
        var jumlah
        //ambil jumlah rownya
        var url = 'locations_model.php?jumlah_row&pipa_id=' + pipa_id+ '&id=' + id;
        console.log(url);
        downloadUrl(url, function(data, responseCode) {
            if (responseCode === 200  && data.length > 0) {
                // tangkap
                console.log(responseCode);
                console.log(data);
                infowindow.close();
                window.location.reload(true);
            }else{
                console.log(responseCode);
                console.log(data);
            }
        });
    }
    // penambahan fun editLine

    // penambahan funsi tambahan marker
    var bindMarkerinfo = function(marker) {
        google.maps.event.addListener(marker, "click", function (point) {
            var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
            var marker = markers[markerId]; // find marker
            infowindow = new google.maps.InfoWindow();
            infowindow.setContent(marker.html);
            infowindow.open(map, marker);
            // removeMarker(marker, markerId); // remove it
        });
    };
    var bindMarkerEvents = function(marker) {
        google.maps.event.addListener(marker, "rightclick", function (point) {
            var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
            var marker = markers[markerId]; // find marker
            removeMarker(marker, markerId); // remove it
        });
    };

    var removeMarker = function(marker, markerId) {
        marker.setMap(null); // set markers setMap to null to remove it from map
        delete markers[markerId]; // delete marker instance from markers object
    };
    // penambahan funsi tambahan marker

    //penambahan save edit setelah pilih markerbaru
    function saveEditData(lat,lng) {
        // var description = document.getElementById('manual_description').value;
        var id_old = document.getElementById('idd').value;

        var url = 'locations_model.php?confirm_location&id=' + id_old + '&lat=' + lat + '&lng=' + lng;
        console.log(url);
        downloadUrl(url, function(data, responseCode) {
            if (responseCode === 200  && data.length > 1) {
                infowindow.close();
                window.location.reload(true);
            }else{
                console.log(responseCode);
                console.log(data);
                infowindow.setContent("<div style='color: red; font-size: 25px;'>Updating Errors</div>");
            }
        });
    }
    //penambahan save edit setelah pilih markerbaru

    //penambahan save Insert setelah pilih insert markerbaru
    function saveInsertData(lat,lng) {
        // var description = document.getElementById('manual_description').value;
        var id = document.getElementById('idd').value;

        var url = 'locations_model.php?insert_location&id=' + id + '&lat=' + lat + '&lng=' + lng;
        // console.log(url);
        downloadUrl(url, function(data, responseCode) {
            if (responseCode === 200) {
                // console.log(data);
                infowindow.close();
                window.location.reload(true);
            }else{
                console.log(responseCode);
                console.log(data);
                infowindow.setContent("<div style='color: red; font-size: 25px;'>Updating Errors</div>");
            }
        });
    }
    //penambahan save Insert setelah pilih insert markerbaru

    //penambahan save new setelah pilih markerbaru
    function saveNewData(lat,lng) {
        var pipa_id = document.getElementById('pipa_id').value;

        var url = 'locations_model.php?confirm_new_location&pipa_id=' + pipa_id + '&lat=' + lat + '&lng=' + lng;
        console.log(url);
        downloadUrl(url, function(data, responseCode) {
            if (responseCode === 200) {
                // console.log(data);
                infowindow.close();
                window.location.reload(true);
            }else{
                console.log(responseCode);
                console.log(data);
            }
        });
    }
    //penambahan save new setelah pilih markerbaru

    //penambahan delete marker
    function deleteData() {
        var id = document.getElementById('idd').value;

        var url = 'locations_model.php?delete_location&id=' + id;
        console.log(url);
        downloadUrl(url, function(data, responseCode) {
            if (responseCode === 200) {
                // console.log(data);
                infowindow.close();
                window.location.reload(true);
            }else{
                console.log(responseCode);
                console.log(data);
            }
        });
    }
    //penambahan delete marker

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                callback(request.responseText, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }


</script>

<div style="display: none" id="form2">
    <table class="map1">
        <tr>
            <input name="idd" type='text' id='idd'/>
            <input name="pipa_id" type='text' id='pipa_id'/>
        </tr>

        <tr>
            <td><input type='button' value='New Line' onclick='editLine()'/></td>
            <td><input type='button' value='Insert Marker' onclick='insertData()'/></td>
            <td><input type='button' value='Edit Marker' onclick='editData()'/></td>
            <td><input type='button' value='New Marker' onclick='newData()'/></td>
            <td><input type='button' value='Delete Marker' onclick='deleteData()'/></td>
        </tr>
    </table>
</div>

<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXBLaqWSYNMi2hJFeHZZcaotrPlveGL20&callback=initMap"></script>