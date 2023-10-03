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
                          <a class="nav-link active" href="#courses" role="tab" data-toggle="tab">RECORDS</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#add" role="tab" data-toggle="tab">ADD NEW </a>
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
                                <th>DOCUMENT DATE</th>
                                <th>SUBSIDIARY</th>
                                <th>PROMO TITLE</th>
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
                                <td><?php #echo $count++; ?></td>
                                <td><?php #echo $row['USERNAME']; ?></td>
                                <td><?php #echo $row['UCLASS']; ?></td>
                                <td></td>
                                <td></td>
                                <!-- <td>
                                  <a href="<?php #echo base_url() ?>admin/options/edit_user/<?php #echo $row['ID']; ?>" class="btn btn-sm  btn-success btn-flat nav-icon fa fa-edit"></a>
                                  <a href="<?php #echo base_url() ?>admin/sub_action/del_user/<?php #echo $row['ID']; ?>" class="btn btn-sm btn-danger btn-flat nav-icon fa fa-trash"></a>
                                </td> -->
                              </tr>
                              <?php  
                              #endforeach;
                              ?>
                            </tbody>
                          </table>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="add">

                          <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                              <form role="form" method="POST" action="<?php echo base_url() ?>admin/action/new_swa" enctype="multipart/form-data">
                                <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6 col-xs-12">
                                        <label>SUBSIDIARY</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="sub_code" readonly="readonly" placeholder="Search subsidiary">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-sm btn-success assign-subsidiary-btn" data-toggle="modal" data-target="#assignSubsidiaryModal" type="button">
                                                        <i class="nav-icon fa fa-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <label>CONTROL NO.</label>
                                            <input type="text" readonly="readonly" id="" name="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="text" readonly="readonly" id="sub_descript" name="" class="form-control">
                                      </div>
                                      <div class="col-md-6 col-xs-12">
                                        <label>DATE</label>
                                        <input autocomplete="off" type="date"  id="" name="" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6 col-xs-12">
                                        <label>PROMO TITLE</label>
                                        <input type="text" readonly="readonly" id="" name="" class="form-control">
                                      </div>
                                      <div class="col-md-6 col-xs-12">
                                        <label>SWA SERIES NO.</label>
                                        <input autocomplete="off" type="text" id="" name="" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6 col-xs-12">
                                        <label>MECHANICS</label>
                                        <input type="text" readonly="readonly" id="" name="" class="form-control">
                                      </div>
                                      <div class="col-md-6 col-xs-12">
                                        <label>MIS REF. NO. 1</label>
                                        <input autocomplete="off" readonly="readonly" type="text"  id="" name="" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6 col-xs-12">
                                        <label>PROMO PERIOD</label>
                                        <input type="text" readonly="readonly" id="" name="" class="form-control">
                                      </div>
                                      <div class="col-md-6 col-xs-12">
                                        <label>MIS REF. NO. 2</label>
                                        <input autocomplete="off" readonly="readonly" type="text"  id="" name="" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6 col-xs-12">
                                        <label>SPONSOR</label>
                                        <input type="text" readonly="readonly" id="" name="" class="form-control">
                                      </div>
                                      <div class="col-md-6 col-xs-12">
                                        <label>MIS REF. NO. 3</label>
                                        <input autocomplete="off" readonly="readonly" type="text"  id="" name="" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="text" readonly="readonly" id="" name="" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <table class="table table-hover table-bordered table-striped" id="example1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>QUANTITY</th>
                                        <th>UNIT</th>
                                        <th>ITEM DESCRIPTION</th>
                                        <th>ACTUAL EXECUTION QUANTITY</th>
                                        <th>DECLARATION OF UN-USED ALLOCATION</th>
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
                                        <td><?php #echo $count++; ?></td>
                                        <td><input autocomplete="off" type="text" id="" name="" class="form-control"></td>
                                        <td><input autocomplete="off" type="text" id="" name="" class="form-control"></td>
                                        <td><input autocomplete="off" type="text" id="" name="" class="form-control"></td>
                                        <td><input autocomplete="off" type="text" id="" name="" class="form-control"></td>
                                        <td><input autocomplete="off" type="text" id="" name="" class="form-control"></td>
                                        <!-- <td>
                                        <a href="<?php #echo base_url() ?>admin/options/edit_user/<?php #echo $row['ID']; ?>" class="btn btn-sm  btn-success btn-flat nav-icon fa fa-edit"></a>
                                        <a href="<?php #echo base_url() ?>admin/sub_action/del_user/<?php #echo $row['ID']; ?>" class="btn btn-sm btn-danger btn-flat nav-icon fa fa-trash"></a>
                                        </td> -->
                                    </tr>
                                    <?php  
                                    #endforeach;
                                    ?>
                                    </tbody>
                                </table>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                      <label>PROMO EXECUTION SUMMARY</label>
                                      <textarea type="text" id="" name="" class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                      <label>POST-PROMO REMARKS</label>
                                      <textarea autocomplete="off" type="text"  id="" name="" class="form-control"></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#assignSignatoriesModal">SIGNATORIES</button>
                                  <button type="submit" class="btn btn-sm btn-primary">SAVE</button>
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
<script>
   $(document).ready(function() {

$(document).on('shown.bs.modal', '#modal', function (){
    $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust()
        .responsive.recalc()
        .scroller.measure();
});    
});   

</script>
<!-- REQUIRED SCRIPTS -->

<?php include 'inc/rscript.php'; ?>
<!----------------------------------------      SUBSIDIARY MODAL         ------------------------------------>
<div class="modal fade" id="assignSubsidiaryModal" tabindex="-1" role="dialog" aria-labelledby="assignSubsidiaryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-scrollable">
      <div class="modal-header">
        <h5 class="modal-title" id="assignSubsidiaryModalLabel">Subsidiary List</h5>
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
              <th></th>
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
        <button type="button" data-dismiss="modal" class="btn btn-primary">Select</button>
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

            $("#searchSubsidiary").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

               // Handle the "Select" button click
            $(".subsidiary-checkbox").on("change", function () {
                // Uncheck all other checkboxes
                $(".subsidiary-checkbox").not(this).prop("checked", false);

             if ($(this).is(":checked")) {
                  // Get the selected subsidiary's code
                  var selectedCode = $(this).closest("tr").find("td:nth-child(2)").text();
                  var selectedDescription = $(this).closest("tr").find("td:nth-child(3)").text();
                  // Set the selected code in the input field
                  $("#sub_code").val(selectedCode);
                  $("#sub_descript").val(selectedDescription);

                  // Close the modal
                  $('#modal').modal('hide');
                } else {
                  // If the checkbox is unchecked, clear the input field
                  $("#sub_code").val("");
                  $("#sub_descript").val("");
                }
              });

</script>
<!--------------------------     SIGNATORIES MODAL     ---------------------------------------->
<div class="modal fade" id="assignSignatoriesModal" tabindex="-1" role="dialog" aria-labelledby="assignSignatoriesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content modal-scrollable">
      <div class="modal-header">
        <h5 class="modal-title" id="assignSignatoriesModalLabel">Signatories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form role="form" method="POST" action="<?php echo base_url() ?>#" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label>SUBMITTED BY</label>
                <input autocomplete="off" value="<?php ?>" type="text" name="" class="form-control" placeholder="Requested by">
              <label></label>
                <input autocomplete="off" type="date" value="<?php  ?>" name="" class="form-control" placeholder="Date">
            </div>
            <div class="form-group">
              <label>REVIEWED BY</label>
                <input autocomplete="off" value="<?php ?>" type="text" name="" class="form-control" placeholder="Reviewed by">
              <label></label>
                <input autocomplete="off" type="date" value="<?php  ?>" name="" class="form-control" placeholder="Date">
            </div>
            <div class="form-group">
              <label>AUDITED BY</label>
                <input autocomplete="off" value="<?php ?>" type="text" name="" class="form-control" placeholder="Approved by">
              <label></label>
                <input autocomplete="off" type="date" value="<?php  ?>" name="" class="form-control" placeholder="Date">
            </div>
            <div class="form-group">
              <label>NOTED BY</label>
                <input autocomplete="off" value="<?php ?>" type="text" name="" class="form-control" placeholder="Released by">
              <label></label>
                <input autocomplete="off" type="date" value="<?php  ?>" name="" class="form-control" placeholder="Date">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">SAVE</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
