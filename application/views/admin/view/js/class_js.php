<script>
    $(document).ready(function() {
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
                            <button type="button" class="editClassButton btn waves-effect waves-light btn-primary btn-icon" 
                            title="Edit" 
                            style="border:none; background-color: #02838d;" 
                            data-class-id="${row.CID}" 
                            data-class-code="${row.CLASS}" 
                            data-class-descript="${row.DESCRIPTION}" 
                            data-toggle="modal" 
                            data-target="#editClassModal">
                            <i class="icofont icofont-edit" style="padding-left: 5px;"></i>
                            </button>
                            <button type="button" class="deleteButton btn waves-effect waves-light btn-primary btn-icon" 
                            title="Delete" 
                            style="border:none; background-color: #f0533a;" 
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


        $('.dataTables_filter input[type="search"]').css({
            'width': '300px',
            'margin-right': '10px',
            'padding': '5px',
            'box-sizing': 'border-box'
        });


  
    });


    </script>