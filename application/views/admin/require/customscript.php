
<script>$(document).ready(function() {
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
                    // console.log("Response:", response);
                    var response = JSON.parse(response);
                    var employeeData = response.data.employee;

                    $("#dropdown").html("");
                    for (var c = 0; c < employeeData.length; c++) {
                        // console.log(employeeData)
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
                            .click((function(name, id, pos, dept, bu) {
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
                            })(name, id, pos, dept, bu));

                        $("#dropdown").append(option);
                    }

                    $("#dropdown").show();++
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
    document.getElementById('dropdown').addEventListener('click', function() {
        var empName = document.getElementById('emp_name').value;
        checkNameAvailability(empName);
    });

    document.getElementById('emp_name').addEventListener('input', function() {
        var empName = this.value;
        checkNameAvailability(empName);
    });

    document.getElementById('emp_name').addEventListener('click', function() {
        var empName = this.value;
        checkNameAvailability(empName);
    });

    var validationMessage = document.getElementById('validationMessage');


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

document.getElementById('dropdown').addEventListener('click', function() {
    var empName = document.getElementById('emp_name').value;
    checkNameAvailability(empName);
});

document.getElementById('emp_name').addEventListener('input', function() {
    var empName = this.value;
    checkNameAvailability(empName);
});

document.getElementById('emp_name').addEventListener('click', function() {
    var empName = this.value;
    checkNameAvailability(empName);
});
var validationMessage = document.getElementById('validationMessage');

function checkNameAvailability(emp_name) {
    console.log(emp_name)
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>AdminController/check_name_availability',
        data: {
            emp_name: emp_name
        },

        success: function(data) {
            console.log(data.taken)
            if (data.taken === true) {
                validationNameAvailability.textContent = 'User already exists.';
            } else {
                validationNameAvailability.textContent = '';
            }
            return;
        },
        error: function() {}
    });
};


//USER CLASS, DESCRIPTION---------------------------

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




document.getElementById('dropdown').addEventListener('click', function() {
    var empName = document.getElementById('emp_name').value;
    checkNameAvailability(empName);
});

document.getElementById('emp_name').addEventListener('input', function() {
    var empName = this.value;
    checkNameAvailability(empName);
});

document.getElementById('emp_name').addEventListener('click', function() {
    var empName = this.value;
    checkNameAvailability(empName);
});
var validationMessage = document.getElementById('validationMessage');

function checkNameAvailability(emp_name) {
    console.log(emp_name)
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>AdminController/check_name_availability',
        data: {
            emp_name: emp_name
        },

        success: function(data) {
            console.log(data.taken)
            if (data.taken === true) {
                validationNameAvailability.textContent = 'User already exists.';
            } else {
                validationNameAvailability.textContent = '';
            }
            return;
        },
        error: function() {}
    });
};


    var saveButton = document.getElementById('saveButton');


    saveButton.addEventListener('click', function() {
        var empNameInput = document.querySelector('[name="emp_name"]');
        var userClassInput = document.querySelector('[name="user_class"]');
        var usernameInput = document.querySelector('[name="username"]');



        if (empNameInput.value.trim() === '' || userClassInput.value.trim() === '') {
            validationMessage.textContent = 'Please fill in all required fields.';
            return;
        } else {
            validationMessage.textContent = '';
        }
        if (usernameInput.value.trim() === '') {
            validationUser.textContent = 'Invalid user';
            return;
        } else {
            validationUser.textContent = '';
        }
        checkNameAvailability(empNameInput.value.trim());

        if (validationNameAvailability.textContent !== '') {
            return;
        }
        validationMessage.textContent = '';
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
                    url: document.getElementById('form1').action,
                    type: document.getElementById('form1').method,
                    data: new FormData(document.getElementById('form1')),
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
                                '<?php echo base_url() ?>user/user_list';
                        });
                    },
                    error: function(error) {
                        console.log("Error:", error);
                    }
                });
            }
        });
    });
   

    // View User Button
    var viewUserButtons = document.querySelectorAll('.viewUserButton');

    viewUserButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var userId = button.getAttribute('data-user-id');

            var xhr = new XMLHttpRequest();
            xhr.open('GET', '<?php echo base_url() ?>user/get_user/' + userId, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    var formattedAddedDate = new Date(data
                        .CREATION_DATE);
                    var formattedUpdatedDate = new Date(data
                        .DATE_UPDATED);
                    var formattedAddedDateString = formattedAddedDate.toLocaleDateString(
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
                    document.getElementById('userId').textContent = data.ID;
                    document.getElementById('name').textContent = data.EMP_NAME;
                    document.getElementById('userName').textContent = data.USERNAME;
                    document.getElementById('class').textContent = data.CLASS;
                    document.getElementById('classDescript').textContent = data.DESCRIPTION;
                    document.getElementById('empPos').textContent = data.EMP_POS;
                    document.getElementById('empId').textContent = data.EMP_ID;
                    document.getElementById('empDept').textContent = data.EMP_DEPT;
                    document.getElementById('empBu').textContent = data.EMP_BU;
                    document.getElementById('status').textContent = data.STATUS == 1 ?
                        'Active' : 'Inactive';
                    document.getElementById('dateAdded').textContent =
                        formattedAddedDateString;
                    document.getElementById('lastUpdate').textContent =
                        formattedUpdatedDateString;

                    document.getElementById('viewUserModal').classList.add('show');
                }
            };
            xhr.send();
        });
    });

    // Custom validity for empty user class
    var userClassSelect = document.getElementById('user_class');
    var form1 = document.getElementById('form1');

    form1.addEventListener('submit', function(e) {
        if (userClassSelect.value === "") {
            e.preventDefault();
            userClassSelect.setCustomValidity("Please select a class");
            userClassSelect.reportValidity();
        } else {
            userClassSelect.setCustomValidity("");
        }
    });

    userClassSelect.addEventListener('change', function() {
        userClassSelect.setCustomValidity("");
    });

    // User Status Confirmation
    var userStatusButtons = document.querySelectorAll('.user_status');

    userStatusButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var id = button.getAttribute('uid');
            var status = button.getAttribute('ustatus');

            Swal.fire({
                title: (status == '1' ? 'Deactivate' : 'Activate'),
                text: (status == '1' ?
                    'Are you sure you want to deactivate this account?' :
                    'Are you sure you want to activate this account?'),
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST',
                        '<?php echo base_url() ?>admin/user_status_changed', true);
                    xhr.setRequestHeader('Content-Type',
                        'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);

                            Swal.fire({
                                title: response.status === 'success' ?
                                    'Success' : 'Error',
                                text: response.message,
                                icon: response.status === 'success' ?
                                    'success' : 'error'
                            });

                            var newStatus = response.status === 'success' ? (
                                status === '1' ? '0' : '1') : status;
                            var buttonText = newStatus === '1' ?
                                '<span class="badge badge-secondary">Deactivate</span>' :
                                '<span class="badge badge-success">Activate</span>';
                            button.innerHTML = buttonText;
                            button.setAttribute('ustatus', newStatus);
                            var statusElements = document.querySelectorAll(
                                '.user-status[data-user-id="' + id + '"]');
                            var statusText = newStatus === '1' ? 'Active' :
                                'Inactive';
                            statusElements.forEach(function(element) {
                                element.innerHTML = statusText;
                                element.style.color = newStatus === '1' ?
                                    '#259812' : '#935116';
                            });
                        }
                    };
                    xhr.send('user_id=' + id + '&user_status=' + status);
                }
            });
        });
    });

    // Toggle Password Icon
    var togglePasswordIcons = document.querySelectorAll('.toggle-password-icon');

    togglePasswordIcons.forEach(function(icon) {
        icon.addEventListener('click', function() {
            var passwordInput = icon.closest('.input-group').querySelector('input');
            var isPasswordType = passwordInput.type === 'password';
            passwordInput.type = isPasswordType ? 'text' : 'password';
            icon.classList.toggle('fa-eye-slash', isPasswordType);
            icon.classList.toggle('fa-eye', !isPasswordType);
        });
    });


});
</script>
