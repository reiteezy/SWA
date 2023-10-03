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
                          <a class="nav-link active" href="#courses" role="tab" data-toggle="tab">SWA CONFIRMATION ENTRY</a>
                        </li>
                      </ul>
 
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active table-responsive" id="courses">

                          <table class="table table-hover table-bordered table-striped" id="example1">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>CONTROL NO.</th>
                                <th>DATE</th>
                                <th>ORIGIN</th>
                                <th>DESTINATION</th>
                                <th>CRF/CV NUMBER</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php  
                            //   $count = 1;
                            //   $this->db->order_by('creation_date', 'ASC');
                            //   $users = $this->db->get('users_tbl')->result_array();
                            //   foreach ($users as $row):
                              ?>
                              <tr>
                                <td><?php # echo $count++; ?></td>
                                <td><?php # echo $row['USERNAME']; ?></td>
                                <td><?php # echo $row['UCLASS']; ?></td>
                                <td><?php # echo $row['UCLASS']; ?></td>    
                                <td><?php # echo $row['UCLASS']; ?></td>
                                <td><?php # echo $row['UCLASS']; ?></td>
                               
                              </tr>
                              <?php  
                            //   endforeach;
                              ?>
                            </tbody>
                          </table>

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
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include 'inc/footer.php'; ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<?php include 'inc/rscript.php'; ?>


</body>
</html>
