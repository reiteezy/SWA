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
                          <a class="nav-link active" href="#courses" role="tab" data-toggle="tab">ALL USERS</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#add" role="tab" data-toggle="tab">ADD USER</a>
                        </li>
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active table-responsive" id="courses">

                          <table class="table table-hover table-bordered table-striped" id="example1">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>USERNAME</th>
                                <th>USER CLASS</th>
                                <th>ACTIONS</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php  
                              $count = 1;
                              $this->db->order_by('creation_date', 'ASC');
                              $users = $this->db->get('users_tbl')->result_array();
                              foreach ($users as $row):
                              ?>
                              <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['USERNAME']; ?></td>
                                <td><?php echo $row['UCLASS']; ?></td>
                                <td>
                                  <button id="ModalEditUser" class="btn btn-sm  btn-success btn-flat nav-icon fa fa-edit" data-toggle="modal" data-target="#editUserModal"></button>
                                  <a href="<?php echo base_url() ?>admin/sub_action/del_user/<?php echo $row['ID']; ?>" class="btn btn-sm btn-danger btn-flat nav-icon fa fa-trash"></a>
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
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                              <form role="form" method="POST" action="<?php echo base_url() ?>admin/action/new_user" enctype="multipart/form-data">
                                <div class="card-body">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6 col-xs-12">
                                        <label>NAME</label>
                                        <input type="sedarch" required autocomplete="off" id="emp_name" name="emp_name" class="form-control" placeholder="Faimly ">
                                      <div id="dropdown"></div>
                                      </div>
                                      <div class="col-md-6 col-xs-12">
                                        <label>USERNAME</label>
                                        <input required autocomplete="off" value="<?php ?>" type="text" id="usernameInput" name="username" class="form-control" placeholder="Enter username">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6 col-xs-12">
                                        <label>POSITION</label>
                                        <input type="text" readonly="readonly" id="emp_pos" name="emp_pos" class="form-control">
                                      </div>
                                      <div class="col-md-6 col-xs-12">
                                        <label>USER CLASS</label>
                                          <select class="form-control" name="user_class" id="user_class">
                                            <option value="">Select class</option>
                                            <?php   
                                            $user_class = $this->db->get('class_tbl')->result_array();
                                            foreach ($user_class as $row):
                                            ?>
                                            <option value="<?php echo $row['ID']?>"><?php echo $row['CLASS'] ?></option>
                                            <?php  
                                            endforeach;
                                            ?>
                                          </select>  
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6 col-xs-12">
                                        <label>EMPLOYEE ID</label>
                                        <input type="text" readonly="readonly" id="emp_id" name="emp_id" class="form-control">
                                      </div>
                                      <div class="col-md-6 col-xs-12">
                                        <label>DESCRIPTION</label>
                                        <input type="text" readonly="readonly" id="class_description" name="class_descript" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6 col-xs-12">
                                        <label>DEPARTMENT</label>
                                        <input type="text" readonly="readonly" id="emp_dept" name="emp_dept" class="form-control">
                                      </div>
                                      <div class="col-md-6 col-xs-12">
                                        <label>PASSWORD</label>
                                        <input required autocomplete="off" type="password" name="password" id="password" class="form-control" placeholder="Enter new password">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6 col-xs-12">
                                        <label>BUSINESS UNIT</label>
                                        <input type="text" readonly="readonly" id="emp_bu" name="emp_bu" class="form-control">
                                      </div>
                                      <div class="col-md-6 col-xs-12">
                                        <label>CONFIRM PASSWORD</label>
                                        <input required autocomplete="off" type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Re-enter new password">
                                      </div>
                                    </div>
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
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your edit user form here -->
                <form role="form" method="POST" action="<?php echo base_url() ?>admin/sub_action/edit_user" enctype="multipart/form-data">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label>USERNAME</label>
                                      <input type="text" name="username" value="<?php #echo $user_name ?>"  class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>USER CLASS</label>
                                    <select class="form-control" name="user_class" id="user_class">
                                  <option value=""><?php # echo $user_class ?></option>
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
                                      <input type="text" readonly="readonly" value="<?php #echo $user_descript ?>" id="class_description" name="class_descript" class="form-control">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveUserChanges">Save Changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to open the modal and populate user data
    function openEditUserModal(userId) {
        // Fetch user data using AJAX
        $.ajax({
            url: '<?php echo base_url() ?>admin/get_user/' + userId,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Populate the form fields with fetched data
                $('#editUserModal input[name="user_id"]').val(data.ID);
                $('#editUserModal input[name="user_name"]').val(data.USERNAME);
                $('#editUserModal select[name="user_class"]').val(data.UCLASS);
                $('#editUserModal input[name="user_descript"]').val(data.UDESCRIPTION);
                // ... (populate other fields as needed)
            }
        });

        // Open the modal
        $('#editUserModal').modal('show');
    }

    // When the "Edit User" button is clicked, open the modal with user data
    $("#ModalEditUser").click(function(){
      console.log(asdasd)
            // Get the PHP-generated data (e.g., $message)
            var dataToPass = <?php echo json_encode($message); ?>;
            
            // Add the data to the modal body
            $(".modal-body").html(dataToPass);

            // Open the modal
            $("#myModal").modal();
        });

    // Function to handle form submission when "Save Changes" button is clicked
    $('#saveUserChanges').click(function () {
        // Submit the form data via AJAX to update the user
        $.ajax({
            url: '<?php echo base_url() ?>admin/users',
            type: 'POST',
            data: $('#editUserModal form').serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.edited === 'done') {
                    // Close the modal and show a success message
                    $('#editUserModal').modal('hide');
                    alert('User edited successfully.');
                } else {
                    alert('Error editing user.');
                }
            }
        });
    });
</script>


</body>
</html>
