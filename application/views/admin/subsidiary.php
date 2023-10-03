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
                      <!-- <h3 class="card-title"></h3> -->
                      
                      <h4 class="m-0 text-dark"><?php echo $page_title; ?></h4>
                      <div class="card-tools">
                          
                      </div>
                    </div>
                    
                    <!-- /.card-header -->
                    <div class="card-body mt-3">
                      

                      <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" href="#courses" role="tab" data-toggle="tab">SUBSIDIARIES</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#add" role="tab" data-toggle="tab">NEW SUBSIDIARY</a>
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
                                <th>DESCRIPTION</th>
                                <th>ACTIONS</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php  
                              $count = 1;
                              $sub = $this->db->get('sub_tbl')->result_array();
                              foreach ($sub as $row):
                              ?>
                              <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['CODE']; ?></td>
                                <td><?php echo $row['DESCRIPTION']; ?></td>
                                <td>
                                  <a href="<?php echo base_url() ?>admin/options/edit_subsidiary/<?php echo $row['ID']; ?>" class="btn btn-sm  btn-success btn-flat nav-icon fa fa-edit"></a>
                                  <a href="<?php echo base_url() ?>admin/sub_action/del_subsidiary/<?php echo $row['ID']; ?>" class="btn btn-sm  btn-danger btn-flat nav-icon fa fa-trash"></a>
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
                              <form role="form" method="POST" action="<?php echo base_url() ?>admin/action/new_subsidiary" enctype="multipart/form-data">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label>CODE</label>
                                      <input autocomplete="off" value="<?php ?>" type="text" name="sub_code" class="form-control" placeholder="Enter code">
                                  </div>
                                  <div class="form-group">
                                    <label>DESCRIPTION</label>
                                      <input autocomplete="off" type="text" value="<?php  ?>" name="sub_descript" class="form-control" placeholder="Enter description">
                                  </div>
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-primary">ADD</button>
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
