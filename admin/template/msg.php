<?php
if(isset($_SESSION['notif']))
    if($_SESSION['notif']!=''){                       
?>
    <div class="col-md-12 alert alert-success text-center">
        <?php
                echo $_SESSION['notif'];
                $_SESSION['notif'] = '';
        ?>
    </div>
<?php
}
?>
<?php
if(isset($_SESSION['warning']))
if($_SESSION['warning']!=''){                       
?>
    <div class="col-md-12 alert alert-danger text-center">
        <?php
                echo $_SESSION['warning'];
                $_SESSION['warning'] = '';
        ?>
    </div>
<?php
}
?>