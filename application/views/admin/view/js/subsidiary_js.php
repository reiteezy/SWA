<script>
$(document).ready(function() {
    
    var subForm = $('#subForm');
    var saveButton = $('#saveButton');
    var validationMessage = $('#validationMessage');

    saveButton.click(function() {
        var codeInput = $('[name="sub_code"]');
        var descriptInput = $('[name="sub_descript"]');

        if (codeInput.val().trim() === '' || descriptInput.val().trim() === '') {
            validationMessage.text('Please fill in all fields.');
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
                    url: subForm.attr('action'),
                    type: subForm.attr('method'),
                    data: new FormData(subForm[0]),
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
                        Swal.fire('Error',
                            'There was a problem processing your request.',
                            'error');
                    }
                });
            }
        });
    });

    $('.editSubsidiaryButton').on('click', function() {
        // Get the data attributes from the clicked button
        var subsidiaryId = $(this).data('sub-id');
        var subsidiaryCode = $(this).data('sub-code');
        var subsidiaryDescription = $(this).data('sub-descript');

        // Populate the modal form fields with the data
        $('#sub_id').val(subsidiaryId);
        $('#sub_editcode').val(subsidiaryCode);
        $('#sub_editdescript').val(subsidiaryDescription);
    });

    // Optionally, handle the save button click if you need to perform validation or AJAX submit
    var saveEditButton = $('#saveEditButton');
    var subEditForm = $('#subEditForm');
    var formChanged = false;

    var formInputs = subEditForm.find('input, textarea, select');
    formInputs.on('input', function() {
        formChanged = true;
    });

    saveEditButton.on('click', function() {
        var subsidiaryId = $('#sub_id').val();
        console.log(subsidiaryId);
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
                    url: "<?php echo base_url(); ?>SubsidiaryController/edit_subsidiary/" +
                        subsidiaryId,
                    type: subEditForm.attr('method'),
                    data: new FormData(subEditForm[0]),
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
                                '<?php echo base_url() ?>SubsidiaryController/subsidiary';
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });

    $('.deleteButton').click(function() {
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
                            title: responseData.status ===
                                'success' ? 'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status ===
                                'success' ? 'success' : 'error'
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
});

$(document).ready(function() {
    $('#subtable').DataTable({
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