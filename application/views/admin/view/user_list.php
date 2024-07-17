<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-users bg-c-yellow"></i>
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addUserModal"><i class="feather icon-plus"></i>Add New
                                        User</button>
                                </div>
                                <div class="card-block" style="padding-bottom: 50px;">
                                    <div class="table-responsive">
                                        <table id="usertable" class="table table-hover m-b-0 sub-table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Employee Name</th>
                                                    <th>Username</th>
                                                    <th>User Class</th>
                                                    <th>Password</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                              foreach ($users as $user):
                              ?>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckDefault">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img src="http://172.16.161.34:8080/hrms<?php echo substr($user->EMP_PHOTO, 2); ?>"
                                                                alt="user image"
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
                                                    <td>
                                                        <button type="button" id="<?php echo $user->ID?>"
                                                            class="viewUserButton action-btn-c-blue"
                                                            data-user-id="<?php echo $user->ID; ?>" data-toggle="modal"
                                                            data-target="#viewUserModal" title="View"
                                                            style="margin-left: 5px;">
                                                            <i class="icon feather icon-eye f-w-600 f-16 m-r-15"
                                                                style="color: #fff"></i><span
                                                                style="color: #fff; font-size: 13px; margin-left: -8px;">View</span></button>
                                                        <button type="button" class="editUserButton action-btn-c-green" title="edit"
                                                            data-user-id="<?php echo $user->ID; ?>"
                                                            data-user-empname="<?php echo $user->EMP_NAME; ?>"
                                                            data-user-name="<?php echo $user->USERNAME; ?>"
                                                            data-user-class="<?php echo $user->CLASS; ?>"
                                                            data-user-descript="<?php echo $user->CLASS_DESCRIPT; ?>"
                                                            data-user-password="<?php echo $user->PASSWORD; ?>"
                                                            data-toggle="modal" data-target="#editUserModal"
                                                            style="margin-left: 5px;">
                                                            <i class="icon feather icon-edit f-w-600 f-16 m-r-15"
                                                                style="color: #fff"></i><span
                                                                style="color: #fff; font-size: 13px; margin-left: -8px;">Update</span>
                                                        </button>
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
                        <form id="addUserForm" role="form" method="POST"
                            action="<?php echo base_url() ?>UserController/new_user" enctype="multipart/form-data">
                            <div class="mb-3 row">
                                <label class="form-label col-sm-2 col-form-label sm-label">Name</label>
                                <div class="col-sm-10" style="position: relative">
                                    <input type="search" required autocomplete="off" id="emp_name" name="emp_name"
                                        class="form-control" placeholder="Family name, first name...">
                                    <div id="dropdown"
                                        style="position: absolute; overflow-y: auto; border: 1px solid #d1d3e2; background-color: #F5F5F5; display: none; z-index: 999; width: 96%;"
                                        class="dropdown-content"></div>
                                    <div id="validationNameAvailability" style="color: red;"></div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label col-sm-2 col-form-label sm-label">User Class</label>
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
                                <label class="form-label col-sm-2 col-form-label sm-label">Class Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="class_description"
                                        name="class_description" placeholder="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label col-sm-2 col-form-label sm-label">Position</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="emp_pos" name="emp_pos" placeholder="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label col-sm-2 col-form-label sm-label">Employee ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label col-sm-2 col-form-label sm-label">Department</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="emp_dept" name="emp_dept"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label col-sm-2 col-form-label sm-label">Business Unit</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="emp_bu" name="emp_bu" placeholder="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label col-sm-2 col-form-label sm-label">Default Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label col-sm-2 col-form-label sm-label">Default Password</label>
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
                    <button type="button" class="btn btn-primary waves-effect waves-light" id="saveNewUserButton">Save
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!------------------------ END OF ADD USERS MODAL------------------>
    <!----------------------------MODAL for user view---------------------------------------------->
    <div class="modal fade" id="viewUserModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <input type="hidden" name="user_id" id="userId" value="">
                        <div class="row mb-2">
                            <div class="col-sm-4 text-end fw-bold">Employee Name:</div>
                            <div class="col-sm-8"><span id="name"></span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 text-end fw-bold">Username:</div>
                            <div class="col-sm-8"><span id="userName"></span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 text-end fw-bold">Class:</div>
                            <div class="col-sm-8"><span id="class"></span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 text-end fw-bold"> Class Description:</div>
                            <div class="col-sm-8"><span id="classDescript"></span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 text-end fw-bold">Position:</div>
                            <div class="col-sm-8"><span id="empPos"></span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 text-end fw-bold">Department:</div>
                            <div class="col-sm-8"><span id="empDept"></span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 text-end fw-bold">Business Unit:</div>
                            <div class="col-sm-8"><span id="empBu"></span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 text-end fw-bold">Employee ID:</div>
                            <div class="col-sm-8"><span id="empId"></span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 text-end fw-bold">Status:</div>
                            <div class="col-sm-8"><span id="status" class="text-info"></span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 text-end fw-bold">Date Added:</div>
                            <div class="col-sm-8"><span id="dateAdded"></span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 text-end fw-bold">Last Update:</div>
                            <div class="col-sm-8"><span id="lastUpdate"></span></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!------------------------ END OF VIEW USERS MODAL------------------>
    <!------------------------ UPDATE USERS MODAL------------------>
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog">
        <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update User</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-block">
                        <form id="editUserForm" role="form" method="POST" action="" enctype="multipart/form-data">
                            <input type="hidden" id="user_id" name="user_id" value="">
                            <div class="mb-3 row">
                                <label class="form-label col-sm-2 col-form-label sm-label">Name</label>
                                <div class="col-sm-10" style="position: relative">
                                    <input type="text" required autocomplete="off" name="update_empname"
                                        id="user_editempname" class="form-control" placeholder="" disabled>
                                    <div id="dropdown"
                                        style="position: absolute; overflow-y: auto; border: 1px solid #d1d3e2; background-color: #F5F5F5; display: none; z-index: 999;"
                                        class="dropdown-content"></div>
                                    <div id="validationNameAvailability" style="color: red;"></div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label col-sm-2 col-form-label sm-label">User Class</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="update_userclass" id="user_editclass">
                                        <option class="user_editclass" value="" disabled selected></option>
                                        <?php
                                     $classes = $this->db->get('class_tbl')->result_array();
                                      foreach ($classes as $class):
                                      ?>
                                        <option value="<?php echo $class['CID']?>"><?php echo $class['CLASS']?>
                                        </option>
                                        <?php  
                                      endforeach;
                                      ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label col-sm-2 col-form-label sm-label">Class Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="update_classdescript"
                                        id="user_editdescript" disabled>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label col-sm-2 col-form-label sm-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="update_username" id="username_edit"
                                        placeholder="">
                                    <div id="usernameLengthValidation" style="color: red;"></div>
                                    <div id="uniqueUsernameValidation" style="color: red;"></div>
                                </div>

                            </div>

                            <div class="mb-3 row">
                                <label class="form-label col-sm-2 col-form-label sm-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="update_password"
                                        id="password_edit" placeholder="">
                                </div>
                            </div>

                            <div id="validationMessage" style="color: red;"></div>
                            <div id="validationUser" style="color: red;"></div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light"
                        id="saveEditButton">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!------------------------ END OF UPDATE USERS MODAL------------------>

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

        $('#usertable').DataTable({
            lengthChange: false,
            language: {
                search: '',
                searchPlaceholder: 'Search...'
            }
        });

        $('.dataTables_filter input[type="search"]').css({
            'width': '300px',
            'margin-right': '10px',
            'padding': '5px',
            'box-sizing': 'border-box'
        });

        //     function format(d) {
        //     // `d` is the original data object for the row
        //     return (
        //         '<dl>' +
        //         '<dt>Employee ID:</dt>' +
        //         '<dd>' +
        //         d.EMP_ID +
        //         '</dd>' +
        //         '<dt>Department:</dt>' +
        //         '<dd>' +
        //         d.EMP_DEPT +
        //         '</dd>' +
        //         '<dt>Business Unit:</dt>' +
        //         '<dd>' +
        //         d.EMP_BU +
        //         '</dd>' +
        //         '</dl>'
        //     );
        // }

        // let table = new DataTable('#usertable', {
        //     ajax: '<?php echo base_url() ?>',
        //     columns: [
        //         {
        //             className: 'dt-control',
        //             orderable: false,
        //             data: null,
        //             defaultContent: ''
        //         },
        //         { data: 'name' },
        //         { data: 'username' },
        //         { data: 'class' },
        //         { data: 'password' },
        //         { data: 'status' }
        //     ],
        //     order: [[1, 'asc']]
        // });
        // EDIT USER

        $("#username_edit").on("input", function() {
            var originalUsername = $(this).data('user-name');
            var newUsername = $(this).val();


            var usernameLengthValidation = document.getElementById('usernameLengthValidation');
            var uniqueUsernameValidation = document.getElementById('uniqueUsernameValidation');

            if (newUsername.length < 5) {
                usernameLengthValidation.textContent = 'Must be at least 5 characters';
                return;
            } else {
                usernameLengthValidation.textContent = '';
            }
            if (newUsername !== originalUsername) {
                checkUsernameAvailability(newUsername);
            }
            return;
        });

        function checkUsernameAvailability(username) {
            console.log(username)
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>AdminController/check_username_availability',
                data: {
                    username: username
                },

                success: function(data) {
                    console.log(data.taken)
                    if (data.taken === true) {
                        uniqueUsernameValidation.textContent = 'Username already taken';
                        return;
                    } else {
                        uniqueUsernameValidation.textContent = '';
                    }
                },
                error: function() {}
            });
        };

        $('.viewUserButton').on('click', function() {
            var userId = $(this).data('user-id');

            $.ajax({
                url: '<?php echo base_url() ?>UserController/get_user/' + userId,
                method: 'GET',
                success: function(response) {
                    console.log("Raw response: ", response);

                    try {
                        var data = typeof response === 'string' ? JSON.parse(response) :
                            response;
                        console.log("Parsed data: ", data);

                        if (data.error) {
                            console.error("Error: ", data.error);
                            return;
                        }

                        var formattedAddedDate = new Date(data.CREATION_DATE);
                        var formattedUpdatedDate = new Date(data.DATE_UPDATED);
                        var formattedAddedDateString = formattedAddedDate
                            .toLocaleDateString(
                                'en-US', {
                                    month: 'long',
                                    day: 'numeric',
                                    year: 'numeric',
                                    hour: 'numeric',
                                    minute: 'numeric',
                                    second: 'numeric',
                                    hour12: false
                                });
                        var formattedUpdatedDateString = formattedUpdatedDate
                            .toLocaleDateString('en-US', {
                                month: 'long',
                                day: 'numeric',
                                year: 'numeric',
                                hour: 'numeric',
                                minute: 'numeric',
                                second: 'numeric',
                                hour12: false
                            });

                        $('#userId').text(data.ID);
                        $('#name').text(data.EMP_NAME);
                        $('#userName').text(data.USERNAME);
                        $('#class').text(data.CLASS);
                        $('#classDescript').text(data.DESCRIPTION);
                        $('#empPos').text(data.EMP_POS);
                        $('#empId').text(data.EMP_ID);
                        $('#empDept').text(data.EMP_DEPT);
                        $('#empBu').text(data.EMP_BU);
                        $('#status').text(data.STATUS == 1 ? 'Active' : 'Inactive');
                        $('#dateAdded').text(formattedAddedDateString);
                        $('#lastUpdate').text(formattedUpdatedDateString);

                        $('#viewUserModal').addClass('show');
                    } catch (e) {
                        console.error("Error parsing JSON: ", e);
                        console.error("Response was: ", response);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX request failed: ", textStatus, errorThrown);
                }
            });
        });

        $(document).on('click', '.editUserButton', function() {
            // Get the data attributes from the clicked button
            var userId = $(this).data('user-id');
            var userEmpName = $(this).data('user-empname');
            var userName = $(this).data('user-name');
            var userClass = $(this).data('user-class');
            var userDescript = $(this).data('user-descript');
            var userPassword = $(this).data('user-password');
            console.log("User class is: ", userClass);
            console.log("User class description is: ", userDescript);
            // Populate the modal form fields with the data
            $('#user_id').val(userId);
            $('#user_editempname').val(userEmpName);
            $('#username_edit').val(userName);
            $('.user_editclass').text(userClass);
            $('#user_editdescript').val(userDescript);
            $('#password_edit').val(userPassword);
        });

        $("#user_editclass").change(function() {
            var newSelectedClassID = $(this).val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('AdminController/get_description'); ?>",
                data: {
                    class_id: newSelectedClassID
                },
                dataType: "json",
                success: function(response) {
                    $("#user_editdescript").val(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        var saveEditButton = $('#saveEditButton');
        var editUserForm = $('#editUserForm');
        var formChanged = false;
        var formInputs = editUserForm.find('input, textarea, select');

        formInputs.each(function() {
            $(this).on('input', function() {
                formChanged = true;
            });
        });

        saveEditButton.on('click', function() {
            var userId = $('#user_id').val();
            if (!formChanged) {
                Swal.fire({
                    title: 'No Changes Made',
                    text: 'There are no changes to save.',
                    icon: 'info'
                });
                return;
            }

            if ($('#uniqueUsernameValidation').text() !== '') {
                Swal.fire({
                    title: 'Username taken',
                    text: 'Username is already taken. Please choose a different one.',
                    icon: 'error'
                });
                return;
            }

            Swal.fire({
                title: 'Confirm Changes',
                text: 'Are you sure you want to save these changes?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>UserController/edit_user/" +
                            userId,
                        type: editUserForm.attr('method'),
                        data: new FormData(editUserForm[0]),
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log("Response:", response);
                            var responseData = response;

                            Swal.fire({
                                title: responseData.status === 'success' ?
                                    'Success' : 'Error',
                                text: responseData.message,
                                icon: responseData.status === 'success' ?
                                    'success' : 'error'
                            }).then(() => {
                                window.location.href =
                                    '<?php echo base_url() ?>UserController/users';
                            });
                        },
                        error: function(error) {
                            console.log("Error:", error);
                        }
                    });
                }
            });
        });
    });
    </script>