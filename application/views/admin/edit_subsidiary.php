<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
  // All class data
  $sub_code = $this->db->get_where('sub_tbl',array('ID'=>$sub_id))->row()->CODE;
  $sub_descript = $this->db->get_where('sub_tbl',array('ID'=>$sub_id))->row()->DESCRIPTION;
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

                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <form role="form" method="POST" action="<?php echo base_url() ?>admin/sub_action/edit_subsidiary/<?php echo $sub_id; ?>" enctype="multipart/form-data">
                            <div class="card-body">
                              <div class="form-group">
                                <label>CODE</label>
                                  <input autocomplete="off" value="<?php echo $sub_code ?>" type="text" name="sub_code" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>DESCRIPTION</label>
                                  <input autocomplete="off" value="<?php echo $sub_descript ?>" type="text" name="sub_descript" class="form-control">
                              </div>
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="col-md-2"></div>
                      </div>
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


</body>
</html>
