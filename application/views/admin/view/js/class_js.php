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

        // Check if values have changed
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
                        console.log("Response:", response);
                        var responseData = response;

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        }).then(() => {
                            location.reload(true);
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

    // Optionally, handle the save button click if you need to perform validation or AJAX submit
    var saveEditButton = $('#saveEditButton');
    var classEditForm = $('#classEditForm');
    var formChanged = false;

    var formInputs = classEditForm.find('input, textarea, select');
    formInputs.on('input', function() {
        formChanged = true;
    });

    saveEditButton.on('click', function() {
        var classId = $('#class_id').val();
        if (!formChanged) {
            Swal.fire({
                title: 'No Changes Made',
                text: 'There are no changes to save.',
                icon: 'info'
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
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url(); ?>ClassController/edit_type/" +
                        classId,
                    type: classEditForm.attr('method'),
                    data: new FormData(classEditForm[0]),
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
                        }).then(function() {
                            window.location.href =
                                '<?php echo base_url() ?>ClassController/class_list';
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });

    $('.deleteButton').on('click', function() {
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
                        console.log("Response:", response);
                        var responseData = response;

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        }).then(() => {
                            location.reload(true);
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });


            $('#classtable').DataTable({
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
    });
    </script>