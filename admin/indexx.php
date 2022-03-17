<?php 
    session_start();
    $dir = str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
    $doc_root = $_SERVER['DOCUMENT_ROOT'].$dir;
    $doc_template = $_SERVER['DOCUMENT_ROOT'].$dir.'template/';
    $addr_root_pics = 'http://'.$_SERVER['SERVER_NAME'].dirname($dir).'/assets/pics/';
    $addr_root_js = 'http://'.$_SERVER['SERVER_NAME'].dirname($dir).'/assets/js/';
    $addr_root_css = 'http://'.$_SERVER['SERVER_NAME'].dirname($dir).'/assets/css/';

    /*untuk membuat session base url*/
    $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $base_url .= "://".$_SERVER['HTTP_HOST'];
    $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

    $_SESSION['base_url_gis_pipa'] =$base_url;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include $doc_template.'bs_meta.php'; ?>
    <?php include $doc_template.'bs_css.php';?>   
    
  </head>

  <body class="login">
    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign in</h3>
                </div>
                <div class="panel-body">
                    <div class="text-center"><?php include $doc_template.'msg.php';?></div>
                    <h4 style="text-align: center;">
                        <img src="<?php echo $addr_root_pics.'logo.jpg';?>" class="img-responsive center-block" width="200" />
                    </h4>
                    <p>
                        <h3 style="text-align: center;">Sistem Informasi Geografis<br/>Jaringan Perpipaan Air Bersih</h3>
                        <h5 style="text-align: center;">Kabupaten Banyuwangi<br>Jawa Timur</h5>
                    </p>

                    <form accept-charset="UTF-8" role="form" action="login/login.php" method="post">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Username" name="username" id="username" type="text" required >
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="" required>
                        </div>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php include $doc_template.'bs_js.php';?>
 <script type="text/javascript">
    $(function(){
        $("#username").focus();
        $("#username").val('');
        $('#password').val('');

        $("#username").keyup(function(){
            $('#password').val('');
        })
        $("#username").blur(function(){
            $('#password').val('');
        })
    })
</script>


   
