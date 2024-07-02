<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>System Users</h5>
                        <span>Stock Withdrawal Advice System</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>AdminController/dash"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Users List</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Users List</h5>
                                </div>
                                <div class="card-block">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="feather icon-plus"></i>Add New User</button>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="usertable" class="table table-hover m-b-0 sub-table">
                                            <thead>
                                                <tr>
                                                    <th>Employee Name</th>
                                                    <th>Username</th>
                                                    <th>User Class</th>
                                                    <th>Password</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                              foreach ($users as $user):
                              ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img src="http://172.16.161.34:8080/hrms<?php echo substr($user->EMP_PHOTO, 2); ?>" alt="user image"
                                                                class="img-radius img-40 align-top m-r-15">
                                                            <div class="d-inline-block">
                                                                <h6><?php echo $user->EMP_NAME; ?></h6>
                                                                <p class="text-muted m-b-0">
                                                                    <?php echo $user->EMP_POS; ?></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $user->USERNAME; ?></td>
                                                    <td><?php echo $user->CLASS; ?></td>
                                                    <td><?php echo str_repeat('*', strlen($user->PASSWORD)); ?></td>
                                                    <td>
                                                        <?php  if($user->STATUS == '1'){ ?>
                                                        <label
                                                            class="user-status form-label badge badge-inverse-success"
                                                            data-user-id="<?php echo $user->ID?>">Active</label>
                                                        <?php } else { ?>
                                                        <label class="user-status form-label badge badge-inverse-danger"
                                                            data-user-id="<?php echo $user->ID?>">Inactive</label>
                                                        <?php } ?>
                                                    </td>
                                                    <td><a href="#!"><i
                                                                class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-blue"></i></a><a
                                                            href="#!"><i
                                                                class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
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


                        <!-- -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!------------------------ USERS MODAL------------------>

<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                <form id="addUserForm" role="form" method="POST" action="<?php echo base_url() ?>UserController/new_user"
                enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10" style="position: relative">
                                <input type="search" required autocomplete="off" id="emp_name" name="emp_name"
                                    class="form-control" placeholder="Family name, first name...">
                                <div id="dropdown"
                                    style="position: absolute; overflow-y: auto; border: 1px solid #d1d3e2; background-color: #F5F5F5; display: none; z-index: 999;"
                                    class="dropdown-content"></div>
                                    <div id="validationNameAvailability" style="color: red;"></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label">User Class</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="user_class" id="user_class">
                                    <option value="" disabled selected>Select class</option>
                                    <?php
                                      foreach ($classes as $class):
                                      ?>
                                    <option value="<?php echo $class->CID?>"><?php echo $class->CLASS?>
                                    </option>
                                    <?php  
                                      endforeach;
                                      ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label">Class Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="class_description"
                                    name="class_description" placeholder="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label">Position</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="emp_pos" name="emp_pos"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label">Employee ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="emp_id" name="emp_id"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label">Department</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="emp_dept" name="emp_dept"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label">Business Unit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="emp_bu" name="emp_bu"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label">Default Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label">Default Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="">
                            </div>
                        </div>
                        <input type="text" readonly="readonly" id="emp_photo" name="emp_photo" class="form-control"
                            hidden>

                        <div id="validationMessage" style="color: red;"></div>
                        <div id="validationUser" style="color: red;"></div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="saveNewUserButton">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!------------------------ END OF ADD USERS MODAL------------------>
<script>
    $(document).ready(function() {
    $("#emp_name").on("input", function() {
        var emp_name = $(this).val();

        if (emp_name.length > 0) {
            $.ajax({
                url: 'http://172.16.161.34/api/hrms/filter/employee/name/',
                type: 'GET',
                data: {
                    'q': emp_name
                },
                success: function(response) {
                    var response = JSON.parse(response);
                    var employeeData = response.data.employee;

                    $("#dropdown").html("");
                    for (var c = 0; c < employeeData.length; c++) {
                        var name = employeeData[c].employee_name;
                        var id = employeeData[c].employee_id;
                        var pos = employeeData[c].employee_position;
                        var dept = employeeData[c].employee_dept;
                        var bu = employeeData[c].employee_bunit;
                        var img = employeeData[c].employee_photo;
                        var pass = 'alturas2023';

                        var option = $('<div>')
                            .addClass('dropdown-item')
                            .css('cursor', 'pointer')
                            .text(name)
                            .click((function(name, id, pos, dept, bu, img) {
                                return function() {
                                    $("#emp_name").val(name);
                                    $("#emp_pos").val(pos);
                                    $("#emp_dept").val(dept);
                                    $("#emp_bu").val(bu);
                                    $("#emp_id, #username").val(id);
                                    $("#password").val(pass);
                                    $("#emp_photo").val(img);
                                    $("#dropdown").hide();
                                };
                            })(name, id, pos, dept, bu, img));

                        $("#dropdown").append(option);
                    }

                    $("#dropdown").show();
                },
                error: function(error) {
                    console.error("Error:", error);
                }
            });
        } else {
            $("#dropdown").hide();
            $("#emp_pos").val("");
            $("#emp_dept").val("");
            $("#emp_bu").val("");
            $("#emp_id").val("");
            $("#username").val("");
            $("#password").val("");
            $("#emp_photo").val("");
        }
    });

    $("#user_class").change(function() {
        var selectedClassID = $(this).val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('AdminController/get_description'); ?>",
            data: {
                class_id: selectedClassID
            },
            dataType: "json",
            success: function(response) {
                $("#class_description").val(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    var validationMessage = $('#validationMessage');

    $("#saveNewUserButton").on('click', function() {
        var userForm = $('#addUserForm');
        var empNameInput = $('[name="emp_name"]');
        var userClassInput = $('[name="user_class"]');
        var usernameInput = $('[name="username"]');

        if (empNameInput.val().trim() === '' || userClassInput.val().trim() === '') {
            validationMessage.text('Please fill in all required fields.');
            return;
        } else {
            validationMessage.text('');
        }
        if (usernameInput.val().trim() === '') {
            $('#validationUser').text('Invalid user');
            return;
        } else {
            $('#validationUser').text('');
        }
        checkNameAvailability(empNameInput.val().trim());

        if ($('#validationNameAvailability').text() !== '') {
            return;
        }
        validationMessage.text('');
        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to save this data?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: userForm.attr('action'),
                    type: userForm.attr('method'),
                    data: new FormData(userForm[0]),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        var responseData = response;

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        }).then(function() {
                            location.reload(true);
                        });
                    },
                    error: function(error) {
                        console.error("Error:", error);
                    }
                });
            }
        });
    });

    $('#dropdown').on('click', function() {
        var empName = $('#emp_name').val();
        checkNameAvailability(empName);
    });

    $('#emp_name').on('input', function() {
        var empName = $(this).val();
        checkNameAvailability(empName);
    });

    $('#emp_name').on('click', function() {
        var empName = $(this).val();
        checkNameAvailability(empName);
    });

});

function checkNameAvailability(emp_name) {
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>AdminController/check_name_availability',
        data: {
            emp_name: emp_name
        },
        success: function(data) {
            if (data.taken === true) {
                $('#validationNameAvailability').text('User already exists.');
            } else {
                $('#validationNameAvailability').text('');
            }
            return;
        },
        error: function() {}
    });
};
$(document).ready(function() {
            $('#usertable').DataTable({
                lengthChange: false,
                language: {
                    search: '',
                    searchPlaceholder: 'Search...'
                }
            });
        });


        $('.dataTables_filter input[type="search"]').css({
            'width': '300px',
            'margin-right': '10px',
            'padding': '5px',
            'box-sizing': 'border-box'
        });
</script>