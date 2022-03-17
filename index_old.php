<!DOCTYPE html>
<html lang="en">
<head>
<?php include('config.php');?>
<?php include('template/head.php');?>
</head>
<body>

    <!-- Services Section -->
    <section id="data-hippam">
        <div class="container">
            <div class="row">
                <div class="well col-lg-12 text-center well-sm">
                    <h2 class="section-heading"><div class="logo"><img src="<?=$base_url?>assets/img/logo.png" class="img-responsive"/></div><div><?=ucwords($aplikasi)?></div><div><?=ucwords($tempat)?></div></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 well">
                    <h4 class='section-subheading text-center'>Data HIPPAM</h4>
                    <div class="panel panel-primary ">
                      <div class="panel-heading">
                        <h3 class="panel-title">NO. NAMA KEC. <span class="pull-right">KODE LOKASI</span></h3>
                      </div>
                    </div>
                    <div class="panel-group" id="accordion">
                      <?php
                        $no = 0;
                        $sql = "SELECT KC.id, KC.kode, KC.nama
                                FROM hippam HP
                                JOIN desa DS ON HP.desa_kode=DS.kode 
                                JOIN kecamatan KC ON DS.kecamatan_id=KC.id 
                                GROUP BY KC.id
                                ORDER BY KC.kode";
                        $data = $db->fetchdata($sql);
                        foreach($data as $dat){
                            $no++;
                      ?>

                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#<?=$dat['id'];?>">
                              <?php echo $no; ?>. KEC. <?php echo strtoupper($dat['nama']);?> <span class="pull-right"><?php echo $dat['kode'];?></span>
                            </a>
                          </h4>
                        </div>
                        <div id="<?=$dat['id'];?>" class="panel-collapse collapse">
                          <div class="panel-body">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed table-heading'>
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Kode Lokasi</th>
                                        </tr>   
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql_hp = "SELECT HP.id, HP.nama, DS.kode
                                                    FROM hippam HP
                                                    JOIN desa DS ON HP.desa_kode=DS.kode 
                                                    WHERE DS.kecamatan_id='".$dat['id']."' 
                                                    ORDER BY DS.kode, HP.nama";
                                        $data_hp = $db->fetchdata($sql_hp);

                                        $i = 0;
                                        foreach($data_hp as $dat_hp){
                                            $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i;?>.</td>
                                            <td><a href="data_teknis.php?id=<?= $dat_hp['id'];?>"><?= $dat_hp['nama']; ?></a></td>
                                            <td><?= $dat_hp['kode']; ?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <?php
                        }
                      ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php include('template/footer.php');?>
    <?php include('template/js.php');?>
</body>

</html>
