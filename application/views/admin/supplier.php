<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
                      <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" href="#courses" role="tab" data-toggle="tab">SUPPLIERS</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#add" role="tab" data-toggle="tab">ADD SUPPLIER</a>
                        </li>
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active table-responsive" id="courses">

                          <table class="table table-hover table-bordered table-striped" id="example1">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>CODE</th>
                                <th>SUPPLIER NAME</th>
                                <th>ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php  
                              $count = 1;
                              $sup = $this->db->get('sup_tbl')->result_array();
                              foreach ($sup as $row):
                              ?>
                              <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['CODE']; ?></td>
                                <td><?php echo $row['NAME']; ?></td>
                                <td>
                                  <a href="<?php echo base_url() ?>admin/options/edit_supplier/<?php echo $row['ID']; ?>" class="btn btn-sm  btn-success btn-flat nav-icon fa fa-edit"></a>
                                  <a href="<?php echo base_url() ?>admin/sub_action/del_supplier/<?php echo $row['ID']; ?>" class="btn btn-sm  btn-danger btn-flat nav-icon fa fa-trash"></a>                                  
                                </td>
                              </tr>
                              <?php  
                              endforeach;
                              ?>
                            </tbody>
                          </table>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="add">

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                              <form role="form" method="POST" action="<?php echo base_url() ?>admin/action/new_supplier" enctype="multipart/form-data">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label>CODE</label>
                                      <input autocomplete="off" value="<?php ?>" type="text" name="sup_code" class="form-control" required placeholder="Enter code">
                                  </div>
                                  <div class="form-group">
                                    <label>SUPPLIER NAME</label>
                                      <input autocomplete="off" type="text" name="sup_name" class="form-control" required placeholder="Enter full name">
                                  </div>
                                  <div class="form-group">
                                    <label>ADDRESS</label>
                                      <input autocomplete="off" type="text" name="sup_add" class="form-control" required placeholder="Enter address">
                                  </div>
                                  <div class="form-group">
                                    <label>CONTACT PERSON</label>
                                      <input autocomplete="off" type="text" name="sup_contact" class="form-control" required placeholder="Enter contact person">
                                  </div>
                                  <div class="form-group">
                                    <label>PHONE NUMBER</label>
                                      <input autocomplete="off" type="text" name="sup_phoneno" class="form-control" required placeholder="Enter phone number">
                                  </div>
                                  <div class="form-group">
                                    <label>TELEX NO.</label>
                                      <input autocomplete="off" type="text" name="sup_telno" class="form-control" required placeholder="Enter telephone number">
                                  </div>
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-primary">ADD</button>
                                    <script>
                                    <?php  if($this->session->flashdata('completed') != ''){ ?>
                                    new PNotify({
                                        title: 'Notification',
                                        text: '<?php echo $this->session->flashdata('completed'); ?>',
                                        type: 'success'
                                    });
                                  <?php  } ?>
                                  </script>
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
