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
                        dataTable_user.ajax.reload();
                        console.log(response);
                        var responseData = response;

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        }).then(function() {
                            $("#emp_name").val("");
                            $("#user_class").val("");
                            $("#class_description").val("");
                            $("#emp_pos").val("");
                            $("#emp_dept").val("");
                            $("#emp_bu").val("");
                            $("#emp_id").val("");
                            $("#username").val("");
                            $("#password").val("");
                            $("#emp_photo").val("");
                            dataTable_user.ajax.reload();
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

    function reload_table() {
        dataTable_user.ajax.reload();
    }

    var dataTable_user = $('#usertable').DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        lengthChange: false,
        ordering: false,
        ajax: {
            url: "<?php echo base_url(); ?>UserController/get_users_list",
            type: "POST",
            data: function(d) {
                d.start = d.start || 0;
                d.length = d.length || 10;
            }
        },
        columns: [{
                data: null,
                orderable: false,
                render: function(data, type, row) {
                    const photoUrl = `http://172.16.161.34:8080/hrms${row.EMP_PHOTO.substr(2)}`;
                    const empName = row.EMP_NAME;
                    const empPos = row.EMP_POS;

                    return `
                        <div class="d-inline-block align-middle">
                            <img src="${photoUrl}" alt="user image" class="img-radius img-40 align-top m-r-15">
                            <div class="d-inline-block">
                                <h6>${empName}</h6>
                                <p class="text-muted m-b-0">${empPos}</p>
                            </div>
                        </div>
                    `;
                }
            },
            {
                data: 'USERNAME'
            },
            {
                data: 'CLASS'
            },
            // {
            //     data: 'PASSWORD'
            // },
            {
                data: null,
                orderable: false,
                render: function(data, type, row) {
                    return `
                    <div class="form-check form-switch">
                        <input class="form-check-input" 
                            type="checkbox" 
                            id="user_status" 
                            data-user-id="${row.ID}" 
                            ${row.STATUS === '1' ? 'checked' : ''}>
                    </div> 
                `;
                }
            },
            {
                data: null,
                orderable: false,
                render: function(data, type, row) {
                    return `
                        <button type="button" id="${row.ID}" 
                            class="viewUserButton btn waves-effect waves-light btn-primary custom-btn-db" 
                            data-user-id="${row.ID}" 
                            data-toggle="modal" 
                            data-target="#viewUserModal" 
                            title="View"
                            style="margin-left: 5px;">
                            <i class="icofont icofont-folder-open" style="padding-left: 5px;"></i>
                            </button>
                            <button type="button" class="editUserButton btn waves-effect waves-light btn-primary custom-btn-db" style=""
                            title="edit" 
                            data-user-id="${row.ID}"
                            data-user-empname="${row.EMP_NAME}"
                            data-user-name="${row.USERNAME}"
                            data-user-class="${row.CLASS}"
                            data-user-descript="${row.CLASS_DESCRIPT}"
                            data-user-password="${row.PASSWORD}"
                            data-class-id="${row.CID}"
                            data-toggle="modal" 
                            data-target="#editUserModal">
                            <i class="icofont icofont-edit-alt" style="padding-left: 5px;"></i>
                        </button>
                    `;
                }
            }
        ],

        paging: true,
        pagingType: "full_numbers",
        lengthMenu: [
            [10, 25, 50, 1000],
            [10, 25, 50, "Max"]
        ],
        pageLength: 10,
        language: {
            search: '',
            searchPlaceholder: ' Search...',
            processing: '<div class="table-loader"></div>'
        }
    });

    $('.dataTables_filter input[type="search"]').css({
        'width': '300px',
        'margin-right': '10px',
        'padding': '5px',
        'box-sizing': 'border-box'
    });



    //get user status

    //----------------------------------------------------------------------------------user status toggle
    $(document).on('change', '#user_status', function() {
        console.log("clicked");
        var $checkbox = $(this);
        var userId = $checkbox.data('user-id');
        var userStatus = $checkbox.is(':checked') ? '0' : '1';

        var currentState = $checkbox.is(':checked');
        console.log(currentState);
        Swal.fire({
            title: (userStatus == '1' ? 'Deactivate' : 'Activate'),
            text: (userStatus == '1' ?
                'Are you sure you want to deactivate this account?' :
                'Are you sure you want to activate this account?'),
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url() ?>AdminController/user_status_changed',
                    type: 'POST',
                    data: {
                        user_status: userStatus,
                        user_id: userId
                    },
                    success: function(response) {
                        dataTable_user.ajax.reload();
                        Swal.fire({
                            title: response.status === 'success' ?
                                'Success' : 'Error',
                            text: response.message,
                            icon: response.status === 'success' ?
                                'success' : 'error'
                        });
                    },
                    error: function(error) {
                        console.error("Error updating toggle value:", error);
                    }
                });
            } else {
                if (currentState == false) {
                    $checkbox.prop('checked', true);
                } else {
                    $checkbox.prop('checked', false);
                }
            }
        });
    });

    // EDIT USER

    $(document).on('input', '#username_edit', function() {
        var originalUsername = $(this).data('user-name');
        var newUsername = $(this).val();

        var usernameLengthValidation = document.getElementById(
            'usernameLengthValidation');
        var uniqueUsernameValidation = document.getElementById(
            'uniqueUsernameValidation');

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

    $(document).on('click', '.viewUserButton', function() {
        var userId = $(this).data('user-id');
        $.ajax({
            url: '<?php echo base_url() ?>UserController/get_user/' + userId,
            method: 'GET',
            success: function(response) {
                console.log("Raw response: ", response);
                try {
                    var data = typeof response === 'string' ? JSON.parse(
                            response) :
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
                    $('#userPhoto').attr('src', 'http://172.16.161.34:8080/hrms/' + data
                        .EMP_PHOTO.substr(2));
                    $('#userName').text(data.USERNAME);
                    $('#class').text(data.CLASS);
                    $('#classDescript').text(data.DESCRIPTION);
                    $('#empPos').text(data.EMP_POS);
                    $('#empId').text(data.EMP_ID);
                    $('#empDept').text(data.EMP_DEPT);
                    $('#empBu').text(data.EMP_BU);
                    $('#status').text(data.STATUS == 1 ? 'Active' :
                        'Inactive');
                    $('#dateAdded').text(formattedAddedDateString);
                    $('#lastUpdate').text(formattedUpdatedDateString);

                    $('#viewUserModal').addClass('show');
                } catch (e) {
                    console.error("Error parsing JSON: ", e);
                    console.error("Response was: ", response);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX request failed: ", textStatus,
                    errorThrown);
            }
        });
    });

    $(document).on('click', '.editUserButton', function() {

        var userId = $(this).data('user-id');
        var userEmpName = $(this).data('user-empname');
        var userName = $(this).data('user-name');
        var classId = $(this).data('class-id');
        var userClass = $(this).data('user-class');
        var userDescript = $(this).data('user-descript');
        // var userPassword = $(this).data('user-password');
        console.log("User class is: ", userClass);
        console.log("User class description is: ", userDescript);
        console.log("class id is: ", classId);
        $('#user_id').val(userId);
        $('#user_editempname').val(userEmpName);
        $('#username_edit').val(userName);
        $('.user_editclass').text(userClass);
        $('#user_editclass').val(classId);
        $('#user_editdescript').val(userDescript);
        // $('#password_edit').val(userPassword);
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
                            title: responseData.status ===
                                'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status ===
                                'success' ?
                                'success' : 'error'
                        }).then(() => {
                             $('#password_edit').val('');
                            dataTable_user.ajax.reload();
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