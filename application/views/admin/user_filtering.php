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
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                          <table class="table table-hover table-bordered table-striped" id="example1">
                            <thead>
                              <tr>  
                                <th>#</th>
                                <th>USERNAME</th>
                                <th>USER CLASS</th>
                                <th>SUBSIDIARY</th>
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
                                <button class="btn btn-sm btn-warning btn-flat assign-subsidiary-btn" data-toggle="modal" data-target="#assignSubsidiaryModal" data-username="<?php echo $row['USERNAME']; ?>">Assign</button>
                                <button class="btn btn-sm btn-info btn-flat assigned-subsidiary-btn" data-toggle="modal" data-target="#assignedSubsidiaryModal" data-username="<?php echo $row['USERNAME']; ?>">Assigned</button>
                                </td>
                              </tr>
                              <?php  
                              endforeach;
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

<!-- Modal -->
<div class="modal fade" id="assignSubsidiaryModal" tabindex="-1" role="dialog" aria-labelledby="assignSubsidiaryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-scrollable">
      <div class="modal-header">
        <h5 class="modal-title" id="assignSubsidiaryModalLabel">Assign subsidiary for <span id="selectedUsername"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo base_url() ?>#" enctype="multipart/form-data">
      <div class="modal-body">  
        <!-- Add a search bar here -->
        <div class="form-group">
          <input type="text" class="form-control" id="searchSubsidiary" placeholder="Search Subsidiary">
        </div>
        <div class="table-wrapper">
        <!-- Table to display subsidiaries -->
        <table class="table table-hover table-bordered table-striped" >
          <thead>
            <tr>
              <th>#</th>
              <th>CODE</th>
              <th>DESCRIPTION</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <!-- Add your subsidiary data here dynamically -->
            <?php  
                $count = 1;
                $this->db->order_by('creation_date', 'ASC');
                $subsidiary = $this->db->get('sub_tbl' ,10)->result_array();
                foreach ($subsidiary as $row):
                ?>
                <tr>
                  <td><?php echo $count++; ?></td>
                  <td><?php echo $row['CODE']; ?></td>
                  <td><?php echo $row['DESCRIPTION']; ?></td>
                  <td>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input subsidiary-checkbox" id="subsidiary_<?php echo $row['ID']; ?>">
                    <label class="form-check-label" for="subsidiary_<?php echo $row['ID']; ?>"></label>
                  </div>
                  </td>
                </tr>
                <?php  
                endforeach;
                ?>
          </tbody>
        </table>
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Assigned modal -->
<div class="modal fade" id="assignedSubsidiaryModal" tabindex="-1" role="dialog" aria-labelledby="assignedSubsidiaryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-scrollable">
      <div class="modal-header">
        <h5 class="modal-title" id="assignedSubsidiaryModalLabel">Assigned subsidiary of <span id="selectedUsername1"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo base_url() ?>#" enctype="multipart/form-data">
      <div class="modal-body">  
        <!-- Add a search bar here -->
        <div class="form-group">
          <input type="text" class="form-control" id="searchSubsidiary1" placeholder="Search Subsidiary">
        </div>
        <div class="table-wrapper">
        <!-- Table to display subsidiaries -->
        <table class="table table-hover table-bordered table-striped" >
          <thead>
            <tr>
              <th>#</th>
              <th>CODE</th>
              <th>DESCRIPTION</th>
            </tr>
          </thead>
          <tbody id="myTable1">
            <!-- Add your subsidiary data here dynamically -->
            <?php  
                $count = 1;
                $this->db->order_by('creation_date', 'ASC');
                $subsidiary = $this->db->get('sub_tbl' ,10)->result_array();
                foreach ($subsidiary as $row):
                ?>
                <tr>
                  <td><?php echo $count++; ?></td>
                  <td><?php echo $row['CODE']; ?></td>
                  <td><?php echo $row['DESCRIPTION']; ?></td>
                  
                </tr>
                <?php  
                endforeach;
                ?>
          </tbody>
        </table>
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" data-dismiss="modal" class="btn btn-primary">OK</button>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
//MODAL-----------------------------------------

          $(document).ready(function() {

            $(document).on('shown.bs.modal', '#modal', function (){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust()
                    .responsive.recalc()
                    .scroller.measure();
            });    
            $("#assignSubsidiaryModal").on("click", function() {
                $('#modal').modal('show');
            });
            });

                // Handle checkbox selection
                          // Handle checkbox selection
            $(".subsidiary-checkbox").on("change", function() {
                // Initialize an array to store selected descriptions
                var selectedDescriptions = [];

                // Loop through all checkboxes
                $(".subsidiary-checkbox").each(function() {
                    if ($(this).is(":checked")) {
                        // Add the selected description to the array
                        var description = $(this).data("description");
                        selectedDescriptions.push(description);
                    }
                });

    // Now, selectedDescriptions array contains the descriptions of all selected checkboxes
    console.log(selectedDescriptions);
});

            
        //assign username on modal ---------------------------
            $(document).ready(function(){
            // Store a reference to the modal and the span element for efficiency
            var modal = $('#assignSubsidiaryModal');
            var usernameSpan = $('#selectedUsername');

            $(".assign-subsidiary-btn").on("click", function() {
                // Get the username from the data attribute
                var username = $(this).data("username");

                // Update the span element with the selected username
                usernameSpan.text(username);

                // Show the modal
                modal.modal("show");
            });
          });
           //search on modal ----------------------------------------
           $(document).ready(function(){
            $("#searchSubsidiary").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });

            
// ---------------------------------------------------------------------------------------------------
          $(document).ready(function() {
            $("#assignedSubsidiaryModal").on("click", function() {
                $('#modal').modal('show');
            });
            });

          $(document).ready(function(){
            // Store a reference to the modal and the span element for efficiency
            var modal = $('#assignedSubsidiaryModal');
            var usernameSpan = $('#selectedUsername1');

            $(".assigned-subsidiary-btn").on("click", function() {
                // Get the username from the data attribute
                var username = $(this).data("username");

                // Update the span element with the selected username
                usernameSpan.text(username);

                // Show the modal
                modal.modal("show");
            });
          });
          
           

            $(document).ready(function(){
            $("#searchSubsidiary1").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable1 tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });

</script>
<?php include 'inc/rscript.php'; ?>
</body>
</html>
