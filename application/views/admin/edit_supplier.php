<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
  // All term data
  $sup_code = $this->db->get_where('sup_tbl',array('ID'=>$sup_id))->row()->CODE;
  $sup_name = $this->db->get_where('sup_tbl',array('ID'=>$sup_id))->row()->NAME;
  $sup_add = $this->db->get_where('sup_tbl',array('ID'=>$sup_id))->row()->ADDRESS;
  $sup_contact = $this->db->get_where('sup_tbl',array('ID'=>$sup_id))->row()->CONTACT_PERSON;
  $sup_phoneno = $this->db->get_where('sup_tbl',array('ID'=>$sup_id))->row()->PHONE_NO;
  $sup_telno = $this->db->get_where('sup_tbl',array('ID'=>$sup_id))->row()->TEL_NO;
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
                          <form role="form" method="POST" action="<?php echo base_url() ?>admin/sub_action/edit_supplier/<?php echo $sup_id; ?>" enctype="multipart/form-data">
                            <div class="card-body">
                              <div class="form-group">
                                <label>CODE</label>
                                  <input autocomplete="off" type="text" value="<?php echo $sup_code ?>"  name="sup_code" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>SUPPLIER NAME</label>
                                  <input autocomplete="off" type="text" value="<?php echo $sup_name ?>" name="sup_name" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>ADDRESS</label>
                                  <input autocomplete="off" type="text" value="<?php echo $sup_add ?>" name="sup_add" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>CONTACT PERSON</label>
                                  <input autocomplete="off" type="text" value="<?php echo $sup_contact ?>" name="sup_contact" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>PHONE NUMBER</label>
                                  <input autocomplete="off" type="text" value="<?php echo $sup_phoneno ?>" name="sup_phoneno" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>TELEX NO.</label>
                                  <input autocomplete="off" type="text" value="<?php echo $sup_telno ?>" name="sup_telno" class="form-control">
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
