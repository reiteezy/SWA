<!-- jQuery -->
<!-- <script src="<?php //echo base_url() ?>assets/backend/plugins/jquery/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 --> 
<script src="<?php echo base_url() ?>assets/backend/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/pnotify/pnotify.custom.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/money-js/simple.money.format.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/backend/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/backend/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/backend/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/Chart.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>


    //PAGINATION, SEARCH-----------------------------
    $(function () {
      $("#example1").DataTable();
    });
    $(function () {
      $("#example2").DataTable();
    });


    //API ------------------------------
    function myFunction() {
            $(document).ready(function () {
                $("#emp_name").on("input", function () {
                    var emp_name = $(this).val();

                    // Check if the input is not empty
                    if (emp_name.length > 0) {
                        $.ajax({
                            url: 'http://172.16.161.34/api/hrms/filter/employee/name/',
                            type: 'GET',
                            data: {
                                'q': emp_name
                            },
                            success: function (response) {
                                var response = JSON.parse(response);
                                var employeeData = response.data.employee;

                                $("#dropdown").html(""); // Clear previous results

                                for (var c = 0; c < employeeData.length; c++) {
                                    var name = employeeData[c].employee_name;
                                    var id = employeeData[c].employee_id;
                                    var pos = employeeData[c].employee_position;
                                    var dept = employeeData[c].employee_dept;
                                    var bu = employeeData[c].employee_bunit;

                                    var option = $('<div>')
                                        .addClass('dropdown-item')
                                        .css('cursor', 'pointer')
                                        .text(name)
                                        .click((function (name, id, pos, dept, bu) {
                                            return function () {
                                                // Handle the selection here
                                                $("#emp_name").val(name);
                                                $("#emp_pos").val(pos);
                                                $("#emp_dept").val(dept);
                                                $("#emp_bu").val(bu);
                                                $("#emp_id").val(id);
                                                $("#dropdown").hide();
                                            };
                                        })(name, id, pos, dept, bu));

                                    $("#dropdown").append(option);
                                }

                                $("#dropdown").show();
                            },
                            error: function (error) {
                                // Handle errors here
                                console.error("Error:", error);
                            }
                        });
                    } else {
                        // If input is empty, hide dropdown and clear fields
                        $("#dropdown").hide();
                        $("#emp_pos").val("");
                        $("#emp_dept").val("");
                        $("#emp_bu").val("");
                        $("#emp_id").val("");
                    }
                });
            });
        }

        // Call the function to set up the event listener
        myFunction();


        //USER CLASS, DESCRIPTION---------------------------
                  $(document).ready(function () { 
                      $("#user_class").change(function () {
                          var selectedClassID = $(this).val();
                          
                          // Make an AJAX request to the controller's method
                          $.ajax({
                              type: "POST",
                              url: "<?php echo base_url('admin/get_description'); ?>",
                              data: { class_id: selectedClassID },
                              dataType: "json",
                              success: function (response) {
                                  // Update the description input with the response from the server
                                  $("#class_description").val(response);
                              },
                              error: function (xhr, status, error) {
                                  console.error(xhr.responseText);
                              }
                          });
                      });
                  });


        //PASSWORD MATCH-----------------------------
          var password = document.getElementById("password"),
          confirm_password = document.getElementById("confirm_password");

          function validatePassword(){
            if(password.value != confirm_password.value) {
              confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
              confirm_password.setCustomValidity('');
            }
          }

          password.onchange = validatePassword;
          confirm_password.onkeyup = validatePassword;
              
        
</script>