<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Settings Data
$name = $this->db->get_where('settings_tbl',array('ID'=>1))->row()->NAME;
$address = $this->db->get_where('settings_tbl',array('ID'=>1))->row()->ADDRESS;
$phone = $this->db->get_where('settings_tbl',array('ID'=>1))->row()->PHONE;
$session = $this->db->get_where('settings_tbl',array('ID'=>1))->row()->SESSION;
$bank = $this->db->get_where('settings_tbl',array('ID'=>1))->row()->BANK;
$acc_name = $this->db->get_where('settings_tbl',array('ID'=>1))->row()->ACC_NAME;
$acc_number = $this->db->get_where('settings_tbl',array('ID'=>1))->row()->ACC_NUMBER;
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'inc/head.php'; ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php include 'inc/navbar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'inc/aside.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card card-primary card-outline">
                    <div class="card-header card-info">
            <h4 class="m-0 text-dark"><?php echo $page_title; ?></h4>
                      <!-- <h3 class="card-title"></h3> -->
                      <div class="card-tools">
                          
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body mt-3">
                <form method="POST" action="<?php echo base_url() ?>admin/sub_action/update_wallpaper" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Change Wallpaper</label><br>
                    <input type="file" name="logo">
                  </div>
                  <button type="submit" class="btn btn-info">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include 'inc/footer.php'; ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include 'inc/rscript.php'; ?>
  <script>
    $(function () {
      <?php if($this->session->flashdata('completed') != ''){ ?>
        new PNotify({
            title: 'Notification',
            text: '<?php echo $this->session->flashdata('completed'); ?>',
            type: 'success'
        });
      <?php } ?>
    });
  </script>
</body>
</html>
