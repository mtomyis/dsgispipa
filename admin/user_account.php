<?php include 'script_awal.php'; ?>
<?php
include $doc_root_class . "class_custom.php";
$cst = new custom();
include $doc_root_class . 'class_dropdown.php';
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

<head>
  <?php include $doc_template . 'bs_meta.php'; ?>
  <?php include $doc_template . 'bs_css.php'; ?>
</head>

<body>

  <div class="container-fluid">
    <!-- START JUDUL, TOMBOL & FORM CARI -->
    <div class="page-header">
      <h3>USER ACCOUNT</h3>
    </div>

    <div class="row text-center">
      <?php include $doc_template . 'msg.php'; ?>
    </div>
    <!-- PESAN NOTIFIKASI -->
    <!-- START TABEL DATA -->
    <div class="row well">
      <div class="col-md-8 col-md-offset-2">
        <form action="user_account_proc.php" method="POST" name="myform" id="addForm" class="form-horizontal" role="form" />
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
  </div><br>
  <?php include $doc_template . 'footer.php'; ?>
  <?php include $doc_template . 'bs_js.php'; ?>
  <?php include $doc_template . 'bootstrapvalidator.php'; ?>
</body>

</html>

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