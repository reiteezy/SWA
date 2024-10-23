<script>
$(document).ready(function() {
    var selectedClassId = null;
    var selectedPrivileges = {};


    var modal = $('#rightsModal');
    var user_classSpan = $('#selectedUserClass');
    var user_descriptionSpan = $('#selectedUserDescription');

    
        $(document).on('click', '.assign-privilege-btn', function() {
        var user_class = $(this).data("user-class");
        var user_description = $(this).data("user-description");

        user_classSpan.text(user_class);
        user_descriptionSpan.text(user_description);

        event.preventDefault();
        selectedClassId = $(this).data("class-id");
        console.log(selectedClassId);
        $.ajax({
            url: '<?php echo base_url() ?>AdminController/view_update_privilege/' +
                selectedClassId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#subsidiary').prop('checked', parseInt(data.classes.subsidiary));
                $('#supplier').prop('checked', parseInt(data.classes.supplier));
                $('#userFiltering').prop('checked', parseInt(data.classes.userFiltering));
                $('#swa').prop('checked', parseInt(data.classes.swa));
                $('#swaForm').prop('checked', parseInt(data.classes.swaForm));
                $('#swaVo').prop('checked', parseInt(data.classes.swaVo));
                $('#swaMis').prop('checked', parseInt(data.classes.swaMis));
                $('#per').prop('checked', parseInt(data.classes.per));
                $('#perVo').prop('checked', parseInt(data.classes.perVo));
                $('#swaAcctg').prop('checked', parseInt(data.classes.swaAcctg));
                $('#swaReports').prop('checked', parseInt(data.classes.swaReports));
                $('#systemManager').prop('checked', parseInt(data.classes.systemManager));
                $('#userType').prop('checked', parseInt(data.classes.userType));
                $('#systemUser').prop('checked', parseInt(data.classes.systemUser));
                $('#userMenu').prop('checked', parseInt(data.classes.userMenu));
                $('#menuSetting').prop('checked', parseInt(data.classes.menuSetting));
                $('#systemUtilities').prop('checked', parseInt(data.classes
                    .systemUtilities));
                $('#systemWallpaper').prop('checked', parseInt(data.classes
                    .systemWallpaper));
                $('#aboutSystem').prop('checked', parseInt(data.classes.aboutSystem));
                $('#generateReport').prop('checked', parseInt(data.classes.generateReport));
                // console.log(data);
                // $("#rightsModal").modal("show");
            }
        });
    });


    $(".form-check-input1").on("change", function() {
        var checkboxId = $(this).attr("id");
        var isChecked = $(this).prop("checked") ? 1 : 0;

        selectedPrivileges[checkboxId] = isChecked;

      
        if (checkboxId === 'swaVo' || checkboxId === 'swaMis' || checkboxId === 'perVo' ||
            checkboxId === 'swaAcctg' || checkboxId === 'per' || checkboxId === 'swaForm' ||
            checkboxId === 'swaReports') {
            if (isChecked) {
                $('#swa').prop('checked', true);
                selectedPrivileges['swa'] = 1;
            } else {
                if (!$('#swaVo').prop('checked') && !$('#swaMis').prop('checked') && !$('#perVo').prop(
                        'checked') && !$('#swaAcctg').prop('checked') && !$('#per').prop('checked') && !
                    $('#swaForm').prop('checked') && !$('#swaReports').prop('checked')) {
                    $('#swa').prop('checked', false);
                    selectedPrivileges['swa'] = 0;
                }
            }
        } else if (checkboxId === 'swa') {
            if (isChecked) {
                $('#swaVo').prop('checked', true);
                $('#swaMis').prop('checked', true);
                $('#perVo').prop('checked', true);
                $('#swaAcctg').prop('checked', true);
                $('#per').prop('checked', true);
                $('#swaForm').prop('checked', true);
                $('#swaReports').prop('checked', true);
                selectedPrivileges['swaVo'] = 1;
                selectedPrivileges['swaMis'] = 1;
                selectedPrivileges['perVo'] = 1;
                selectedPrivileges['swaAcctg'] = 1;
                selectedPrivileges['per'] = 1;
                selectedPrivileges['swaForm'] = 1;
                selectedPrivileges['swaReports'] = 1;
            } else {
                $('#swaVo').prop('checked', false);
                $('#swaMis').prop('checked', false);
                $('#perVo').prop('checked', false);
                $('#swaAcctg').prop('checked', false);
                $('#per').prop('checked', false);
                $('#swaForm').prop('checked', false);
                $('#swaReports').prop('checked', false);
                selectedPrivileges['swaVo'] = 0;
                selectedPrivileges['swaMis'] = 0;
                selectedPrivileges['perVo'] = 0;
                selectedPrivileges['swaAcctg'] = 0;
                selectedPrivileges['per'] = 0;
                selectedPrivileges['swaForm'] = 0;
                selectedPrivileges['swaReports'] = 0;
            }
        }
        if (checkboxId === 'userType' || checkboxId === 'systemUser' || checkboxId === 'userMenu' ||
            checkboxId === 'menuSetting' || checkboxId === 'subsidiary' || checkboxId === 'supplier' || checkboxId ===
            'userFiltering') {
            if (isChecked) {
                $('#systemManager').prop('checked', true);
                selectedPrivileges['systemManager'] = 1;
            } else {
                if (!$('#userType').prop('checked') && !$('#systemUser').prop('checked') && !$(
                        '#userMenu').prop('checked') && !$('#menuSetting').prop('checked') && !$('#subsidiary').prop('checked') && !$('#supplier').prop('checked') && !$(
                            '#userFiltering').prop('checked') ) {
                    $('#systemManager').prop('checked', false);
                    selectedPrivileges['systemManager'] = 0;
                }
            }
        } else if (checkboxId === 'systemManager') {
            if (isChecked) {
                $('#userType').prop('checked', true);
                $('#systemUser').prop('checked', true);
                $('#userMenu').prop('checked', true);
                $('#menuSetting').prop('checked', true);
                $('#subsidiary').prop('checked', true);
                $('#supplier').prop('checked', true);
                $('#userFiltering').prop('checked', true);
                selectedPrivileges['userType'] = 1;
                selectedPrivileges['systemUser'] = 1;
                selectedPrivileges['userMenu'] = 1;
                selectedPrivileges['menuSetting'] = 1;
                selectedPrivileges['subsidiary'] = 1;
                selectedPrivileges['supplier'] = 1;
                selectedPrivileges['userFiltering'] = 1;
            } else {
                $('#userType').prop('checked', false);
                $('#systemUser').prop('checked', false);
                $('#userMenu').prop('checked', false);
                $('#menuSetting').prop('checked', false);
                $('#subsidiary').prop('checked', false);
                $('#supplier').prop('checked', false);
                $('#userFiltering').prop('checked', false);
                selectedPrivileges['subsidiary'] = 0;
                selectedPrivileges['supplier'] = 0;
                selectedPrivileges['userFiltering'] = 0;
                selectedPrivileges['userType'] = 0;
                selectedPrivileges['systemUser'] = 0;
                selectedPrivileges['userMenu'] = 0;
                selectedPrivileges['menuSetting'] = 0;
            }
        }
        if (checkboxId === 'aboutSystem') {
            if (isChecked) {
                $('#systemUtilities').prop('checked', true);
                selectedPrivileges['systemUtilities'] = 1;
            } else {
                if (!$('#aboutSystem').prop('checked')) {
                    $('#systemUtilities').prop('checked', false);
                    selectedPrivileges['systemUtilities'] = 0;
                }
            }
        } else if (checkboxId === 'systemUtilities') {
            if (isChecked) {
                $('#aboutSystem').prop('checked', true);
                selectedPrivileges['aboutSystem'] = 1;
            } else {
                $('#aboutSystem').prop('checked', false);
                selectedPrivileges['aboutSystem'] = 0;
            }
        }
    });

    var initialPrivileges = {
        ...selectedPrivileges
    };
    $(document).on('click', '#save-changes-button', function() {
        var changesMade = Object.keys(selectedPrivileges).some(key => initialPrivileges[key] !==
            selectedPrivileges[key]);
        if (!changesMade) {
            Swal.fire({
                title: 'No changes made',
                text: 'Please make changes before saving.',
                icon: 'error',
            });
            return;
        }
        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you want to save the changes?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: '<?php echo base_url() ?>AdminController/savePrivileges',
                    type: "POST",
                    data: {
                        classId: selectedClassId,
                        privileges: selectedPrivileges
                    },
                    success: function(response) {
                        console.log("Response: " + response);
                        var responseData = JSON.parse(response);

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        });

                        // $("#rightsModal").modal("hide");
                    },

                    error: function(error) {
                        console.log("Error: " + error);
                    }

                });
            }
        });
    });

   

    var classForm = $('#classForm');
    var classSaveButton = $('#classSaveButton');
    var initialClassValue = $('[name="user_class"]').val();
    var initialDescriptionValue = $('[name="user_descript"]').val();

    classSaveButton.on('click', function() {
        var classInput = $('[name="user_class"]');
        var descriptionInput = $('[name="user_descript"]');
        var validationMessage = $('#validationMessage');

        if (classInput.val().trim() === '' || descriptionInput.val().trim() === '') {
            validationMessage.text('Please fill in all required fields.');
            return;
        }

        if (classInput.val() === initialClassValue && descriptionInput.val() ===
            initialDescriptionValue) {
            // Display a Swal message for no changes
            Swal.fire({
                title: 'No changes made',
                text: 'You haven\'t made any changes.',
                icon: 'info',
            });
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
                // Submit the form using AJAX
                $.ajax({
                    url: classForm.attr('action'),
                    type: classForm.attr('method'),
                    data: new FormData(classForm[0]),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        
                        dataTable_class.ajax.reload();
                        console.log("Response:", response);
                        var responseData = response;

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        }).then(() => {
                            $('[name="user_class"]').val('');
                            $('[name="user_descript"]').val('');
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });

    $(document).on('click', '.editClassButton', function() {
        // Get the data attributes from the clicked button
        var classId = $(this).data('class-id');
        var classCode = $(this).data('class-code');
        var classDescript = $(this).data('class-descript');
        // Populate the modal form fields with the data
        
        console.log(classId);
        console.log(classDescript);
        $('#class_id').val(classId);
        $('#user_editclass').val(classCode);
        $('#user_editdescript').val(classDescript);
    });
    
    var saveEditButton = $('#saveEditButton');
    var classEditForm = $('#classEditForm');
    var formChanged = false;

    var formInputs = classEditForm.find('input, textarea, select');
    formInputs.on('input', function() {
        formChanged = true;
    });

   saveEditButton.on('click', function() {
        var classId = $('#class_id').val();
        var classCode = $('#user_editclass').val();
        var classDescription = $('#user_editdescript').val();
    
        if (!formChanged) {
            Swal.fire({
                title: 'No Changes Made',
                text: 'There are no changes to save.',
                icon: 'info'
            });
            return;
        }
        if (classCode == "") {
            Swal.fire({
                        title: 'Error',
                        text: 'Subsidiary code required.',
                        icon: 'warning'
                    })
            return;
        }
        if (classDescription == "") {
            Swal.fire({
                        title: 'Error',
                        text: 'Subsidiary description required.',
                        icon: 'warning'
                    })
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
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>ClassController/edit_type/",
                    data: {
                        class_id: classId,
                        class_code: classCode,
                        class_descript: classDescription
                    },
                    dataType: 'json',
                    success: function(response) {
                    if (response.status === 'success') {
                        dataTable_class.ajax.reload();
                        Swal.fire({
                            title: 'success',
                            text: 'Successfully updated.',
                            icon: 'success'
                        }).then(() => {
                          
                            $("#editClassModal").modal('hide');
                        });
                    
                    } else if(response.status === 'error') {
                        Swal.fire({
                            title: 'Error',
                            text: response.message || 'An error occurred. Please try again later.',
                            icon: 'error'
                        });
                    }
                    }, error: function(xhr, status, error) {
                        Swal.fire({
                            title: 'Error',
                            text: 'There was an issue with the request. Please try again.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });

   

    $(document).on('click', '.deleteButton', function() {
        var deleteUrl = $(this).data('delete-url');

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to delete this data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteUrl,
                    type: 'GET',
                    success: function(response) {
                        
                        dataTable_class.ajax.reload();
                        console.log("Response:", response);
                        var responseData = response;

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });


var baseUrl = "<?php echo base_url(); ?>"
function reload_table() {
    dataTable_class.ajax.reload();
}

    var dataTable_class = $('#classtable').DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        lengthChange: false,
        ordering: false,
        ajax: {
            url: "<?php echo base_url(); ?>ClassController/get_class_list",
            type: "POST",
            data: function(d) {
                d.start = d.start || 0;
                d.length = d.length || 10;
            }
        },
        columns: [{
                data: 'CLASS'
            },
            {
                data: 'DESCRIPTION'
            },
            {
                data: null,
                orderable: false,
                render: function(data, type, row) {
                    return `
                            <button type="button"
                            class="assign-privilege-btn btn waves-effect waves-light btn-primary custom-btn-db"
                            data-class-id="${row.CID}"
                            title="access"
                            data-toggle="modal" data-target="#rightsModal"
                            data-user-description="${row.DESCRIPTION}"
                            data-user-class="${row.CLASS}"><i class="icofont icofont-unlock" style="padding-left: 5px;"></i></button>
                            <button type="button" class="editClassButton btn waves-effect waves-light btn-primary custom-btn-db" 
                            title="Edit" 
                            style="" 
                            data-class-id="${row.CID}" 
                            data-class-code="${row.CLASS}" 
                            data-class-descript="${row.DESCRIPTION}" 
                            data-toggle="modal" 
                            data-target="#editClassModal">
                            <i class="icofont icofont-edit-alt" style="padding-left: 5px;"></i>
                            </button>
                            <button type="button" class="deleteButton btn waves-effect waves-light btn-primary custom-btn-db" 
                            title="Delete" 
                            style="" 
                            data-delete-url="${baseUrl}ClassController/del_type/${row.CID}">
                            <i class="icofont icofont-ui-delete" style="padding-left: 5px;"></i>
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
            processing: '<div class="upload-loader"></div>'
        }
    });

    $('#privilegetable').DataTable({
        lengthChange: false,
        searching: false,
        paging: false,
        ordering: false
    });

    $('.dataTables_filter input[type="search"]').css({
        'width': '300px',
        'margin-right': '10px',
        'padding': '5px',
        'box-sizing': 'border-box'
    });

  
});
</script>