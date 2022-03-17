<?php include '../../../script_awal.php'; ?>
<?php
    include '../../../class/class_custom.php';
    $cst = new custom();
    include '../../../class/class_dropdown.php';
    $dropdown = new dropdown();
?>
<?php
$page_id = $p_user_account;
$page_name = 'user_account';


$sql_login = "SELECT * FROM login_usr WHERE id='" . $_SESSION['user_id'] . "'";
$dat_login = $db->datasql($sql_login);
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('templatefix.php'); ?>
    <?php include $doc_template.'bs_meta.php';?>   
    <?php include $doc_template.'bs_css.php';?>
      
  <section id="main-content">
    <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Kelola Akun</h3>
      <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
            <!-- START TABEL DATA -->
            <div class="row well">
              <div class="col-md-8 col-md-offset-2">
                <form action="../../../user_account_proc.php" method="POST" name="myform" id="addForm" class="form-horizontal" role="form" />
                <div class="form-group form-group-sm">
                  <label class="col-sm-4 control-label" for="">Username</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" id="username" name="username" placeholder="" value="<?= $_SESSION['username']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group form-group-sm">
                  <label class="col-sm-4 control-label" for="">Password Lama</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="password" name="password_lama" id="password_lama" data-bv-notempty>
                  </div>
                </div>
                <div class="form-group form-group-sm">
                  <label class="col-sm-4 control-label" for="">Password Baru</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="password" name="password_baru_1" id="password_baru_1" data-bv-notempty data-bv-different="true" data-bv-different-field="password_lama" data-bv-different-message="The password cannot be the same as password lama" data-bv-different="true" data-bv-different-field="username" data-bv-different-message="The password cannot be the same as username">
                  </div>
                </div>
                <div class="form-group form-group-sm">
                  <label class="col-sm-4 control-label" for="">Ulangi Password Baru</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="password" name="password_baru_2" id="password_baru_2" data-bv-notempty data-bv-identical data-bv-identical-field="password_baru_1" data-bv-identical-message="Password tidak cocok, masukkan nilai yang sama dengan password baru">
                  </div>
                </div>
                <div class="form-group form-group-sm">
                  <div class="col-sm-8 col-sm-offset-4">
                    <div class="btn-group">
                      <?php $cst->create_back_button($page_id); ?>
                      <?php $cst->create_save_button($page_id); ?>
                    </div>
                  </div>
                </div>
                <!-- end content -->
              </div>
            </div>
            <!-- START TABEL DATA -->
            </div>
        </div>
      </div>
    </section>
  </section>

<?php include $doc_template.'bs_js.php';?>
<?php include $doc_template.'bootstrapvalidator.php';?>
<script type="text/javascript">
  $(document).ready(function() {
    $(".tooltip-demo").tooltip({
      selector: "a[rel=tooltip]"
    });
    $("#password_lama").focus();
    $('#addForm').bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      }
    });
  });
</script>