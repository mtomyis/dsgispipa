<?php include '../../../script_awal.php'; ?>
<?php
    $_SESSION['data_ref'] = '';
?>
<!DOCTYPE html>
<html lang="en">
<?php include('templatefix.php'); ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Rasio Pengguna Air Bersih</h3>
    <div class="row mt">
        <div class="col-lg-3">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
            <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <script>
            // logika option
            $(document).ready(function($) {
                $("#kecamatan").change(function(){
                var idkecamatan = document.getElementById('kecamatan').value;
                var url = '../../../../../ambil_data.php?select&id=' + idkecamatan;
                console.log(url);
                    downloadUrl(url, function(data, responseCode) {
                        if (responseCode === 200) {
                            // tangkap
                            // var p = "<option selected=''>Pilih s</option>";
                            $("#hippam").html(data);
                            // console.log(data);

                        }else{
                            console.log(responseCode);
                            console.log(data);
                        }
                    });
                });

                $("#hippam").change(function(){
                // ambil id hippam trus cari lokasi tampilkan di maps dan onclick seperti pengairan model
                var idkecamatan = document.getElementById('kecamatan').value;
                var id_hippam = document.getElementById('hippam').value;

                var url = '../../../../../ambil_data.php?rasio&id=' + id_hippam;
                console.log(url);
                    downloadUrl(url, function(data, responseCode) {
                        if (responseCode === 200) {
                            // tangkap
                            // var p = "<option selected=''>Pilih s</option>";
                            $("#datateknis").html(data);
                            var elmnt = document.getElementById("datateknis");
                            elmnt.scrollIntoView();
                            console.log(data);

                        }else{
                            console.log(responseCode);
                            console.log(data);
                        }
                    });
                });
            });

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
            <label for="kecamatan">Kecamatan</label>
            <select class="form-control" id="kecamatan"  name="kecamatan">
                <option>Pilih Kecamatan</option>
                <?php
                include('../../../../../config.php');
                $no = 1;
                $sql = "SELECT KC.id, KC.kode, KC.nama
                        FROM hippam HP
                        JOIN desa DS ON HP.desa_kode=DS.kode 
                        JOIN kecamatan KC ON DS.kecamatan_id=KC.id 
                        WHERE KC.id IN ('3510020','3510010','3510040')
                        GROUP BY KC.id
                        ORDER BY KC.kode";
                $data = $db->fetchdata($sql);
    
                foreach($data as $dat){
                    echo "<option value='$dat[id]'>".$no." ".strtoupper($dat['nama'])."</option>";
                    $no++;
                }
                ?>
            </select>
        </div>
        <div class="col-lg-3">
            <label for="hippam">Hippam</label>
            <select class="form-control" id="hippam" name="hippam">
            </select>
        </div>
    </div>
    <br>
    <div id="datateknis">
        <!--isi data rasio dan grafik-->
        
    <div class="row">
        <div class="col-lg-6">
            <div class="content-panel">
                <p style="text-align: center;">RASIO JUMLAH JIWA TERLAYANI</p>
                <br>
                <table class="table table-hover">
                	<tr>
                		<td>Jumlah Jiwa Terlayani</td>
                		<td>:</td>
                		<td>0 %</td>
                	</tr>
                	<tr>
                		<td>Jumlah Jiwa Belum Terlayani</td>
                		<td>:</td>
                		<td>0 %</td>
                	</tr>
                	<tr>
                		<td>Total</td>
                		<td>:</td>
                		<td>0 %</td>
                	</tr>
                	<tr>
                	    <td></td><td></td><td></td>
                	</tr>
                	<tr>
                	    <td></td><td></td><td></td>
                	</tr>
                	<tr>
                		<td>Jumlah Jiwa Terlayani</td>
                		<td>:</td>
                		<td>0 Orang</td>
                	</tr>
                	<tr>
                		<td>Jumlah Jiwa Belum Terlayani</td>
                		<td>:</td>
                		<td>0 Orang</td>
                	</tr>
                	<tr>
                		<td>Total</td>
                		<td>:</td>
                		<td>0 Orang</td>
                	</tr>
                </table>
            </div>
        </div>
        <div hidden class="col-lg-6">
            <div class="content-panel">
            <style>
            #chartdiv {
              width: 100%;
              height: 500px;
            }
            
            </style>
            
             <!--Resources -->
            <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
            <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
            <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
            
             <!--Chart code -->
            <script>
            am4core.ready(function() {
            
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end
            
            // Create chart instance
            var chart = am4core.create("chartdiv", am4charts.PieChart);
            
            // Add data
            chart.data = [ {
              "country": "Terlayani",
              "litres": 40,
              "color": am4core.color("#55efc4")
            }, {
              "country": "Belum Terlayani",
              "litres": 90,
              "color": am4core.color("#ff7675")
            } ];
            
            // Add and configure Series
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeWidth = 2;
            pieSeries.slices.template.strokeOpacity = 1;
            
            // This creates initial animation
            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;
            
            pieSeries.labels.template.disabled = true;
            pieSeries.ticks.template.disabled = true;

            pieSeries.slices.template.propertyFields.fill = "color";
            chart.legend = new am4charts.Legend();
            }); // end am4core.ready()
            </script>
            
             <!--HTML -->
            <div id="chartdiv"></div>
            </div>
        </div>
    </div>
    
    </div>
    </section>
    <!-- /wrapper -->
</section>
<!--main content end-->
<?php include('templatefoot.php'); ?>
<!-- 
<script type="text/javascript">
$(document).ready( function () {
    $('#tablehippam').DataTable();
} );
</script> -->
