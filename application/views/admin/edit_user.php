<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
  // All users data
  $user_name = $this->db->get_where('users_tbl',array('ID'=>$user_id))->row()->USERNAME;
  $user_class = $this->db->get_where('users_tbl',array('ID'=>$user_id))->row()->UCLASS;
  $user_descript = $this->db->get_where('users_tbl',array('ID'=>$user_id))->row()->UDESCRIPTION;
  $password = $this->db->get_where('users_tbl',array('ID'=>$user_id))->row()->PASSWORD;

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
                              <form role="form" method="POST" action="<?php echo base_url() ?>admin/sub_action/edit_user" enctype="multipart/form-data">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label>USERNAME</label>
                                      <input required autocomplete="off" value="<?php echo $user_name?>" type="text" name="username" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>USER CLASS</label>
                                    <select class="form-control" name="user_class" id="user_class">
                                  <option value=""><?php echo $user_class ?></option>
                                  <?php  
                                  $uclass = $this->db->get('users_tbl')->result_array();  
                                  $user_class = $this->db->get('class_tbl')->result_array();
                                  foreach ($user_class as $row):
                                  ?>
                                  <option value="<?php echo $row['ID']?>"><?php echo $row['CLASS'] ?></option>
                                  <?php  
                                  endforeach;
                                  ?>
                                </select>  
                                  </div>
                                  <div class="form-group">
                                    <label>DESCRIPTION</label>
                                      <input type="text" readonly="readonly" value="<?php echo $user_descript ?>" id="class_description" name="class_descript" class="form-control">
                                  </div>
                                    <div class="form-group">
                                      <label>PASSWORD</label>
                                      <input required autocomplete="off" type="password" name="password" id="password" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label>RE-TYPE PASSWORD</label>
                                      <input required autocomplete="off" type="password" name="confirm_password" id="confirm_password" class="form-control">
                                  </div>

                                  <div class="form-group">
                                    <button type="submit" class="btn btn-primary">SAVE</button>
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
